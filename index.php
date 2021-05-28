<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林 Lavender Forest';
$pageName = 'index';
// $stmt = $pdo->query($sql);
// $events = $stmt->fetchAll();
// $sql = "SELECT * FROM `index`";
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    body .container:nth-child(2)>h3 {
        letter-spacing: 3px;
        line-height: 2.5rem;
    }

    body .container:nth-child(3) {
        margin: 2.5% auto;
    }

    /*======================= weather =========================*/

    table {
        background-color: rgb(95, 185, 173);
        color: rgb(255, 255, 255);
        width: 100%;
    }

    .tableOne {
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: .7rem;
    }

    .tableOne tbody td:nth-child(2) {
        background-color: darkcyan;
        font-weight: 900;
    }

    #WD img {
        width: 100%;
        padding-left: 5px
    }

    #WD {
        background-color: #E8E8EB;
    }

    #WDW {
        width: 50%;
        padding: 0.7rem;
        text-align: center;
        background-color: #E8E8EB;
        color: blue;
        font-size: 1.2rem;
        font-weight: 400;
    }

    .tableTwo {
        width: 100%;
        height: 100%;
    }

    .tableTwo h4 {
        vertical-align: middle;
    }

    .tableTwo th,
    td,
    p {
        padding: 3px;
        font-size: 0.9rem;
    }

    .tableTwo th,
    td {
        border: 1px solid white
    }

    .tableTwo th {
        width: 13%;
        text-align: center;
    }

    .tableTwo tbody th+td {
        width: 35%
    }

    .tableTwo li {
        list-style: none;

    }

    .c_1 h1,
    h3 {
        text-shadow: 0 0 0.2em #0000E3, 0 0 0.25em #9AFF02, -1px -1px white, 1px 1px rgb(26, 2, 94);
    }


    /* =========================== grid ========================== */
    .grid-container {
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
        grid-template-rows: 17.5% 17.5% 17.5% 17.5% 17.5%;
        gap: 0px 0px;
        grid-template-areas:
            "grid_01 grid_02 grid_03 grid_04"
            "grid_14 map map grid_05"
            "grid_13 map map grid_06"
            "grid_12 map map grid_07"
            "grid_11 grid_10 grid_09 grid_08";
    }

    .grid_01 {
        grid-area: grid_01;
    }

    .grid_02 {
        grid-area: grid_02;
    }

    .grid_03 {
        grid-area: grid_03;
    }

    .grid_04 {
        grid-area: grid_04;
    }

    .grid_05 {
        grid-area: grid_05;
    }

    .grid_06 {
        grid-area: grid_06;
    }

    .grid_07 {
        grid-area: grid_07;
    }

    .grid_08 {
        grid-area: grid_08;
    }

    .grid_09 {
        grid-area: grid_09;
    }


    .grid_10 {
        grid-area: grid_10;
    }

    .grid_11 {
        grid-area: grid_11;
    }

    .grid_12 {
        grid-area: grid_12;
    }

    .grid_13 {
        grid-area: grid_13;
    }

    .grid_14 {
        grid-area: grid_14;
    }

    .map {
        grid-area: map;
        background-image: url("images/map/map_01.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }

    .big .radioArea {
        position: absolute;
    }

    .grid-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .small {
        overflow: hidden;
        border: white 5px solid;
        text-align: center;
        position: relative;
    }


    .push-2 {
        display: flex;
        align-items: center;
        position: absolute;
        pointer-events: none;
    }

    .push-2 h4 {
        width: 100%;
        line-height: 2rem;
    }

    .box {
        width: 100%;
        margin: 0 auto;
        position: relative;
    }

    input[type='radio']:after {
        width: 1.5625rem;
        height: 1.5625rem;
        border-radius: 1.5625rem;
        top: -2px;
        left: -2px;
        position: relative;
        background-color: #9AFF02;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid orange;
    }

    input[type='radio']:checked:after {
        width: 1.5625rem;
        height: 1.5625rem;
        border-radius: 1.5625rem;
        top: -2px;
        left: -2px;
        position: relative;
        background-color: #FF9100;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid #9AFF02;
    }


    .radioArea>input:nth-child(1) {
        position: absolute;
        top: 185px;
        left: 250px;
    }

    .radioArea>input:nth-child(2) {
        position: absolute;
        top: 200px;
        left: 360px;
    }

    .radioArea>input:nth-child(3) {
        position: absolute;
        top: 190px;
        left: 490px;
    }

    .radioArea>input:nth-child(4) {
        position: absolute;
        top: 265px;
        left: 475px;
    }

    .radioArea>input:nth-child(5) {
        position: absolute;
        top: 340px;
        left: 410px;
    }

    .radioArea>input:nth-child(6) {
        position: absolute;
        top: 445px;
        left: 515px;
    }

    .radioArea>input:nth-child(7) {
        position: absolute;
        top: 525px;
        left: 400px;
    }

    .radioArea>input:nth-child(8) {
        position: absolute;
        top: 605px;
        left: 585px;
    }

    .radioArea>input:nth-child(9) {
        position: absolute;
        top: 685px;
        left: 590px;
    }

    .radioArea>input:nth-child(10) {
        position: absolute;
        top: 765px;
        left: 575px;
    }

    .radioArea>input:nth-child(11) {
        position: absolute;
        top: 795px;
        left: 365px;
    }

    .radioArea>input:nth-child(12) {
        position: absolute;
        top: 650px;
        left: 300px;
    }

    .radioArea>input:nth-child(13) {
        position: absolute;
        top: 480px;
        left: 175px;
    }

    .radioArea>input:nth-child(14) {
        position: absolute;
        top: 250px;
        left: 300px;
    }

    .carousel-inner img {
        width: 100%;
    }
    /* ================================================================ */
    .cover {
    height: 100%;
    width: 100%;
    position: relative;
    z-index: 98;
}

.blur-in {
    animation: blur 2s forwards;
}

.blur-out {
    animation: blur-out 2s forwards;
}



@keyframes blur {
    0% {
        filter: blur(0px);
    }

    100% {
        filter: blur(4px);
        opacity:0.3;
        background-color:lightgray
    }
}


@keyframes blur-out {
    0% {
        filter: blur(4px);
    }

    100% {
        filter: blur(0px);
    }
}


.box span {
    color: dimgray;
}

.pop-up {
    position: fixed;
    top:10%;
    left:50%;
    margin-left:-250px;
    height:100%;
    z-index: 99;

}

.box1 {
    background-color: whitesmoke;
    position: absolute;
    box-shadow: 0px 0px 15px #666E9C;
    -webkit-box-shadow: 0px 0px 15px #666E9C;
    -moz-box-shadow: 0px 0px 15px #666E9C;
    border-radius:2.5%


}

.pop-up .button:hover {
    background-color: #7CCF29;
    -webkit-box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
    -moz-box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
    box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
}

.close-button {
    transition: all 0.5s ease;
    position: absolute;
    Z-index:100;
    background-color: #FF9980;
    padding: 1.5px 7px;
    right:1%;
    top:1%;
    border-radius: 50%;
    border: 2px solid #fff;
    color: white;
    -webkit-box-shadow: -4px -2px 6px 0px rgba(0,0,0,0.1);
    -moz-box-shadow: -4px -2px 6px 0px rgba(0,0,0,0.1);
    box-shadow: -3px 1px 6px 0px rgba(0,0,0,0.1);
}

.close-button:hover {
    background-color: orange;
    color: #fff;
}



.pop-up p {
    padding: 2.5%;
    color: dimgray;
}

.pop-up .small-6{
  width: 500px;

}
.card-footer{
    border-radius:5%

}
</style>

<main>
    <div id="overlay" class="cover blur-in">

        <div id="slider" class=" owl-carousel owl-theme">
            <img src="./images/album/hill/hill_3.jpg">
            <img src="./images/album/hill/hill_4.jpg">
            <img src="./images/album/garden/garden_21.jpg">
            <img src="./images/album/garden/garden_23.jpg">
            <img src="./images/album/forest/forest_1.jpg">
            <img src="./images/album/forest/forest_2.jpg">
            <img src="./images/album/forest/forest_18.jpg">
            <img src="./images/album/farm/farm_10.jpg">
            <img src="./images/album/farm/farm_11.jpg">
            <img src="./images/album/carousel/carousel_1.jpg">
            <img src="./images/album/carousel/carousel_5.jpg">
            <img src="./images/album/carousel/carousel_6.jpg">
        </div>

        <!-- <div class='fancybox '>
            <?php for ($i = 1; $i <= $index['img_count']; $i++) : ?>
                <a href='<?= WEB_ROOT ?>/images/album/<?= $index[' farm_id'] . '_' . $i ?>.jpg' data-fancybox='F_box1' data-caption='qwe'>
                    <img src='<?= WEB_ROOT ?>/images/album/<?= $index[' farm_id'] . '_' . $i ?>.jpg' alt=''>
                </a>
            <?php endfor; ?>
        </div> -->

        <div class="container c_1 mt-5 mb-5">
            <h1 class=" text-center m-0 text-white ">．Lavender Forest． </h1>
            <h3 class="poetry1 text-center text-white m-0 ">
                落居環山之間，坐擁森林綠意，<br>湖畔與甜美薰衣草之印象，詮釋著森林的恬靜，<br>微風緩緩吹過樹梢，喜樂的鳥兒在歌唱! <br>暖和的陽光灑落薰衣草田，花朵在四季中輪流綻放...<br>無論是日昇的幸福山丘或是月落的山巒綠意，<br>都是旅行的幸福印記…</h3>
            <h3 class="poetry2 text-center text-white m-0 ">
                落居環山之間，坐擁森林綠意，<br>湖畔與甜美薰衣草之印象，<br>詮釋著森林的恬靜，<br>微風緩緩吹過樹梢，<br>喜樂的鳥兒在歌唱!<br>暖和的陽光灑落薰衣草田，<br>無論是日昇的幸福山丘，<br>或是月落的山巒綠意，<br>都是旅行的幸福印記…</h3>

        </div>



        <div class="container row ">
            <div class="tableOne col-sm-12 col-md-6 col-lg-6 p-2">
                <h3 class="text-center text-white b-green rot-135 col-12 p-3 m-0" style="background-color: rgb(95, 185, 173);"> 台中市 新社區 天氣</h3>
                <table>

                    <tbody>
                        <tr>
                            <th id="WD" colspan="4" scope="col"></th>
                            <th id="WDW" colspan="4" scope="col"></th>
                        </tr>
                        <tr>
                            <td rowspan="2" scope="col">日期</td>
                            <td class="bT" id="date1" scope="col"></td>
                            <td class="bT" id="date2" scope="col"></td>
                            <td class="bT" id="date3" scope="col"></td>
                            <td class="bT" id="date4" scope="col"></td>
                            <td class="bT" id="date5" scope="col"></td>
                            <td class="bT" id="date6" scope="col"></td>
                            <td class="bT" id="date7" scope="col"></td>
                        </tr>
                        <tr>
                            <td class="dbox" scope="col" style="text-align: center; background-color: darkcyan; font-weight:900;">
                            </td>
                            <td class="dbox" scope="col" style="background-color:rgb(95, 185, 173)"></td>
                            <td class="dbox" scope="col"></td>
                            <td class="dbox" scope="col"></td>
                            <td class="dbox" scope="col"></td>
                            <td class="dbox" scope="col"></td>
                            <td class="dbox" scope="col"></td>
                        </tr>
                        <tr>
                            <td scope="col" class="p-1">天氣圖</td>
                            <td id="day_weather1" scope="col" style="text-align: center;"></td>
                            <td id="day_weather3" scope="col"></td>
                            <td id="day_weather5" scope="col"></td>
                            <td id="day_weather7" scope="col"></td>
                            <td id="day_weather9" scope="col"></td>
                            <td id="day_weather11" scope="col"></td>
                            <td id="day_weather13" scope="col"></td>
                        </tr>
                        <tr>
                            <td scope="col" class="p-1">白天 °C</td>
                            <td id="DT1" scope="col"></td>
                            <td id="DT2" scope="col"></td>
                            <td id="DT3" scope="col"></td>
                            <td id="DT4" scope="col"></td>
                            <td id="DT5" scope="col"></td>
                            <td id="DT6" scope="col"></td>
                            <td id="DT7" scope="col"></td>
                        </tr>
                        <tr>
                            <td scope="col" class="p-1">晚上 °C</td>
                            <td id="NT1" scope="col"></td>
                            <td id="NT2" scope="col"></td>
                            <td id="NT3" scope="col"></td>
                            <td id="NT4" scope="col"></td>
                            <td id="NT5" scope="col"></td>
                            <td id="NT6" scope="col"></td>
                            <td id="NT7" scope="col"></td>
                        </tr>
                        <tr>
                            <td scope="col" class="p-1">降雨 ％</td>
                            <td id="DP1" scope="col"></td>
                            <td id="DP2" scope="col"></td>
                            <td id="DP3" scope="col"></td>
                            <td id="DP4" scope="col"></td>
                            <td id="DP5" scope="col"></td>
                            <td id="DP6" scope="col"></td>
                            <td id="DP7" scope="col"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tableTwo col-sm-12 col-md-6 col-lg-6 p-2">
                <h3 class="text-center text-white b-green rot-135 col-12 p-3 m-0" style="background-color: rgb(95, 185, 173);"> 薰衣草入園須知</h3>
                <table>
                    <tbody>
                        <tr>
                            <th style="height:3rem">票別</th>
                            <td>不分假日</td>
                            <td rowspan="3" class="pt-3 pb-3">
                                <p>＊週一至週五&#160;10：30&#160;-&#160;18：30</p>
                                <p>＊週六至週日&#160;10：00&#160;-&#160;18：30</p>
                                <p>＊營業時間如有微幅調整以現場公告為主。如遇天氣等不可抗力之因素，本園區將另行公告開/關園時間。</p>
                                <p>＊提醒來玩的朋友，園區禁菸、禁帶外食！並因戶外園區蚊蟲較多，</p>
                                <p>＊可自備防蚊液，並穿著平底鞋是比較適合的</p>
                                <p>＊可現場購買優待票種之身份（優待票20元）：</p>
                            </td>
                        </tr>
                        <tr>
                            <th style="height:3rem">入園券</th>
                            <td>
                                <p>$100( 可折抵消費 )</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="">免費入園</th>
                            <td style="">
                                <p>＊8歲以下孩童</p>
                                <p>＊65歲以上長輩</p>
                                <p>＊好厝邊/鄰里里民</p>
                                <p>＊領有身心障礙手冊者及一名陪同</p>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="pt-3 pm-3 c_pink">
                                <ul> 
                                    <li><h4 class="">※ 加入會員，填寫完整資料，即贈門票和生日禮！</h4></li>
                                    <li><h4 class="">※ 加購～享折扣優惠！</h4>
                                        <ul style="text-indent : -0.6rem">
                                            <li>購買（活動+住宿），可享85折優惠！用餐也享有85折優惠</li>
                                            <li>購買住宿/活動之一，享有用餐9折優惠</li>
                                        </ul>
                                    </li> 
                                    <li><h4>※ 醫護人員入園免費，及森林咖啡館用 8 折！</h4></li>       
                                </ul>
                       
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container ">

        </div>
        <div class="box">
            <h3 class="text-center text-white b-green rot-135 col-12 p-3 m-0" style="background-color: rgb(95, 185, 173);"> 薰衣草森林 園區介紹</h3>
            <div class="grid-container">

                <div class="small grid_01">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">心中一畝田</h4>
                    <div class="push-2">
                        <h4>尊重自然，以友善大地的方式，<br>在山上自己種、自己吃，<br>感謝大自然給予的食物。 <br>看著植物努力扎根，<br>我們也找到自己想要的生活樣貌。</h4>
                    </div>

                    <img src="./images/album/farm/farm_1.jpg" data-toggle="modal" data-target="#myModal_1">
                    <div class="modal fade" id="myModal_1">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/farm/farm_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/farm/farm_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/farm/farm_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="small grid_02">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">初衷小屋</h4>
                    <div class="push-2">
                        <h4 class="">親手蓋一棟屋子，<br>是森林人目前最大的手作體驗，<br>希望以最初的心念，<br>向旅人傳遞幸福，<br>尋回自己的夢想與勇氣</h4>
                    </div>
                    <img src="./images/album/craft/craft_1.jpg" data-toggle="modal" data-target="#myModal_2">
                    <div class="modal fade" id="myModal_2">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/craft/craft_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/craft/craft_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/craft/craft_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_03">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">森林秘境</h4>
                    <div class="push-2">
                        <h4 class="">那樣原始、擁抱森林初始氣息的步道，<br>讓沉澱地思緒尋覓安靜的落腳處，就在眼前。</h4>
                    </div>
                    <img src="./images/album/forest/forest_1.jpg" data-toggle="modal" data-target="#myModal_3">
                    <div class="modal fade" id="myModal_3">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/forest/forest_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/forest/forest_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/forest/forest_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_04">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">肖楠之境</h4>
                    <div class="push-2">
                        <h4 class="">森林是一座無牆美術館，<br>不同季節時刻<br>形塑動植物與生態環境的多元樣貌<br>是大自然最美的藝術作品</h4>
                    </div>
                    <img src="./images/album/gallery/gallery_1.jpg" data-toggle="modal" data-target="#myModal_4">
                    <div class="modal fade" id="myModal_4">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/gallery/gallery_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/gallery/gallery_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/gallery/gallery_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_05">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">旋轉木馬</h4>
                    <div class="push-2">
                        <h4 class="">在轉動旋轉木馬欄杆旁，<br>看見了幸福的場景。<br>戀人們手拉著手，父母緊緊地擁著孩子，<br>騎著木馬在數不清的燦爛小燈泡間，<br>此起彼落的奔跑著，<br>從真實世界躍入夢幻的童話空間裡。</h4>
                    </div>
                    <img src="./images/album/carousel/carousel_1.jpg" data-toggle="modal" data-target="#myModal_5">
                    <div class="modal fade" id="myModal_5">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/carousel/carousel_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/carousel/carousel_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/carousel/carousel_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_06">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">紫色希望之丘</h4>
                    <div class="push-2">
                        <h4 class="">點杯花草茶或咖啡，<br>坐下來享受樹林的芬多精，<br>或漫步在紫丘的薰衣草田步道，<br>跟著飛躍在花田的蝴蝶共舞。 </h4>
                    </div>
                    <img src="./images/album/hill/hill_1.jpg" data-toggle="modal" data-target="#myModal_6">
                    <div class="modal fade" id="myModal_6">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/hill/hill_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/hill/hill_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/hill/hill_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_07">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">年輪郵局</h4>
                    <div class="push-2">
                        <h4 class="">生命的故事及情感的刻畫，<br>每個旅人都是一棵有年輪的樹。<br>手寫明信片是一種豐饒心靈的儀式，<br>年輪郵局的明信片，是一張張的小森林，<br>乘載著旅人的字跡與祝福，寄給心裡重要的人。</h4>
                    </div>
                    <img src="./images/album/post/post_1.jpg" data-toggle="modal" data-target="#myModal_7">

                    <div class="modal fade" id="myModal_7">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/post/post_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/post/post_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/post/post_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_08">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">森林咖啡館</h4>
                    <div class="push-2">
                        <h4 class="">放下生活的束縛，<br>打開心靈的耳朵，<br>傾聽大自然的聲音，<br>森林咖啡館提供您，<br>新鮮香草入味的風味餐/飲品/及點心</h4>
                    </div>
                    <img src="./images/album/cafe/cafe_1.jpg" data-toggle="modal" data-target="#myModal_8">
                    <div class="modal fade" id="myModal_8">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/cafe/cafe_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/cafe/cafe_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/cafe/cafe_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_09">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">淨身儀式</h4>
                    <div class="push-2">
                        <h4 class="">入園後右手邊即可看到淨身儀式噴霧器，<br>將手掌放在玻璃板上，<br>噴霧器便會噴灑具香味的薰衣草水，<br>可以釋放身心，並重新獲得能量。</h4>
                    </div>
                    <img src="./images/album/shower/shower_1.jpg" data-toggle="modal" data-target="#myModal_9">

                    <div class="modal fade" id="myModal_9">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/shower/shower_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/shower/shower_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/shower/shower_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_10">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">香草鋪子</h4>
                    <div class="push-2">
                        <h4 class="">每個夢想，<br>都需要發芽的空間。<br>薰衣草森林在成長茁壯的同時，<br>也想幫助更多美好的夢想。</h4>
                    </div>
                    <img src="./images/album/shop/shop_1.jpg" data-toggle="modal" data-target="#myModal_10">
                    <div class="modal fade" id="myModal_10">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/shop/shop_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/shop/shop_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/shop/shop_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="big map">
                    <div class="radioArea">
                        <input type="radio" name="radio" id="radio01">
                        <input type="radio" name="radio" id="radio02">
                        <input type="radio" name="radio" id="radio03">
                        <input type="radio" name="radio" id="radio04">
                        <input type="radio" name="radio" id="radio05">
                        <input type="radio" name="radio" id="radio06">
                        <input type="radio" name="radio" id="radio07">
                        <input type="radio" name="radio" id="radio08">
                        <input type="radio" name="radio" id="radio09">
                        <input type="radio" name="radio" id="radio10">
                        <input type="radio" name="radio" id="radio11">
                        <input type="radio" name="radio" id="radio12">
                        <input type="radio" name="radio" id="radio13">
                        <input type="radio" name="radio" id="radio14">
                    </div>
                </div>

                <div class="small grid_11">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">入口</h4>
                    <div class="push-2">
                        <h4 class="">歡迎來到薰衣草森林，<br>為了讓您呼吸新鮮空氣，森林裡暫時不要吸菸<br>為了享受森林經典餐點，不帶外食<br>請將悲傷、憤怒、憂愁、沮喪丟到一旁，<br>好好享受森林的時光…祝您遊園愉快！</h4>
                    </div>
                    <img src="./images/album/entrance/entrance_1.jpg" data-toggle="modal" data-target="#myModal_11">
                    <div class="modal fade" id="myModal_11">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/entrance/entrance_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/entrance/entrance_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/entrance/entrance_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_12">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">葛雷斯花園＆香草市集</h4>
                    <div class="push-2">
                        <h4 class="">融合了熱帶植物及台灣原生植物的英國式花園。<br>內有梅花、櫻花、油桐、杉樹及樹上的各種鳥屋，<br>花園旁設置有咖啡座。<br>露天的市集裡販賣浴鹽、手工皂以及紀念商品，<br>營造歐洲市集的休閒氛圍。</h4>
                    </div>
                    <img src="./images/album/garden/garden_1.jpg" data-toggle="modal" data-target="#myModal_12">
                    <div class="modal fade" id="myModal_12">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/garden/garden_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/garden/garden_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/garden/garden_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_13">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">森林島嶼＆<br>Lavender Forest House</h4>
                    <div class="push-2">
                        <h4 class="">森林裡的童話小屋，有香氣的氛圍流竄，<br>提供各類香草清潔保養品，香草花茶、香氛香體用品　<br>
                            簡單樸實的山居生活，將<br>原初夢想的森林生活落實成為生活空間。<br>放慢腳步感受這生活中難得的寧靜。<br>推開窗外，嗅嗅甜甜的香草香氣，<br>原來這就是簡單生活中的小小幸福。</h4>
                    </div>
                    <img src="./images/album/island/island_1.jpg" data-toggle="modal" data-target="#myModal_13">
                    <div class="modal fade" id="myModal_13">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/island/island_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/island/island_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/island/island_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small grid_14">
                    <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white ">許願樹＆森林平台</h4>
                    <div class="push-2">
                        <h4 class="">將願望寫在許願卡，<br>掛在許願樹周圍的欄杆上，<br>然後在樹下誠心許願，敲響許願鐘，<br>讓你的願望也能早日實現。</h4>
                    </div>
                    <img src="./images/album/tree/tree_1.jpg" data-toggle="modal" data-target="#myModal_14">
                    <div class="modal fade" id="myModal_14">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/tree/tree_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/tree/tree_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/tree/tree_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="row pop-up ">
        <div class="box1 small-6 large-centered" >
            <h4 class="title text-center m-0">🌲森林防疫懶人包🌲</h4>
            <a href="#" class="close-button">&#10006;</a>

            <div class="card">

                <div class="card-body">
                    <p class="card-text">薰衣草森林兩園區照常營業，但目前防疫為首要任務，請旅人來訪時，遵循以下守則：</p>
                    <p class="card-text">✅入園時<br>step 1.測量體溫<br>step 2.噴灑酒精<br>step 3.填寫實名制表單，並將提交畫面交給園區夥伴確認<br>step 4.購票入園</p>                  
                    <p class="card-text">✅在園區<br>- 保持社交距離<br>- 除用餐時全程配戴口罩<br>- 勤洗手</p>
                    <p class="card-text">兩園區面積廣闊，有足夠的空間供旅人遊覽，可以盡情與植物連結再連結，但防疫要當心，照顧自己也照顧別人，出外要小心，才能大盡興，薰衣草森林關心您。</p>
                </div>
                <div class="card-footer">
                <div class="text-muted"><span style="font-weight:700">※ 醫護人員入園免費，及森林咖啡館用 8 折 </span><br>※ 繡球花節，活動期間4/17~6/30<br>※ 目前園區花卉還有 #鼠尾草 #追風草 #小天使花～</p></div>
                </div>
            </div>

        </div>
  </div>



</main>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    //=============== weather ====================
    var dayNames = ["日", "一", "二", "三", "四", "五", "六"];
    const dbox = $('.dbox');
    const today = new Date().getDay();

    $(document).ready(function() {

        for (let i = 0; i < dbox.length; i++) {
            let j = (today + i) % 7;
            dbox.eq(i).text(dayNames[j]);
        }
    })



    $(document).ready(function() {
        let now = new Date();
        let j = 1,
            k = 1,
            m = 1,
            n = 1,
            o = 1,
            z = 1;
        $.get(
            "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-075?Authorization=CWB-F5E9FA71-D4C6-46F3-A222-584C369CC864&locationName=%E6%96%B0%E7%A4%BE%E5%8D%80",
            function(objJson) {
                for (
                    let i = 0; i <
                    objJson.records.locations[0].location[0].weatherElement[0].time.length; i++
                ) {
                    let startTime =
                        objJson.records.locations[0].location[0].weatherElement[0].time[i]
                        .startTime;
                    let value =
                        objJson.records.locations[0].location[0].weatherElement[12].time[i]
                        .elementValue[0].value;
                    let valueN =
                        objJson.records.locations[0].location[0].weatherElement[8].time[i]
                        .elementValue[0].value;

                    let weather =
                        objJson.records.locations[0].location[0].weatherElement[6].time[i]
                        .elementValue[1].value;
                    let rain =
                        objJson.records.locations[0].location[0].weatherElement[0].time[i]
                        .elementValue[0].value;


                    //===================== 日期 =====================
                    date_str = startTime.substring(5, 10)
                    if (i % 2 == 1) {
                        $("#date" + j).text(date_str);
                        j++;
                    }

                    //===================== 氣溫 =====================
                    T_str = value.substring(0, 2);
                    if (i % 2 == 0) {
                        $("#DT" + k).text(T_str);
                        k++;
                    }
                    TN_str = valueN.substring(0, 2);
                    if (i % 2 == 0) {
                        $("#NT" + m).text(TN_str);
                        m++;
                    }
                    //===================== 降雨機率 =====================
                    P_str = rain.substring(0, 2)
                    if (i % 2 == 0) {
                        $("#DP" + n).text(P_str);
                        n++;
                    }

                    //===================== 氣象圖 =====================

                    if (weather > 0 && weather <= 1) {
                        $("#day_weather" + z).append('<img src="./images/weather/sun.svg">');
                    } else if (weather >= 2 && weather <= 3) {
                        $("#day_weather" + z).append('<img src="./images/weather/SunC.svg">');
                    } else if (weather >= 4 && weather <= 7) {
                        $("#day_weather" + z).append('<img src="./images/weather/cloudy.svg">');
                    } else if (weather >= 8 && weather <= 14) {
                        $("#day_weather" + z).append('<img src="./images/weather/rain.svg">');
                    } else if (weather = 15) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCLS.svg">');
                    } else if (weather >= 16 && weather <= 18) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCL.svg">');
                    } else if (weather = 19) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainS.svg">');
                    } else if (weather = 20) {
                        $("#day_weather" + z).append('<img src="./images/weather/rain.gif">');
                    } else if (weather = 21) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCLS.svg">');
                    } else if (weather = 22) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCL.svg">');
                    } else if (weather >= 23) {
                        $("#day_weather" + z).append('<img src="./images/weather/snow.svg">');
                    } else if (weather >= 24 && weather <= 26) {
                        $("#day_weather" + z).append('<img src="./images/weather/sunC.svg">');
                    } else if (weather >= 27 && weather <= 28) {
                        $("#day_weather" + z).append('<img src="./images/weather/cloudy.svg">');
                    } else if (weather >= 29 && weather <= 32) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainS.svg">');
                    } else if (weather >= 33 && weather <= 36) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCL.svg">');
                    } else if (weather = 37) {
                        $("#day_weather" + z).append('<img src="./images/weather/snow.svg">');
                    } else if (weather >= 38 && weather <= 39) {
                        $("#day_weather" + z).append('<img src="./images/weather/rain.svg">');
                    } else if (weather = 41) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCL.svg">');
                    }
                    z++;

                }

                let weather =
                    objJson.records.locations[0].location[0].weatherElement[6].time[0]
                    .elementValue[1].value;
                weather = parseInt(weather);
                // console.log('weather:', weather)
                if (weather > 0 && weather <= 1) {
                    $("#WD").append('<img src="./images/weather/B_sunny01.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是大晴天<br><i class="fas fa-paw"></i>^_^ <br>記得多喝水和防曬喔!   <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 2 && weather <= 3) {
                    $("#WD").append('<img src="./images/weather/B_sunC.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是晴時多雲<br><i class="fas fa-paw"></i> <br>記得多喝水和防曬喔!   <br> <i class="fas fa-grin"></i> ');
                } else if (weather >= 4 && weather <= 7) {
                    $("#WD").append('<img src="./images/weather/B_cloud.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是陰天多雲<br><i class="fas fa-paw"></i> <br>也要注意紫外線和防曬喔!   <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 8 && weather <= 14) {
                    $("#WD").append('<img src="./images/weather/B_rain01.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有短暫陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!   <br> <i class="fas fa-grin"></i> ');
                } else if (weather = 15) {
                    $("#WD").append('<img src="./images/weather/B_storm.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有雷陣雨  <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i> ');
                } else if (weather >= 16 && weather <= 18) {
                    $("#WD").append('<img src="./images/weather/B_storm.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有雷陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i> ');
                } else if (weather = 19) {
                    $("#WD").append('<img src="./images/weather/B_rain01.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有晴午後局部陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather = 20) {
                    $("#WD").append('<img src="./images/weather/B_rain01.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有多雲午後陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i> ');
                } else if (weather = 21) {
                    $("#WD").append('<img src="./images/weather/B_storm.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有晴午後雷陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather = 22) {
                    $("#WD").append('<img src="./images/weather/B_storm.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有多雲時晴雷陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 23) {
                    $("#WD").append('<img src="./images/weather/B_snow4.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是晴有雨或雪<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 24 && weather <= 26) {
                    $("#WD").append('<img src="./images/weather/B_sunC.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是晴時多雲有霧<br><i class="fas fa-paw"></i> <br>也要注意紫外線和防曬喔!   <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 27 && weather <= 28) {
                    $("#WD").append('<img src="./images/weather/B_cloud.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是多雲時陰晨霧<br><i class="fas fa-paw"></i> <br>要注意路況，小心行駛喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 29 && weather <= 32) {
                    $("#WD").append('<img src="./images/weather/B_rain01.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有多雲局部陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 33 && weather <= 36) {
                    $("#WD").append('<img src="./images/weather/B_storm.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有陰時多雲局部陣雨或雷雨有霧<br><i class="fas fa-paw"></i> <br>天氣變化大，出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather = 37) {
                    $("#WD").append('<img src="./images/weather/B_snow.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有雨或雪有霧<br><i class="fas fa-paw"></i> <br><br>天氣變化大，出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 38 && weather <= 39) {
                    $("#WD").append('<img src="./images/weather/B_rain01.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有短暫雨有霧<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i>');
                } else {
                    $("#WD").append('<img src="./images/weather/B_storm.gif">');
                    $("#WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林可能會有下雪、積冰、暴風雪<br><i class="fas fa-paw"></i>, <br>出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                }
                // console.log('weather:', weather)
            }

        );

    });
</script>
<script>
    $('input[type="radio"]').change(function() {
        $(".small").css({
            "border": ""
        });
        var number = this.id.replace("radio", "");
        console.log(this);
        $(".grid_" + number)[0].style = " border:10px solid orange;border-radius:10px"
    });
</script>
<script>
$(function() {
  $('.pop-up').hide();
  $('.pop-up').fadeIn(1000);
  
      $('.close-button').click(function (e) { 

      $('.pop-up').fadeOut(700);
      $('#overlay').removeClass('blur-in');
      $('#overlay').addClass('blur-out');
      e.stopPropagation();
        
    });
 });
</script>





<?php include __DIR__ . '/parts/html-foot.php'; ?>