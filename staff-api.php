<?php
include __DIR__ . '/parts/config.php';

$action = $_POST['action'];
$staff = $_SESSION['staff'] ?? null;

if (empty($staff)){
        exit();
}
$output = [];
switch ($action){
        case 'changePassword':
                if (isset($_POST['password'])){
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $a_sql = "UPDATE `staff` SET `hash` = ? WHERE `staff_id` = ?";
                        $a_stmt = $pdo->prepare($a_sql);
                        $a_stmt->execute([$password, $staff['staff_id']]);
                        
                        if ($a_stmt->rowCount()) {
                                $output['success'] = "修改密碼成功";
                        } else{
                                $output['error'] = "修改密碼失敗";
                        }
                }
                break;
        case 'changeProfile':
                $columns = ['address', 'county', 'district', 'zipcode', 'mobile', 'birthday', 'identityNum', 'email', 'role','fullname'];
                $fill_count = 0;
                $update_data = [];
                foreach($columns as $col){
                        $data = $_POST[$col];
                        if (isset($data)) {
                                $fill_count++;
                                array_push($update_data, $data);
                        }
                }
                if ($fill_count == count($columns)){
                        $a_sql = "UPDATE `staff` SET ".implode(' = ?,', $columns)." = ? WHERE `staff_id` = ?";
                        // address = ?, county = ?
                        $a_stmt = $pdo->prepare($a_sql);
                        array_push($update_data, $staff['staff_id']);
                        $a_stmt->execute($update_data);
                        
                        if ($a_stmt->rowCount()) {
                                $output['success'] = "修改個人資料成功";
                        } else{
                                $output['error'] = "修改個人資料失敗";
                        }
                }
                break;
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);