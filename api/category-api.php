<?php include __DIR__ . '/../parts/config.php';

$action = isset($_POST['action']) ? $_POST['action'] : $_POST['type']; // 操作類型

switch ($action) {
    case 'readCat':
        $sql = "SELECT * FROM event_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;
        
    case 'read':
        $id = $_POST['id'];
        // 抓取活動參與人數與類別中文名稱
        $sql = "SELECT `e`.*, ec.name as `ec_name`, SUM(`oe`.quantity) as quantity FROM `event` as e 
                JOIN `event_category` as ec ON `cat_id` = ec.`id` 
                LEFT JOIN `order_event` as oe ON e.id = oe.event_id 
                WHERE e.id = ? 
                group by e.id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
      
        break;
    case 'add':
        // insert video image
        $name = uploadImg($_FILES['video_img'], "images/event/video/");
        $_POST['video_img'] = $name;

        // insert event
        $columns = ['cat_id', 'video', 'video_img', 'name', 'date', 'time', 'price', 'description', 'title', 'age', 'location', 'content', 'info', 'notice', 'limitNum'];
        $sql = "INSERT INTO `event` ";

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
        $sql = "SELECT * FROM `event` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $event = $stmt->fetch();
        
        $sql = "SELECT * FROM `event_image` WHERE event_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $event['img'] = $stmt->fetchAll();

      

        // insert event
        $columns = ['cat_id', 'video', 'name', 'date', 'time', 'price', 'description', 'title', 'age', 'location', 'content', 'info', 'notice', 'limitNum'];
        if ($video_img_changed === "1") {
            array_push($columns, 'video_img');
        }
        $sql = "UPDATE `event` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `event` (`cat_id`, `video`, `name`, `date`, `time`, `price`, `description`, `title`, `age`, `location`, `content`, `info`, `notice`, `limitNum`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)        
        // UPDATE `event` `cat_id` = ?, `video` = ?,  `name` = ?,  `date` = ?,  `time` = ?,  `price` = ?,  `description` = ?,  `title` = ?,  `age` = ?,  `location` = ?,  `content` = ?,  `info` = ?,  `notice` = ?,  `limitNum` = ?    

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
        // insert gallery image
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);


