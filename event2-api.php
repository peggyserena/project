<?php include __DIR__ . '/parts/config.php';


$type = isset($_POST['type']) ? $_POST['type'] : ''; // 操作類型

switch ($type) {
    case 'readCat':
        $sql = "SELECT * FROM event_category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
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
        $sql = "INSERT INTO `event_image` (`event_id`, `path`) VALUES ".substr(str_repeat("($event_id, ?),", count($name_list)), 0, -1);    
        // INSERT INTO `event` (`event_id`, `path`) VALUES  (1, ?), (1, ?), (1, ?)
        $stmt = $pdo->prepare($sql);
        $stmt->execute($name_list);

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
echo json_encode($result, JSON_UNESCAPED_UNICODE);


// $output = [];

// $member_id = $_SESSION['staff']['staff_id'];
// $video = $_POST['video'];
// $video_img = $_POST['video_img'];
// $name = $_POST['name'];
// $date = $_POST['date'];
// $time = $_POST['time'];
// $price = $_POST['price'];
// $title = $_POST['title'];
// $description = $_POST['description'];
// $age = $_POST['age'];
// $location = $_POST['location'];
// $content = $_POST['content'];
// $info = $_POST['info'];
// $notice = $_POST['notice'];
// $limitNum = $_POST['limitNum'];

// $a_sql = "UPDATE `event` SET 
//             `fullname`= '$fullname',
//             'video' = $'video',
//             'video_img' = $'video_img',
//             'name' = $'name',
//             'date' = $'date',
//             'time' = $'time',
//             'price' = $'price',
//             'title' = $'title',
//             'description' = $'description',
//             'age' = $'age',
//             'location' = $'location',
//             'content' = $'content',
//             'info' = $'info',
//             'notice' = $'notice',
//             'limitNum' = $'limitNum',
//             WHERE id = $event_id";
// $a_stmt = $pdo->prepare($a_sql);
// $a_stmt->execute();


// $a_sql = "SELECT * FROM `staff` WHERE id = $staff_id";
// $a_stmt = $pdo->prepare($a_sql);
// $a_stmt->execute();
// $row = $a_stmt->fetch();
// unset($row['password']);
// unset($row['hash']);
// $_SESSION['user'] = $row;
// $output['success'] = "資料修改成功";



// $a_sql = "SELECT * FROM `members` WHERE id = $member_id";
// $a_stmt = $pdo->prepare($a_sql);
// $_SESSION['user'] = $a_stmt->execute()->fetch();
// header('Location: member.php');
echo json_encode($output, JSON_UNESCAPED_UNICODE);