<?php include __DIR__ . '/../parts/config.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '資料沒有修改'
];

if (isset($_POST['id']) and isset($_POST['email'])) {
    // TODO: 欄位資料檢查

    // 檢查手機號碼格式
    $email_re ="/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";
    if (empty(preg_grep($email_re, [$_POST['email']]))) {
        $output['error'] = 'email格式不符';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;  // 結束, 後面的程式不會執行, die()
    }

    $sql = "UPDATE `members` SET 
                        `fullname`=?,
                        `mobile`=?,
                        `zipcode`=?,
                        `city`=?,
                        `address`=?
            WHERE `id`=? ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['fullname'],
        $_POST['mobile'],
        $_POST['zipcode'],
        $_POST['city'],
        $_POST['address'],
        $_POST['id'],
    ]);

    if ($stmt->rowCount()) {
        $output['success'] = true;
        $output['error'] = '';
    } else {
        $output['error'] = '資料沒有修改';
    }
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
