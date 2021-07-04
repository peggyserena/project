<?php include __DIR__ . '/parts/config.php';

$action = $_POST["action"];

$output = [
    'success' => false,
    'code' => 0,
    'error' => '帳號或密碼錯誤'
];
switch ($action){
    case "guest":
        if (isset($_POST['fb_id'])){
            $a_sql = "SELECT * FROM `members` WHERE `fb_id`=?";
            $a_stmt = $pdo->prepare($a_sql);
            $a_stmt->execute([$_POST['fb_id']]);
            $row = $a_stmt->fetch();

            if (empty($row)) {
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;  // 程式結束
            }
            
            $_SESSION['user'] = $row;
            $output['success'] = true;
            $output['error'] = '';
        }else if (isset($_POST['email'])) {

            // TODO: 欄位資料檢查

            $a_sql = "SELECT * FROM `members` WHERE `email`=?";
            $a_stmt = $pdo->prepare($a_sql);
            $a_stmt->execute([$_POST['email']]);
            $row = $a_stmt->fetch();

            if (empty($row)) {
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;  // 程式結束
            }

            if (password_verify($_POST['password'], $row['hash'])) {
                unset($row['password']);
                unset($row['hash']);
                $_SESSION['user'] = $row;
                $output['success'] = true;
                $output['error'] = '';
            }
        }

        break;
    case "admin";
        if (isset($_POST['staff_id'])) {
            // TODO: 欄位資料檢查

            $a_sql = "SELECT * FROM `staff` WHERE `staff_id`=?";
            $a_stmt = $pdo->prepare($a_sql);
            $a_stmt->execute([$_POST['staff_id']]);
            $row = $a_stmt->fetch();

            if (empty($row)) {
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;  // 程式結束
            }

            if (password_verify($_POST['password'], $row['hash'])) {
                unset($row['password']);
                unset($row['hash']);
                $_SESSION['staff'] = $row;
                $output['success'] = true;
                $output['error'] = '';
            }
        }
        break;
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
