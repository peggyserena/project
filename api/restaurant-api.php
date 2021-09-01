<?php include __DIR__ . '/../parts/config.php';

$action = isset($_POST['action']) ? $_POST['action'] : ''; // 操作類型
$order_date = isset($_POST['order_date']) ? $_POST['order_date'] : ''; // 定位日期
$order_time = isset($_POST['order_time']) ? $_POST['order_time'] : ''; // 定位時段

switch ($action) {
    case 'read':
        $sql = "SELECT r.* FROM `restaurant` as r LEFT JOIN `order_restaurant` as _or ON r.id = _or.restaurant_id and _or.`order_datetime` = ?  WHERE _or.id IS NULL GROUP BY r.id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$order_date." ".$order_time]);
        $result = $stmt->fetchAll();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        break;
}
