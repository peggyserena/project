<?php

require __DIR__ . '/parts/config.php';


$month = "";
$time = "";
$cat_id = "";
$date = date("Y-m-d");

$month = $_get['month'] ?? "";
$time = $_get['time'] ?? "";
$cat_id = $_get['cat_id'] ?? "";
$order = $_get['order'] ?? "";



$sql = "SELECT `event`.*, ec.name as `ec_name` FROM `event`";
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

if (sizeof($sql_condition) > 0) {
    $sql .= " WHERE ";
}
$sql .= implode(" AND ", $sql_condition);
switch ($order) {
    case 1:
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

// 活動類別
$sql = "SELECT * FROM `event_category`";

$stmt = $pdo->query($sql);
$event_category = $stmt->fetchAll();



// 取得總筆數, 總頁數, 該頁的商品資料

// $perPage = 4; // 每一頁有幾筆
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 用戶要看第幾頁的商品

// $t_sql = "SELECT COUNT(1) FROM event $where ";
// // $t_sql = "SELECT COUNT(1) FROM address_book";
// $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// $totalPages = ceil($totalRows / $perPage);

// if ($page < 1) $page = 1;
// if ($page > $totalPages) $page = $totalPages;

// $p_sql = sprintf("SELECT * FROM event $where LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);

// $rows = $pdo->query($p_sql)->fetchAll();


?>

<?php
$title = '活動體驗';
$pageName = 'event';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    *:before,
    *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        user-select: none;
        color: white;
    }

    #calendar {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
        width: 350px;
        height: 540px;
        overflow: hidden;
    }


    .header {
        height: 50px;
        width: 350px;
        background: linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%);
        text-align: center;
        position: relative;
        z-index: 100;
    }

    .header h1 {
        margin: 0;
        padding: 0;
        font-weight: 900;
        font-size: 1.5rem;
        line-height: 50px;
        letter-spacing: 1px;
        -webkit-text-stroke: 1px white;
    }

    .left,
    .right {
        position: absolute;
        width: 0px;
        height: 0px;
        border-style: solid;
        top: 50%;
        margin-top: -7.5px;
        cursor: pointer;
    }

    .left {
        border-width: 7.5px 10px 7.5px 0;
        border-color: transparent white transparent transparent;
        left: 20px;
    }

    .right {
        border-width: 7.5px 0 7.5px 10px;
        border-color: transparent transparent transparent white;
        right: 20px;
    }

    .month {
        /*overflow: hidden;*/
        opacity: 0;
    }

    .month.new {
        -webkit-animation: fadeIn 1s ease-out;
        opacity: 1;
    }

    .month.in.next {
        -webkit-animation: moveFromTopFadeMonth .4s ease-out;
        -moz-animation: moveFromTopFadeMonth .4s ease-out;
        animation: moveFromTopFadeMonth .4s ease-out;
        opacity: 1;
    }

    .month.out.next {
        -webkit-animation: moveToTopFadeMonth .4s ease-in;
        -moz-animation: moveToTopFadeMonth .4s ease-in;
        animation: moveToTopFadeMonth .4s ease-in;
        opacity: 1;
    }

    .month.in.prev {
        -webkit-animation: moveFromBottomFadeMonth .4s ease-out;
        -moz-animation: moveFromBottomFadeMonth .4s ease-out;
        animation: moveFromBottomFadeMonth .4s ease-out;
        opacity: 1;
    }

    .month.out.prev {
        -webkit-animation: moveToBottomFadeMonth .4s ease-in;
        -moz-animation: moveToBottomFadeMonth .4s ease-in;
        animation: moveToBottomFadeMonth .4s ease-in;
        opacity: 1;
    }

    .week {
        background: #359e99;
    }

    .day {
        display: inline-block;
        width: 50px;
        padding: 5px;
        text-align: center;
        vertical-align: top;
        cursor: pointer;
        background: #3a5a2c;
        position: relative;
        z-index: 100;
    }

    .day.craft {
        color: rgba(255, 255, 255, .3);
    }

    .day.today {
        color: #93d3f8;
    }

    .day-name {
        font-size: 9px;
        text-transform: uppercase;
        margin-bottom: 5px;
        color: rgba(255, 255, 255, .5);
        letter-spacing: .7px;
    }

    .day-number {
        font-size: 22px;
        letter-spacing: 1.5px;
        font-weight: 500;

    }


    .day .day-events {
        list-style: none;
        margin-top: 3px;
        text-align: center;
        height: 12px;
        line-height: 6px;
        overflow: hidden;
    }

    .day .day-events span {
        vertical-align: top;
        display: inline-block;
        padding: 0;
        margin: 0;
        width: 5px;
        height: 5px;
        line-height: 5px;
        margin: 0 1px;
    }

    .blue {
        background: rgba(156, 202, 235, 1);
    }

    .orange {
        background: rgba(247, 167, 0, 1);
    }

    .green {
        background: rgba(153, 198, 109, 1);
    }

    .yellow {
        background: rgba(249, 233, 0, 1);
    }

    .details {
        position: relative;
        width: 350px;
        height: 75px;
        background: linear-gradient(45deg, #035ed6 0%, #93d3f8 100%);
        margin-top: 5px;
        border-radius: 4px;
        color: rgb(255, 255, 255);
        font-size: 10px;
    }

    .details.in {
        -webkit-animation: moveFromTopFade .5s ease both;
        -moz-animation: moveFromTopFade .5s ease both;
        animation: moveFromTopFade .5s ease both;
    }

    .details.out {
        -webkit-animation: moveToTopFade .5s ease both;
        -moz-animation: moveToTopFade .5s ease both;
        animation: moveToTopFade .5s ease both;
    }

    .arrow {
        position: absolute;
        top: -5px;
        left: 50%;
        margin-left: -2px;
        width: 0px;
        height: 0px;
        border-style: solid;
        border-width: 0 5px 5px 5px;
        border-color: transparent transparent white transparent;
        transition: all 0.7s ease;
    }

    .events {
        height: 75px;
        padding: 7px 0;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .events.in {
        -webkit-animation: fadeIn .3s ease both;
        -moz-animation: fadeIn .3s ease both;
        animation: fadeIn .3s ease both;
    }

    .events.in {
        -webkit-animation-delay: .3s;
        -moz-animation-delay: .3s;
        animation-delay: .3s;
    }

    .details.out .events {
        -webkit-animation: fadeOutShrink .4s ease both;
        -moz-animation: fadeOutShink .4s ease both;
        animation: fadeOutShink .4s ease both;
    }

    .events.out {
        -webkit-animation: fadeOut .3s ease both;
        -moz-animation: fadeOut .3s ease both;
        animation: fadeOut .3s ease both;
    }

    .event {
        font-size: 16px;
        line-height: 20px;
        letter-spacing: .5px;
        padding: 2px 16px;
        vertical-align: top;
    }

    .event.empty {
        color: #eee;
    }

    .event-category {
        height: 10px;
        width: 10px;
        display: inline-block;
        margin: 6px 0 0;
        vertical-align: top;
    }

    .event span {
        display: inline-block;
        padding: 0 0 0 7px;
    }

    .legend {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 30px;
        background: rgb(97, 96, 63);
        line-height: 30px;

    }

    .entry {
        position: relative;
        padding: 0 0 0 25px;
        font-size: 13px;
        display: inline-block;
        line-height: 30px;
        background: transparent;
    }

    .entry:after {
        position: absolute;
        content: '';
        height: 5px;
        width: 5px;
        top: 12px;
        left: 14px;
    }

    .entry.blue:after {
        background: rgba(156, 202, 235, 1);
    }

    .entry.orange:after {
        background: rgba(247, 167, 0, 1);
    }

    .entry.green:after {
        background: rgba(153, 198, 109, 1);
    }

    .entry.yellow:after {
        background: rgba(249, 233, 0, 1);
    }

    /* Animations are cool!  */
    @-webkit-keyframes moveFromTopFade {
        from {
            opacity: .3;
            height: 0px;
            margin-top: 0px;
            -webkit-transform: translateY(-100%);
        }
    }

    @-moz-keyframes moveFromTopFade {
        from {
            height: 0px;
            margin-top: 0px;
            -moz-transform: translateY(-100%);
        }
    }

    @keyframes moveFromTopFade {
        from {
            height: 0px;
            margin-top: 0px;
            transform: translateY(-100%);
        }
    }

    @-webkit-keyframes moveToTopFade {
        to {
            opacity: .3;
            height: 0px;
            margin-top: 0px;
            opacity: 0.3;
            -webkit-transform: translateY(-100%);
        }
    }

    @-moz-keyframes moveToTopFade {
        to {
            height: 0px;
            -moz-transform: translateY(-100%);
        }
    }

    @keyframes moveToTopFade {
        to {
            height: 0px;
            transform: translateY(-100%);
        }
    }

    @-webkit-keyframes moveToTopFadeMonth {
        to {
            opacity: 0;
            -webkit-transform: translateY(-30%) scale(.95);
        }
    }

    @-moz-keyframes moveToTopFadeMonth {
        to {
            opacity: 0;
            -moz-transform: translateY(-30%);
        }
    }

    @keyframes moveToTopFadeMonth {
        to {
            opacity: 0;
            -moz-transform: translateY(-30%);
        }
    }

    @-webkit-keyframes moveFromTopFadeMonth {
        from {
            opacity: 0;
            -webkit-transform: translateY(30%) scale(.95);
        }
    }

    @-moz-keyframes moveFromTopFadeMonth {
        from {
            opacity: 0;
            -moz-transform: translateY(30%);
        }
    }

    @keyframes moveFromTopFadeMonth {
        from {
            opacity: 0;
            -moz-transform: translateY(30%);
        }
    }

    @-webkit-keyframes moveToBottomFadeMonth {
        to {
            opacity: 0;
            -webkit-transform: translateY(30%) scale(.95);
        }
    }

    @-moz-keyframes moveToBottomFadeMonth {
        to {
            opacity: 0;
            -webkit-transform: translateY(30%);
        }
    }

    @keyframes moveToBottomFadeMonth {
        to {
            opacity: 0;
            -webkit-transform: translateY(30%);
        }
    }

    @-webkit-keyframes moveFromBottomFadeMonth {
        from {
            opacity: 0;
            -webkit-transform: translateY(-30%) scale(.95);
        }
    }

    @-moz-keyframes moveFromBottomFadeMonth {
        from {
            opacity: 0;
            -webkit-transform: translateY(-30%);
        }
    }

    @keyframes moveFromBottomFadeMonth {
        from {
            opacity: 0;
            -webkit-transform: translateY(-30%);
        }
    }

    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }
    }

    @-moz-keyframes fadeIn {
        from {
            opacity: 0;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
    }

    @-webkit-keyframes fadeOut {
        to {
            opacity: 0;
        }
    }

    @-moz-keyframes fadeOut {
        to {
            opacity: 0;
        }
    }

    @keyframes fadeOut {
        to {
            opacity: 0;
        }
    }

    @-webkit-keyframes fadeOutShink {
        to {
            opacity: 0;
            padding: 0px;
            height: 0px;
        }
    }

    @-moz-keyframes fadeOutShink {
        to {
            opacity: 0;
            padding: 0px;
            height: 0px;
        }
    }

    @keyframes fadeOutShink {
        to {
            opacity: 0;
            padding: 0px;
            height: 0px;
        }
    }


    .eventItem img {
        width: 100%;
        height: 50%;
        /* object-fit: contain; */
    }

    .eventItem .col-4 {
        background-color: #e5ede1;
        color: #224363;
    }

    .eventItem .col-4 p {
        text-align: justify;
    }

    .eventItem .fancybox {
        /* width: 100%; */
        height: 80px;
    }

    .eventItem .fancybox img {
        width: 99.5%;
        height: 100%;
        object-fit: cover;
    }

    .d-flex a {
        flex: 1 1 0;
    }

    form li {
        list-style: none;
        padding: 0.5rem;

    }

    form ul {
        justify-content: center;
        background: #83a573;

    }

    a {
        text-decoration:none
        color: white;
    }

    h4 {
        font-weight: 500
        
    }

    .panel-title {
        background: linear-gradient(45deg, #adda9a 0%, #DCC5EF 100%);
        letter-spacing: 2px;
        border-bottom: 1rem solid white;

    }

    .panel-title:hover {
        filter: hue-rotate(45deg);

    }

    /* .container>form>div {
        background-color: #ee609b;
        color: white;
        font-weight: 600;
        border-radius: 0.25rem;
    } */

    .eventItem button {
        border: 2px solid white;
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
        box-shadow: 0px 0px 20px rgb(0, 255, 191);
        border: 2px white solid;

    }

    .container .box .col-8 {
        background-image: url("./images/other/frame-02.svg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position:center;

    }

    .box>div>h3 {
        width: 100%;
    }
</style>

<body>
    <h3 class="c_pink_t m-5">
        <ul>
            <li>篩選壞掉</li>
            <li>資訊內容下方不要出現scroll</li>
            <li>暢銷排行</li>
            <li>設報名人數上限</li>

            <!-- <li>文字無法置中</li> -->

        </ul>
    </h3>
    <!-- <div class="container">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $qs['page'] = $page - 1;
                                                    echo http_build_query($qs); ?>">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 2; $i <= $page + 2; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                            $qs['page'] = $i;
                    ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?<?= http_build_query($qs) ?>"><?= $i ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $qs['page'] = $page + 1;
                                                    echo http_build_query($qs); ?>">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div> -->

    <div class="container">
        <div class="box row mt-5 mb-5 justify-content-between">
            <div class="box_calendar col-4 ">
                <div id="calendar" class=" "></div>
            </div>
            <div class="col-8 m-0 p-0 d-flex align-items-center ">
                <h3 class=" text-white m-0 t_shadow text-center rot-135" style="line-height: 200%;">
                    置身於紫色森林，放下生活的束縛，<br>打開心靈的耳朵，傾聽大自然的聲音，<br>欣賞得天獨厚的湖光山色，體驗到豐富的生態資源～<br><br>
                    薰衣草森林的探索與手作體驗，<br>以最初的心念，向旅人傳遞幸福，<br>尋回自己的夢想與勇氣，感受這座森林的紫色幸福！</h3>
            </div>
        </div>
        <div class=" m-0 p-0">
            <form action="event.php" method="get">
                <ul class="d-flex  m-0 p-2 ">
                    <li>
                        <select name='cat_id'>
                            <option value="">活動類別</option>
                            <?php
                            // foreach($event_category as $cat){
                            //     print("<option value='".$cat['id']."'>".$cat['name']."</option>");
                            // }
                            ?>
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

        <div class="container con01 m-0 p-0">
            <div class="eventItem  row p-0 m-0">
                <?php foreach ($events as $event) : ?>
                    <h2 class='text-center b-green rot-135 col-12 p-2 m-0' id="event_<?= $event['id']?>">
                        <?= $event['name'] ?>
                    </h2>

                    <div class='col-8 m-0 p-0'>
                        <div class='d-flex col-12 p-0 m-0'>
                            <img src='<?= WEB_ROOT ?>/images/event/<?= $event['event_id'] . '_1' ?>.jpg' alt=''>
                        </div>
                        <div class='d-flex col-12 p-0 m-0'>
                            <div class='fancybox d-flex justify-content-around p-0 m-0'>
                                <a href='<?= $event['video'] ?>' data-fancybox='F_box1' data-caption='qwe'>
                                    <img src='<?= WEB_ROOT ?>/images/event/<?= $event['event_id'] . '_2' ?>.jpg' alt=''>
                                </a>
                                <?php for ($i = 3; $i <= $event['img_count']; $i++) : ?>
                                    <a href='<?= WEB_ROOT ?>/images/event/<?= $event['event_id'] . '_' . $i ?>.jpg' data-fancybox='F_box1' data-caption='qwe'>
                                        <img src='<?= WEB_ROOT ?>/images/event/<?= $event['event_id'] . '_' . $i ?>.jpg' alt=''>
                                    </a>
                                <?php endfor; ?>

                            </div>
                        </div>
                    </div>
                    <div class='col-4 m-0 p-0 pop' id="event_<?= $event['id'] ?>">
                        <div class='col-12 p-3 m-0 '>
                            <h4>活動類別：
                                <?= $event["ec_name"] ?>
                            </h4>
                            <h4>日期：
                                <?= $event["date"] . '&emsp;' . $event["time"] ?>
                            </h4>
                            <h4>費用：<span class="c_pink_t">
                                    <?= $event["price"]  ?>
                                    <span>元</span>
                            </h4>


                            <br>
                            <p>
                                <?= $event["description"] ?>
                            </p>
                        </div>
                        <div class='col-12 p-0 m-0 priceBar01'>
                            <form class='' action='' method=''>
                                <div class='d-flex c_pink justify-content-around  p-2 '>
                                    <div class='d-flex align-items-center'>
                                        <label for='' class='m-0 pr-2'>
                                            <h4 class='m-0 p-0'>參加人數</h4>
                                        </label>
                                        <input type='number' value='1' min='1' max="<?= $event['limitNum'] ?>" name='quantity' id='quantity' style='width: 3rem; ' placeholder='1' class=''>
                                    </div>
                                    <button class='btn add-to-cart text-white m-0' type="button" style='background-color:#04c2ff' onclick="addToCart('<?= $event['id'] ?>')"><i class='fas fa-cart-plus'></i></button>
                                    <button class='btn text-white c_pink_b m-0 ' type="button"><i class='fas fa-heart' onclick="addToWishList('<?= $event['id'] ?>', 'event')"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class='panel-group col-12 m-0 p-0 ' id='accordion'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                <h4 class='panel-title m-0'>
                                    <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne<?= $event['id'] ?>'>
                                        <h4 class=' p-2 m-0 text-center' style="color:blue">
                                            <?= $event['title'] ?>
                                        </h4>
                                    </a>
                                </h4>
                            </div>
                            <div id='collapseOne<?= $event['id'] ?>' class='panel-collapse collapse in'>
                                <div class='panel-body'>
                                    <pre>
                                            <h4>報名資訊</h4> <p class='p-3　'><?= $event['info'] ?><?= $event['other'] ?></p>
                                        </pre>
                                </div>
                            </div>
                        </div>

                    </div>


                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/parts/scripts.php'; ?>

    <script>
        !(function() {
            var today = moment();

            function Calendar(selector, events) {
                this.el = document.querySelector(selector);
                this.events = events;
                this.current = moment().date(1);
                this.draw();
                var current = document.querySelector(".today");
                if (current) {
                    var self = this;
                    window.setTimeout(function() {
                        self.openDay(current);
                    }, 500);
                }
            }

            Calendar.prototype.draw = function() {
                //Create Header
                this.drawHeader();

                //Draw Month
                this.drawMonth();

                this.drawLegend();
            };

            Calendar.prototype.drawHeader = function() {
                var self = this;
                if (!this.header) {
                    //Create the header elements
                    this.header = createElement("div", "header");
                    this.header.className = "header";

                    this.title = createElement("h1");

                    var right = createElement("div", "right");
                    right.addEventListener("click", function() {
                        self.nextMonth();
                    });

                    var left = createElement("div", "left");
                    left.addEventListener("click", function() {
                        self.prevMonth();
                    });

                    //Append the Elements
                    this.header.appendChild(this.title);
                    this.header.appendChild(right);
                    this.header.appendChild(left);
                    this.el.appendChild(this.header);
                }

                this.title.innerHTML = this.current.format("MMMM YYYY");
            };

            Calendar.prototype.drawMonth = function() {
                var self = this;

                this.events.forEach(function(ev) {
                    ev.date = self.current.clone().date(Math.random() * (29 - 1) + 1);
                });

                if (this.month) {
                    this.oldMonth = this.month;
                    this.oldMonth.className = "month out " + (self.next ? "next" : "prev");
                    this.oldMonth.addEventListener("webkitAnimationEnd", function() {
                        self.oldMonth.parentNode.removeChild(self.oldMonth);
                        self.month = createElement("div", "month");
                        self.backFill();
                        self.currentMonth();
                        self.fowardFill();
                        self.el.appendChild(self.month);
                        window.setTimeout(function() {
                            self.month.className = "month in " + (self.next ? "next" : "prev");
                        }, 16);
                    });
                } else {
                    this.month = createElement("div", "month");
                    this.el.appendChild(this.month);
                    this.backFill();
                    this.currentMonth();
                    this.fowardFill();
                    this.month.className = "month new";
                }
            };

            Calendar.prototype.backFill = function() {
                var clone = this.current.clone();
                var dayOfWeek = clone.day();

                if (!dayOfWeek) {
                    return;
                }

                clone.subtract("days", dayOfWeek + 1);

                for (var i = dayOfWeek; i > 0; i--) {
                    this.drawDay(clone.add("days", 1));
                }
            };

            Calendar.prototype.fowardFill = function() {
                var clone = this.current.clone().add("months", 1).subtract("days", 1);
                var dayOfWeek = clone.day();

                if (dayOfWeek === 6) {
                    return;
                }

                for (var i = dayOfWeek; i < 6; i++) {
                    this.drawDay(clone.add("days", 1));
                }
            };

            Calendar.prototype.currentMonth = function() {
                var clone = this.current.clone();

                while (clone.month() === this.current.month()) {
                    this.drawDay(clone);
                    clone.add("days", 1);
                }
            };

            Calendar.prototype.getWeek = function(day) {
                if (!this.week || day.day() === 0) {
                    this.week = createElement("div", "week");
                    this.month.appendChild(this.week);
                }
            };

            Calendar.prototype.drawDay = function(day) {
                var self = this;
                this.getWeek(day);

                //Outer Day
                var outer = createElement("div", this.getDayClass(day));
                outer.addEventListener("click", function() {
                    self.openDay(this);
                });

                //Day Name
                var name = createElement("div", "day-name", day.format("ddd"));

                //Day Number
                var number = createElement("div", "day-number", day.format("DD"));

                //Events
                var events = createElement("div", "day-events");
                this.drawEvents(day, events);

                outer.appendChild(name);
                outer.appendChild(number);
                outer.appendChild(events);
                this.week.appendChild(outer);
            };

            Calendar.prototype.drawEvents = function(day, element) {
                if (day.month() === this.current.month()) {
                    var todaysEvents = this.events.reduce(function(memo, ev) {
                        if (ev.date.isSame(day, "day")) {
                            memo.push(ev);
                        }
                        return memo;
                    }, []);

                    todaysEvents.forEach(function(ev) {
                        var evSpan = createElement("span", ev.color);
                        element.appendChild(evSpan);
                    });
                }
            };

            Calendar.prototype.getDayClass = function(day) {
                classes = ["day"];
                if (day.month() !== this.current.month()) {
                    classes.push("craft");
                } else if (today.isSame(day, "day")) {
                    classes.push("today");
                }
                return classes.join(" ");
            };

            Calendar.prototype.openDay = function(el) {
                var details, arrow;
                var dayNumber = +el.querySelectorAll(".day-number")[0].innerText ||
                    +el.querySelectorAll(".day-number")[0].textContent;
                var day = this.current.clone().date(dayNumber);

                var currentOpened = document.querySelector(".details");

                //Check to see if there is an open detais box on the current row
                if (currentOpened && currentOpened.parentNode === el.parentNode) {
                    details = currentOpened;
                    arrow = document.querySelector(".arrow");
                } else {
                    //Close the open events on differnt week row
                    //currentOpened && currentOpened.parentNode.removeChild(currentOpened);
                    if (currentOpened) {
                        currentOpened.addEventListener("webkitAnimationEnd", function() {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener("oanimationend", function() {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener("msAnimationEnd", function() {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener("animationend", function() {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.className = "details out";
                    }

                    //Create the Details Container
                    details = createElement("div", "details in");

                    //Create the arrow
                    var arrow = createElement("div", "arrow");

                    //Create the event wrapper

                    details.appendChild(arrow);
                    el.parentNode.appendChild(details);
                }

                var todaysEvents = this.events.reduce(function(memo, ev) {
                    if (ev.date.isSame(day, "day")) {
                        memo.push(ev);
                    }
                    return memo;
                }, []);

                this.renderEvents(todaysEvents, details);

                arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + "px";
            };

            Calendar.prototype.renderEvents = function(events, ele) {
                //Remove any events in the current details element
                var currentWrapper = ele.querySelector(".events");
                var wrapper = createElement(
                    "div",
                    "events in" + (currentWrapper ? " new" : "")
                );

                events.forEach(function(ev) {
                    var div = createElement("div", "event");
                    var square = createElement("div", "event-category " + ev.color);
                    var span = createElement("span", "", ev.eventName);

                    div.appendChild(square);
                    div.appendChild(span);
                    wrapper.appendChild(div);
                });

                if (!events.length) {
                    var div = createElement("div", "event empty");
                    var span = createElement("span", "", "No Events");

                    div.appendChild(span);
                    wrapper.appendChild(div);
                }

                if (currentWrapper) {
                    currentWrapper.className = "events out";
                    currentWrapper.addEventListener("webkitAnimationEnd", function() {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener("oanimationend", function() {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener("msAnimationEnd", function() {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener("animationend", function() {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                } else {
                    ele.appendChild(wrapper);
                }
            };

            Calendar.prototype.drawLegend = function() {
                var legend = createElement("div", "legend");
                var calendars = this.events
                    .map(function(e) {
                        return e.calendar + "|" + e.color;
                    })
                    .reduce(function(memo, e) {
                        if (memo.indexOf(e) === -1) {
                            memo.push(e);
                        }
                        return memo;
                    }, [])
                    .forEach(function(e) {
                        var parts = e.split("|");
                        var entry = createElement("span", "entry " + parts[1], parts[0]);
                        legend.appendChild(entry);
                    });
                this.el.appendChild(legend);
            };

            Calendar.prototype.nextMonth = function() {
                this.current.add("months", 1);
                this.next = true;
                this.draw();
            };

            Calendar.prototype.prevMonth = function() {
                this.current.subtract("months", 1);
                this.next = false;
                this.draw();
            };

            window.Calendar = Calendar;

            function createElement(tagName, className, innerText) {
                var ele = document.createElement(tagName);
                if (className) {
                    ele.className = className;
                }
                if (innerText) {
                    ele.innderText = ele.textContent = innerText;
                }
                return ele;
            }
        })();

        !(function() {
            var data = [{
                    eventName: "祈福儀式",
                    calendar: "節慶",
                    color: "orange"
                },
                {
                    eventName: "薰衣草節",
                    calendar: "節慶",
                    color: "orange"
                },
                {
                    eventName: "🌲森林一畝田，心裡一畝田🌲",
                    calendar: "森林體驗",
                    color: "yellow"
                },
                {
                    eventName: "凍凍市集",
                    calendar: "節慶",
                    color: "orange"
                },

                {
                    eventName: "森林音樂會",
                    calendar: "音樂會",
                    color: "blue"
                },
                {
                    eventName: "森林音樂會",
                    calendar: "音樂會",
                    color: "blue"
                },
                {
                    eventName: "森林音樂會",
                    calendar: "音樂會",
                    color: "blue"
                },
                {
                    eventName: "森林音樂會",
                    calendar: "音樂會",
                    color: "blue"
                },

                {
                    eventName: "🌲森林探索家．來一趟自然的探索🌳",
                    calendar: "森林體驗",
                    color: "yellow"
                },
                {
                    eventName: "森林派對",
                    calendar: "森林體驗",
                    color: "yellow"
                },
                {
                    eventName: "森林野餐會",
                    calendar: "森林體驗",
                    color: "yellow"
                },
                {
                    eventName: "森林螢河旅行",
                    calendar: "森林體驗",
                    color: "yellow"
                },

                {
                    eventName: "午茶花課",
                    calendar: "手工藝",
                    color: "green"
                },
                {
                    eventName: "幸福臉譜-植物拼畫",
                    calendar: "手工藝",
                    color: "green"
                },
                {
                    eventName: "春日苔球",
                    calendar: "手工藝",
                    color: "green"
                },
                {
                    eventName: "手作花草餅乾",
                    calendar: "手工藝",
                    color: "green"
                }
            ];

            function addDate(ev) {}

            var calendar = new Calendar("#calendar", data);
        })();
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
        //  購物車
        function addToCart(id) {
			var type = "event";
            var qty = $("#event_" + id + " #quantity").val();
            if (confirm("確認訂購?")) {
                $.get('cart-api.php', {
                    action: 'add',
                    type: type,
                    id,
                    qty
                }, function(data) {
                    updateCartCount();
                });
            }
        }
        function addToWishList(id, type) {
			var type = "event";
            var qty = $("#event_" + id + " #quantity").val();
            if (confirm("確認加入追蹤?")) {
                $.post('wishList-api.php', {
                    action: 'add',
                    type: type,
                    id: id
                }, function(data) {
                    console.log(data);
                    updateWishListCount();
                }).fail(function(data) {
                    console.log(data);
                });
            }
        }
        function scroll(){
            console.log('test');
            if (location.href.indexOf("#event") > -1){
                window.scrollTo(0, window.scrollY - 80)
            }
        }
        scroll();
    </script>
    <script>
    $(document).ready(function() {
                if (location.search) {
            $('html, body').scrollTop(910);
        }
    });
    </script>
    <?php include __DIR__ . '/parts/html-foot.php'; ?>