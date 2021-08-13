<?php include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/imgHandler.php';

// $.post('/project/api/coupon-api.php', 
// {'action': 'add', 'name': "testtt", 'price': 100, 'start_date': "2021-08-10", 'end_date': "2021-09-10"}, function(d){
//     console.log(d)
// }).fail(function(d){
//     console.log(d)
// });



$user = $_SESSION['user'] ?? null;
$staff = $_SESSION['staff'] ?? null;
$action = isset($_POST['action']) ? $_POST['action'] : ''; // 操作類型
switch ($action) { 
    case 'readCat':

        $sql = "SELECT * FROM coupon_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;

    case 'read':
        $id = $_POST['id'];
        $result = [];
        // 抓圖片
        $result['img'] = readImage($id);

        $sql = "SELECT `c`.*, cc.name as `cc_name`, cc.en_name as `cc_en_name` , cc.date as `cc_en_date` FROM `coupon` as c 
        JOIN `coupon_category` as cc ON `cat_id` = cc.`id`  
        WHERE c.id = ? ";
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
        $sql = "SELECT `c`.*, cc.name as `cc_name`FROM `coupon` as c 
        JOIN `coupon_category` as cc ON c.`cat_id` = cc.`id`";
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
        if (!empty($staff)){
            $sql = "SELECT * FROM `members` WHERE MONTH(`birthday` - INTERVAL 16 DAY) = MONTH(CURDATE()) AND DAY(`birthday` - INTERVAL 16 DAY) = DAY(CURDATE())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $userList = $stmt->fetchAll();
            $price = 100;
            $balance = $price;
            $cat_id = "1";
            $name = "";
            $note = "";

            $userIdList = [];
            foreach($userList as $user){
                // insert coupon
                $columns = ['user_id', 'cat_id', 'price', 'balance', 'note'];
                $param = [$user['id'], $cat_id, $price, $balance, $note];
                $sql = "INSERT INTO `coupon` ";
    
                $sql .= "(`".implode("`,`", $columns)."`, 
                            `start_date`, `end_date`, `created_at`) 
                        VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).", 
                            CURDATE() + INTERVAL 1 DAY, CURDATE() + INTERVAL 31 DAY, NOW())";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($param);
                array_push($userIdList, $user['id']);
            }
            $couponId = $pdo->lastInsertId();
            $sql = "SELECT * FROM `coupon` WHERE id = $couponId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $coupon = $stmt->fetch();

            $result['status'] = ["success"];
            $result['data'] = [];
            $result['data']['userIdList'] = $userIdList;
            $result['data']['coupon'] = $coupon;
        }
        break;
    case 'addReply':
        $id = $_POST['id'];
        // get old coupon
        $sql = "SELECT * FROM `coupon` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $coupon = $stmt->fetch();

        // insert coupon
        $columns = ['reply'];
        $sql = "UPDATE `coupon` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `coupon` (`'user_id', 'g_name', 'g_mobile', 'g_email', 'order_num', 'content', 'created_at') VALUES (?, ?, ?, ?, ?, ?, ?)        
        // UPDATE `coupon` `user_id` = ?, `g_name` = ?,  `g_mobile` = ?,  `g_email` = ?,  `order_num` = ?,  `content` = ?,  `created_at` = ?   

        $data = [];
        if (!empty($_POST['reply'])){
            foreach($columns as $col){
                    array_push($data, $_POST[$col]);
            }
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            $result = ["success"];
            
        }else{
            $result = ["error"];
        }
        break;
    case 'edit':
        $id = $_POST['id'];
        // get old coupon
        $sql = "SELECT * FROM `coupon` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $coupon = $stmt->fetch();
        
        $sql = "SELECT * FROM `coupon_image` WHERE coupon_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $coupon['img'] = $stmt->fetchAll();

        // insert video image
        $video_img_changed = $_POST['video_img_changed'];
        $img_changed = $_POST['img_changed'];

        if ($video_img_changed === "1"){
            deleteImg($coupon['video_img']);
            $name = uploadImg($_FILES['video_img'], "images/coupon/");
            $_POST['video_img'] = $name;
        }
        

        // insert coupon
        $columns = ['user_id', 'name', 'price', 'start_date', 'end_date','used_date', 'balance', 'note'];
        $sql = "UPDATE `coupon` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = $id";
        // INSERT INTO `coupon` (`'user_id', 'name', 'price', 'start_date', 'end_date','used_date', 'balance', 'note', 'created_at') VALUES (?, ?, ?, ?, ?, ?, ?)        
        // UPDATE `coupon` `user_id` = ?, `g_name` = ?,  `g_mobile` = ?,  `g_email` = ?,  `order_num` = ?,  `content` = ?,  `created_at` = ?   

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
                $sql = "SELECT * FROM `coupon_image` WHERE `coupon_id` = ? ORDER BY num_order";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $coupon_image = $stmt->fetchAll();

                foreach($num_order as $key => $value){
                    $sql = "UPDATE `coupon_image` SET num_order = ? WHERE id = ?";    
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$value, $coupon_image[$key]['id']]);
                }
            } else{
                foreach($coupon['img'] as $coupon_image){
                    deleteImg($coupon_image['path']);
                }
                $sql = "DELETE FROM `coupon_image` WHERE `coupon_id` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $name_list = uploadImgs($_FILES['img'], "images/coupon/");
                $sql = "INSERT INTO `coupon_image` (`coupon_id`, `path`) VALUES ".substr(str_repeat("($id, ?),", count($name_list)), 0, -1);    
                // INSERT INTO `coupon` (`coupon_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
                $stmt = $pdo->prepare($sql);
                $stmt->execute($name_list);
            }
            
        }
        
        $result = ["success"];
        break;
}

function readImage($id = null){
    global $pdo;
    // 抓圖片
    if (isset($id)){
        // read
        $sql = "SELECT * FROM `coupon_image` WHERE coupon_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
    }else{
        // readAll
        $sql = "SELECT * FROM `coupon_image` ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $image_list = $stmt->fetchAll();
        $result = [];
        foreach ($image_list as $value) {
            if (!array_key_exists($value['coupon_id'], $result)){
                $result[$value['coupon_id']] = [];
            }
            array_push($result[$value['coupon_id']], $value);
        }
    }
    return $result;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);


