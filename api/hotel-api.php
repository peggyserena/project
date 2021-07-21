<?php include __DIR__ . '/../parts/config.php';

$type = isset($_POST['type']) ? $_POST['type'] : ''; // 操作類型
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : ''; // 開始日期
$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : ''; // 結束日期

switch ($type) {
    case 'read':
        $sql = "SELECT h.*, h.quantity_limit - IFNULL(SUM(oh.quantity), 0) as available_quantity, ? as order_datetime,  IF(WEEKDAY(?) < 5, price_weekdays, price_weekend) as final_price FROM `hotel` as h LEFT JOIN `order_hotel` as oh ON h.id = oh.hotel_id and oh.`order_datetime` = ? GROUP BY h.id";
        $date = $startDate;
        $result = [];
        while ($date <= $endDate){
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$date, $date, $date]);
            array_push($result, $stmt->fetchAll());
            $date = date('Y-m-d', strtotime($date .' +1 day'));
        };
        
        break;
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);