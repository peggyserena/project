<?php
include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/tool.php';

$action = $_POST['action'];
$staff = $_SESSION['staff'] ?? null;
if (empty($staff)){
    die();
}

switch ($action){
    case 'readAll':
        $condition = [];
        $param = [];

        $condition_map = [
        ];

        // 設定condition的條件
        foreach($condition_map as $key => $value){
            $val = replaceAllToEmpty($_POST[$key] ?? "");
            if (!empty($val)){
                array_push($condition, $value);
                array_push($param, $val);
            }
        }
        $stmt_where = "";
        if (count($condition) > 0){
            $stmt_where = "WHERE ". implode(" AND ", $condition);
        }

        // 獲取資料
        $sql = "SELECT * FROM `setting`";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $result = $stmt->fetchAll();
        
        break;
    
    case 'edit':
        $id = $_POST['id'];
        $value = $_POST['value'];
        // switch ($id){
        //     case "1":
        //         $value = "$startDate~$endDate";
        //         break;
        //     case "2":
        //         $value = $_POST['value'];
        //         break;
        // }

        $sql = "UPDATE `setting` SET `value` = ? WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$value, $id]);
        $result = ['success'];
        break;
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);