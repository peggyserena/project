<?php include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/imgHandler.php';

$user = $_SESSION['user'];
$action = isset($_POST['action']) ? $_POST['action'] : ''; // 操作類型
switch ($action) {
    case 'readCat':
        $sql = "SELECT * FROM helpdesk_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;
    case 'readAll':
        $condition = ["`user_id` = ?"];
        $param = [$user['id']];
        $condition_map = [
            'cat_id' => "h.`cat_id` = ?",
            'year' => "YEAR(h.`created_at`) = ?",
            'month' => "MONTH(h.`created_at`) = ?",
        ];
        foreach($condition_map as $key => $value){
            if (!empty($_POST[$key])){
                array_push($condition, $value);
                array_push($param, $_POST[$key]);
            }
        }
        $sql = "SELECT h.*, hc.name as `cat_name` FROM `helpdesk` as h JOIN `helpdesk_category` as hc on h.`cat_id` = hc.`id`";
        if (count($condition) > 0){
            $sql .= "WHERE ".implode(" AND ", $condition);
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $result = $stmt->fetchALL();
        
        // $sql = "SELECT * FROM `helpdesk_image` WHERE helpdesk_id = ? ORDER BY num_order";
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute([$_POST['id']]);
        // $result['img'] = $stmt->fetchAll();
        break;

    case 'read':
        $sql = "SELECT * FROM `helpdesk` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result = $stmt->fetch();
        
        $sql = "SELECT * FROM `helpdesk_image` WHERE helpdesk_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result['img'] = $stmt->fetchAll();
        break;

    case 'add':
        
        // insert helpdesk
        $param = []; // [path1, order1, path2, order2]
        $columns = ['user_id', 'g_name', 'g_mobile', 'g_email','topic','cat_id', 'order_num', 'content', 'created_at'];
        $sql = "INSERT INTO `helpdesk` ";

        $sql .= "(`".implode("`,`", $columns)."`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).")";
        // INSERT INTO `helpdesk` ('user_id', 'g_name', 'g_mobile', 'g_email', 'order_num', 'content', 'created_at') VALUES (?, ?, ?, ?, ?, ?, ?)        

        $_POST['user_id'] = $user['id'];
        $_POST['created_at'] = "NOW()";
        foreach($columns as $col){
            array_push($param, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $helpdesk_id = $pdo->lastInsertId();

        $param = []; // [path1, order1, path2, order2]
        // insert gallery image
        $name_list = uploadImgs($_FILES['img'], "images/helpdesk/");
        // json_decode() 字串變陣列
        // json_encode() 陣列變字串
        $img_order = json_decode($_POST['img_order']);

        $sql = "INSERT INTO `helpdesk_image` (`helpdesk_id`, `path`, `num_order`) VALUES ".substr(str_repeat("($helpdesk_id, ?, ?),", count($name_list)), 0, -1);    
        // INSERT INTO `helpdesk` (`helpdesk_id`, `path`) VALUES  (1, ?, ?), (1, ?, ?), (1, ?, ?)
        $stmt = $pdo->prepare($sql);
        foreach($name_list as $index => $name){
            array_push($param, $name);
            array_push($param, $img_order[$index]);
        }
        $stmt->execute($param);

        $result = ["success"];
        break;

    case 'edit':
        $id = $_POST['id'];
        // get old helpdesk
        $sql = "SELECT * FROM `helpdesk` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $helpdesk = $stmt->fetch();
        
        $sql = "SELECT * FROM `helpdesk_image` WHERE helpdesk_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $helpdesk['img'] = $stmt->fetchAll();

        // insert video image
        $video_img_changed = $_POST['video_img_changed'];
        $img_changed = $_POST['img_changed'];

        if ($video_img_changed === "1"){
            deleteImg($helpdesk['video_img']);
            $name = uploadImg($_FILES['video_img'], "images/helpdesk/");
            $_POST['video_img'] = $name;
        }
        

        // insert helpdesk
        $columns = ['user_id', 'g_name', 'g_mobile', 'g_email', 'order_num', 'content', 'created_at'];
        $sql = "UPDATE `helpdesk` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `helpdesk` (`'user_id', 'g_name', 'g_mobile', 'g_email', 'order_num', 'content', 'created_at') VALUES (?, ?, ?, ?, ?, ?, ?)        
        // UPDATE `helpdesk` `user_id` = ?, `g_name` = ?,  `g_mobile` = ?,  `g_email` = ?,  `order_num` = ?,  `content` = ?,  `created_at` = ?   

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
                $sql = "SELECT * FROM `helpdesk_image` WHERE `helpdesk_id` = ? ORDER BY num_order";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $helpdesk_image = $stmt->fetchAll();

                foreach($num_order as $key => $value){
                    $sql = "UPDATE `helpdesk_image` SET num_order = ? WHERE id = ?";    
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$value, $helpdesk_image[$key]['id']]);
                }
            } else{
                foreach($helpdesk['img'] as $helpdesk_image){
                    deleteImg($helpdesk_image['path']);
                }
                $sql = "DELETE FROM `helpdesk_image` WHERE `helpdesk_id` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $name_list = uploadImgs($_FILES['img'], "images/helpdesk/");
                $sql = "INSERT INTO `helpdesk_image` (`helpdesk_id`, `path`) VALUES ".substr(str_repeat("($id, ?),", count($name_list)), 0, -1);    
                // INSERT INTO `helpdesk` (`helpdesk_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
                $stmt = $pdo->prepare($sql);
                $stmt->execute($name_list);
            }
            
        }
        
        $result = ["success"];
        break;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);


