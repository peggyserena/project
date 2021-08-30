<?php include __DIR__ . '/../parts/config.php';


$output = [
    'success' => false,
    'code' => 0,
    'error' => '資料沒有新增'
];

$action = $_POST['action'];

switch ($action){
    case "register":
        if (isset($_POST['email'])) {

            // TODO: 欄位資料檢查

            $a_sql = "SELECT `email` FROM `members` WHERE `email`=?";
            $a_stmt = $pdo->prepare($a_sql);
            $a_stmt->execute([$_POST['email']]);

            if ($a_stmt->rowCount()) {
                $output['error'] = '此 email 已經註冊過';
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;  // 程式結束
            }

            if (!empty($_POST['fb_id'])){
                $a_sql = "SELECT `fb_id` FROM `members` WHERE fb_id = ?";
                $a_stmt = $pdo->prepare($a_sql);
                $a_stmt->execute([$_POST['fb_id']]);
            
                if ($a_stmt->rowCount()) {
                    $output['error'] = '此 FB 帳戶已經註冊過';
                    echo json_encode($output, JSON_UNESCAPED_UNICODE);
                    exit;  // 程式結束
                }
            }
            

            $hash = sha1($_POST['email'] . uniqid());

            if (!empty($_POST['fb_id'])){
                $sql = "INSERT INTO `members`(
                    `fb_id`, `email`, `fullname`, `gender`, `birthday`, 
                    `mobile`, `zipcode`,`county`, `district`,
                    `address`, `hash`,`created_at`
                    ) VALUES (
                                ?, ?, ?, ?, ?,
                                ?, ?, ?, ?,
                                ?, ?, NOW()
                    )";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                $_POST['fb_id'],
                $_POST['email'],
                $_POST['fullname'],
                $_POST['gender'],
                $_POST['birthday'],
                $_POST['mobile'],
                $_POST['zipcode'] ?? "",
                $_POST['county'] ?? "",
                $_POST['district'] ?? "",
                $_POST['address'],
                password_hash($_POST['password'], PASSWORD_DEFAULT),

                ]);
            }else{
                $sql = "INSERT INTO `members`(
                    `email`, `fullname`,`gender`, `birthday`, 
                    `mobile`, `zipcode`,`county`,  `district`,
                    `address`, `hash`,`created_at`
                    ) VALUES (
                                ?, ?, ?, ?,
                                ?, ?, ?, ?,
                                ?, ?, NOW()
                    )";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                $_POST['email'],
                $_POST['fullname'],
                $_POST['gender'] ?? "不表明",
                $_POST['birthday'],
                $_POST['mobile'],
                $_POST['zipcode'] ?? "",
                $_POST['county'] ?? "",
                $_POST['district'] ?? "",
                $_POST['address'] ?? "",
                password_hash($_POST['password'], PASSWORD_DEFAULT),

                ]);
            }
            if ($stmt->rowCount()) {
                $output['success'] = true;
                $output['error'] = '';
                login($pdo, $output);

            } else {
                $output['error'] = '註冊發生錯誤';
            }
        }
        break;
    case "admin_register": 
        $staff = $_SESSION['staff'] ?? null;
        $auth_role = [
            1 => ["*"],
            2 => [3, 4],
        ];
        $aceept_role = $auth_role[$staff['role']] ?? [];
        if (!empty($staff)){
            if (in_array("*", $aceept_role) || in_array($_POST['role_id'], $aceept_role)){
            // if (in_array(intval($staff['role']), $auth_role) && in_array(intval($staff['role']), $auth_role)){
                if (isset($_POST['quantity']) && isset($_POST['role_id'])) {
                    // 抓取role的name職稱
                    $sql = "SELECT `name` FROM `staff_role_category` WHERE `id` = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_POST['role_id']]);
                    $name = $stmt->fetch();
                    $name = $name['name'];

                    // 抓取某職稱最後一筆員工，以計算新的staff_id
                    $output = ['data' => []];
                    $sql = "SELECT `staff_id` FROM `staff` WHERE `role` = ? ORDER BY `staff_id` DESC LIMIT 1";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_POST['role_id']]);
                    $staff_id = $stmt->fetch();
                    // $role_code = chr(intval($_POST['role_id']) + 64); // 員工編號第一碼英文
                    if (empty($staff_id)){
                        $staff_id_num = intval("00001");
                    }else{
                        $staff_id_num = intval(substr($staff_id['staff_id'], 1)) + 1;
                    }
                    $sql = "INSERT INTO `staff`(
                        `staff_id`, `role`, `hash`,`created_at`
                        ) VALUES ";
                    $insert_value = [];
                    for ($i = 0; $i < intval($_POST['quantity']); $i++){
                        $sql .= "(
                                        ?, ?, ?,
                                        NOW()
                        ),";
                        $staff_id = $role_code.str_pad(strval($staff_id_num++), 5, "0", STR_PAD_LEFT);
                        $password = bin2hex(random_bytes(5));
                        array_push($output['data'], [
                            'name' => $name,
                            'staff_id' => $staff_id,
                            'password' => $password,
                        ]);
                        $insert_value = array_merge($insert_value,[
                            $staff_id,
                            $_POST['role_id'],
                            password_hash($password, PASSWORD_DEFAULT),
                        ]);
                    }
                    $sql = substr($sql, 0, -1);
                    // $x += 1;
                    // $x = $x +1;
                    // $x .= "a";
                    // $x = $x."a";
                    
                    
        
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($insert_value);
        
                    if ($stmt->rowCount()) {
                        $output['success'] = true;
                        $output['error'] = '';
                    } else {
                        $output['error'] = '註冊發生錯誤';
                    }
                }
            } else{
                $output['authError'] = '權限不足';
            }
        } else {
            $output['authError'] = '請先登入';
        }
        
        break;
}
function login($pdo, $output){
    if (isset($_POST['email'])) {

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
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
