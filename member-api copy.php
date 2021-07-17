<?php
include __DIR__ . '/parts/config.php';


$action = $_POST['action'];
switch ($action){
    case 'isCompletedUserData':
        $user = $_SESSION['user'];

        $result = empty($user['email']) || 
                empty($user['fullname']) || 
                empty($user['birthday']) || 
                empty($user['gender']) || 
                empty($user['mobile']) || 
                empty($user['zipcode']) || 
                empty($user['county'])|| 
                empty($user['district'])|| 
                empty($user['address']);
                
        $result = !$result;
        echo json_encode([$result], JSON_UNESCAPED_UNICODE);
        break;
    case 'checkAccountExist':
        $result = false;
        if (isset($_POST['fb_id'])){
                $a_sql = "SELECT `fb_id` FROM `members` WHERE fb_id = ?";
                $a_stmt = $pdo->prepare($a_sql);
                $a_stmt->execute([$_POST['fb_id']]);
                
                if ($a_stmt->rowCount()) {
                        $result = true;
                }
        }
        echo json_encode([$result], JSON_UNESCAPED_UNICODE);
        break;
    case 'changePassword':
                $result = false;
                if (isset($_POST['password']) && isset($_POST['id']) && !empty($_POST['key'])){
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        $a_sql = "UPDATE `members` SET `hash` = ?, forget_password = ? WHERE id = ? AND `forget_password` = ?";
                        $a_stmt = $pdo->prepare($a_sql);
                        $a_stmt->execute([$password, '', $_POST['id'], $_POST['key']]);
                        
                        if ($a_stmt->rowCount()) {
                                $result = true;
                        }
                }
                echo json_encode([$result], JSON_UNESCAPED_UNICODE);
                break;
    case 'checkKey':
        $result = false;
        if (isset($_POST['id']) && !empty($_POST['key'])){
                $a_sql = "SELECT * FROM `members` WHERE id = ? AND `forget_password` = ?";
                $a_stmt = $pdo->prepare($a_sql);
                $a_stmt->execute([$_POST['id'], $_POST['key']]);
                
                if ($a_stmt->rowCount()) {
                        $result = true;
                }
        }
        echo json_encode([$result], JSON_UNESCAPED_UNICODE);
        break;

}
