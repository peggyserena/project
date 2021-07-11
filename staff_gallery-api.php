<?php include __DIR__ . '/parts/config.php';


$type = isset($_POST['type']) ? $_POST['type'] : ''; // 操作類型

switch ($type) {
    
    case 'read':
        $sql = "SELECT * FROM `index` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result = $stmt->fetch();
        break;
    case 'add':
        // insert index
        $columns = [ 'title', 'content'];
        $sql = "INSERT INTO `index` ";

        $sql .= "(`".implode("`,`", $columns)."`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).")";
        // INSERT INTO `index` ( 'title', 'content') VALUES (?, ?, ?)        

        // insert gallery image
        $name_list = uploadImgs($_FILES['img'], "images/album/gallery/");
        $sql = "INSERT INTO `index_image` (`index_id`, `path`) VALUES ".substr(str_repeat("($index_id, ?),", count($name_list)), 0, -1);    
        // INSERT INTO `index` (`index_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
        $stmt = $pdo->prepare($sql);
        $stmt->execute($name_list);

        $result = ["success"];
        break;
    case 'edit':
        // insert video image
        // $name = uploadImg($_FILES['video_img'], "images/index/video/");
        // $_POST['video_img'] = $name;

        // insert index
        $columns = [ 'title', 'content'];
        $sql = "UPDATE `index` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ?";
        // INSERT INTO `index` ( 'title', 'content') VALUES (?, ?, ?)        
        // UPDATE `index` `name` = ?, `title` = ?, `content` = ?  

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        // insert gallery image
        // $name_list = uploadImgs($_FILES['img'], "images/index/gallery/");
        // $sql = "INSERT INTO `index_image` (`index_id`, `path`) VALUES ".substr(str_repeat("($index_id, ?),", count($name_list)), 0, -1);    
        // INSERT INTO `index` (`index_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute($name_list);

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
// echo json_encode($result, JSON_UNESCAPED_UNICODE);


