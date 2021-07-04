<?php
include __DIR__ . '/parts/config.php';

$action = $_POST['action'];
$user_id = $_SESSION['user']['id'] ?? 0;
switch ($action){
    case 'add':

        
        $type = $_POST['type'];
        $id = $_POST['id'] ?? 0;
        $result = [ 
            'status' => "",
            'info' => "",
        ];
        if ($user_id == 0){
            $result['status'] = 'error';
            $result['info'] = '請先登入帳號';
            
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
        }
        switch ($type){
            case "restaurant":
                $order_date = $_POST['order_date'];
                $order_time = $_POST['order_time'];
                $quantity = $_POST['quantity'];
                $table = $_POST['table'];
                if (isset($order_date) && isset($order_time) && isset($quantity) && isset($table)){
                    $sql = "INSERT INTO `wish_list` (`user_id`, `type`, `foreign_id`) VALUES (?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$user_id, $type, 0]);
                    $wish_list_id = $pdo->lastInsertId();

                    foreach ($table as $restaurant_id){
                        $sql = "SELECT * FROM  `$type` WHERE id = $restaurant_id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $foreign_id = $stmt->fetch()['id'];

                        $sql = "INSERT INTO `wish_list_restaurant`(`wish_list_id`, `restaurant_id`, `date`, `time`, `quantity`) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$wish_list_id, $restaurant_id, $order_date, $order_time, $quantity]);
                        $result['status'] = 'success';
                    }
                
                }
                break;
            case "event":
                if (isset($id)){
                    $sql = "SELECT * FROM  `$type` WHERE id = $id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $foreign_id = $stmt->fetch()['id'];
                
                
                    $sql = "INSERT INTO `wish_list` (`user_id`, `type`, `foreign_id`) VALUES (?, ?, ?)";
                    
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$user_id, $type, $foreign_id]);
                    $result['status'] = 'success';
                    break;
                }
            case "hotel":
                $order_date = $_POST['order_date'];
                if (isset($id) && isset($order_date)){
                    $sql = "SELECT * FROM  `$type` WHERE id = $id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $foreign_id = $stmt->fetch()['id'];

                    $sql = "INSERT INTO `wish_list` (`user_id`, `type`, `foreign_id`) VALUES (?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$user_id, $type, $foreign_id]);
                    $wish_list_id = $pdo->lastInsertId();

                    $sql = "INSERT INTO `wish_list_hotel`(`wish_list_id`, `date`) VALUES (?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$wish_list_id, $order_date]);
                    $result['status'] = 'success';
                }
                break;
        }
        
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;
    case 'read':
        $sql_array = [];
        $result = [];
        array_push($sql_array, "SELECT wl.id as 'wish_list_id', wl.type, e.* FROM  `wish_list` as wl LEFT JOIN `event` as e ON wl.foreign_id = e.id WHERE user_id = ? AND wl.`type` = 'event'");
        array_push($sql_array, "SELECT *, wl.type, CONCAT('桌號：', GROUP_CONCAT(`wlr`.`restaurant_id` SEPARATOR '，')) as `name`, 0 as price FROM `wish_list` as wl JOIN `wish_list_restaurant` as wlr ON wl.id = wlr.wish_list_id WHERE user_id = ? AND wl.`type` = 'restaurant' GROUP BY wl.id");
        array_push($sql_array, "SELECT wl.id as 'wish_list_id', wl.type, h.name_zh as `name`, h.*, wlh.`date`, '' as `time` FROM  `wish_list` as wl LEFT JOIN `hotel` as h ON wl.foreign_id = h.id LEFT JOIN `wish_list_hotel` as wlh ON wlh.wish_list_id = wl.id WHERE user_id = ? AND wl.`type` = 'hotel'");
        
        foreach($sql_array as $sql){
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id]);
            $result = array_merge($result, $stmt->fetchAll());
        }
        
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'delete':
        $id = $_POST['id'];
        $sql = "DELETE FROM `wish_list` WHERE id = $id AND user_id = ?";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$user_id]);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;
    case 'deleteAll':
        $sql = "DELETE FROM `wish_list` WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$user_id]);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;

}