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

// 抓圖片
// $sql = "SELECT * FROM `event_image` WHERE event_id = ".$event['id'];
// $stmt = $pdo->prepare($sql);
// $stmt->execute([]);
// $event_img = $stmt->fetchAll();


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

</style>



<body>
 
    <div class="container">
        <div class=" " id="event">
            <form action="staff_event_check.php" method="get">
                <ul div class="row list-unstyled ">
                    <li class=" ">
                        <select name='cat_id'>
                            <option value="">活動類別</option>
              
                            <?php foreach ($event_category as $cat) { ?>
                                <option value='<?= $cat['id'] ?>'><?= $cat['name'] ?></option>
                            <?php } ?>
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
                        <select name="time">
                            <option value="">時段</option>
                            <option value="10:00">10:00</option>
                            <option value="12:00">12:00</option>
                            <option value="14:00">14:00</option>
                            <option value="16:00">16:00</option>
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

      <div class="eventItem  p-0 my-5">
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
                    <?php foreach ($events as $event) : ?>
                      <div class=''  id="event_<?= $event['id'] ?>"></div>
                        <tr>
                            <td>序號</td>
                            <td><img src='<?= WEB_ROOT."/".$event_img[0]['patd'] ?>' alt=''></td>
                            <td><span><?= $event['name'] ?></span></td>
                            <td><span><?= $event["ec_name"] ?></span></td>
                            <td><span><?= $event["date"] . '&emsp;' . substr($event["time"], 0, 5) ?></span></td>
                            <td><span><?= $event["limitNum"] ?></span></td>
                            <td><span><?= $event["price"]  ?></span></td>
                            <td><a href="staff_event_item.php" target="blank">查詢</a></td>
                            <td><a href="staff_event_editor.php" target="blank">修改</a></td>
                        </tr>
 
                    </tbody>
                </table>

          <?php endforeach; ?>
      </div>
  </div>

    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>

    <script>
        var date = new Date();
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