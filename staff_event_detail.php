<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林 Lavender Forest';
$pageName = 'staff_event.php';




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

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>

  body {
      background: linear-gradient(45deg, #e8ddf1 0%,  #e1ebdc 100%);
    }

  .con_01 {
    background-color: whitesmoke;
    border-radius: 0.25rem;
    box-shadow: 0px 0px 15px #666e9c;
    -webkit-box-shadow: 0px 0px 15px #666e9c;
    -moz-box-shadow: 0px 0px 15px #666e9c;
  }

  .eventContent span{
      font-weight: 700;
    }
</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

  <main>
    <div class="container my-5 p-0 ">
      <h2 class="title b-green rot-135 col-sm-12">活動查詢</h2>

      <div class="con_01 p-5">

          <div class="form-group ">

            <form action="staff_event_detail.php" method="get">
                <ul class="list-unstyled row">
                    <li>
                        <select name='cat_id'>
                            <option value="">活動類別</option>

                            <?php foreach ($event_category as $cat) { ?>
                                <option value='<?= $cat['id'] ?>'><?= $cat['name'] ?></option>
                            <?php } ?>
                        </select>
                    </li>
                    <li>
                        <select id="select_month" name="month">
                            <option value="">月份</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </li>
                    <li>
                        <select name="time">
                            <option value="">時段</option>
                            <option value="10:00">10:00</option>
                            <option value="12:00">12:00</option>
                            <option value="14:00">14:00</option>
                            <option value="16:00">16:00</option>
                        </select>
                    </li>
                    <li>
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

          <div class="eventItem  my-5">


            <?php foreach ($events as $event) : ?>
              <div class="row">
                    <img src='<?= WEB_ROOT."/".$event_img[0]['path'] ?>' alt=''>
                    <a href='<?= $event['video'] ?>' data-fancybox='F_box1' data-caption='qwe'>
                        <img src='<?= WEB_ROOT ?>/<?= $event['video_img'] ?>' alt=''>
                    </a>
                    <?php for ($i = 1; $i < count($event_img); $i++) : ?>
                        <a href='<?= WEB_ROOT."/".$event_img[$i]['path'] ?>' data-fancybox='F_box1' data-caption='qwe'>
                            <img src='<?= WEB_ROOT."/".$event_img[$i]['path'] ?>' alt=''>
                        </a>
                    <?php endfor; ?>
                </div>

                <div class='' id="event_<?= $event['id'] ?>">
                  <h4 class='mt-5'>活動名稱：<?= $event['name'] ?></h4>
                  <div class="eventContent m-0 pX-3">
                      <p><span>詳情標題：</span><?= $event['title'] ?> </p>
                      <p><span>活動類別：</span><?= $event["ec_name"] ?></p>
                      <p><span>合適年齡：</span><?= $event['age'] ?></p>
                      <p><span>集合地點：</span><?= $event['location'] ?></p>
                      <p><span>活動日期：</span><?= $event["date"] . '&emsp;' . substr($event["time"], 0, 5) ?></p>
                      <p><span>開放人數：</span><?= $event['limitNum'] ?>人</p>
                      <p><span>尚有名額：</span><?= $event["limitNum"] - $event["quantity"]  ?>人</p>
                      <p><span>活動費用：</span><span class="c_pink_t" ><?= $event["price"]  ?></span> 元/人，現場報名、線上報名</p>
                      <p><span>活動內容：</span><?= $event['content'] ?></p>
                      <pre>
                        <p><span>活動簡介：</span><br><?= $event["description"] ?></p>
                        <p><span>活動任務：</span><br><?= $event['info'] ?></p>
                        <p><span>注意事項：</span><br><?= $event['notice'] ?></p>
                      </pre>
                  </div>
                </div>
                <div class="text-center">
                  <a class="text-center c_1 custom-btn btn-4" href="staff_event_editor.php" target="blank">修改</a>
                </div>
                <?php endforeach; ?>
        </div>
      </div>
    </div>
  </main>

<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script>
  $.post('event-api.php', {
    'type': 'readCat',
  }, function(data){
    var output = `<option value="" disabled hidden selected>請選擇</option>`;
    $("#cat_id").append(output);
    data.forEach(function (cat){
      var output = `<option value="${cat['id']}">${cat['name']}</option>`;
      $("#cat_id").append(output);
    });
  }, 'json').fail(function(data){
    console.log(data);
  })
  function create(){
    $.ajax({
        url: 'event-api.php',
        data: new FormData($("#myForm")[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data){
            alert(data);
        }
    });
  }

  // 設定date日期min為今日
  var d = new Date();
  var min = d.toISOString().split("T")[0];
  $("#date").attr("min", min);
</script>

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
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
