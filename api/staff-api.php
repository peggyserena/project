<?php
include __DIR__ . '/../parts/config.php';

$action = $_POST['action'];
$staff = $_SESSION['staff'] ?? null;

if (empty($staff)){
        exit();
}
$output = [];

$auth_role = [
        1 => ["*"],
        2 => [3, 4],
];

$auth_role_new = [
        "read" => [
               1 => ["*"], 
               2 => ["*"], 
               3 => ["*"],
               4 => [4],
        ],
        'changeProfile' => [
               1 => ["*"], 
               2 => [2,3,4],
               3 => [3],
               4 => [4],
        ],
        'changeLeftAt' => [
                 1 => ["*"],
                 2 => [3,4],
         ]
];
switch ($action){
        case 'readCat':
                $sql ="SELECT * FROM `staff_role_category`";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([]);
                $output['data'] = $stmt->fetchAll();
                $output['success'] = "讀取成功";
                break;
        case 'read':
                $staff_id = $_POST['staff_id'] ?? $staff['staff_id']; // POST是查尋的ID,staff是現在登入的員工ID
                if (empty($staff_id)) $staff_id = $staff['staff_id']; // 如果POST是空值，使用現在登入的員工ID
                $aceept_role = $auth_role_new['read'][$staff['role']] ?? [];
                
                $role = getStaffRole($staff_id);  // 操作的員工職位
                if (in_array("*", $aceept_role) || in_array($role, $aceept_role)){
                        $sql ="SELECT staff.*, src.name as role_name, TIMESTAMPDIFF(YEAR, `birthday`, CURDATE()) as age FROM `staff` JOIN `staff_role_category` as src ON staff.role = src.id WHERE staff_id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$staff_id]);
                        $output['data'] = $stmt->fetch();
                        $output['success'] = "讀取成功";
                }
                break;
        case 'readAll':
                $condition = [];
                $param = [];
                $condition_map = [
                'staff_id' => "`staff_id` LIKE CONCAT('%', ?, '%')",
                'fullname' => "`fullname` LIKE CONCAT('%', ?, '%')",
                'gender' => "`gender` = ?",
                'mobile' => "`mobile` LIKE CONCAT('%', ?, '%')",
                'identityNum' => "`identityNum` LIKE CONCAT('%', ?, '%')",
                'birthmonth'=>"MONTH(`birthday`) = ?",
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
                $sql ="SELECT staff.*, src.name as role_name, TIMESTAMPDIFF(YEAR, `birthday`, CURDATE()) as age FROM `staff` JOIN `staff_role_category` as src ON staff.role = src.id";
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
                $staff_id = $_POST['staff_id'] ?? $staff['staff_id']; // POST是查尋的ID,staff是現在登入的員工ID
                $aceept_role = $auth_role_new['changeProfile'][$staff['role']] ?? []; // 取得可操作權限的role陣列
                $aceept_role_left_at = $auth_role_new['changeLeftAt'][$staff['role']] ?? []; // 取得可操作權限的role陣列
                
                $role = getStaffRole($staff_id);  // 修改的員工職位
                $left_at = getStaff($staff_id)['left_at']; // 修改的員工的離職日

                if (in_array("*", $aceept_role) || in_array($role, $aceept_role)){
                        $columns = ['role', 'address', 'county', 'district', 'zipcode', 'mobile', 'birthday', 'identityNum', 'email', 'fullname', 'gender'];
                        if (in_array("*", $aceept_role) || in_array($role, $aceept_role)){

                                // 判斷有沒有離職日的資料，有的話新增left_at的欄位到$columns中，使所有欄位必填 (前台)
                                // 且 離職日是空的 (後台)
                                if (!empty($_POST['left_at']) && empty($left_at)){
                                        array_push($columns, 'left_at');
                                }
                        }

                        $fill_count = 0; // 從0開始計算總共拿到多少欄位資料
                        $update_data = []; // 得到的所有欄位資料
                        foreach($columns as $col){
                                if ($col === 'gender'){
                                        $data = $_POST[$col] ?? "不表明";
                                }else {
                                        $data = $_POST[$col];
                                }
                                if (isset($data)) {
                                        $fill_count++;
                                        array_push($update_data, $data);
                                }
                        }

                        // 判斷是否全部欄位都有填寫
                        if ($fill_count == count($columns)){
                                $a_sql = "UPDATE `staff` SET ".implode(' = ?,', $columns)." = ? WHERE `staff_id` = ?";
                                // address = ?, county = ?
                                $a_stmt = $pdo->prepare($a_sql);
                                array_push($update_data, $staff_id);
                                $a_stmt->execute($update_data);
                                $output['success'] = "修改個人資料成功";
                                
                        }else{
                                $output['error'] = "修改個人資料失敗";
                        }
        
                        // 當更新自己帳號的資料時，更新session裡面的資料成與資料庫相同
                        if ($_SESSION['staff']['staff_id'] === $staff_id){
                                $a_sql = "SELECT * FROM `staff` WHERE `staff_id` = ?";
                                // address = ?, county = ?
                                $a_stmt = $pdo->prepare($a_sql);
                                $a_stmt->execute([$staff_id]);
                                if ($a_stmt->rowCount()) {
                                        $_SESSION['staff'] = $a_stmt->fetch();
                                }
                        }

                } else{ 
                        print("權限不足");
                        die();
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
        
        case "register": 
                
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
                        $sql = "SELECT `staff_id` FROM `staff` ORDER BY `staff_id` DESC LIMIT 1";
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
                                $staff_id = "".str_pad(strval($staff_id_num++), 5, "0", STR_PAD_LEFT);
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

function getStaffRole($staff_id){
        return getStaff($staff_id)['role'];
}
function getStaff($staff_id){
        global $pdo;
        $sql = "SELECT * FROM `staff` WHERE `staff_id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$staff_id]);
        return $stmt->fetch();
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);