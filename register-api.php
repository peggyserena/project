<?php include __DIR__ . '/parts/config.php';


$output = [
    'success' => false,
    'code' => 0,
    'error' => '資料沒有新增'
];

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

    $hash = sha1($_POST['email'] . uniqid());

    $sql = "INSERT INTO `members`(
                      `email`, `fullname`, `birthday`, 
                      `mobile`, `zipcode`,`city`, 
                      `address`, `hash`,`created_at`
                      ) VALUES (
                                ?, ?, ?,
                                ?, ?, ?,
                                ?, ?, NOW()
                      )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['email'],
        $_POST['fullname'],
        $_POST['birthday'],
        $_POST['mobile'],
        $_POST['zipcode'],
        $_POST['city'],
        $_POST['address'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),

    ]);

    if ($stmt->rowCount()) {
        $output['success'] = true;
        $output['error'] = '';
        login($pdo, $output);

    } else {
        $output['error'] = '註冊發生錯誤';
    }
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
