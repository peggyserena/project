<?php include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/imgHandler.php';

$action = isset($_POST['action']) ? $_POST['action'] : $_POST['type']; // 操作類型

switch ($action) {
    case 'readCat':

        $sql = "SELECT * FROM forestnews_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;

    case 'read':
        $id = $_POST['id'];
        $result = [];
        // 抓圖片
        $result['img'] = readImage($id);

        $sql = "SELECT `f`.*, fc.name as `fc_name`, fc.en_name as `fc_en_name` FROM `forestnews` as f 
        JOIN `forestnews_category` as fc ON `cat_id` = fc.`id` 
        WHERE f.id = ? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result['data'] = $stmt->fetch();
        break;

    case 'readAll':
        $result = [];
        $year = $_POST['year'] ?? "";
        $month = $_POST['month'] ?? "";
        $cat_id = $_POST['cat_id'] ?? "";
        $order = $_POST['order'] ?? "";
        [$year, $month, $cat_id] = replaceAllToEmpty([$year, $month, $cat_id]);

        // 抓圖片
        $result['img'] = readImage();
        
        // 資料
        $sql = "SELECT `f`.*, fc.name as `fc_name`FROM `forestnews` as f 
        JOIN `forestnews_category` as fc ON f.`cat_id` = fc.`id`";
        $sql_condition = [];
        if ($year != "") {
            array_push($sql_condition, "$year BETWEEN YEAR(`start_date`) AND YEAR(`end_date`)");
        }
        if ($month != "") {
            array_push($sql_condition, "$month BETWEEN MONTH(`start_date`) AND MONTH(`end_date`)");
        }
        if ($cat_id != "") {
            array_push($sql_condition, "`cat_id` = $cat_id");
        }
        
        if (sizeof($sql_condition) > 0) {
            $sql .= " WHERE ";
        }
        $sql .= implode(" AND ", $sql_condition);


        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result['data'] = $stmt->fetchAll();

        break;



    case 'add':

        // insert forestnews
        $columns = ['cat_id', 'name', 'start_date', 'end_date', 'content','notice'];
        $sql = "INSERT INTO `forestnews` ";

        $sql .= "(`".implode("`,`", $columns)."`, `created_at`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).", NOW())";
        // INSERT INTO `forestnews` ('cat_id', 'name', 'start_date', 'end_date', 'content','notice') VALUES (?, ?, ?, ?, ?, ?)        

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $forestnews_id = $pdo->lastInsertId();

        // insert gallery image
        if ($_FILES['img']['size'][0] > 0){
            $name_list = uploadImgs($_FILES['img'], "images/forestnews/");
            // json_decode() 字串變陣列
            // json_encode() 陣列變字串
            $img_order = json_decode($_POST['img_order']);
            $sql = "INSERT INTO `forestnews_image` (`forestnews_id`, `path`, `num_order`) VALUES ".substr(str_repeat("($forestnews_id, ?, ?),", count($name_list)), 0, -1);    
            // INSERT INTO `forestnews` (`forestnews_id`, `path`) VALUES  (1, ?, ?), (1, ?, ?), (1, ?, ?)
            $stmt = $pdo->prepare($sql);
            $param = []; // [path1, order1, path2, order2]
            foreach($name_list as $index => $name){
                array_push($param, $name);
                array_push($param, $img_order[$index]);
            }
            $stmt->execute($param);
        }
        
        $result = ["success"];
        break;

    case 'edit':
        
        $id = $_POST['id'];
        $img_changed = $_POST['img_changed'];

        // get old forestnews
        $sql = "SELECT * FROM `forestnews` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $forestnews = $stmt->fetch();
        
        $sql = "SELECT * FROM `forestnews_image` WHERE forestnews_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $forestnews['img'] = $stmt->fetchAll();

       
        // insert forestnews
        $columns = ['cat_id', 'name', 'start_date', 'end_date', 'content','notice'];
        $sql = "UPDATE `forestnews` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `forestnews` ('cat_id', 'name', 'start_date', 'end_date', 'content','notice') VALUES (?, ?, ?, ?, ?, ?)        
        // UPDATE `forestnews` `cat_id` = ?, `name` = ?,  `start_date` = ?,  `end_date` = ?, `content` = ?,  `notice` = ?    

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $result = [];
        // insert gallery image
        if ($img_changed === "1"){
            if ($_FILES['img']['size'][0] === 0){
                $num_order = json_decode($_POST['img_order']);
                $result = [];
                $sql = "SELECT * FROM `forestnews_image` WHERE `forestnews_id` = ? ORDER BY num_order";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $forestnews_image = $stmt->fetchAll();
                foreach($forestnews_image as $key => $value){
                    if (isset($num_order->$key)){
                        $order_value = $num_order->$key;
                        $sql = "UPDATE `forestnews_image` SET num_order = ? WHERE id = ?";    
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$order_value, $value['id']]);
                    } else{
                        $sql = "DELETE FROM `forestnews_image` WHERE id = ?";    
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$value['id']]);
                        deleteImg($value['path']);
                    }
                }
                array_push($result, [$num_order]);
            } else{
                foreach($forestnews['img'] as $forestnews_image){
                    deleteImg($forestnews_image['path']);
                }
                $sql = "DELETE FROM `forestnews_image` WHERE `forestnews_id` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $name_list = uploadImgs($_FILES['img'], "images/forestnews/");
                $sql = "INSERT INTO `forestnews_image` (`forestnews_id`, `path`) VALUES ".substr(str_repeat("($id, ?),", count($name_list)), 0, -1);    
                // INSERT INTO `forestnews` (`forestnews_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
                $stmt = $pdo->prepare($sql);
                $stmt->execute($name_list);
            }
            
        }
        $result = ["success"];
        break;


    case "delete":
        $id = $_POST['id'] ?? 0;
        if ($id > 0){
            $sql = "DELETE FROM `forestnews` WHERE `id` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $result = ["success"];
        }
        break;
    }
function readImage($id = null){
    global $pdo;
    // 抓圖片
    if (isset($id)){
        // read
        $sql = "SELECT * FROM `forestnews_image` WHERE forestnews_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
    }else{
        // readAll
        $sql = "SELECT * FROM `forestnews_image` ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $image_list = $stmt->fetchAll();
        $result = [];
        foreach ($image_list as $value) {
            if (!array_key_exists($value['forestnews_id'], $result)){
                $result[$value['forestnews_id']] = [];
            }
            array_push($result[$value['forestnews_id']], $value);
        }
    }
    return $result;
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);


