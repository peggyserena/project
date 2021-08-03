<?php
include __DIR__ . '/../parts/config.php';
$action = $_POST['action'];
$staff = $_SESSION['staff'] ?? null;

if (empty($staff)){
        exit();
}
$output = [];
switch ($action) {
        case 'readCurrent':
                $id = intval($_SESSION['user']['id']);
                $sql ="SELECT *FROM `members` WHERE `id` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $output['data'] = $stmt->fetch();
                $output['success'] = "讀取成功";
                break;
        case 'read':
                $id = $_POST['id'];
                $sql ="SELECT *FROM `members` WHERE `id` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $output['data'] = $stmt->fetch();
                $output['success'] = "讀取成功";
                break;
        case 'readAll':
                $condition = [];
                $param = [];
                $condition_map = [
                'id' => "`id` = ?",
                'fullname' => "`fullname` = ?",
                'mobile' => "`mobile` = ?",
                'email' => "`email` = ?",
                'gender' => "`gender` = ?",
                'birthmonth'=>"MONTH(`birthday`) = ?",
                'age' => "TIMESTAMPDIFF(YEAR, `birthday`, CURDATE()) BETWEEN ? AND ?",
                ];
                
                foreach ($condition_map as $key => $value) {
                        if (!empty($_POST[$key])) {
                                if ($key === 'age') {
                                        $age_from = explode("-", $_POST['age'])[0];
                                        $age_to = explode("-", $_POST['age'])[1];
                                        array_push($param, $age_from);
                                        array_push($param, $age_to);
                                } else {
                                        array_push($param, $_POST[$key]);
                                }
                                array_push($condition, $value);
                        }
                }
                $sql ="SELECT *FROM `members`";
                if (count($condition) > 0) {
                        $sql .= " WHERE ".implode(" AND ", $condition);
                }
                $stmt = $pdo->prepare($sql);
                $stmt->execute($param);
                $output['result'] = $stmt->fetchAll();
                $output['success'] = "讀取成功";
                break;
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