<?php
include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/tool.php';

// $cart = 
// [
//     'event' => [
//             [
//                 'id' => 1,
//                 'price' => 100,
//                 'quantity' => 10,
//             ],
            
//         ],
//     'restaurant' => [
//         [
//             'id' => [1,2,3],
//             'quantity' => 10,
//             'order_date' => '2021-05-15',
//             'order_time' => '14:00:00',
//         ]
//     ],
//     'hotel' => [
//         [
//             'id' => 1,
//             'quantity' => 2,
//             'people_num' => 4,
//             'order_date' => '2021-05-15'
//         ]
//     ],
//     'order_id' = '123245',
// ];
$action = $_POST['action'];
$staff = $_SESSION['staff'] ?? null;
if (empty($staff)){
    die();
}

switch ($action){
    case 'readAll':
        $condition = [];
        $param = [];

        $condition_map = [
            'email' => "m.email LIKE ?",
            'fullname' => "m.fullname LIKE ?",
            'mobile' => "m.mobile LIKE ?",
            'order_id' => "so.order_id LIKE ?",
            'status' => "so.status = ?",
            'shipment_status' => "so.shipment_status = ?",
        ];

        // 設定condition的條件
        foreach($condition_map as $key => $value){
            $val = replaceAllToEmpty($_POST[$key]);
            if (!empty($val)){
                if (strpos($value, " LIKE ")){
                    $val = "%$val%";
                }
                array_push($condition, $value);
                array_push($param, $val);
            }
        }
        $start_date_val = replaceAllToEmpty($_POST["start_date"]);
        $end_date_val = replaceAllToEmpty($_POST["end_date"]);
        
        if (!(empty($start_date_val) && empty($end_date_val))){
            array_push($condition, "so.create_datetime BETWEEN ? and ?");
            array_push($param, $start_date_val);
            array_push($param, $end_date_val);
        }

        
        
        $stmt_where = "";
        if (count($condition) > 0){
            $stmt_where = "WHERE ". implode(" AND ", $condition);
        }

        // 獲取資料
        $sql = "SELECT * FROM `sales_order` as so 
        LEFT JOIN `members` as m 
        ON so.user_id = m.id
        $stmt_where
        ORDER BY so.create_datetime DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $result = $stmt->fetchAll();
        
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'read':
        $user_id = $_SESSION['user']['id'];
        $id = $_POST['id'];

        $sql_hotel = "SELECT h.name_zh, h.name_en, DATE(oh.order_datetime) as order_date, oh.quantity, oh.people_num, oh.price, oh.quantity * oh.price as sub_total FROM `sales_order` as so 
        JOIN `order_item` as oi ON so.id = oi.order_id  
        JOIN `order_hotel` as oh ON oi.id = oh.item_id  
        JOIN `hotel` as h ON oh.hotel_id = h.id  
        where user_id = ? AND so.id = ?";

        $sql_evnet = "SELECT e.id, e.name, CONCAT(e.date, '/', e.time) as order_datetime, oe.quantity, oe.price, oe.quantity * oe.price as sub_total  FROM `sales_order` as so 
        JOIN `order_item` as oi ON so.id = oi.order_id  
        JOIN `order_event` as oe ON oi.id = oe.item_id
        JOIN `event` as e ON oe.event_id = e.id 
        where user_id = ? AND so.id = ?";

        $sql_resturant = "SELECT DATE(_or.order_datetime) as order_date, TIME(_or.order_datetime) as order_time, _or.quantity, GROUP_CONCAT(r.id SEPARATOR '，') as id FROM `sales_order` as so 
        JOIN `order_item` as oi ON so.id = oi.order_id 
        JOIN `order_restaurant` as _or ON oi.id = _or.item_id 
        JOIN `restaurant` as r ON _or.restaurant_id = r.id 
        where user_id = ? AND so.id = ?
        group by _or.`item_id`";

         
        $sql_sales_order = "SELECT so.*, m.fullname, m.mobile, m.zipcode, m.county, m.district, m.address from `sales_order` as so JOIN `members` as m ON so.user_id = m.id where so.user_id = ? AND so.id = ?";
        
        $sql_shipemnt = "SELECT * FROM `shipment` where id = ?";
       

        $output = [];

        $stmt = $pdo->prepare($sql_hotel);
        $stmt->execute([$user_id, $id]);
        $result = $stmt->fetchAll();
        $output['hotel'] = $result;

        $stmt = $pdo->prepare($sql_evnet);
        $stmt->execute([$user_id, $id]);
        $result = $stmt->fetchAll();
        $output['event'] = $result;

        $stmt = $pdo->prepare($sql_resturant);
        $stmt->execute([$user_id, $id]);
        $result = $stmt->fetchAll();
        $output['restaurant'] = $result;

        $stmt = $pdo->prepare($sql_sales_order);
        $stmt->execute([$user_id, $id]);
        $result = $stmt->fetch();
        $output['order'] = $result;

        $stmt = $pdo->prepare($sql_shipemnt);
        $stmt->execute([$output['order']['shipment_id']]);
        $result = $stmt->fetch();
        $output['shipment'] = $result;
        
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        break;
        
    case 'cancel':
        $user_id = $_SESSION['user']['id'];
        $order_id = $_POST['order_id'];
        $last_date = date('Y-m-d', strtotime("-7 days"));
        $product_list = ['event', 'hotel', 'restaurant'];
        $count = 0;
        $output = [];

        $sql = "SELECT * FROM `sales_order` WHERE user_id = ? and create_datetime >= ? and order_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $last_date, $order_id]);
        $result = $stmt->fetchAll();
        
        if (sizeof($result) > 0) {
            $sql = "UPDATE `sales_order` SET status = '已取消' WHERE user_id = ? and order_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id, $order_id]);
        }else{
            $output = ["info" => "此訂單無法刪除，已超過鑑賞期限7天"];
        }
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        break;
}