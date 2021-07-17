<?php
include __DIR__ . '/parts/config.php';

$action = $_POST['action'];
$staff = $_SESSION['staff'] ?? null;

if (empty($staff)){
        exit();
}
$output = [];
switch ($action){
        case 'readAll':
                $condition = [];
                $param = [];
                $condition_map = [
                'staff_id' => "`staff_id` = ?",
                'fullname' => "`fullname` = ?",
                'gender' => "`gender` = ?",
                'mobile' => "`mobile` = ?",
                'identityNum' => "`identityNum` = ?",
                'birthmonth'=>"TIMESTAMPDIFF(MOTH, `birthday`, CURDATE()) ",
                'age' => "TIMESTAMPDIFF(YEAR, `birthday`, CURDATE()) BETWEEN ? AND ?",
                ];
                
                foreach($condition_map as $key => $value){
                        if (!empty($_POST[$key])){
                                if ($key === 'age'){
                                        $age_from = explode("-", $_POST['age'])[0];
                                        $age_to = explode("-", $_POST['age'])[1];
                                        array_push($param, $age_from);
                                        array_push($param, $age_to);
                                }else{
                                        array_push($param, $_POST[$key]);
                                }
                                array_push($condition, $value);
                        }
                }
                $sql ="SELECT staff.*, src.position as role_name FROM `staff` JOIN `staff_role_category` as src ON staff.role = src.id";
                if (count($condition) > 0){
                        $sql .= " WHERE ".implode(" AND ", $condition);
                }
                $stmt = $pdo->prepare($sql);
                $stmt->execute($param);
                $output['result'] = $stmt->fetchAll();
                $output['success'] = "讀取成功";
                break;
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
                $columns = ['address', 'county', 'district', 'zipcode', 'mobile', 'birthday', 'identityNum', 'email', 'fullname', 'gender', 'created_at'];
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
                                // $output['error'] = $a_stmt;
                        }
                }
                $a_sql = "SELECT * FROM `staff` WHERE `staff_id` = ?";
                // address = ?, county = ?
                $a_stmt = $pdo->prepare($a_sql);
                $a_stmt->execute([$staff['staff_id']]);
                if ($a_stmt->rowCount()) {
                        $_SESSION['staff'] = $a_stmt->fetch();
                }
                
                break;
                
        case 'exportExcel':
                $filename = "BeingAGoodRDisDifficult-" . date("Y-m-d-H-i-s") . ".csv";
                header('Pragma: no-cache');
                header('Expires: 0');
                header('Content-Disposition: attachment;filename="' . $filename . '";');
                header('Content-Type: application/csv; charset=UTF-8');
                $data = json_decode($_POST['data']);
                for ($j = 0; $j < count($data); $j++) {
                        if ($j == 0) {
                                //輸出 BOM 避免 Excel 讀取時會亂碼
                                echo "\xEF\xBB\xBF";
                        }
                        echo join(",", $data[$j]) . PHP_EOL;
                } 
                die();
                break;
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);