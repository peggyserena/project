<?php include __DIR__ . '/../parts/config.php';
include __DIR__ . '/../parts/imgHandler.php';
include __DIR__ . '/../parts/tool.php';


$action = isset($_POST['action']) ? $_POST['action'] : ''; // 操作類型
switch ($action) {

    case 'readCat':
        $sql ="SELECT * FROM `modal_category`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $result['data'] = $stmt->fetchAll();
        $result['success'] = "讀取成功";
        break;
    
    case 'read':
        $sql ="SELECT modal.*, mc.name as modal_name FROM `modal` JOIN `modal_category` as mc ON modal.cat_id = mc.id WHERE modal.id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        $result = $stmt->fetch();
        break;
    case 'readByPage':
        $sql ="SELECT modal.*, mc.name as modal_name FROM `modal` JOIN `modal_category` as mc ON modal.cat_id = mc.id WHERE mc.link_address = ? AND `status` = '使用' LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['link_address']]);
        $result = $stmt->fetch();
        break;
    case 'add':
        // insert modal
        $columns = ['cat_id', 'title', 'content', 'notice', 'link_address','link_name', 'status'];
        $sql = "INSERT INTO `modal` ";

        $sql .= "(`".implode("`,`", $columns)."`, `created_at`) VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).", NOW())";
        // INSERT INTO `modal` ( 'title', 'content', 'notice', 'link_address','link_name') VALUES (?, ?, ?, ?, ?)        
        
        // 依照$columns去抓所有的$_POST資料，放到$data裡
        $data = [];
        foreach($columns as $col){
            array_push($data, $_POST[$col]);
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data); // SQL有問號，所以要使用execute並且帶入同數量的值

        $result = ["success"];
        break;

    case 'readAll':
        // 無搜尋功能，只有讀取全部
        // $result = [];
        // $sql ="SELECT modal.*, mc.name as cat_name FROM `modal` JOIN `modal_category` as mc ON modal.cat_id = mc.id" ;
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute([]);
        // $result['data'] = $stmt->fetchAll();

        $cat_id = replaceAllToEmpty($_POST['cat_id']);
        $result = [];
        $params = [];
        $sql ="SELECT modal.*, mc.name as cat_name FROM `modal` LEFT JOIN `modal_category` as mc ON modal.cat_id = mc.id";
        if (!empty($cat_id)){
            $sql .= " WHERE modal.cat_id = ?";
            array_push($params, $cat_id);
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $result['data'] = $stmt->fetchAll();
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

        // 依照$columns去抓所有的$_POST資料，放到$data裡
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


