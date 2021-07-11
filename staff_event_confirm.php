<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林體驗確認';
$pageName = 'event';




$month = "";
$time = "";
$cat_id = "";

$month = $_GET['month'] ?? "";
$time = $_GET['time'] ?? "";
$cat_id = $_GET['cat_id'] ?? "";
$order = $_GET['order'] ?? "";


$sql = "SELECT `e`.*, ec.name as `ec_name`, SUM(`oe`.quantity) as quantity FROM `event` as e";
$sql_condition = [];
array_push($sql_condition, "e.id = ?");

$sql .= " JOIN `event_category` as ec ON `cat_id` = ec.`id`";
$sql .= " LEFT JOIN `order_event` as oe ON e.id = oe.event_id";

if (sizeof($sql_condition) > 0) {
    $sql .= " WHERE ";
}
$sql .= implode(" AND ", $sql_condition);
$sql .= " group by e.id";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['id']]);
$event = $stmt->fetch();

// 抓圖片
$sql = "SELECT * FROM `event_image` WHERE event_id = ".$event['id'];
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$event_img = $stmt->fetchAll();


// 活動歷年總數
$sql = "SELECT e.name, IFNULL(sum(`quantity`), 0) as quantity FROM `event` as e LEFT JOIN `order_event` as oe ON e.id = oe.event_id WHERE e.id = ? GROUP BY `name`";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['id']]);
$quantity_list = $stmt->fetchAll();
$quantity_map = [];
foreach ($quantity_list as $value) {
    $quantity_map[$value['name']] = $value['quantity'];
}
?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
<style>
/* ====================================== event ====================================== */
    body {
        text-align:justify;
    }

    .box>div>h3 {
        width: 100%;
    }
    .d-flex img {
        flex: 1 1 0;
    }
    .d-flex a {
        flex: 1 1 0;
    }

    .eventItem img {
        width: 100%;
        height: 50%;
        object-fit: cover;
    }

    /* .eventItem .col-4 {
        color: #224363;
    } */

    .eventItem .col-4 p {
        text-align: justify;
    }

    .eventItem .fancybox {
        width: 100%;
        height: 80px;
    }

    .eventItem .fancybox img {
        width: 99.5%;
        height: 100%;
        object-fit: cover;
    }


    form li {
        list-style: none;
        padding: 0.5rem;

    }

    form ul {
        justify-content: center;

    }

    a {
        text-decoration:none;
        color: white;
    }

    h4 {
        font-weight: 500
    }

    .eventItem{
        background-color:white;
        margin:0 auto;
    }

    .eventItem .pop {
        position: relative;
    }

    .eventItem .pop .priceBar01 {
        position: absolute;
        bottom: 0px;
        color: white;
    }

    input:hover {
        border: 2px white solid;
    }

    input{
        text-align: center;
    }


    .container .box .col-lg-8{
        background-image: url("./images/other/frame-02.svg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position:center;
    }
    .eventContent span{
      font-weight: 700;
    }


/* ====================================== event ====================================== */

    .modal-content {
        padding:3px;
        background:
        linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%)
        no-repeat;
        background-size:100% 10px ;
        background-color:white;
    }


</style>
<div class="container my-lg-5">
    <?php include "parts/transaction.php"?>
    <div class="eventItem justify-content-center row box_shadow">
        <h2 class='text-center b-green rot-135 col-12 p-2 m-0' id="event_<?= $event['id']?>">
            <?= $event['name'] ?>
        </h2>

        <div class='col-lg-8 col-md-12 col-sm-12 m-0 p-0'>
            <div class='d-flex col-12 p-0 m-0'>
                <img src='<?= WEB_ROOT."/".$event_img[0]['path'] ?>' alt=''>
            </div>
        </div>
        <div class='col-lg-4 col-md-12 col-sm-12 row m-0 p-0 pop ' style="background-color: whitesmoke;" id="event_<?= $event['id'] ?>">
            <div>

                <div class='col-12 p-3 mt-0 ml-0 mr-0 'style="margin-bottom:75px">
                    <div >
                        <p class="text-success">累積銷售數量： <?= $quantity_map[$event['name']] ?></p>

                        <p>活動類別：<span style="font-size:1.2rem">
                            <?= $event["ec_name"] ?></span>
                        </p>
                        <p>日期：
                            <span style="font-size:1.2rem"><?= $event["date"] . '&emsp;' . substr($event["time"], 0, 5) ?></span>
                        </p>
                        <p>尚有名額/總額：
                            <span style="font-size:1.2rem"><?= $event["limitNum"] - $event["quantity"]  ?>/<?= $event["limitNum"] ?></span> 人
                        </p>
                        <p>單價：<span class="c_pink_t" style="font-size:1.2rem">
                                <?= $event["price"]  ?>
                                </span>
                        </p>
                    </div>
                </div>
                <div class='col-12 p-0 m-0 priceBar01'>

                    <form class='' action='' method=''>
                        <div class='d-flex c_pink justify-content-around pt-2 pb-2 pl-4 pr-4 '>
                            <div class='d-flex align-items-center'>
                                <label for='' class='m-0 p-0'>
                                    <h4 class='m-0 pr-2'>參加人數</h4>
                                </label>
                                <input type='number' value='1' min='1' max="<?= $event['limitNum'] - $event['quantity'] ?>" name='quantity' id='quantity' style='width: 3rem; ' placeholder='1' class=''>
                            </div>
                            <button class='btn add-to-cart m-0 ' type="button" data-toggle="modal" data-target="#addToCartAlert" onclick="tr_addTransaction('event', 'cart', '<?= $event['id'] ?>')"><i class='fas fa-cart-plus'></i></button>
                            <button class='btn add-to-wishList m-0 ' type="button"  data-toggle="modal" data-target="#addToWishListAlert" onclick="tr_addTransaction('event', 'wishList', '<?= $event['id'] ?>')" ><i class='fas fa-heart' ></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class='m-0  '>
            <div class="m-0" <?= $event['id'] ?>>
                <h4 class=' m-0 text-center p-2 c_1 b-green rot-135' style="color:white; font-weight:600"> <?= $event['title'] ?> </h4>
            </div>


            <div class='fancybox d-flex row p-0 m-0'>
                <a href='<?= $event['video'] ?>' data-fancybox='F_box1' data-caption='qwe'>
                    <img src='<?= WEB_ROOT ?>/<?= $event['video_img'] ?>' alt=''>
                </a>
                <?php for ($i = 1; $i < count($event_img); $i++) : ?>
                    <a href='<?= WEB_ROOT."/".$event_img[$i]['path'] ?>' data-fancybox='F_box1' data-caption='qwe'>
                        <img src='<?= WEB_ROOT."/".$event_img[$i]['path'] ?>' alt=''>
                    </a>
                <?php endfor; ?>
            </div>


            <div class="eventContent m-0 p-5">
                <p><span>活動類別：</span><?= $event["ec_name"] ?></p>
                <p><span>合適年齡：</span><?= $event['age'] ?></p>
                <p><span>集合地點：</span><?= $event['location'] ?></p>
                <p><span>活動日期：</span><?= $event["date"] . '&emsp;' . substr($event["time"], 0, 5) ?></p>
                <p><span>開放人數：</span><?= $event['limitNum'] ?>人</p>
                <p><span>尚有名額：</span><?= $event["limitNum"] - $event["quantity"]  ?>人</p>
                <p><span>活動費用：</span><span class="c_pink_t" ><?= $event["price"]  ?></span> 元/人，現場報名、線上報名</p>
                <p><span>活動內容：</span><?= $event['content'] ?></p>
                <pre>
                  <p><span><?= $event["description"] ?></span></p>
                  <p><span>活動任務：<br></span><?= $event['info'] ?></p>
                  <p><span>注意事項：<br></span><?= $event['notice'] ?></p>
                </pre>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
      <a class="text-center c_1 custom-btn btn-4" href="staff_event_editor.php?id=<?= $event['id']?>" target="blank">修改</a>
    </div>

</div>
    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>

<script>
    $(document).ready(function() {
         $(".c_pink_t").each(function(ind, elem){
            $(elem).text(dallorCommas($(elem).text()) + "元");
        });
        scroll();
    });
    </script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>