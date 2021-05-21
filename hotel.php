<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = 'Lavendar Room';
$pageName = 'hotel';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    .container {
        margin: 0 auto;
    }

    .banner img {
        width: 100%;
    }

    .container h1+h3 {
        line-height: 2rem;
        letter-spacing: 2px;
    }

    /* ===================== room ===================== */

    .pic_demo {
        width: 100%;
        padding: 0;
    }

    .pic_demo img {
        width: 100%;
        object-fit: cover;
    }

    .pic_small {
        width: 100%;
        justify-content: space-evenly;

    }

    .pic_piece {
        padding: 0.5rem;
    }

    .pic_piece img {
        width: 100%;
    }

    #doubleRoom {
        width: 100%;
        border: #eff2f6 3px solid;
    }

    .amenities {
        margin: 2rem 0px;

    }

    .amenities ul li::before {
        content: "";
        background-image: url("./images/icon/checkmark.svg");
        display: inline-block;
        width: 15px;
        height: 15px;
        background-size: contain;
        margin-right: 5px;
    }

    #myTabContent .card-body {
        background-color: #ee609b;
        color: white;
        border-radius: 0.25rem;
    }

    /* ===================== reservation ===================== */

    /* #myTab li {
            border-radius: 10px 10px 0 0;
            margin-right: 2px;
            padding: 1rem;
            background-color: rgb(194, 218, 226);
        }

        #myTab li:hover {
            background: linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#499bea', endColorstr='#1abc9c', GradientType=1);
        }

        #myTab li a {
            color: white;
            list-style: none;
            text-decoration: none;

        } */

    /* ===================== reservation ===================== */

    table {
        border: 1px solid #cfdef1;
        vertical-align: middle;
        text-align: center;
        font-size: 1rem;
        margin: 0 auto;


    }

    table th,
    tr.td {
        height: 1.5rem;
        padding: 0;
    }

    table>img {
        width: 5rem;
        height: auto;
    }

    table span {
        display: inline-block;
        margin: 0 1rem;
    }

    table i {
        margin: 0 1rem;
    }

    table input {
        margin: 0 1rem;
    }

    table .status {
        background-color: #eff2f6;

    }

    table .block table>tr>th>span {
        display: block;
    }

    table .status span img {
        width: 2rem;
        padding-right: 0 1rem;
        margin: 0;

    }

    table .status span {
        justify-content: space-around;
    }

    .container>form>div {
        background-color: #ee609b;
        color: white;
        font-weight: 600;
        padding: 0rem;
        border-radius: 0.25rem;
    }

    .container>form>div>div {
        margin-left: 1.5rem;
        margin: 0 auto;

    }

    .c_1 h1,
    h3 {
        text-shadow: 0 0 0.2em #0000E3, 0 0 0.25em #9AFF02, -1px -1px white, 1px 1px rgb(26, 2, 94);
    }

    #notes h4 {
        color: #0000e386;
    }

    .priceBar button {
        border: 2px white solid;
    }

    input:hover {
        box-shadow: 0px 0px 20px rgb(0, 255, 191);
        border: 2px white solid;
    }
</style>
</head>

<body>

    <div id="slider" class=" owl-carousel owl-theme">
        <img src="./images/hotel/banner_01.jpg">
        <img src="./images/hotel/banner_02.png">
        <img src="./images/hotel/banner_03.jpg">
    </div>

    <div class="container c_1 mt-5 mb-5">
        <h1 class=" text-center m-0 text-white ">．Lavender Forest House． </h1>
        <h3 class="poetry1 text-center text-white m-0 ">
            落居環山之間，坐擁森林綠意，<br>湖畔與甜美薰衣草之印象，詮釋著森林的恬靜，<br>無論是日昇的幸福山丘或是月落的山巒綠意，<br>都是旅行的幸福印記…</h3>
        <h3 class="poetry2 text-center text-white m-0 ">
            落居環山之間，坐擁森林綠意，<br>湖畔與甜美薰衣草之印象，<br>詮釋著森林的恬靜，<br>無論是日昇的幸福山丘，<br>或是月落的山巒綠意，<br>都是旅行的幸福印記…</h3>
    </div>

    <div class="container">
        <ul id="myTab" class="nav nav-tabs t_shadow">
            <li class="active b-green rot-135"><a data-toggle="tab" href="#doubleRoom">
                    <h4 class="m-0" class="c_1">愜意雙人房<br><span>Double Room</span></h4>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#tripleRoom">
                    <h4 class="m-0" class="c_1">輕奢三人房－樓中樓<br><span>Triple Room</span></h4>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#quadrupleRoom">
                    <h4 class="m-0" class="c_1">好友四人房<br><span>Quadruple Room</span></h4>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#familyRoom">
                    <h4 class="m-0" class="c_1">森林時光－親子家庭房<br><span>Family Room</span></h4>
                </a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div id="doubleRoom" class="tab-pane fade in active">
                <div class="d-flex row pl-2 pr-2 pt-1">
                    <div class="pic_demo pt-1 col-10 pl-2 ">
                        <img src="./images/hotel/doubleRoom_01.jpg" alt="">
                    </div>

                    <div class="pic_small col-2 p-0">
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/doubleRoom_01.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/doubleRoom_02.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/doubleRoom_03.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/doubleRoom_04.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/BREAKFAST.jpg" alt=""></div>
                    </div>
                </div>
                <div class="amenities d-flexpt-3 mt-3 row justify-content-between">
                    <div class=" col-sm-9  row">
                        <ul class="col-sm-3">提供
                            <li>提供早餐</li>
                            <li>雙人床 1 張</li>
                        </ul>
                        <ul class="col-sm-3">私人衛浴提供
                            <li>免費盥洗用品</li>
                            <li>淋浴間</li>
                            <li>毛巾</li>
                            <li>吹風機</li>
                        </ul>
                        <ul class=" col-sm-2 ">景觀
                            <li>花園</li>
                            <li>山景</li>
                        </ul>
                        <ul class="col-sm-2">客房設施
                            <li>WiFi</li>
                            <li>電視</li>
                            <li>咖啡機</li>
                            <li>冰箱</li>
                        </ul>
                        <ul class=" col-sm-2">禁止
                            <li>吸菸</li>
                            <li>喧嘩</li>
                        </ul>
                    </div>
                    <div class=" col-sm-3  p-0 m-0">
                        <div class="card p-0 m-0" data-sid="">
                            <div class="card-body m-0 text-center  " style="box-shadow: 0px 0px 9px #cecece;">
                                <p>定價：<i class="fas fa-dollar-sign"></i> 3,500 <span>/晚</span></p>
                                <p>假日：<i class="fas fa-dollar-sign"></i> 3,000 <span>/晚</span></p>
                                <p>平日：<i class="fas fa-dollar-sign"></i> 2,500 <span>/晚</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tripleRoom" class="tab-pane fade">
                <div class="d-flex row pl-2 pr-2 pt-1">
                    <div class="pic_demo pt-1 col-10 pl-2 ">
                        <img src="./images/hotel/tripleRoom_01.jpg" alt="">
                    </div>

                    <div class="pic_small col-2 p-0">
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/tripleRoom_01.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/tripleRoom_02.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/tripleRoom_03.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/tripleRoom_04.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/BREAKFAST.jpg" alt=""></div>
                    </div>
                </div>
                <div class="amenities d-flexpt-3 mt-3 row justify-content-between">
                    <div class=" col-sm-9  row">
                        <ul class="col-sm-3">提供
                            <li>提供早餐</li>
                            <li>單人床 3 張</li>
                        </ul>
                        <ul class="col-sm-3">私人衛浴提供
                            <li>免費盥洗用品</li>
                            <li>淋浴間</li>
                            <li>毛巾</li>
                            <li>吹風機</li>
                        </ul>
                        <ul class=" col-sm-2 ">景觀
                            <li>花園</li>
                            <li>山景</li>
                        </ul>
                        <ul class="col-sm-2">客房設施
                            <li>WiFi</li>
                            <li>電視</li>
                            <li>咖啡機</li>
                            <li>冰箱</li>
                        </ul>
                        <ul class=" col-sm-2">禁止
                            <li>吸菸</li>
                            <li>喧嘩</li>
                        </ul>
                    </div>
                    <div class=" col-sm-3  p-0 m-0">
                        <div class="card p-0 m-0" data-sid="">
                            <div class="card-body m-0 text-center  " style="box-shadow: 0px 0px 9px #cecece;">
                                <p>定價：<i class="fas fa-dollar-sign"></i> 4,000 <span>/晚</span></p>
                                <p>假日：<i class="fas fa-dollar-sign"></i> 3,500 <span>/晚</span></p>
                                <p>平日：<i class="fas fa-dollar-sign"></i> 3,000 <span>/晚</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="quadrupleRoom" class="tab-pane fade">
                <div class="d-flex row pl-2 pr-2 pt-1">
                    <div class="pic_demo pt-1 col-10 pl-2 ">
                        <img src="./images/hotel/quadrupleRoom_01.jpg" alt="">
                    </div>

                    <div class="pic_small col-2 p-0">
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/quadrupleRoom_01.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/quadrupleRoom_02.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/quadrupleRoom_03.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/quadrupleRoom_04.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/BREAKFAST.jpg" alt=""></div>
                    </div>
                </div>
                <div class="amenities d-flexpt-3 mt-3 row justify-content-between">
                    <div class=" col-sm-9  row">
                        <ul class="col-sm-3">提供
                            <li>提供早餐</li>
                            <li>雙人床 2 張</li>
                        </ul>
                        <ul class="col-sm-3">私人衛浴提供
                            <li>免費盥洗用品</li>
                            <li>淋浴間</li>
                            <li>毛巾</li>
                            <li>吹風機</li>
                        </ul>
                        <ul class=" col-sm-2 ">景觀
                            <li>花園</li>
                            <li>山景</li>
                        </ul>
                        <ul class="col-sm-2">客房設施
                            <li>WiFi</li>
                            <li>電視</li>
                            <li>咖啡機</li>
                            <li>冰箱</li>
                        </ul>
                        <ul class=" col-sm-2">禁止
                            <li>吸菸</li>
                            <li>喧嘩</li>
                        </ul>
                    </div>
                    <div class=" col-sm-3  p-0 m-0">
                        <div class="card p-0 m-0" data-sid="">
                            <div class="card-body m-0 text-center  " style="box-shadow: 0px 0px 9px #cecece;">
                                <p>定價：<i class="fas fa-dollar-sign"></i> 4,500 <span>/晚</span></p>
                                <p>假日：<i class="fas fa-dollar-sign"></i> 4,000 <span>/晚</span></p>
                                <p>平日：<i class="fas fa-dollar-sign"></i> 3,500 <span>/晚</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="familyRoom" class="tab-pane fade">
                <div class="d-flex row pl-2 pr-2 pt-1">
                    <div class="pic_demo pt-1 col-10 pl-2 ">
                        <img src="./images/hotel/familyRoom_01.jpg" alt="">
                    </div>

                    <div class="pic_small col-2 p-0">
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/familyRoom_01.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/familyRoom_02.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/familyRoom_03.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/familyRoom_04.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/BREAKFAST.jpg" alt=""></div>
                    </div>
                </div>
                <div class="amenities d-flexpt-3 mt-3 row justify-content-between">
                    <div class=" col-sm-9  row">
                        <ul class="col-sm-3">提供
                            <li>提供早餐</li>
                            <li>雙人床 2 張</li>
                        </ul>
                        <ul class="col-sm-3">私人衛浴提供
                            <li>免費盥洗用品</li>
                            <li>淋浴間</li>
                            <li>毛巾</li>
                            <li>吹風機</li>
                        </ul>
                        <ul class=" col-sm-2 ">景觀
                            <li>花園</li>
                            <li>山景</li>
                        </ul>
                        <ul class="col-sm-2">客房設施
                            <li>WiFi</li>
                            <li>電視</li>
                            <li>咖啡機</li>
                            <li>冰箱</li>
                        </ul>
                        <ul class=" col-sm-2">禁止
                            <li>吸菸</li>
                            <li>喧嘩</li>
                        </ul>
                    </div>
                    <div class=" col-sm-3  p-0 m-0">
                        <div class="card p-0 m-0" data-sid="">
                            <div class="card-body m-0 text-center  " style="box-shadow: 0px 0px 9px #cecece;">
                                <p>定價：<i class="fas fa-dollar-sign"></i> 4,800 <span>/晚</span></p>
                                <p>假日：<i class="fas fa-dollar-sign"></i> 4,300 <span>/晚</span></p>
                                <p>平日：<i class="fas fa-dollar-sign"></i> 3,800 <span>/晚</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div id="notes">
            <h2 class="title b-green rot-135 text-center c_1 ">住房須知 <span>Notice</span></h2>
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            <h4 class="m-0">※ 訂房方式</h4>
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>
                                1. 線上訂房系統所顯示的房況皆為即時資訊，旅客可直接透過線上訂房系統查詢空房或預訂房間。<br><br>
                                2. 電話訂房 (10:00am~20:00pm) <br>　
                                電話: 0900625686<br>
                                ※<br>
                                　平日定義：週日到週四 。<br>
                                　假日定義：週五、週六、國定假日、連續假日與連續假日前一天。<br>
                                　定價定義：農曆春節期間。<br><br>
                                ※ 匯款前請務必詳閱訂房須知及入住須知，如有任何疑義，建議您事先致電服務人員進行確認後再行匯款，以保障您的權利喔～<br><br>
                                ※ 如需加人加床請事先告知(加床限定一樓雙人房型，其餘房型僅能加人)，入住當天無法臨時提供任何加床或加寢具之服務，敬請見諒。<br><br>
                                ※ 如有未盡事宜將另行通知，本民宿保留是否接受網路訂房的權利。<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            <h4 class="m-0">※ 住房注意事項</h4>
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>
                                ※ 入住時間(check in):15:00-20:30<br> 　晚於20:30請主動電話連絡。<br><br>
                                ※ 退房時間(check out):上午11:00之前。<br><br>
                                ※ 逾時退房每小時加收300元。<br><br>
                                ※ 個人貴重物品請自行妥善保管，如有遺失恕不負責。<br><br>
                                ※ 民宿室內空間一律禁菸、嚼檳榔等。禁止賭博、吸毒、嗑藥、酗酒、轟叭....等一切違法行徑，請自重，違者將報警處理。<br><br>
                                ※ 入住時請出示身分證件，以便依「民宿管理辦法」規定確認訂房身份與登記。<br><br>
                                ※ 為維護住宿品質及安寧，於室內外公共空間內活動請降低音量，並於晚上10點以前結束。<br><br>
                                ※ 請愛惜公物及設備物品，房間內提供的漱口杯、玻璃杯、室內拖鞋、吹風機、毛巾浴巾等物品，請勿逕自攜出，如有損毀需照價賠償。<br><br>
                                ※ 全面禁止烤肉及天燈、煙火之施放。非客房配置之任何電器用品及瓦斯器具，禁止使用，以免發生危險。<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                            <h4 class="m-0">※ 匯款資訊</h4>
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>下面帳號僅限<span class="text-success">電話訂房</span>使用，線上訂房請使用信用卡付款。<br><br>
                                銀行轉帳代碼：012<br>
                                匯款銀行： 台北富邦銀行 花蓮分行<br>
                                匯款帳號： 81680000565938<br>
                                戶名： 陳宥文
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                            <h4 class="m-0">※ 退訂事項</h4>
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>※取消訂單之退款比例依交通部觀光局之規範實行之。<br><br>
                                以下退訂資訊採自交通部觀光局定型化契約範本：<br><br>
                                一、解約通知於預定住宿日四至六日前到達者，退還已付金額40%。<br><br>
                                二、解約通知於預定住宿日二至三日前到達者，退還已付金額30%。<br><br>
                                三、解約通知於預定住宿日一日前到達者，退還已付金額20%。<br><br>
                                四、解約通知於預定住宿日當日到達或怠於通知者，不退還已付金額。<br><br>
                                如於預訂住宿時，因颱風造成交通中斷等不可抗拒因素時而取消，可退還全額 如已預訂住宿因下雨或私人因素，恕不接受退訂。<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="c_pink_t"> 日期設定和選擇日期房間未定,每種房型2間<br>
            </h2>

        <div id="reservation">
            <table width="100%" border="1" class="table">
                <tbody>
                    <tr>
                        <th class=" b-green rot-135" height="60" colspan="9" scope="col">
                            <h2 class="title m-0 p-0 c_1">請點擊空房表訂房</h2>
                        </th>
                    </tr>
                    <tr>
                        <th class=" " style="background-color: #eff2f6;" height="60" colspan="9" scope="col">
                            <span class="pr-2"><i class="fas fa-arrow-circle-left"></i>上一週</span>
                            <input type="date" value="" name="">
                            <span>~</span>
                            <input type="date" value="" name="">
                            <span>上一週<i class="fas fa-arrow-circle-right"></i></span>
                        </th>
                    </tr>
                    <tr style="vertical-align: middle; background-color: #eff2f6;">
                        <th width="215" rowspan="2" scope="row" style="vertical-align: middle;">房型名稱
                        </th>
                        <th width="130" rowspan="2" scope="row" style="vertical-align: middle;">照片</th>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr style="vertical-align: middle; background-color: #eff2f6;">
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr>
                        <th width="215" rowspan="2" scope="row" style="vertical-align: middle;">愜意雙人房<br>
                            Double&#160;Room</th>
                        <th rowspan="2" scope="row"><img style="width: 8rem;" src="./images/hotel/doubleRoom_01.jpg" alt=""></th>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr>
                        <td><div></div><div></div></td>
                        <td></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr>
                        <th rowspan="2" scope="row" style="vertical-align: middle;"> 輕奢三人房－樓中樓
                            <br>Triple&#160;Room
                        </th>
                        <th rowspan="2" scope="row"><img style="width: 8rem;" src="./images/hotel/tripleRoom_01.jpg" alt=""></th>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr>
                        <th rowspan="2" scope="row" style="vertical-align: middle;">
                            好友四人房<br>Quadruple&#160;Room</th>
                        <th rowspan="2" scope="row"><img style="width: 8rem;" src="./images/hotel/quadrupleRoom_01.jpg" alt="">
                        </th>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr>
                        <th rowspan="2" scope="row" style="vertical-align: middle;">
                            森林時光－親子家庭房<br>Family&#160;Room</th>
                        <th rowspan="2" scope="row"><img style="width: 8rem;" src="./images/hotel/familyRoom_01.jpg" alt=""></th>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                        <td><div></div><div></div></td>
                    </tr>
                    <tr class="block">
                        <th class="status block " height="60" colspan="9" scope="col">
                            <span class=""><img src="./images/icon/bookStatus-01.svg" alt="">尚有空房</span>
                            <span><img src="./images/icon/bookStatus-02.svg" alt="">客滿</span>
                            <span><img src="./images/icon/bookStatus-03.svg" alt="">可候補</span>
                            <span><img src="./images/icon/bookStatus-04.svg" alt="">尚未開放</span>
                            <span><img src="./images/icon/currency.svg">貨幣單位：新台幣</span>
                        </th>
                    </tr>

                </tbody>
            </table>
        </div>

        <form class="" action="" method="">
            <div class="priceBar d-flex  justify-content-center  container ">
                <div class="d-flex align-items-center ">
                    <label for="" class="m-0 p-0">
                        <h4 class="m-2 p-0">入住人數</h4>
                    </label>
                    <input type="number" value="1" min="1" name="people_num" id="people_num" style="width: 3rem; " placeholder="1" class="">
                </div>
                <div class="d-flex align-items-center m-0 p-0">
                    <label for="" class="m-0 p-0">
                        <h4 class="m-2 p-0">加入購物車</h4>
                    </label>
                    <button class="m-2 btn add-to-cart text-white " style="background-color:#04c2ff"><i class="fas fa-cart-plus"></i></button>
                </div>
                <div class="d-flex align-items-center ">
                    <label for="" class="m-0 p-0">
                        <h4 class="m-2 p-0">加入我的最愛</h4>
                    </label>
                    <button class="m-2  btn text-white c_pink_b"><i class="fas fa-heart"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <h2 class="c_pink_t">可參考檔案" Y_hotel 靜樹湖民宿線上訂房 "</h2>
        <picture class="">
            <img src="./images/hotel/reservation.JPG" alt="">
        </picture>
    </div>




    <?php include __DIR__ . '/parts/scripts.php'; ?>

    <script>
        let imgArray = ['doubleRoom_01.jpg', 'doubleRoom_02.jpg', 'doubleRoom_03.jpg', 'doubleRoom_04.jpg', 'BREAKFAST.jpg']

        $('.pic_piece img').click(function() {
            // let imgSrc = imgArray[$(this).parent().index()];
            $(this).closest('.d-flex').find('.pic_demo img').attr('src', $(this).attr('src'));
            // $('.pic_demo img').attr('src', './images/hotel/' + imgSrc);
        })
    </script>
    <script>
        $(function() {
            $('#myTab li:eq(0) a').tab('show');
        });
    </script>

    <?php include __DIR__ . '/parts/html-foot.php'; ?>