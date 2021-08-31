<?php include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/imgHandler.php';


$action = isset($_POST['action']) ? $_POST['action'] : ''; // 操作類型
switch ($action) {

    case 'readCat':
        $sql ="SELECT * FROM `modal_category`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $output['data'] = $stmt->fetchAll();
        $output['success'] = "讀取成功";
        break;
    
    case 'read':
        $sql ="SELECT modal.*, mc.name as modal_name FROM `modal` JOIN `modal_category` as mc ON modal.category_id = mc.id WHERE modal_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result = $stmt->fetch();
        break;

    case 'add':
        // insert modal
        $columns = ['cat_id', 'title', 'content', 'notice', 'link_address','link_name', `status`];
        $sql = "INSERT INTO `modal` ";

        $sql .= "(`".implode("`,`", $columns)."`, `created_at`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).", NOW())";
        // INSERT INTO `modal` ( 'title', 'content', 'notice', 'link_address','link_name') VALUES (?, ?, ?, ?, ?)        

        $result = ["success"];
        break;

        case 'readAll':
            $result = [];
            $sql ="SELECT modal.*, mc.name as modal_name FROM `modal` JOIN `modal_category` as mc ON modal.category_id = mc.id" ;
            $stmt = $pdo->prepare($sql);
            $stmt->execute([]);
            $result['data'] = $stmt->fetchAll();
    
            $sql = "SELECT * FROM `modal_image` ORDER BY num_order";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([]);
            $result['test'] = [];
            break;

    case 'edit':
        $id = $_POST['id'];
         // get old modal
        $sql = "SELECT * FROM `modal` WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $modal = $stmt->fetch();
        
        // update modal
        $columns = ['cat_id', 'title', 'content', 'notice', 'link_address','link_name','status'];
        $sql = "UPDATE `modal` SET ";
        $sql .= implode(" = ?, ", $columns)." = ? WHERE id = ?";
        // UPDATE `modal` `name` = ?, `title` = ?, `content` = ?  WHERE id = ?

        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }
        array_push($data, $id);

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);


        $result = ["success"];
        break;
}




echo json_encode($result, JSON_UNESCAPED_UNICODE);


