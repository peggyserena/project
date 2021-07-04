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
//     'order_id' = '123245',
// ];
$action = $_POST['action'];

switch ($action){
    case 'add':

        $cart = $_SESSION['cart'];
        $user_id = $_SESSION['user']['id'];
        
        // 計算總價
        $sum_price = 0;
        foreach($cart as $type => $value){
            if ($type == 'event'){
                foreach($value as $cart_item){
                    $sum_price += $cart_item['price'] * $cart_item['quantity'];
                }
            }
        }
        
        
        $sql = "INSERT INTO `sales_order` (`order_id`, `user_id`, `price`, `status`, `create_datetime`) VALUES ('', ?, ?, '已付款', NOW())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $sum_price]);
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
                    $sql2 = "INSERT INTO `order_restaurant` (`item_id`, `restaurant`, `order_datetime`)
                    VALUES (?, ?, ?)";
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
                }
                
            }
        }
        echo json_encode($_SESSION['cart'], JSON_UNESCAPED_UNICODE);
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
}
