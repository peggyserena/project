<?php include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/imgHandler.php';
include __DIR__ . '/../parts/tool.php';

$user = $_SESSION['user'] ?? null;
$action = isset($_POST['action']) ? $_POST['action'] : ''; // 操作類型
$type_list = ['members', 'staff'];

switch ($action) {
    case 'readAll':
        $result = [];
        $condition = ["`user_id` = ?"];
        $param = [$user['id']];
        $condition_map = [
            'cat_id' => "h.`cat_id` = ?",
            'year' => "YEAR(h.`created_at`) = ?",
            'month' => "MONTH(h.`created_at`) = ?",
            'status' => "status = ?",
        ];

        foreach($condition_map as $key => $value){
            $val = replaceAllToEmpty($_POST[$key]);
            if (!empty($val)){
                array_push($condition, $value);
                array_push($param, $val);
            }
        }

        $sql = "SELECT h.*, hc.name as `cat_name` FROM `helpdesk` as h JOIN `helpdesk_category` as hc on h.`cat_id` = hc.`id`";
        if (count($condition) > 0){
            $sql .= "WHERE ".implode(" AND ", $condition);
        }
        $sql .= " ORDER BY `created_at` DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $result['data'] = $stmt->fetchALL();
        
        // img
        $result['img'] = readImage();

        break;
    case 'staffReadAll':
        $result = [];
        $condition = [];
        $param = [];
        $condition_map = [
            'cat_id' => "h.`cat_id` = ?",
            'year' => "YEAR(h.`created_at`) = ?",
            'month' => "MONTH(h.`created_at`) = ?",
            'status' => "status = ?",
        ];

        foreach($condition_map as $key => $value){
            $val = replaceAllToEmpty($_POST[$key]);
            if (!empty($val)){
                array_push($condition, $value);
                array_push($param, $val);
            }
        }

        $sql = "SELECT h.*, hc.name as `cat_name` FROM `helpdesk` as h JOIN `helpdesk_category` as hc on h.`cat_id` = hc.`id`";
        if (count($condition) > 0){
            $sql .= "WHERE ".implode(" AND ", $condition);
        }
        $sql .= " ORDER BY `created_at` DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        $result['data'] = $stmt->fetchALL();
        
        // img
        $result['img'] = readImage();
        break;
    case 'readCat':
        $sql = "SELECT * FROM helpdesk_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;
    

    case 'read':
        $sql = "SELECT * FROM `helpdesk` WHERE id = ? and `user_id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id'], $user['id']]);
        $result['data'] = $stmt->fetch();
        
        $sql = "SELECT * FROM `helpdesk_image` WHERE helpdesk_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result['img'] = $stmt->fetchAll();
        break;
    case 'staffRead':
        $sql = "SELECT h.*, hc.name as `cat_name` FROM `helpdesk` as h JOIN `helpdesk_category` as hc on h.`cat_id` = hc.`id` WHERE h.`id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result['data'] = $stmt->fetch();

        $sql = "SELECT `fullname`, `mobile`, `email` FROM `members` WHERE id = ?";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([$result['data']['user_id']]);
        $result['user'] = $stmt->fetch();
        $result['img'] = [];
        foreach($type_list as $type){
            $sql = "SELECT * FROM `helpdesk_image` WHERE helpdesk_id = ? AND type = '$type' ORDER BY num_order";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_POST['id']]);
            $result['img'][$type] = $stmt->fetchAll();
        }
        break;
        
    case 'add':
        
        // insert helpdesk
        $param = []; // [path1, order1, path2, order2]
        $columns = ['user_id', 'g_name', 'g_mobile', 'g_email','topic','cat_id', 'order_num', 'content'];
        $sql = "INSERT INTO `helpdesk` ";

        $sql .= "(`".implode("`,`", $columns)."`, `status`, `created_at`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).", '未回覆', NOW())";
        // INSERT INTO `helpdesk` ('user_id', 'g_name', 'g_mobile', 'g_email', 'order_num', 'content', 'created_at') VALUES (?, ?, ?, ?, ?, ?, ?)        
        
        $_POST['user_id'] = $user['id'];
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

        $sql = "INSERT INTO `helpdesk_image` (`type`, `helpdesk_id`, `path`, `num_order`) VALUES ".substr(str_repeat("('members', $helpdesk_id, ?, ?),", count($name_list)), 0, -1);    
        // INSERT INTO `helpdesk` (`helpdesk_id`, `path`) VALUES  (1, ?, ?), (1, ?, ?), (1, ?, ?)
        $stmt = $pdo->prepare($sql);
        foreach($name_list as $index => $name){
            array_push($param, $name);
            array_push($param, $img_order[$index]);
        }
        $stmt->execute($param);

        $result = ["success"];
        break;

    case 'addReply':
        $id = $_POST['id'];

        // insert img
        $name_list = uploadImgs($_FILES['img'], "images/helpdesk/");
        $img_order = json_decode($_POST['img_order']);
        if (count($name_list) > 0){
            $sql = "INSERT INTO `helpdesk_image` (`type`, `helpdesk_id`, `path`, `num_order`) VALUES ".substr(str_repeat("(?, ?, ?, ?),", count($name_list)), 0, -1);
            $param = []; // [path1, order1, path2, order2]
            foreach($name_list as $index => $name){
                array_push($param, 'staff');
                array_push($param, $id);
                array_push($param, $name);
                array_push($param, $img_order[$index]);
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute($param);
        }

        // get old helpdesk
        $sql = "SELECT * FROM `helpdesk` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $helpdesk = $stmt->fetch();

        // insert helpdesk
        $columns = ['reply', 'status'];
        $sql = "UPDATE `helpdesk` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ?, `replied_at` = NOW() WHERE id = $id AND `status` = '未回覆'";
        // INSERT INTO `helpdesk` (`'user_id', 'g_name', 'g_mobile', 'g_email', 'order_num', 'content', 'created_at') VALUES (?, ?, ?, ?, ?, ?, ?)        
        // UPDATE `helpdesk` `user_id` = ?, `g_name` = ?,  `g_mobile` = ?,  `g_email` = ?,  `order_num` = ?,  `content` = ?,  `created_at` = ?   

        $data = [];
        $_POST['status'] = "已回覆";
        if (!empty($_POST['reply'])){
            foreach($columns as $col){
                    array_push($data, $_POST[$col]);
            }
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            if ($stmt->rowCount()=== 0){
                $result = ["error"];
            }else{
                $result = ["success"];
            }
        }else{
            $result = ["error"];
        }
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

function readImage($id = null){
    global $pdo, $type_list;
    $result = [];
    
    // 抓圖片
    if (isset($id)){
        // read
        foreach($type_list as $type){
            $sql = "SELECT * FROM `helpdesk_image` WHERE helpdesk_id = ? AND `type` = '$type' ORDER BY num_order";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $result[$type] = $stmt->fetchAll();
        }
    }else{
        // readAll
        
        foreach($type_list as $type){
            $sql = "SELECT * FROM `helpdesk_image` WHERE `type` = '$type' ORDER BY num_order";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $image_list = $stmt->fetchAll();
            $result[$type] = [];
            foreach ($image_list as $value) {
                if (!array_key_exists($value['helpdesk_id'], $result[$type])){
                    $result[$type][$value['helpdesk_id']] = [];
                }
                array_push($result[$type][$value['helpdesk_id']], $value);
            }
        }
    }
    return $result;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);


