<?php include __DIR__ . '/parts/config.php';


$action = isset($_POST['action']) ? $_POST['action'] : ''; // 操作類型
switch ($action) {
    
    case 'readAll':
        $result = [];
        $sql = "SELECT * FROM `index`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result['data'] = $stmt->fetchAll();

        $sql = "SELECT * FROM `index_image` ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $index_image_list = $stmt->fetchAll();
        $result['img'] = [];
        $result['test'] = [];
        foreach($index_image_list as $index_image){
            if (!array_key_exists($index_image['index_id'], $result['img'])) {
                $result['img'][$index_image['index_id']] = [];
            }
            array_push($result['img'][$index_image['index_id']], $index_image);
        }
        
        break;
    case 'read':
        $sql = "SELECT * FROM `index` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result = $stmt->fetch();

        $sql = "SELECT * FROM `index_image` WHERE index_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result['img'] = $stmt->fetchAll();
        break;
    case 'add':
        // insert index
        $columns = [ 'title', 'content'];
        $sql = "INSERT INTO `index` ";

        $sql .= "(`".implode("`,`", $columns)."`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).")";
        // INSERT INTO `index` ( 'title', 'content') VALUES (?, ?, ?)        

        // insert gallery image
        $name_list = uploadImgs($_FILES['img'], "images/album/");
        $sql = "INSERT INTO `index_image` (`index_id`, `path`) VALUES ".substr(str_repeat("($index_id, ?),", count($name_list)), 0, -1);    
        // INSERT INTO `index` (`index_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
        $stmt = $pdo->prepare($sql);
        $stmt->execute($name_list);

        $result = ["success"];
        break;
    case 'edit':
        $id = $_POST['id'];
         // get old index
        $sql = "SELECT * FROM `index` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $index = $stmt->fetch();
        
        $sql = "SELECT * FROM `index_image` WHERE index_id = ? ORDER BY num_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $index['img'] = $stmt->fetchAll();

        // update index
        $columns = [ 'title', 'content'];
        $img_changed = $_POST['img_changed'];
        $sql = "UPDATE `index` SET ";
        
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = ?";
        // UPDATE `index` `name` = ?, `title` = ?, `content` = ?  WHERE id = ?

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        array_push($data, $id);

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);


        // insert gallery image
        if ($img_changed === "1"){
            if ($_FILES['img']['size'][0] === 0){
                $num_order = json_decode($_POST['img_order']);
                $result = [];
                $sql = "SELECT * FROM `index_image` WHERE `index_id` = ? ORDER BY num_order";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $index_image = $stmt->fetchAll();

                foreach($num_order as $key => $value){
                    $sql = "UPDATE `index_image` SET num_order = ? WHERE id = ?";    
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$value, $index_image[$key]['id']]);
                }
            } else{
                foreach($index['img'] as $index_image){
                    deleteImg($index_image['path']);
                }
                $sql = "DELETE FROM `index_image` WHERE `index_id` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $name_list = uploadImgs($_FILES['img'], "images/album/");
                $sql = "INSERT INTO `index_image` (`index_id`, `path`) VALUES ".substr(str_repeat("($id, ?),", count($name_list)), 0, -1);    
                // INSERT INTO `index` (`index_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
                $stmt = $pdo->prepare($sql);
                $stmt->execute($name_list);
            }
            
        }


        // // insert gallery image
        // $name_list = uploadImgs($_FILES['img'], "images/album/");
        // $sql = "INSERT INTO `index_image` (`index_id`, `path`) VALUES ".substr(str_repeat("($id, ?),", count($name_list)), 0, -1);    
        // // INSERT INTO `index` (`index_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
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


