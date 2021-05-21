<?php include __DIR__ . '/parts/config.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


// 1.列表, 2.加入, 3.變更數量, 4.移除項目
// 1.list, 2.add, 3.update, 4.delete

$action = isset($_GET['action']) ? $_GET['action'] : 'list'; // 操作的動作
$type = isset($_GET['type']) ? $_GET['type'] : ''; // 操作類型
$key = isset($_GET['key']) ? $_GET['key'] : ''; // 操作索引key

// event
$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // 商品 id
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;  // 數量

// restaurant
$order_date = isset($_GET['order_date']) ? $_GET['order_date'] : "";  // 日期
$order_time = isset($_GET['order_time']) ? $_GET['order_time'] : "";  // 時間
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 0;  // 數量
$table = isset($_GET['table']) ? $_GET['table'] : [];  // 桌號

// $cart = 
// [
//     'event' => [
//             [
//                 'id' => 1,
//                 'price' => 100,
//                 'quantity' => 10,
//             ],
            
//         ],
//     'restaurant' => [
//         [
//             'id' => [1,2,3],
//             'quantity' => 10,
//             'order_date' => '2021-05-15',
//             'order_time' => '14:00:00',
//         ]
//     ],
// ];


if (!isset($_SESSION['cart'][$type])){
    $_SESSION['cart'][$type] = [];
}

switch ($type){
    case 'event':
        switch ($action) {
            case 'update':
            case 'add':
                if (!empty($id)) {
                    if ($qty > 0) {
                        $key = search_nested_array($id, $_SESSION['cart']['event']);
                        // 購物車內已經有這個商品資料
                        if ($key >= 0) {
                            $_SESSION['cart']['event'][$id]['quantity'] = $qty;
                        } else {
                            // 如果是新加入的商品
                            $sql = "SELECT * FROM `event` WHERE id=$id";
                            $row = $pdo->query($sql)->fetch();

                            if (!empty($row)) {
                                $row['quantity'] = $qty;  // 把數量加入
                                array_push($_SESSION['cart']['event'], $row); // 放到購物車裡
                            }
                        }
                    } else {
                        unset($_SESSION['cart']['event'][$key]); // 移除該項商品
                    }
                }
                break;
            case 'delete':
                if (isset($key)) {
                    unset($_SESSION['cart']['event'][$key]); // 移除該項商品
                }
                break;
            default:
            case 'list':
        }
        break;
    case 'restaurant':
        switch ($action) {
            case 'update':
            case 'add':
                if (!(empty($order_date) || empty($order_time) || empty($quantity) || empty($table))) {
                    $row_r['order_date'] = $order_date;  
                    $row_r['order_time'] = $order_time;  
                    $row_r['quantity'] = $quantity; 
                    $row_r['id'] = [];
                    // 如果是新加入的商品
                    foreach($table as $table_id){
                        $sql = "SELECT * FROM `restaurant` WHERE id=$table_id";
                        $row = $pdo->query($sql)->fetch();
                        if (!empty($row)) {
                            array_push($row_r['id'], $row['id']);
                            
                        }
                    }
                    array_push($_SESSION['cart']['restaurant'], $row_r);// 放到購物車裡
                    
                }
                break;
            case 'delete':
                if (isset($key)) {
                    unset($_SESSION['cart']['restaurant'][$key]); // 移除該項商品
                }
                break;
            default:
            case 'list':
        }
        break;
}


/**
 * $arr = [
 *      0 =>
 *      [
 *          $key => $value,
 *      ],
 * ]
 * return 0 in the above example, -1 if not found.
 * 
 */
function search_nested_array($key = 'id', $value, $arr = []){
    foreach ($arr as $k => $a){
        $s_value = $a[$key];
        if ($s_value == $value){
            return $k;
        }
        if (is_array($s_value)){
            if (in_array($value, $s_value)) return $k;
        }
    }
    return -1;
}

echo json_encode($_SESSION['cart'], JSON_UNESCAPED_UNICODE);