<?php
include __DIR__ . '/parts/config.php';

$action = $_POST['action'];
$user_id = $_SESSION['user']['id'];
switch ($action){
    case 'add':

        
        $type = $_POST['type'];
        $id = $_POST['id'];
        
        if (isset($type) && isset($id)){
            $sql = "SELECT * FROM  `$type` WHERE id = $id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $foreign_id = $stmt->fetch()['id'];
        
        
            $sql = "INSERT INTO `wish_list` (`user_id`, `type`, `foreign_id`) VALUES (?, ?, ?)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id, $type, $foreign_id]);
        }
        break;
    case 'read':
        $sql = "SELECT wl.id as 'wish_list_id', e.* FROM  `wish_list` as wl LEFT JOIN `event` as e ON wl.foreign_id = e.id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'delete':
        $id = $_POST['id'];
        $sql = "DELETE FROM `wish_list` WHERE id = $id";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;

}