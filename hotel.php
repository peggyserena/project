<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = 'Lavendar Room';
$pageName = 'hotel';

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="./css/hotel.css">

<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>

</style>
</head>

<body>

    <?php include "parts/transaction.php"?>
    <?php include "parts/modal.php"?>
    <div id="slider" class=" owl-carousel owl-theme">
        <img src="./images/hotel/banner_01.jpg">
        <img src="./images/hotel/banner_02.png">
        <img src="./images/hotel/banner_03.jpg">
    </div>

    <div class="container c_1 mt-5 mb-5">
        <h1 class="box_desktop  text-center m-0 text-white ">．Lavender Forest House． </h1>
        <h1 class="box_tablet text-center m-0 text-white ">．Lavender Forest House． </h1>
        <h2 class="box_cellphone text-center m-0 text-white mb-3 mt-3 ">．Lavender Forest．<br> House </h2>
        <h3 class="poetry1 text-center text-white m-0 ">
            落居環山之間，坐擁森林綠意，<br>湖畔與甜美薰衣草之印象，詮釋著森林的恬靜，<br>無論是日昇的幸福山丘或是月落的山巒綠意，<br>都是旅行的幸福印記…</h3>
        <h3 class="poetry2 text-center text-white m-0 ">
            落居環山之間，坐擁森林綠意，<br>湖畔與甜美薰衣草之印象，<br>詮釋著森林的恬靜，<br>無論是日昇的幸福山丘，<br>或是月落的山巒綠意，<br>都是旅行的幸福印記…</h3>
    </div>

    <div class="container">
        <ul id="myTab" class="box_desktop nav nav-tabs t_shadow">
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
        <ul id="myTab" class="box_tablet nav nav-tabs t_shadow">
            <li class="active b-green rot-135"><a data-toggle="tab" href="#doubleRoom">
                    <p class="m-0 p-2" class="c_1">愜意雙人房<br><span>Double Room</span></p>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#tripleRoom">
                    <p class="m-0 p-2" class="c_1">輕奢三人房－樓中樓<br><span>Triple Room</span></p>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#quadrupleRoom">
                    <p class="m-0 p-2" class="c_1">好友四人房<br><span>Quadruple Room</span></p>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#familyRoom">
                    <p class="m-0 p-2" class="c_1">森林時光－親子家庭房<br><span>Family Room</span></p>
                </a></li>
        </ul>
        <ul id="myTab" class="box_cellphone nav nav-tabs t_shadow">
            <li class="active b-green rot-135"><a data-toggle="tab" href="#doubleRoom">
                    <p class="m-0" class="c_1">愜意雙人房<br><span>Double Room</span></p>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#tripleRoom">
                    <p class="m-0" class="c_1">輕奢三人房－樓中樓<br><span>Triple Room</span></p>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#quadrupleRoom">
                    <p class="m-0" class="c_1">好友四人房<br><span>Quadruple Room</span></p>
                </a></li>
            <li class="b-green rot-135"><a data-toggle="tab" href="#familyRoom">
                    <p class="m-0" class="c_1">森林時光－親子家庭房<br><span>Family Room</span></p>
                </a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div id="doubleRoom" class="tab-pane fade in active">
                <div class="row pl-2 pr-2 pt-1">
                    <div class="pic_demo pt-1 col-10 pl-2 ">
                        <img src="./images/hotel/DRF201_1.jpg" alt="">
                    </div>

                    <div class="pic_small col-2  p-0">
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/DRF201_1.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/DRF201_2.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/DRF201_3.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/DRF201_4.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/BREAKFAST.jpg" alt=""></div>
                    </div>
                </div>
                <div class="amenities pt-3 row justify-content-between">
                    <div class=" col-lg-9 col-md-8 col-sm-12  row">
                        <ul class="col-lg-3 col-md-4 col-sm-6">提供
                            <li>提供早餐</li>
                            <li>雙人床 1 張</li>
                        </ul>
                        <ul class="col-lg-3 col-md-5 col-sm-6">私人衛浴提供
                            <li>免費盥洗用品</li>
                            <li>淋浴間</li>
                            <li>毛巾</li>
                            <li>吹風機</li>
                        </ul>
                        <ul class=" col-lg-2 col-md-3 col-sm-6 ">景觀
                            <li>花園</li>
                            <li>山景</li>
                        </ul>
                        <ul class="col-lg-2 col-md-4 col-sm-6">客房設施
                            <li>WiFi</li>
                            <li>電視</li>
                            <li>咖啡機</li>
                            <li>冰箱</li>
                        </ul>
                        <ul class=" col-lg-2 col-md-4 col-sm-6">禁止
                            <li>吸菸</li>
                            <li>喧嘩</li>
                        </ul>
                    </div>
                    <div class=" col-lg-3 col-md-4 col-sm-12  p-0 m-0">
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
                        <img src="./images/hotel/TRF301_1.jpg" alt="">
                    </div>

                    <div class="pic_small col-2  p-0">
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/TRF301_1.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/TRF301_2.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/TRF301_3.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/TRF301_4.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/BREAKFAST.jpg" alt=""></div>
                    </div>
                </div>
                <div class="amenities d-flex pt-3 mt-3 row justify-content-between">
                <div class=" col-lg-9 col-md-8 col-sm-12  row">
                        <ul class="col-lg-3 col-md-4 col-sm-6">提供
                            <li>提供早餐</li>
                            <li>雙人床 1 張</li>
                        </ul>
                        <ul class="col-lg-3 col-md-5 col-sm-6">私人衛浴提供
                            <li>免費盥洗用品</li>
                            <li>淋浴間</li>
                            <li>毛巾</li>
                            <li>吹風機</li>
                        </ul>
                        <ul class=" col-lg-2 col-md-3 col-sm-6 ">景觀
                            <li>花園</li>
                            <li>山景</li>
                        </ul>
                        <ul class="col-lg-2 col-md-4 col-sm-6">客房設施
                            <li>WiFi</li>
                            <li>電視</li>
                            <li>咖啡機</li>
                            <li>冰箱</li>
                        </ul>
                        <ul class=" col-lg-2 col-md-4 col-sm-6">禁止
                            <li>吸菸</li>
                            <li>喧嘩</li>
                        </ul>
                    </div>
                    <div class=" col-lg-3 col-md-4 col-sm-12  p-0 m-0">
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
                        <img src="./images/hotel/QRF201_1.jpg" alt="">
                    </div>

                    <div class="pic_small col-2  p-0">
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/QRF201_1.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/QRF201_2.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/QRF201_3.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/QRF201_4.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/BREAKFAST.jpg" alt=""></div>
                    </div>
                </div>
                <div class="amenities d-flexpt-3 mt-3 row justify-content-between">
                <div class=" col-lg-9 col-md-8 col-sm-12  row">
                        <ul class="col-lg-3 col-md-4 col-sm-6">提供
                            <li>提供早餐</li>
                            <li>雙人床 1 張</li>
                        </ul>
                        <ul class="col-lg-3 col-md-5 col-sm-6">私人衛浴提供
                            <li>免費盥洗用品</li>
                            <li>淋浴間</li>
                            <li>毛巾</li>
                            <li>吹風機</li>
                        </ul>
                        <ul class=" col-lg-2 col-md-3 col-sm-6 ">景觀
                            <li>花園</li>
                            <li>山景</li>
                        </ul>
                        <ul class="col-lg-2 col-md-4 col-sm-6">客房設施
                            <li>WiFi</li>
                            <li>電視</li>
                            <li>咖啡機</li>
                            <li>冰箱</li>
                        </ul>
                        <ul class=" col-lg-2 col-md-4 col-sm-6">禁止
                            <li>吸菸</li>
                            <li>喧嘩</li>
                        </ul>
                    </div>
                    <div class=" col-lg-3 col-md-4 col-sm-12  p-0 m-0">
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
                        <img src="./images/hotel/FRF101_1.jpg" alt="">
                    </div>

                    <div class="pic_small col-2 p-0">
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/FRF101_1.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/FRF101_2.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/FRF101_3.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/FRF101_4.jpg" alt=""></div>
                        <div class="pic_piece col p-1 pr-2"><img src="./images/hotel/BREAKFAST.jpg" alt=""></div>
                    </div>
                </div>
                <div class="amenities d-flex pt-3 mt-3 row justify-content-between">
                <div class=" col-lg-9 col-md-8 col-sm-12  row">
                        <ul class="col-lg-3 col-md-4 col-sm-6">提供
                            <li>提供早餐</li>
                            <li>雙人床 1 張</li>
                        </ul>
                        <ul class="col-lg-3 col-md-5 col-sm-6">私人衛浴提供
                            <li>免費盥洗用品</li>
                            <li>淋浴間</li>
                            <li>毛巾</li>
                            <li>吹風機</li>
                        </ul>
                        <ul class=" col-lg-2 col-md-3 col-sm-6 ">景觀
                            <li>花園</li>
                            <li>山景</li>
                        </ul>
                        <ul class="col-lg-2 col-md-4 col-sm-6">客房設施
                            <li>WiFi</li>
                            <li>電視</li>
                            <li>咖啡機</li>
                            <li>冰箱</li>
                        </ul>
                        <ul class=" col-lg-2 col-md-4 col-sm-6">禁止
                            <li>吸菸</li>
                            <li>喧嘩</li>
                        </ul>
                    </div>
                    <div class=" col-lg-3 col-md-4 col-sm-12  p-0 m-0">
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

    <div class="modal fade" id="myModal_1" >
        <div class="modal-dialog modal-lg modal-dialog-centered " style="width:300px">
            <div class="modal-content">
                <!-- Modal Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- Modal body -->
                <div class="modal-body " >
                    <div>                    
                        <label>房型名稱：</label><span id="name_zh"></span>
                    </div>
                    <div>                    
                        <input id="id" type="hidden"/>
                        <label>入住日：</label><span id="date"></span>
                    </div>
                    <div>                    
                        <label>剩餘房數：</label><span id="available_quantity"></span>
                    </div>
                    <div>
                        <label>房數：</label><input id="quantity" class="hotel_quantity" type="number" value="1" min="1" style="width: 3rem;" class="mr-3"/>
                        <label>人數：</label><input id="people_num" class="hotel_people_num" data-peopleNumLimit="" type="number" value="1" min="1" style="width: 3rem;"/>
                    </div>
                </div>
                <div id="priceBar_h" class="c_pink text-center ">
                    <button onclick="tr_addTransaction('hotel', 'cart');" class=" btn add-to-cart " ><i class="fas fa-cart-plus"></i></button>
                    <button onclick="tr_addTransaction('hotel', 'wishList');" class=' btn add-to-wishList ' type="button"><i class='fas fa-heart' ></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-md mt-5 mb-5">
        <div id="reservation">
            <table width="100%" border="1" class="table">
                <tbody>
                    <tr>
                        <th class="title b-green rot-135 text-center c_1  " height="60" colspan="9" scope="col">
                            <h2 class="m-0" >請點擊空房表訂房</h2>
                        </th>
                    </tr>
                    <tr class="d-none d-md-table-row">
                        <th class=" " style="background-color: #eff2f6;" height="60" colspan="100%" scope="col">
                            <button class="pr-2 " style="border:none;border-radius:10px" onclick="lastWeek()"><i class="fas fa-arrow-circle-left"></i>上一週</button>
                            <input class="text-center" type="date" value="" name="">
                            <span>~</span>
                            <input class="text-center"  type="date" disabled value="" name="">
                            <button style="border:none;border-radius:10px" onclick="nextWeek()">下一週<i class="fas fa-arrow-circle-right"></i></button>
                        </th>
                    </tr>
                    <tr class="d-md-none">
                        <th class=" " style="background-color: #eff2f6;" height="60" colspan="100%" scope="col">
                            <button class="pr-2 " style="border:none;border-radius:10px" onclick="lastWeek(3)"><i class="fas fa-arrow-circle-left"></i></button>
                            <input class="text-center" type="date" value="" name="">
                            <button style="border:none;border-radius:10px" onclick="nextWeek(3)"><i class="fas fa-arrow-circle-right"></i></button>
                        </th>
                    </tr>
                    <tr style="vertical-align: middle; background-color: #eff2f6;" class="table_date">
                        <th scope="row" style="vertical-align: middle;">房型名稱
                        </th>
                        <th class="d-none d-lg-table-cell" scope="row" style="vertical-align: middle;">照片</th>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td  class="d-none d-md-table-cell"></td>
                        <td  class="d-none d-md-table-cell"></td>
                        <td  class="d-none d-md-table-cell"></td>
                        <td  class="d-none d-md-table-cell"></td>
                    </tr>
      
                    <tr class="">
                        <th class="status " height="60" colspan="9" scope="col">
                            <div class="row">
                            
                                <span class=' col m-0'><img src="./images/icon/bookStatus-01.svg" alt=""><div>尚有空房</div></span>
                                <span class=' col m-0'><img src="./images/icon/bookStatus-04.svg" alt=""><div>預定中</div></span>
                                <span class=' col m-0'><img src="./images/icon/bookStatus-02.svg" alt=""><div>客滿</div></span>
                                <span class=' col m-0'><img src="./images/icon/bookStatus-03.svg" alt=""><div>尚未開放</div></span>
                                <span class=' col m-0'><img src="./images/icon/currency.svg"><div>貨幣單位：新台幣</div></span>
                            </div>
                        </th>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


    <?php include __DIR__ . '/parts/scripts.php'; ?>

    <script>
        let imgArray = ['doubleRoom_01.jpg', 'doubleRoom_02.jpg', 'doubleRoom_03.jpg', 'doubleRoom_04.jpg', 'BREAKFAST.jpg']

        $('.pic_piece img').click(function() {
            // let imgSrc = imgArray[$(this).parent().index()];
            console.log(this);
            $(this).closest('.d-flex').find('.pic_demo img').attr('src', $(this).attr('src'));
            // $('.pic_demo img').attr('src', './images/hotel/' + imgSrc);
        })
    </script>
    <script>
        $(function() {
            $('#myTab li:eq(0) a').tab('show');
        });
        $(".hotel_quantity").change(function(){
            var hotel_quantity = $(this).val();
            var peopleNum_elem = $(this).siblings(".hotel_people_num");
            var peopleNumLimit = peopleNum_elem.data("peoplenumlimit");
            var peopleNum_elem_limit = hotel_quantity * peopleNumLimit;
            peopleNum_elem.attr("max", peopleNum_elem_limit);
            if (peopleNum_elem.val() > peopleNum_elem_limit){
                peopleNum_elem.val(peopleNum_elem_limit);
            }
            if (peopleNum_elem.attr("max") < peopleNum_elem.attr("min")){
                peopleNum_elem.attr("min", peopleNum_elem.attr("max"));
            }else{
                peopleNum_elem.attr("min", 1);
                if (peopleNum_elem.val() == 0) peopleNum_elem.val(1);
            }
            console.log([this, hotel_quantity, peopleNum_elem, peopleNumLimit, peopleNum_elem.value, peopleNum_elem]);
        })

        function modalInfo(id, name_zh, date, quantity_limit, people_num_limit){
            $("#id").val(id);
            $("#date").text(date);
            $("#quantity").val(0);
            $("#people_num").val(0);
            $("#quantity").attr("max", quantity_limit);
            $(".hotel_people_num").data("peoplenumlimit", people_num_limit);
            $("#available_quantity").text(quantity_limit + "間");
            $("#name_zh").text(name_zh);

            $(".hotel_quantity").trigger("change");
        }
        
        
        
        
        var nowDate = new Date();
        var aDayTime = 24 * 60 * 60 * 1000;
        function createDatePicker(){
            var d = new Date(nowDate);
            var date_list = [];
            var day_list = ["日", "一", "二", "三", "四", "五", "六"];
            for (var i = 0; i < 7; i++){
                date_list[i] = new Date(d);
                d.setTime(d.getTime() + aDayTime);
            }
            $(".table_date td").each(function(ind, elem){
                var date = date_list[ind].getDate();
                var day = date_list[ind].getDay();
                $(elem).html(`<h4 class="">${date}</h4><h4 class='m-0'>${day_list[day]}</h4>`);
            });

            var endDate = new Date(nowDate);
            endDate.setTime(endDate.getTime() + aDayTime * 6);
            $("input[type='date']")[0].value = getFormattedDate(nowDate);
            $("input[type='date']")[1].value = getFormattedDate(endDate);
            $("input[type='date']")[2].value = getFormattedDate(nowDate);
        }
        
        function getFormattedDate(d){
            var formatted_month = (d.getMonth() + 1).toString().padStart(2, "0");
            var formatted_date = (d.getDate()).toString().padStart(2, "0");
            var formatted_date = `${d.getFullYear()}-${formatted_month}-${formatted_date}`;
            return formatted_date;
        }

        function lastWeek(day = 7){
            nowDate.setTime(nowDate.getTime() - aDayTime * day);
            createDatePicker();
            createHotelData();
        }
        function nextWeek(day = 7){
            nowDate.setTime(nowDate.getTime() + aDayTime * day);
            createDatePicker();
            createHotelData();
        }

        $("input[type='date']")[0].onchange = function(){
            var date_list = this.value.split("-");
            nowDate = new Date(date_list[0], date_list[1], date_list[2]);
            createDatePicker();
            createHotelData();
        }
        
        function createHotelData(){
            var d = new Date(nowDate);
            startDate = getFormattedDate(d);
            d.setTime(d.getTime() + aDayTime * 6)
            endDate = getFormattedDate(d);
            $.post("<?= WEB_API ?>/hotel-api.php", {
                type: "read",
                startDate,
                endDate,
            }, function(data){
                html = [];
                console.log("createHotelData");
                var modal_attribute = '';
                data.forEach(function (elem, index){
                    elem.forEach(function (elem2, index2){
                        if (elem2['available_quantity'] === '0'){
                            status_class = "full";
                            modal_attribute = '';
                            onclick_function = `modalError('此商品已售完')`;
                        } else if (elem2['status'] === 'temp') {
                            status_class = elem2['status'];
                            modal_attribute = '';
                            onclick_function = `modalError('此商品已在購物車中')`;
                        }else{
                            status_class = "available";
                            modal_attribute = 'data-toggle="modal" data-target="#myModal_1"';
                            onclick_function = `modalInfo('${elem2['id']}', '${elem2['name_zh']}', '${elem2['order_date']}', ${elem2['available_quantity']}, ${elem2['people_num_limit']})`;
                        }
                        if (!(elem2['id'] in html)){
                            var name_zh = `<div class="d-none d-md-block">${elem2['name_zh']}</div>
                                            <div class="d-md-none">${elem2['name_zh'].split("－").join("<br>")}</div>`;
                            html[elem2['id']] = `<tr class="hotel-data">
                                <th scope="row" style="vertical-align: middle;background-color: #eff2f6;" class="text-center">${name_zh}<br><p class="d-none  " style="font-weight:300;font-size:0.8rem;">
                                    ${elem2['name_en']}</p></th>
                                <th scope="row" class="d-none d-lg-table-cell text-center" ><img style="width: 8rem;" src='<?= WEB_ROOT ?>/images/hotel/${elem2['hotel_id']}_1.jpg' alt=""></th>
                                <td class="">
                                <div><span id="hotel_btn_${elem2['id']}_${elem2['order_date']}" class="" ${modal_attribute} onclick="${onclick_function}"><img class="${status_class}" src="./images/icon/bookStatus.svg" alt=""></span><br>
                                ${dallorCommas(elem2['final_price'])}</div>
                            </td>`;
                        }else{
                            var className = "";
                            if (index > 2) className = "d-none d-md-table-cell";
                            html[elem2['id']] += `<td class="${className}">
                                <div><span id="hotel_btn_${elem2['id']}_${elem2['order_date']}" class="" ${modal_attribute} onclick="${onclick_function}"><img class="${status_class}" src="./images/icon/bookStatus.svg" alt=""></span><br>
                                ${dallorCommas(elem2['final_price'])}</div>
                            </td>`;
                        }
                    });
                });
                $("#reservation tbody tr.hotel-data").remove();
                html.forEach(function(elem){
                    elem += `</tr>`;
                    $("#reservation tbody tr:last").before(elem);
                })

                console.log(html);
            }, 'json');
        }
        createDatePicker();
        createHotelData();


        function modalError(msg){
            modal_init();
            insertPage("#modal_img", "animation/animation_error.html");
            insertHtml("#modal_content", `${msg}<a class="btn">前往購物車修改</a>`);
            $("#modal_alert").modal("show");
        }
    </script>

    <?php include __DIR__ . '/parts/html-foot.php'; ?>