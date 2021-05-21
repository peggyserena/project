<?php
include __DIR__ . '/parts/config.php';

$action = $_POST['action'];
switch ($action){
    case 'isCompletedUserData':
        $user = $_SESSION['user'];

        $result = empty($user['email']) || 
                empty($user['fullname']) || 
                empty($user['birthday']) || 
                empty($user['mobile']) || 
                empty($user['zipcode']) || 
                empty($user['city'])|| 
                empty($user['address']);
                
        $result = !$result;
        echo json_encode([$result], JSON_UNESCAPED_UNICODE);
        break;
}
