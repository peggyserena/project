<?php

require __DIR__ . '/parts/config.php';


$month = "";
$time = "";
$cat_id = "";
$date = date("Y-m-d");

$month = $_GET['month'] ?? "";
$time = $_GET['time'] ?? "";
$cat_id = $_GET['cat_id'] ?? "";
$order = $_GET['order'] ?? "";



$sql = "SELECT `e`.*, ec.name as `ec_name`, SUM(`oe`.quantity) as quantity FROM `event` as e";
$sql_condition = [];
if ($month != "") {
    array_push($sql_condition, "MONTH(`date`) = $month");
}
if ($time != "") {
    array_push($sql_condition, "`time` = '$time'");
}
if ($cat_id != "") {
    array_push($sql_condition, "`cat_id` = $cat_id");
}

array_push($sql_condition, "`date` >= '$date'");

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
$sql = "SELECT * FROM `event_image` WHERE event_id in (".implode(",", $event_id_list).")";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$result = $stmt->fetchAll();
$event_img = [];
foreach($result as $cover_img){
    $event_img[$cover_img['event_id']] = $cover_img['path'];
}


// 活動類別
$sql = "SELECT * FROM `event_category`";

$stmt = $pdo->query($sql);
$event_category = $stmt->fetchAll();


?>

<?php
$title = '活動體驗';
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
    #event{
        background-color: #83a573;
    }
    td{
        padding:0
    }

    .con_01 {
        background-color: whitesmoke;
    }
</style>



<body>
 
<div class="container my-5">
        <div class="con_01">
            <div class=" " id="event" >
                <form action="staff_event_search.php" method="get" >
                    <ul class="row list-unstyled p-2 m-0 ">
                        <li class=" ">
                            <select name='cat_id'>
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
                            </select>
                        </li>
                        <li class="">
                            <select id="select_month" name="month">
                                <option value="">月份</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </li>
                        <li class=" ">
                            <select  id="select_time" name="time">
                                <option value="">時段</option>
                                <option value="08:00">10:00~之前</option>
                                <option value="10:00">10:00~12:00</option>
                                <option value="12:00">12:00~14:00</option>
                                <option value="14:00">14:00~16:00</option>
                                <option value="16:00">16:00~18:00</option>
                                <option value="18:00">18:00~之後</option>
                            </select>
                        </li>
                        <li class="bg-green">
                            <select name="order">
                                <option value="">排序</option>
                                <option value="1" <?= $order == 1 ? "selected" : "" ?>>暢銷度由高至低</option>
                                <option value="2" <?= $order == 2 ? "selected" : "" ?>>價錢由低至高</option>
                                <option value="3" <?= $order == 3 ? "selected" : "" ?>>價錢由高至低</option>
                            </select>
                        </li>
                        <button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button>
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
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        $("#select_month option").each(function(ind, elem) {
            if (ind > 0) {
                elem.text = month;
                elem.value = month;
                month++;
            }
            if (month > 12) {
                month = 1;
            }
        });
        $("#select_year option").each(function(ind, elem) {
            if (ind > 0) {
                elem.text = year;
                elem.value = year;
                year++;
            }
        });
    </script>

    <script>
        function scroll(){
            console.log('test' + window.scrollY);
            if (location.href.indexOf("#event") > -1){
                window.scrollTo(0, window.scrollY - 70)
            }
        }
    </script>
    <script>
    $(document).ready(function() {
        if (location.search) {
            $('html, body').scrollTop(910);
        }
        $(".c_pink_t").each(function(ind, elem){
            $(elem).text(dallorCommas($(elem).text()) + "元"); 
        });
        scroll();
    });
    </script>
    <?php include __DIR__ . '/parts/staff_html-foot.php'; ?>