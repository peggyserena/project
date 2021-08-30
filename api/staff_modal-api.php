<?php 
include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/imgHandler.php';
include __DIR__ . '/../parts/tool.php';

$action = isset($_POST['action']) ? $_POST['action'] : ''; // 操作類型

$result = ["error"];

switch ($action) {
    case 'readAll':
        // 抓取活動參與人數與類別中文名稱
        $result['data'] = read();
        $result['img'] = readImage();
        $result['quantity_map'] = readQuantityList();
        break;
    case 'read':
        $id = $_POST['id'];
        // 抓取活動參與人數與類別中文名稱
        $result = read($id);
        $result['img'] = readImage($id);
        $result['quantity_map'] = readQuantityList($id);
        break;
    case 'readTemp':
        $id = $_POST['id'];
        // 抓取活動參與人數與類別中文名稱
        $result = read($id, true);
        $result['img'] = readImage($id);
        $result['quantity_map'] = readQuantityList($id);
        break;
    case 'add':
        $result = [];
        // insert video image
        $name = uploadImg($_FILES['video_img'], "images/event/video/");
        $_POST['video_img'] = $name;

        // insert event
        $columns = ['cat_id', 'video', 'video_img', 'name', 'date', 'time', 'price', 'description', 'title', 'age', 'location', 'content', 'info', 'notice', 'limitNum'];
        $sql = "INSERT INTO `event` (`".implode("`,`", $columns)."`, `status`) VALUES ";

        $date_list = $_POST['date'];
        $data = [];
        foreach($date_list as $date){
            $sql .= "(".substr(str_repeat("?,", count($columns)), 0, -1).", '暫存'),";
            // INSERT INTO `event` (`cat_id`, `video`, `name`, `date`, `time`, `price`, `description`, `title`, `age`, `location`, `content`, `info`, `notice`, `limitNum`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)        
            foreach($columns as $col){
                if ($col === 'date'){
                    array_push($data, $date);
                } else{
                    array_push($data, $_POST[$col]);
                }
            }
        }    
        $sql = substr($sql, 0, -1);
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $event_id = $pdo->lastInsertId();

        // insert gallery image
        $name_list = uploadImgs($_FILES['img'], "images/event/gallery/");
        // json_decode() 字串變陣列
        // json_encode() 陣列變字串
        $img_order = json_decode($_POST['img_order']);
        if (count($name_list) > 0){
            $sql = "INSERT INTO `event_image` (`event_id`, `path`, `num_order`) VALUES ".substr(str_repeat("(?, ?, ?),", count($name_list)), 0, -1);    
            // INSERT INTO `event` (`event_id`, `path`) VALUES  (?, ?, ?), (?, ?, ?), (?, ?, ?)
            $stmt = $pdo->prepare($sql);
            $param = []; // [path1, order1, path2, order2]
            foreach($name_list as $index => $name){
                array_push($param, $event_id);
                array_push($param, $name);
                array_push($param, $img_order[$index]);
            }
            $stmt->execute($param);
        }

        $result['data'] = ['event_id' => $event_id];
        break;
    case 'confirm':
        $result = [];
        $id = $_POST['id'];
        $sql = "UPDATE `event` SET `status` = '已確認' WHERE `id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = ["sucess"];
        $result = [$sql];
        break;
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

        // insert video image
        $video_img_changed = $_POST['video_img_changed'];
        $img_changed = $_POST['img_changed'];

        if ($video_img_changed === "1"){
            deleteImg($event['video_img']);
            $name = uploadImg($_FILES['video_img'], "images/event/video/");
            $_POST['video_img'] = $name;
        }
        

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

        // insert gallery image
        if ($img_changed === "1"){
            if ($_FILES['img']['size'][0] === 0){
                $num_order = json_decode($_POST['img_order']);
                $sql = "SELECT * FROM `event_image` WHERE `event_id` = ? ORDER BY num_order";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $event_image = $stmt->fetchAll();
                foreach($event_image as $key => $value){
                    if (isset($num_order->$key)){
                        $order_value = $num_order->$key;
                        $sql = "UPDATE `event_image` SET num_order = ? WHERE id = ?";    
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$order_value, $value['id']]);
                    } else{
                        
                        $sql = "DELETE FROM `event_image` WHERE id = ?";    
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$value['id']]);
                        deleteImg($value['path']);
                        array_push($result, $sql);
                    }
                }
            } else{
                foreach($event['img'] as $event_image){
                    deleteImg($event_image['path']);
                }
                $sql = "DELETE FROM `event_image` WHERE `event_id` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $name_list = uploadImgs($_FILES['img'], "images/event/gallery/");
                $sql = "INSERT INTO `event_image` (`event_id`, `path`) VALUES ".substr(str_repeat("($id, ?),", count($name_list)), 0, -1);    
                // INSERT INTO `event` (`event_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
                $stmt = $pdo->prepare($sql);
                $stmt->execute($name_list);
            }
            
        }
        
        $result = ["success"];
        break;
    case "delete":
        $id = $_POST['id'] ?? 0;
        if ($id > 0){
            $sql = "SELECT COUNT(*) as `count` FROM `order_event` WHERE `event_id` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch();
            if ($result['count'] === "0"){
                $sql = "DELETE FROM `event` WHERE `id` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $result = ["success"];
            }else{
                $result = ["message" => "已有交易紀錄，請勿刪除", $result['count']];
            }
        }
        break;
}


function readQuantityList($id = null){
    global $pdo;
    // 活動歷年總數
    if (isset($id)){
        // read
        $sql = "SELECT e.name, IFNULL(sum(`quantity`), 0) as quantity FROM `event` as e LEFT JOIN `order_event` as oe ON e.id = oe.event_id WHERE e.id = ? GROUP BY `name`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }else{
        // readAll
        $sql = "SELECT e.name, IFNULL(sum(`quantity`), 0) as quantity FROM `event` as e LEFT JOIN `order_event` as oe ON e.id = oe.event_id GROUP BY `name`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
    $quantity_list = $stmt->fetchAll();
    $result = [];
    foreach ($quantity_list as $value) {
        $result[$value['name']] = $value['quantity'];
    }
    return $result;
}
function readImage($id = null){
    global $pdo;
    // 抓圖片
    if (isset($id)){
        // read
        $sql = "SELECT * FROM `event_image` WHERE event_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
    }else{
        // readAll
        $sql = "SELECT * FROM `event_image` ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $image_list = $stmt->fetchAll();
        $result = [];
        foreach ($image_list as $value) {
            if (!array_key_exists($value['event_id'], $result)){
                $result[$value['event_id']] = [];
            }
            array_push($result[$value['event_id']], $value);
        }
    }
    return $result;
}
function read($id = null, $temp = false){
    global $pdo;
    $temp_condition = "";
    if (isset($id)){
        // read
        
        if (!$temp){
            $temp_condition = "AND `status` != '暫存'";
        }
        $sql = "SELECT `e`.*, ec.name as `ec_name`, SUM(`oe`.quantity) as quantity FROM `event` as e 
                JOIN `event_category` as ec ON `cat_id` = ec.`id` 
                LEFT JOIN `order_event` as oe ON e.id = oe.event_id 
                WHERE e.id = ? $temp_condition
                group by e.id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
    }else{
        // readAll
        $date = date("Y-m-d");
        $name = $_POST['name'] ?? "";
        $year = $_POST['year'] ?? "";
        $month = $_POST['month'] ?? "";
        $time = $_POST['time'] ?? "";
        $cat_id = $_POST['cat_id'] ?? "";
        $order = $_POST['order'] ?? "";
        // $start_time = "00:00";
        // $end_time = "23:59";
        
        // if (isset($_POST['time'])){
        //     $time = explode("-", $_POST['time']);
        //     $start_time = $time[0] ?? $start_time;
        //     $end_time = $time[1] ?? $end_time;
        // }
        [$year, $month, $time, $cat_id] = replaceAllToEmpty([$year, $month, $time, $cat_id]);
        $start_time = "00:00";
        $end_time = "23:59";
        if ($time !== ""){
            $time = explode("-", $_POST['time']);
            $start_time =  $time[0] ?? $start_time;
            $end_time = $time[1] ?? $end_time;
        }

        $condition = [];
        $param = [];

        $condition_map = [
            'name' => "e.`name` LIKE CONCAT('%', ?,'%')",
            'year' => "YEAR(`date`) = ?",
            'month' => "MONTH(`date`) = ?",
            'time' => "`time` BETWEEN ? AND ?",
            'cat_id' => "`cat_id` = ?",
            'date' => "`date` >= ?",
        ];
        foreach ($condition_map as $key => $value) {
            if (!empty($_POST[$key])) {
                    if ($key === 'time') {
                            array_push($param, $start_time);
                            array_push($param, $end_time);
                    } else {
                            array_push($param, $_POST[$key]);
                    }
                    array_push($condition, $value);
            }
        }

        $sql = "SELECT `e`.*, ec.name as `ec_name`, SUM(`oe`.quantity) as quantity FROM `event` as e";
        if (!$temp) {
            $temp_condition = "`status` != '暫存'";
            array_push($condition, $temp_condition);
        }

        $sql .= " JOIN `event_category` as ec ON `cat_id` = ec.`id`";
        $sql .= " LEFT JOIN `order_event` as oe ON e.id = oe.event_id";

        if (count($condition) > 0) {
            $sql .= " WHERE ".implode(" AND ", $condition);
        }
        
        $sql .= " group by e.id";
        switch ($order) {
            case 1:
                $sql .= " ORDER BY `quantity` DESC";
                break;
            case 2:
                $sql .= " ORDER BY `price`";
                break;
            case 3:
                $sql .= " ORDER BY `price` DESC";
                break;
            default:
                $sql .= " ORDER BY `date`";
                break;
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $result = $stmt->fetchAll();
        // $result=$sql;
    }
    return $result;
}


echo json_encode($result, JSON_UNESCAPED_UNICODE);


