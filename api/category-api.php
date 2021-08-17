<?php include __DIR__ . '/../parts/config.php';

$action = isset($_POST['action']) ? $_POST['action'] : $_POST['type']; // 操作類型
$tableMap = [
    "event" => "event_category",
    "forestnews" => "forestnews_category",
    "helpdesk" => "helpdesk_category",
    "member" => "member_role_category",
    "staff" => "staff_role_category",
];
switch ($action) {
    case 'readCat':
        $result = [
            "event" => "森林體驗",
            "forestnews" => "森林快報",
            "helpdesk" => "客服信件",
            "member" => "客戶種類",
            "staff" => "員工職稱種類",
        ];
        break;
    case 'readAll':
        $type = $_POST['type'];
        
        if (empty($type)){
            $result = [];
            foreach($tableMap as $key => $value){
                $sql = "SELECT * FROM `$value`";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([]);
                $result[$key] = $stmt->fetchAll();
            }
            
        }else{
            $sql = "SELECT * FROM ".$tableMap[$type];
            $stmt = $pdo->prepare($sql);
            $stmt->execute([]);
            $result = $stmt->fetchAll();
        }
        break;

    case 'read':
        $sql = "SELECT * FROM event_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        $sql = "SELECT * FROM forestnews_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        $sql = "SELECT * FROM helpdesk_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        $sql = "SELECT * FROM staff_role_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        $sql = "SELECT * FROM member_role_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;
        
        
    case 'add':
        $table = $_POST['table'];
        $param = $_POST['param'];

        $table = $tableMap[$table];
        $columnList = [];
        $valueList = [];
        foreach ($param as $key => $value){
            if (in_array($key, ['name', 'en_name'])){
                array_push($columnList, $key);
                array_push($valueList, $value);
            }
        }
        
        $column = implode(",", $columnList);
        $value = substr(str_repeat("?,", count($valueList)), 0, -1);
        $sql = "INSERT `$table` ($column) VALUE ($value)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($valueList);
        $result = $pdo->lastInsertId();

       break;
    case 'edit':
        $table = $_POST['table'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $value = $_POST['value'];

        $table = $tableMap[$table];
        if (!in_array($name, ['name', 'en_name'])){
            break;
        }
        $sql = "UPDATE `$table` SET $name = ? WHERE id = ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$value, $id]);
        $result = ['suceess'];
    case 'delete':
        if (isset($key)) {
            unset($_SESSION['cart']['restaurant'][$key]); // 移除該項商品
        }
        break;
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);


