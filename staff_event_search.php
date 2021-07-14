<?php

require __DIR__ . '/parts/config.php';


$month = "";
$time = "";
$cat_id = "";
// $date = date("Y-m-d");

$year = $_GET['year'] ?? "";
$month = $_GET['month'] ?? "";
$start_time = "00:00";
$end_time = "23:59";
if (array_key_exists('time', $_GET)){
    $time = explode("-", $_GET['time']);
    $start_time =  $time[0] ?? $start_time;
    $end_time = $time[1] ?? $end_time;
}
$cat_id = $_GET['cat_id'] ?? "";
$order = $_GET['order'] ?? "";



$sql = "SELECT `e`.*, ec.name as `ec_name`, SUM(`oe`.quantity) as quantity FROM `event` as e";
$sql_condition = [];
if ($year != "") {
    if (strpos($year, '~')!== false){
        $year = str_replace("~", "", $year);
        array_push($sql_condition, "YEAR(`date`) < $year");
    }else {
        array_push($sql_condition, "YEAR(`date`) = $year");
    }
}
if ($month != "") {
    array_push($sql_condition, "MONTH(`date`) = $month");
}
if ($cat_id != "") {
    array_push($sql_condition, "`cat_id` = $cat_id");
}
array_push($sql_condition, "`time` BETWEEN '$start_time' AND '$end_time'");
// array_push($sql_condition, "`date` >= '$date'");

$sql .= " JOIN `event_category` as ec ON `cat_id` = ec.`id`";
$sql .= " LEFT JOIN `order_event` as oe ON e.id = oe.event_id";

if (sizeof($sql_condition) > 0) {
    $sql .= " WHERE ";
}
$sql .= implode(" AND ", $sql_condition);
$sql .= " group by e.id";
switch ($order) {
    case 1:
        $sql .= " ORDER BY `quantity` DESC";
        break;
    case 2:
        $sql .= " ORDER BY `price`";
        break;
    case 3:
        $sql .= " ORDER BY `price` DESC";
        break;
    default:
        $sql .= " ORDER BY `date`";
        break;
}
$stmt = $pdo->query($sql);
$events = $stmt->fetchAll();
// 抓活動的id
$event_id_list = [];
foreach($events as $event){
    array_push($event_id_list, $event['id']);
}
// 抓圖片
if (!empty($event_id_list)){
    $sql = "SELECT * FROM `event_image` WHERE event_id in (".implode(",", $event_id_list).") ORDER BY num_order";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([]);
    $result = $stmt->fetchAll();
    $event_img = [];
    foreach($result as $cover_img){
        if (!array_key_exists($cover_img['event_id'], $event_img)){
            $event_img[$cover_img['event_id']] = $cover_img['path'];
        }
    }
}



// 活動類別
$sql = "SELECT * FROM `event_category`";

$stmt = $pdo->query($sql);
$event_category = $stmt->fetchAll();


?>

<?php
$title = '森林體驗查詢';
$pageName = 'event';
?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
<style>
    form ul{
        justify-content: center;

    }
    form li {
        list-style: none;
        padding: 0.5rem;
    }
    td{
        padding:0
    }

    .con_01 {
        background-color: whitesmoke;
    }


</style>



<body>
 
<div class="container">
        <div class="con_01">
            <div class=" " id="searchBar" >
                <form action="staff_event_search.php" method="get" >
                    <ul class="row list-unstyled  row justify-content-center align-items-center p-2 m-0 ">
                        <li class=" ">
                            <select id="select_id" name='cat_id'>
                                <option value="">活動類別</option>
                
                                <?php foreach ($event_category as $cat) { ?>
                                    <option value='<?= $cat['id'] ?>'><?= $cat['name'] ?></option>
                                <?php } ?>
                            </select>
                        </li>
                        <li class="">
                            <select id="select_year" name="year">
                                <option value="">年份</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </li>
                        <li class="">
                            <select id="select_month" name="month">
                                <option value="">月份</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </li>
                        <li class=" ">
                            <select  id="select_time" name="time">
                                <option value="">時段</option>
                                <option value="00:00-10:00">10:00~之前</option>
                                <option value="10:00-12:00">10:00~12:00</option>
                                <option value="12:00-14:00">12:00~14:00</option>
                                <option value="14:00-16:00">14:00~16:00</option>
                                <option value="16:00-18:00">16:00~18:00</option>
                                <option value="18:00-23:59">18:00~之後</option>
                            </select>
                        </li>
                        <li class="bg-green">
                            <select id="select_order" name="order">
                                <option value="">排序</option>
                                <option value="1" <?= $order == 1 ? "selected" : "" ?>>暢銷度由高至低</option>
                                <option value="2" <?= $order == 2 ? "selected" : "" ?>>價錢由低至高</option>
                                <option value="3" <?= $order == 3 ? "selected" : "" ?>>價錢由高至低</option>
                            </select>
                        </li>
                        <li><button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>
                    </ul>
                </form>
            </div>

            <div class="eventItem  p-0 m-0">
                    <table id="result" class="table table-bordered table-Primary table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>序號</th>
                                    <th>主圖片</th>
                                    <th>活動名稱</th>
                                    <th>活動類別</th>
                                    <th>日期</th>
                                    <th>人數</th>
                                    <th>費用</th>
                                    <th>詳情</th>
                                    <th>修改</th>
                                    <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>

                
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($events as $key => $event) : ?>
                                <tr>
                                    <td class="bg-dark text-white" style="border: #454d55 1px solid ;"><?= $key + 1 ?></td>
                                    <td ><img src='<?= WEB_ROOT."/".$event_img[$event['id']] ?>' alt='' style="width: 120px;"></td>
                                    <td><span><?= $event['name'] ?></span></td>
                                    <td><span><?= $event["ec_name"] ?></span></td>
                                    <td><span><?= $event["date"] . '&emsp;' . substr($event["time"], 0, 5) ?></span></td>
                                    <td><span><?= $event["limitNum"] ?></span></td>
                                    <td><span><?= $event["price"]  ?></span></td>
                                    <td><a href="staff_event_item.php?id=<?= $event['id'] ?>" target="blank">查詢</a></td>
                                    <td><a href="staff_event_editor.php?id=<?= $event['id'] ?>" target="blank">修改</a></td>
                                    <td>
                                        <a href="javascript:" onclick="deleteItem(event, 'event', '<?= $key ?>')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

            </div>

        </div>
  </div>
    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>

    <script>
        var date = new Date();
        var year = date.getFullYear() - 3;
        var month = date.getMonth() + 1;
        var selectedMonth = "<?= $_GET['month'] ?? "" ?>";
        var selectedYear = "<?= $_GET['year'] ?? "" ?>";
        var selectedId = "<?= $_GET['cat_id'] ?? "" ?>";
        var selectedTime = "<?= $_GET['time'] ?? "" ?>";
        var selectedOrder = "<?= $_GET['order'] ?? "" ?>";
        $("#select_month option").each(function(ind, elem) {
            if (ind > 0) {
                elem.text = month;
                elem.value = month;
                month++;
            }
            if (month > 12) {
                month = 1;
            }
            if (elem.value === selectedMonth){
                elem.selected = true;
            }
        });
        $("#select_year option").each(function(ind, elem) {
            if (ind === 1){
                elem.text = "之前";
                elem.value = `~${year}`;
            }else if (ind > 0) {
                elem.text = year;
                elem.value = year;
                year++;
            }
            if (elem.value === selectedYear){
                elem.selected = true;
            }
        });
        $("#select_id").val(selectedId);
        $("#select_time").val(selectedTime);
        $("#select_order").val(selectedOrder);
    </script>

    <script>
        const deleteItem = function(event, type, key) {
            let t = $(event.currentTarget);
            console.log('event:', event);
            $.get('event-api.php', {
                action: 'delete',
                type: type,
                key: key
            }, function(data) {
                console.log(t);
                console.log(data);
                t.closest('tr').remove();
                updateDiscountTip();
                updateTable();
                // location.reload();  // 刷頁面
                if ($('tbody>tr').length < 1) { 
                    location.reload(); // 重新載入
                }
            }, 'json');
       };
    </script>


    <?php include __DIR__ . '/parts/staff_html-foot.php'; ?>