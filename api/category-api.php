<?php include __DIR__ . '/../parts/config.php';

$action = isset($_POST['action']) ? $_POST['action'] : $_POST['type']; // 操作類型

switch ($action) {
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
        // insert event_category 
        $columns = ['name', 'code'];
        $sql = "INSERT INTO `event_category` ";

        // insert forestnews_category
        $columns = ['name', 'en_name'];
        $sql = "INSERT INTO `forestnews_category` ";

        // insert helpdesk_category
        $columns = ['name'];
        $sql = "INSERT INTO `helpdesk_category` ";

        // insert member_role_category
        $columns = ['name'];
        $sql = "INSERT INTO `member_role_category` ";

        // insert staff_role_category
        $columns = ['name'];
        $sql = "INSERT INTO `staff_role_category` ";

        $sql .= "(`".implode("`,`", $columns)."`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).")";
        // INSERT INTO `event` (`cat_id`, `video`, `name`, `date`, `time`, `price`, `description`, `title`, `age`, `location`, `content`, `info`, `notice`, `limitNum`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)        

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $event_id = $pdo->lastInsertId();

       
    case 'edit':
        $id = $_POST['id'];
        // get old event
        $sql = "SELECT * FROM `event_category` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $event = $stmt->fetch();
        
      
        // insert event_category
        $columns = ['name', 'code'];
        $sql = "UPDATE `event_category` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `event_category` ( `name`, `code`) VALUES (?, ?)        
        // UPDATE `event_category`  `name` = ?,  `code` = ?    

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        

        
        // get old forestnews_category
        $sql = "SELECT * FROM `forestnews_category` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $event = $stmt->fetch();
        
      
        // insert forestnews_category
        $columns = ['name', 'en_name'];
        $sql = "UPDATE `forestnews_category` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `forestnews_category` ( `name`, `en_name`) VALUES (?, ?)        
        // UPDATE `forestnews_category`  `name` = ?,  `en_name` = ?    

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        


        // get old helpdesk_category
        $sql = "SELECT * FROM `helpdesk_category` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $event = $stmt->fetch();
        
      
        // insert helpdesk_category
        $columns = ['name'];
        $sql = "UPDATE `helpdesk_category` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `helpdesk_category` ( `name`) VALUES (?, ?)        
        // UPDATE `helpdesk_category`  `name` = ?,     

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        


        // get old member_role_category
        $sql = "SELECT * FROM `member_role_category` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $event = $stmt->fetch();
        
      
        // insert member_role_category
        $columns = ['name'];
        $sql = "UPDATE `member_role_category` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `member_role_category` ( `name`) VALUES (?, ?)        
        // UPDATE `member_role_category`  `name` = ?    

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        


        // get old staff_role_category
        $sql = "SELECT * FROM `staff_role_category` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $event = $stmt->fetch();
        
      
        // insert staff_role_category
        $columns = ['name'];
        $sql = "UPDATE `staff_role_category` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `staff_role_category` ( `name) VALUES (?, ?)        
        // UPDATE `staff_role_category`  `name` = ?    

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        




        case 'delete':
            if (isset($key)) {
                unset($_SESSION['cart']['restaurant'][$key]); // 移除該項商品
            }
            break;
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);


