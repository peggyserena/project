<?php
function uploadImgs($img, $target_dir, $size = 2000000){
    $name_list = [];
    for ($i = 0; $i < count($img["name"]); $i++){
        $filename = md5(uniqid());
        $ext = explode(".", $img["name"][$i])[1];
        $target_file = $target_dir . basename("$filename.$ext");
        $target_file_absolute = $_SERVER['DOCUMENT_ROOT'].WEB_ROOT."/".$target_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file_absolute,PATHINFO_EXTENSION));
    
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
        if (file_exists($target_file_absolute)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
        }
    
        // Check file size (bytes)
        if ($img["size"][$i] > $size) {
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
            if (move_uploaded_file($img["tmp_name"][$i], $target_file_absolute)) {
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
    $target_file_absolute = $_SERVER['DOCUMENT_ROOT'].WEB_ROOT."/".$target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file_absolute,PATHINFO_EXTENSION));

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
    if (file_exists($target_file_absolute)) {
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
        if (move_uploaded_file($img["tmp_name"], $target_file_absolute)) {
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
function replaceAllToEmpty($arr = []){
    if (is_array($arr)){
        foreach ($arr as $key => $a){
            if ($a === "all") {
                $arr[$key] = "";
            }
        }
    }else{
        if ($arr === "all") {
            $arr = "";
        }
    }
    return $arr;
}