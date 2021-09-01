<?php include __DIR__ . '/../parts/config.php';

$type = isset($_POST['type']) ? $_POST['type'] : ''; // 操作類型
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : ''; // 開始日期
$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : ''; // 結束日期
$nowDate = date("Y-m-d"); // 今日日期
switch ($type) {
    case 'read':
        $sql = "SELECT * FROM `setting` WHERE id in (1,2)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result) === 2){
            $hotel_unavailable_array = json_decode($result[0]['value']);
            $hotel_available_month = $result[1]['value'];     
        }else{
            break;
        }
        
        // 抓取hotel某一天的相關資訊，包含剩餘訂房數等等
        $sql = "SELECT h.*, h.quantity_limit - IFNULL(SUM(oh.quantity), 0) as available_quantity, ? as order_date,  IF(WEEKDAY(?) < 5, price_weekdays, price_weekend) as final_price 
                FROM `hotel` as h LEFT JOIN `order_hotel` as oh ON h.id = oh.hotel_id and oh.`order_date` = ? 
                GROUP BY h.id";
        $date = $startDate;
        $result = [];

        // 從開始startDate到結束endDate，每次執行上方$sql的查詢
        while ($date <= $endDate){
            
            $check = true; // 用來確認是否是開放的日期
            // 判斷房型未開放的日期
            foreach($hotel_unavailable_array as $unavailable_date){
                $date_array = explode("~", $unavailable_date);
                $unavailableStartDate = $date_array[0];
                $unavailableEndDate = $date_array[1];
                if ($date >= $unavailableStartDate && $date <= $unavailableEndDate){
                    $check = false;
                }
            }

            // 判斷房型預設開放的月數
            $lastAvailableDate = date('Y-m-d', strtotime($nowDate ." +$hotel_available_month month"));
            if ($date > $lastAvailableDate){
                $check = false;
            }

            if ($check){
                // 如果日期是開放的，加入此日期的所有房型資料到$result
               $status = "available";
            }else {
                $status = "unavailable";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$date, $date, $date]);
            array_push($result, [
                "data" => $stmt->fetchAll(),
                "status" => $status,
            ]);
            $date = date('Y-m-d', strtotime($date .' +1 day'));
        };

        // 判斷是不是在購物車裡的temp資料
        $cartMap = [];
        if (array_key_exists('hotel', $_SESSION['cart'])){
            foreach($_SESSION['cart']['hotel'] as $hotel){
                $key = $hotel['id']."-".$hotel['order_date']; // 1-2021-08-26
                $cartMap[$key] = 1;
            }
        }
        
        // 對result進行格式處理
        foreach($result as $result_key => $hoteList){
            // $hotelList 是某天所有的hotel
            foreach($hoteList['data'] as $hotelList_key => $hotel){
                $key = $hotel['id']."-".$hotel['order_date']; // 1-2021-08-26
                if (isset($cartMap[$key])){
                    $result[$result_key]['data'][$hotelList_key]["status"] = "temp"; // $result[$result_key][$hotelList_key] = $hotel
                }
            }
        }
        break;
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);