<?php include __DIR__ . '/../parts/config.php';

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
        break;

    case 'add':

        // insert forestnews
        $columns = ['cat_id', 'name', 'start_date', 'end_date', 'content','notice'];
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
        $columns = ['cat_id', 'name', 'start_date', 'end_date', 'content','notice'];
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


