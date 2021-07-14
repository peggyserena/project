<?php include __DIR__ . '/parts/config.php';


$type = isset($_POST['type']) ? $_POST['type'] : ''; // 操作類型

switch ($type) {
    case 'readCat':
        $sql = "SELECT * FROM event_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        break;
    case 'read':
        $sql = "SELECT * FROM `event` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result = $stmt->fetch();
        
        $sql = "SELECT * FROM `event_image` WHERE event_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result['img'] = $stmt->fetchAll();
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

        // insert gallery image
        $name_list = uploadImgs($_FILES['img'], "images/event/gallery/");
        // json_decode() 字串變陣列
        // json_encode() 陣列變字串
        $img_order = json_decode($_POST['img_order']);
        $sql = "INSERT INTO `event_image` (`event_id`, `path`, `num_order`) VALUES ".substr(str_repeat("($event_id, ?, ?),", count($name_list)), 0, -1);    
        // INSERT INTO `event` (`event_id`, `path`) VALUES  (1, ?, ?), (1, ?, ?), (1, ?, ?)
        $stmt = $pdo->prepare($sql);
        $param = []; // [path1, order1, path2, order2]
        foreach($name_list as $index => $name){
            array_push($param, $name);
            array_push($param, $img_order[$index]);
        }
        $stmt->execute($param);

        $result = ["success"];
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
                $result = [];
                $sql = "SELECT * FROM `event_image` WHERE `event_id` = ? ORDER BY num_order";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $event_image = $stmt->fetchAll();

                foreach($num_order as $key => $value){
                    $sql = "UPDATE `event_image` SET num_order = ? WHERE id = ?";    
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$value, $event_image[$key]['id']]);
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
}

function uploadImgs($img, $target_dir){
    $name_list = [];
    for ($i = 0; $i < count($img["name"]); $i++){
        $filename = md5(uniqid());
        $ext = explode(".", $img["name"][$i])[1];
        $target_file = $target_dir . basename("$filename.$ext");
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($img["tmp_name"][$i]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
        }
    
        // Check file size (bytes)
        if ($img["size"][$i] > 2000000) {
        // echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jpg") {
        // echo "Sorry, only JPEG, PNG files are allowed.";
        $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($img["tmp_name"][$i], $target_file)) {
                array_push($name_list, $target_file);
                // echo "The file ". htmlspecialchars( basename( $img["name"][$i])). " has been uploaded.";
            } else {
                // echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    return $name_list;
}
function uploadImg($img, $target_dir){
    $name = "";
    $filename = md5(uniqid());
    $ext = explode(".", $img["name"])[1];
    $target_file = $target_dir . basename("$filename.$ext");
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($img["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size (bytes)
    if ($img["size"] > 2000000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jpg") {
    // echo "Sorry, only JPEG, PNG files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($img["tmp_name"], $target_file)) {
            $name = $target_file;
            // echo "The file ". htmlspecialchars( basename( $img["name"])). " has been uploaded.";
        } else {
            // echo "Sorry, there was an error uploading your file.";
        }
    }
    return $name;
}

function deleteImg($img){
    $target_file = $img;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jpg") {
        // echo "Sorry, only JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0){

    }else{
        unlink($img);
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);


