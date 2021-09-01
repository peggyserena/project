<?php include __DIR__ . '/../parts/config.php';

$action = isset($_POST['action']) ? $_POST['action'] : $_POST['type']; // 操作類型
$tableMap = [
    "event" => [
        'cat' => "event_category",
        'foreign_key' => "cat_id",
    ],
    "forestnews" => [
        'cat' => "forestnews_category",
        'foreign_key' => "cat_id",
    ],
    "helpdesk" => [
        'cat' => "helpdesk_category",
        'foreign_key' => "cat_id",
    ],
    "members" => [
        'cat' => "members_role_category",
        'foreign_key' => "role",
    ],
    "staff" => [
        'cat' => "staff_role_category",
        'foreign_key' => "role",
    ],
    "coupon" => [
        'cat' => "coupon_category",
        'foreign_key' => "cat_id",
    ],
];
switch ($action) {
    case 'readCat':
        $result = [
            "event" => "森林體驗",
            "forestnews" => "森林快報",
            "helpdesk" => "客服信件",
            "members" => "客戶種類",
            "staff" => "員工職稱種類",
            "coupon" => "購物金&禮券種類",
        ];
        break;
    case 'readAll':
        $type = $_POST['type'];
        
        if (empty($type)){
            $result = [];
            foreach($tableMap as $key => $value){
                $table_cat = $value['cat'];
                $sql = "SELECT * FROM `$table_cat`";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([]);
                $result[$key] = $stmt->fetchAll();
            }
            
        }else{
            $sql = "SELECT * FROM ".$tableMap[$type]['cat'];
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

        $sql = "SELECT * FROM members_role_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;
        $sql = "SELECT * FROM coupon_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;
        
        
    case 'add':
        $table = $_POST['table'];
        $param = $_POST['param'];

        $table = $tableMap[$table]['cat'];
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

        $table = $tableMap[$table]['cat'];
        if (!in_array($name, ['name', 'en_name'])){
            break;
        }
        $sql = "UPDATE `$table` SET $name = ? WHERE id = ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$value, $id]);
        $result = ['suceess'];
    case 'delete':
        $table = $_POST['table'];
        $id = $_POST['id'];

        $table_cat = $tableMap[$table]['cat'];
        $table_fk = $tableMap[$table]['foreign_key'];

        // 確認是否可以刪除
        $sql = "SELECT count(*) as `count` FROM `$table` WHERE $table_fk = ?";        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->fetch()['count'] === "0"){
            // delete
            $sql = "DELETE FROM `$table_cat` WHERE id = ?";        
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $result = ['success'];
        }else{
            $result = ['error'];
        }
        break;
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);


