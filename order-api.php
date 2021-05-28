<?php
include __DIR__ . '/parts/config.php';

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

switch ($action){
    case 'add':

        $cart = $_SESSION['cart'];
        $user_id = $_SESSION['user']['id'];
        $cart['event'] = $cart['event'] ?? []; 
        $cart['hotel'] = $cart['hotel'] ?? []; 
        $cart['restaurant'] = $cart['restaurant'] ?? []; 

        // 判斷可否新增
        $flag = true;
        foreach($cart['event'] as $key => $cart_item){
            // $cart_item['quantity'] <= limitNum - order_quantity
            $sql = "SELECT (e.limitNum - SUM(oe.quantity)) as available_num FROM `event` as e 
                JOIN `order_event` as oe ON e.id = oe.event_id 
                WHERE e.id=?  
                GROUP BY oe.event_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$cart_item['id']]);
            $result = $stmt->fetch();
            if ($cart_item['quantity'] > $result['available_num']){
                $flag = false;
                if ($result['available_num'] > 0){
                    $_SESSION['cart']['event'][$key]["order_quantity"] = $cart_item["limitNum"] - $result['available_num'];
                    $_SESSION['cart']['event'][$key]["quantity"] = $result['available_num'];
                    echo json_encode(["info" => "超出購買上限，目前剩餘名額".$result['available_num']."名"], JSON_UNESCAPED_UNICODE);
                }else{
                    unset($_SESSION['cart']['event'][$key]);
                    echo json_encode(["info" => "該筆活動已售完", "redirect" => WEB_ROOT."/event.php"], JSON_UNESCAPED_UNICODE);
                }
                
                break;
            }
        }
        foreach($cart['hotel'] as $key => $cart_item){
            // $cart_item['quantity'] <= limitNum - order_quantity
            $sql = "SELECT (h.quantity_limit - SUM(oh.quantity)) as available_num, (h.people_num_limit - SUM(oh.people_num)) as available_people_num FROM `hotel` as h
                JOIN `order_hotel` as oh ON h.id = oh.hotel_id 
                WHERE h.id=?  
                GROUP BY oh.hotel_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$cart_item['id']]);
            $result = $stmt->fetch();
            if ($result['available_num'] <= 0 || $result['available_people_num'] <= 0){
                $flag = false;
                unset($_SESSION['cart']['hotel'][$key]);
                echo json_encode(["info" => "該房間已售完，請選擇其他房型或時間", "redirect" => WEB_ROOT."/hotel.php#reservation"], JSON_UNESCAPED_UNICODE);
                break;
            }
            if ($cart_item['quantity'] > $result['available_num']){
                $flag = false;
                $_SESSION['cart']['hotel'][$key]["order_quantity"] = $cart_item["quantity_limit"] - $result['available_num'];
                $_SESSION['cart']['hotel'][$key]["quantity"] = $result['available_num'];
                echo json_encode(["info" => "超出購買上限，目前剩餘房數".$result['available_num']."名"], JSON_UNESCAPED_UNICODE);
                break;
            }else if ($cart_item['people_num'] > $result['available_people_num']){
                $flag = false;
                $_SESSION['cart']['hotel'][$key]["order_people_num"] = $cart_item["people_num_limit"] - $result['available_people_num'];
                $_SESSION['cart']['hotel'][$key]["people_num"] = $result['available_people_num'];
                echo json_encode(["info" => "超出購買上限，目前剩餘人數上限".$result['available_people_num']."名"], JSON_UNESCAPED_UNICODE);
                break;
            }
        }
        if (!$flag) break;



        // 計算總價
        $original_price = 0;
        $discount = 0;
        $isDiscount = sizeof($cart['event'] ?? []) >= 1 && sizeof($cart['hotel'] ?? []) >= 1;
        foreach($cart as $type => $value){
            if ($type == 'event' || $type == "hotel"){
                foreach($value as $cart_item){
                    $original_price += $cart_item['price'] * $cart_item['quantity'];
                }
            }
        }
        if ($isDiscount) $discount = $original_price * 0.15;
        $price = $original_price - $discount;

        $sql = "INSERT INTO `sales_order` (`order_id`, `user_id`, `price`, `original_price`, `discount`, `status`, `create_datetime`) VALUES ('', ?, ?, ?, ?, '已付款', NOW())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $price, $original_price, $discount]);
        $sales_order_id = $pdo->lastInsertId();

        $sql = "UPDATE `sales_order` SET `order_id` = CONCAT(RPAD(REPLACE(SUBSTRING(NOW(), 1, 10), '-', '') , 12 - LENGTH(id), '0'), id) WHERE id = $sales_order_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $sql = "SELECT * FROM `sales_order` WHERE id = $sales_order_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $_SESSION['cart']['order_id'] = $result['order_id'];
        
        foreach($cart as $type => $value){
            switch ($type){
                case 'event':
                    $sql2 = "INSERT INTO `order_event` (`item_id`, `event_id`, `price`, `quantity`, `order_datetime`)
                    VALUES (?, ?, ?, ?, ?)";
                    break;
                case 'restaurant':
                    $sql2 = "INSERT INTO `order_restaurant` (`item_id`, `restaurant_id`, `order_datetime`)
                    VALUES (?, ?, ?)";
                    break;
                case 'hotel':
                    $sql2 = "INSERT INTO `order_hotel` (`item_id`, `hotel_id`, `price`, `quantity`, `people_num`,`order_datetime`)
                    VALUES (?, ?, ?, ?, ?, ?)";
                    break;
            }
            
        
        
            foreach($value as $cart_item){
                $sql = "INSERT INTO `order_item` (`order_id`, `type`)
                    VALUES ('$sales_order_id', '$type')";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $item_id = $pdo->lastInsertId();
                
        
                $bind_param = [];
                switch ($type){
                    case 'event':
                        $id = $cart_item['id'];
                        $sql = "SELECT * FROM `$type` WHERE id = $id";
                        
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch();
                        $product_id = $result['id'];
                        
                        $bind_param = [$item_id, $product_id, $cart_item['price'], $cart_item['quantity'], $cart_item['date']." ".$cart_item['time']];
                        $stmt = $pdo->prepare($sql2);
                        $stmt->execute($bind_param);
                        break;
                    case 'restaurant':
                        $id_list = $cart_item['id'];
        
                        foreach ($id_list as $id){
                            $sql = "SELECT * FROM `$type` WHERE id = $id"; 
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetch();
                            $product_id = $result['id'];
                            
                            $bind_param = [$item_id, $product_id, $cart_item['order_date']." ".$cart_item['order_time']];
                            $stmt = $pdo->prepare($sql2);
                            $stmt->execute($bind_param);
                        }
                        break;
                    case 'hotel':
                        $id = $cart_item['id'];
                        $sql = "SELECT * FROM `$type` WHERE id = $id";
                        
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch();
                        $product_id = $result['id'];
                        
                        $bind_param = [$item_id, $product_id, $result['price'], $cart_item['quantity'], $cart_item['people_num'], $cart_item['order_date']];
                        $stmt = $pdo->prepare($sql2);
                        $stmt->execute($bind_param);
                        break;
                }
                
            }
        }
        echo json_encode([$sales_order_id], JSON_UNESCAPED_UNICODE);
        break;
    case 'read':
        $start_datetime = $_POST['start_date']." 00:00:00";
        $end_datetime = $_POST['end_date']." 23:59:59";
        
        $user_id = $_SESSION['user']['id'];
        
        $sql = "SELECT * FROM `sales_order` WHERE user_id = ? AND create_datetime BETWEEN ? and ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $start_datetime, $end_datetime]);
        $result = $stmt->fetchAll();
        
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'readOne':
        $user_id = $_SESSION['user']['id'];
        $id = $_POST['id'];

        $sql_hotel = "SELECT h.name_zh, h.name_en, DATE(oh.order_datetime) as order_date, oh.quantity, oh.people_num, oh.price, oh.quantity * oh.price as sub_total FROM `sales_order` as so 
        JOIN `order_item` as oi ON so.id = oi.order_id  
        JOIN `order_hotel` as oh ON oi.id = oh.item_id  
        JOIN `hotel` as h ON oh.hotel_id = h.id  
        where user_id = ? AND so.id = ?";

        $sql_evnet = "SELECT e.name, CONCAT(e.date, '/', e.time) as order_datetime, oe.quantity, oe.price, oe.quantity * oe.price as sub_total  FROM `sales_order` as so 
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
        
        $sql_sales_order = "SELECT order_id, original_price, discount, price from `sales_order` where user_id = ? AND id = ?";
        
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


        
        
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        break;
}
