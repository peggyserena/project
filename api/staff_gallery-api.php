<?php include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/imgHandler.php';


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
        $columns = [ 'title', 'content', 'content_tablet', 'content_cellphone'];
        $sql = "INSERT INTO `index` ";

        $sql .= "(`".implode("`,`", $columns)."`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).")";
        // INSERT INTO `index` ( 'title', 'content', 'content_tablet', 'content_cellphone') VALUES (?, ?, ?)        

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
        $columns = [ 'title', 'content', 'content_tablet', 'content_cellphone'];
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




echo json_encode($result, JSON_UNESCAPED_UNICODE);


