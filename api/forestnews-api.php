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

        // 抓圖片
        $sql = "SELECT * FROM `forestnews_image` WHERE forestnews_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result['img'] = $stmt->fetchAll();

        $sql = "SELECT `f`.*, fc.name as `fc_name` FROM `forestnews` as f 
        JOIN `forestnews_category` as fc ON `cat_id` = fc.`id` 
        WHERE f.id = ? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        break;

    case 'readAll':
        $date = date("Y-m-d");
        $year = $_POST['year'] ?? "";
        $month = $_POST['month'] ?? "";
        $cat_id = $_POST['cat_id'] ?? "";
        $order = $_POST['order'] ?? "";
        [$year, $month, $cat_id] = replaceAllToEmpty([$year, $month, $cat_id]);


        

        $sql = "SELECT `f`.*, fc.name as `fc_name`FROM `forestnews` as f";
        $sql_condition = [];
        if ($year != "") {
            array_push($sql_condition, "YEAR(`date`) = $year");
        }
        if ($month != "") {
            array_push($sql_condition, "MONTH(`date`) = $month");
        }
        if ($cat_id != "") {
            array_push($sql_condition, "`cat_id` = $cat_id");
        }

        array_push($sql_condition, "`date` >= '$date'");

        return $result;

        break;



    case 'add':

        // insert forestnews
        $columns = ['cat_id', 'name', 'start_date', 'end_date', 'content','notice','created_at'];
        $sql = "INSERT INTO `forestnews` ";

        $sql .= "(`".implode("`,`", $columns)."`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).")";
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
        $columns = ['cat_id', 'name', 'start_date', 'end_date', 'content','notice','created_at'];
        if ($video_img_changed === "1") {
            array_push($columns, 'video_img');
        }
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
        
        // insert gallery image
        if ($img_changed === "1"){
            if ($_FILES['img']['size'][0] === 0){
                $num_order = json_decode($_POST['img_order']);
                $result = [];
                $sql = "SELECT * FROM `forestnews_image` WHERE `forestnews_id` = ? ORDER BY num_order";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $forestnews_image = $stmt->fetchAll();

                foreach($num_order as $key => $value){
                    $sql = "UPDATE `forestnews_image` SET num_order = ? WHERE id = ?";    
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$value, $forestnews_image[$key]['id']]);
                }
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
    
echo json_encode($result, JSON_UNESCAPED_UNICODE);


