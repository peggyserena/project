<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林快報';
$pageName = 'news';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<style>

/* ======================================== general ======================================== */

    body {
        background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
    }
  

    h2 span{
        font-size:1.2rem;
        margin-left:1rem;
    }

    .ts1{
        text-shadow: 0 0 0.1em #0000E3, 0 0 0.1em #9AFF02, -0.3px -0.3px white, 0.3px 0.3px rgb(26, 2, 94);
    }

    #gardenInfo, #eventInfo, #hotelInfo, #restaurantInfo{
        box-shadow: 0px 0px 15px #666E9C;
        -webkit-box-shadow: 0px 0px 15px #666E9C;
        -moz-box-shadow: 0px 0px 15px #666E9C;
        margin-bottom:2rem;
    }

    main .card-body{
        color:gray;
    }

    #accordion .card-body{
        padding:2rem;
        background-color:#dff0d8;
    }

    #accordion .card-body span{
        color:#007bff;
    }

    #accordion .card .card-header {
        background-color: #adda9a;
        background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
    }
    #accordion .card .card-header:hover {
        background-color: #00ffbf;
        background-image: linear-gradient(315deg,#fdbdcb 0%,  #92e6d1  74%);
        filter: hue-rotate(45deg);
    }

    #accordion .card .card-header h4 {
        font-weight:600;
        color:gray;
        padding: 0.5rem 1rem 0.5rem 2rem;
        text-shadow: 0.5px 0.5px 0 white, 0.5px -0.5px 0 white, -0.5px 0.5px 0 white, -0.5px -0.5px 0 white, 0.5px 0px 0 white, 0px 0.5px 0 white, -0.5px 0px 0 white, 0px -0.5px 0 white;
    }
    #accordion .card .card-header p {
        padding: 0.5rem 1rem 0.5rem 2rem;
    }

    #accordion .card .card-header h4 span {
        font-size:1.2rem;
        font-weight:500;
    }

  



/* ======================================== gardenInfo ======================================== */

     #collapseOne h3, h4{
        margin:0;
        display:inline-block;
    }

    #gardenInfo img{
        width:100%;
    }

    #gardenInfo .col-12{
        padding:0;
    }

    #gardenInfo .card-body{
        padding:2rem;
        background-color:#dff0d8;
    }

    #collapseOne .card{
        padding:2rem;
        background-color:#fff;
    }
    #collapseOne .card-body>div>div{
        border:1px solid lightgray;
        height:4rem;
        text-align:center;
        align-items: center;
        justify-content:  center;
        display:flex;
        font-size:1.1rem;
        color:gray;
        font-weight:600;
    }
    
    #collapseOne .card-body>div{
        margin:0;
        padding:0;
    }
    
    #collapseOne .card-body .col-lg-2:first-child {
        background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
    }

    #collapseOne .box_cellphone .col-8 h4{
        color:#0000e3;
        text-shadow: 0.5px 0.5px 0 white, 0.5px -0.5px 0 white, -0.5px 0.5px 0 white, -0.5px -0.5px 0 white, 0.5px 0px 0 white, 0px 0.5px 0 white, -0.5px 0px 0 white, 0px -0.5px 0 white;
    }
    #collapseOne .card-body:first-child>div h4{
        text-align:center;
        /* color:#0000e3; */
        text-shadow: 0.5px 0.5px 0 white, 0.5px -0.5px 0 white, -0.5px 0.5px 0 white, -0.5px -0.5px 0 white, 0.5px 0px 0 white, 0px 0.5px 0 white, -0.5px 0px 0 white, 0px -0.5px 0 white;
    }

    #collapseOne .card-body .col-lg-5 .row span{
        color:gray;
        font-size:0.9rem;
        font-weight:400;
    }
    #collapseOne .card-body .col-lg-5:nth-child(7)>h4{
        color: rgb(255, 0, 140);
        font-size:0.9rem;
    }

    #collapseOne .card-body:first-child>div .col-12 h4{
        font-size:1.1rem;
        color: rgb(255, 0, 140);
        text-shadow: 0.5px 0.5px 0 white, 0.5px -0.5px 0 white, -0.5px 0.5px 0 white, -0.5px -0.5px 0 white, 0.5px 0px 0 white, 0px 0.5px 0 white, -0.5px 0px 0 white, 0px -0.5px 0 white;
    }

    #collapseOne .col-lg-2 img{
        height:100%
    }
    #collapseOne .col-lg-5 img{
        width:2rem;
        height:2rem
    }

    #collapseTwo img{
        height:300px;
        object-fit:cover;
    }

    .policy{
        width:100%;
        background-color:gray;
    }
    .policy ul{
        display:flex;
        list-style: none;
        margin:0 ;
        padding: 1rem 0;
    }

    .policy ul li a{
        color:white;
        margin:0.5rem 2rem;
    }
    .policy p a{
        color:white;
        margin:0.5rem 2rem;
    }

    .policy ul li:hover{
        transform: scale(1.02);
        box-shadow: 0px 0px 10px rgb(0, 255, 191);
        border-radius:1rem;

    }
    #collapseOne .box_cellphone .col-8 .col-12 h4{
        color: rgb(255, 0, 140);
    }

    #collapseOne .box_cellphone >div>div{
        font-size:0.9rem;
    }
    #collapseOne .box_cellphone >div>div span{
        font-size:0.8rem;
        font-weight:400;
    }

    #collapseOne .box_cellphone .col-4 p{
        /* color:#0000e3; */
        text-shadow: 0.5px 0.5px 0 white, 0.5px -0.5px 0 white, -0.5px 0.5px 0 white, -0.5px -0.5px 0 white, 0.5px 0px 0 white, 0px 0.5px 0 white, -0.5px 0px 0 white, 0px -0.5px 0 white;
    }


/* ======================================== eventInfo ======================================== */
    #collapseThird img{
        height:100%;
    }

    #collapseThrid .card-body img{
        width:2rem;
        height:2rem;
    }
/* ======================================== restaurantInfo ======================================== */

    #restaurantInfo .collapseForth  img {
        object-fit:fill;
    }

    #collapseFifth .card-body img{
        width:1.25rem;
        height:1.25rem;
    }
    #collapseFifth .card-body div{
        margin:1rem;
    }



/* ======================================== hotelInfo ======================================== */
    #hotelInfo .d-flex img {
        flex: 1 1 0;
        width:20%;
        height:20%;
        object-fit:fill;
    }






</style>
<body id="body" class="dark-mode">


<?php include __DIR__ . '/parts/navbar.php'; ?>
    <main>
        <div class="container mt-5">
            <div id="gardenInfo">
                <h2 class="title1 b-green rot-135 c_1 ">園區相關 <span>Garden Information</span></h2>
                <div id="accordion">
                    <div class="card ">
                        <div class="card-header  p-0">
                            <a class="card-link row   align-items-center  " data-toggle="collapse" href="#collapseOne">
                                <h4 class="col-lg-8 col-md-8 col-sm-12">會員優惠</h4>
                                <p class="col-lg-4 col-md-4 col-sm-12">活動期間：常態</p>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse " data-parent="#accordion">
                            <div class="card-body row p-0 m-0 ">
                                <div class="box_desktop col-lg-2 col-md-2 col-sm-4">
                                    <div><img src="./images/logo/logo_nav.svg" alt=""> </div>
                                    <div><h4>購物優惠</h4></div>
                                    <div><h4>入會條件<br>升級VIP</h4></div>
                                    <div><h4>生日禮</h4></div>
                                    <div><h4>會員紅利</h4></div>
                                    <div><h4>滿額購物金</h4></div>
                                    <div><h4>免運條件</h4></div>
                                    <div><h4>其他優惠</h4></div>
                                </div>

                                <div class="box_desktop col-lg-5 col-md-5 col-sm-4">
                                    <div><h4>薰衣草森林「好朋友」&ensp;</h4><img src="./images/icon/smile.svg" alt=""></div>
                                    <div><span><h4>－</h4></span></div>
                                    <div><a href="register.php">官網註冊</a></div>
                                    <div class="row m-0">
                                        <div class="col-12"><h4>$ 200</h4> 購物金</div>
                                        <div class="col-12"><span>(使用期限一個月內)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">消費 $ 100換1點，1點折抵1元</div>
                                        <div class="col-12"><span>(有效期限~當年度12/31)</span></div>
                                    </div>
                                    <div><h4>－</h4></div>
                                    <div>滿&ensp; <h4 style="color: rgb(255, 0, 140);">$ 1,500</h4>&ensp;免運</div>
                                    <div class="col-12">贈門票&ensp;<h4>1</h4>&ensp;張</div>
                                </div>

                                <div class="box_desktop col-lg-5 col-md-5 col-sm-4">
                                    <div><h4>薰衣草森林「家族成員」&ensp;</h4><i class="fa-lg fas fa-crown ts1" style="color:gold"></i></div>
                                    <div class="row m-0">
                                        <div class="col-12">定價<h4>85</h4>折</div>
                                        <div class="col-12"><span>(森林體驗、夜宿薰衣草森林、餐飲、網購)</span></div>
                                    </div>
                                    <div>一年內累積消費達 <h4 style="color: rgb(255, 0, 140);">$ 5,000</h4></div>
                                    <div class="row m-0">
                                        <div class="col-12"><h4>$ 500</h4> 購物金 </div>
                                        <div class="col-12"><span>(使用期限一個月內)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">消費 $ 100換1點，1點折抵1元</div>
                                        <div class="col-12"><span>(有效期限~當年度12/31)</span></div>
                                    </div>
                                    <div class="box_desktop row m-0">
                                        <div class="col-12">單次消費滿$ 3,000，送&ensp;<h4>$ 100</h4>&ensp;購物金</div>
                                        <div class="col-12"><span>(可於下次購物使用)</span></div>
                                    </div>
                                    <div>滿&ensp;<h4 style="color: rgb(255, 0, 140);">$ 1,000</h4>&ensp;免運</div>
                                    <div class="col-12">贈門票&ensp;<h4>2</h4>&ensp; 張</div>
                                </div>
                                <div class="box_desktop policy"style="width:100%">
                                    <ul >
                                        <li><a href="membership.php" target="_blank">▋會員方案FAQ ＆優惠說明</a></li>
                                        <li><a href="privacyPolicy.php" target="_blank">▋隱私權政策</a></li>
                                        <li><a href="returnPolicy.php" target="_blank">▋退換貨政策</a></li>
                                    </ul>
                                </div>






                                <div class="box_tablet col-lg-2 col-md-2 col-sm-4">
                                    <div><img src="./images/logo/logo_nav.svg" alt=""> </div>
                                    <div><h4>購物優惠</h4></div>
                                    <div><h4>入會條件<br>升級VIP</h4></div>
                                    <div><h4>生日禮</h4></div>
                                    <div><h4>會員紅利</h4></div>
                                    <div><h4>滿額購物金</h4></div>
                                    <div><h4>免運條件</h4></div>
                                    <div><h4>其他優惠</h4></div>
                                </div>

                                <div class="box_tablet col-lg-5 col-md-5 col-sm-4">
                                    <div><h4>薰衣草森林「好朋友」&ensp;</h4><img src="./images/icon/smile.svg" alt=""></div>
                                    <div><span><h4>－</h4></span></div>
                                    <div><a href="register.php">官網註冊</a></div>
                                    <div class="row m-0">
                                        <div class="col-12"><h4>$ 200</h4> 購物金</div>
                                        <div class="col-12"><span>(使用期限一個月內)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">消費 $ 100換1點，1點折抵1元</div>
                                        <div class="col-12"><span>(有效期限~當年度12/31)</span></div>
                                    </div>
                                    <div><h4>－</h4></div>
                                    <div>滿&ensp; <h4 style="color: rgb(255, 0, 140);">$ 1,500</h4>&ensp;免運</div>
                                    <div class="col-12">贈門票&ensp;<h4>1</h4>&ensp;張</div>
                                </div>


                                <div class="box_tablet col-lg-5 col-md-5 col-sm-4">
                                    <div><h4>薰衣草森林「家族成員」&ensp;</h4><i class="fa-lg fas fa-crown ts1" style="color:gold"></i></div>
                                    <div class="row m-0">
                                        <div class="col-12">定價<h4>85</h4>折</div>
                                        <div class="col-12"><span>(森林體驗、夜宿薰衣草森林、餐飲)</span></div>
                                    </div>
                                    <div>一年內累積消費達 <h4 style="color: rgb(255, 0, 140);">$ 5,000</h4></div>
                                    <div class="row m-0">
                                        <div class="col-12"><h4>$ 500</h4> 購物金 </div>
                                        <div class="col-12"><span>(使用期限一個月內)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">消費 $ 100換1點，1點折抵1元</div>
                                        <div class="col-12"><span>(有效期限~當年度12/31)</span></div>
                                    </div>
                                    <div class=" row m-0">
                                        <div class="col-12">單次消費滿$ 3,000， 送</div>
                                        <div class="col-12">&ensp;<h4>$ 100</h4>&ensp;購物金<span>(可於下次購物使用)</span></div>
                                    </div>
                                    <div>滿&ensp;<h4 style="color: rgb(255, 0, 140);">$ 1,000</h4>&ensp;免運</div>
                                    <div class="col-12">贈門票&ensp;<h4>2</h4>&ensp; 張</div>

                                </div>
                                <div class="box_tablet policy"style="width:100%">
                                    <ul >
                                        <li><a href="membership.php" target="_blank">▋會員方案FAQ ＆優惠說明</a></li>
                                        <li><a href="privacyPolicy.php" target="_blank">▋隱私權政策</a></li>
                                        <li><a href="returnPolicy.php" target="_blank">▋退換貨政策</a></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="card-body row p-0 m-0 box_cellphone ">
                            
                                <div class="col-4">
                                    <div><img src="./images/logo/logo_nav.svg" style="height:70%" alt=""> </div>
                                    <div><p>購物優惠</p></div>
                                    <div><p>入會條件<br>升級VIP</p></div>
                                    <div><p>生日禮</p></div>
                                    <div><p>會員紅利</p></div>
                                    <div><p>滿額購物金</p></div>
                                    <div><p>免運條件</p></div>
                                    <div><p>其他優惠</p></div>
                                </div>
                                <div class=" col-8">
                                    <div><h4>薰衣草森林「好朋友」</h4></div>
                                    <div><span><h4>－</h4></span></div>
                                    <div><a href="register.php">官網註冊</a></div>
                                    <div class="row m-0">
                                        <div class="col-12"><h4>$ 200</h4> 購物金</div>
                                        <div class="col-12"><span>(使用期限一個月內)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">消費 $ 100換1點，1點折抵1元</div>
                                        <div class="col-12"><span>(有效期限~當年度12/31)</span></div>
                                    </div>
                                    <div><p>－</p></div>
                                    <div>滿&ensp; <h4 style="color: rgb(255, 0, 140);">$ 1,500</h4>&ensp;免運</div>
                                    <div class="col-12">贈門票&ensp;<h4>1</h4>&ensp;張</div>

                                </div>
                                <div class=" col-4" style="border-top:2px solid gray">
                                    <div><img src="./images/logo/logo_nav.svg" style="height:70%" alt=""> </div>
                                    <div><p>購物優惠</p></div>
                                    <div><p>入會條件<br>升級VIP</p></div>
                                    <div><p>生日禮</p></div>
                                    <div><p>會員紅利</p></div>
                                    <div><p>滿額購物金</p></div>
                                    <div><p>免運條件</p></div>
                                    <div><p>其他優惠</p></div>
                                </div>
                                <div class="col-8" style="border-top:2px solid gray">
                                    <div><h4 calss="text-center">薰衣草森林「家族成員」<h4></div>
                                    <div class="row m-0">
                                        <div class="col-12">定價<h4>85</h4>折</div>
                                        <div class="col-12"><span>(森林體驗、夜宿薰衣草森林、餐飲)</span></div>
                                    </div>
                                    <div>一年內累積消費達 <h4 style="color: rgb(255, 0, 140);">$ 5,000</h4></div>
                                    <div class="row m-0">
                                        <div class="col-12"><h4>$ 500</h4> 購物金 </div>
                                        <div class="col-12"><span>(使用期限一個月內)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">消費 $ 100換1點，1點折抵1元</div>
                                        <div class="col-12"><span>(有效期限~當年度12/31)</span></div>
                                    </div>
                                    <div class=" row m-0">
                                        <div class="col-12">單次消費滿$ 3,000， 送</div>
                                        <div class="col-12">&ensp;<h4>$ 100</h4>&ensp;購物金<span>(下次購物使用)</span></div>
                                    </div>
                                    <div>滿&ensp;<h4 style="color: rgb(255, 0, 140);">$ 1,000</h4>&ensp;免運</div>
                                    <div class="col-12">贈門票&ensp;<h4>2</h4>&ensp; 張</div>
                                </div>
                                <div class=" col-12 policy">
                                    <p><a href="membership.php" target="_blank">▋會員方案FAQ ＆優惠說明</a></p>
                                    <p><a href="privacyPolicy.php" target="_blank">▋隱私權政策</a></p>
                                    <p><a href="returnPolicy.php" target="_blank">▋退換貨政策</a></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link row   align-items-center  " data-toggle="collapse" href="#collapseTwo">
                                <h4 class="col-lg-8 col-md-8 col-sm-12" >森林防疫懶人包</h4>
                                <p class="col-lg-4 col-md-4 col-sm-12">活動期間：常態</p>

                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <img class="card-img-top m-0" src="./images/news/gardenNews_1.jpg" alt="Card image cap">

                            <div class="card-body">
                                <h4 class="card-title1 text-center"></h4><br>
                                <p class="card-text">薰衣草森林兩園區照常營業，但目前防疫為首要任務，請旅人來訪時，遵循以下守則：</p><br>
                                <p class="card-text">✅入園時<br>step 1.測量體溫<br>step 2.噴灑酒精<br>step 3.填寫實名制表單，並將提交畫面交給園區夥伴確認<br>step 4.購票入園</p><br>                   <p class="card-text">✅在園區<br>- 保持社交距離<br>- 除用餐時全程配戴口罩<br>- 勤洗手</p><br>
                                <p class="card-text">兩園區面積廣闊，有足夠的空間供旅人遊覽，可以盡情與植物連結再連結，但防疫要當心，照顧自己也照顧別人，出外要小心，才能大盡興，薰衣草森林關心您。</p>
                            </div>
                            <div class="card-footer mb-3">
                                <div class="text-muted">※ 繡球花節 活動期間4/17~6/30，<br>目前園區花卉還有 #鼠尾草 #追風草 #小天使花～</p></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="eventInfo">
                <h2 class="title1 b-green rot-135 c_1 ">森林體驗<span>Forest Events</span></h2>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                        <a class="card-link row   align-items-center  " data-toggle="collapse" href="#collapseThrid">
                                <h4 class="col-lg-8 col-md-8 col-sm-12">園區內消費只要滿＄1,000元，即可獲得 " 森林麻吉慢遊券 " 乙本</h4>
                                <p class="col-lg-4 col-md-4 col-sm-12">活動期間：即日起~2021/9/30</p>
                            </a>
                        </div>
                        <div id="collapseThrid" class="collapse" data-parent="#accordion">
                            <img class="card-img-top m-0" src="./images/news/eventNews1_1.jpg" alt="Card image cap">
                            <div class="card-body justify-content center">
                                <p><img src="./images/icon/leaf_R.svg" alt=""> 即日起，至園區內消費只要滿＄1,000元，即可獲得<span>森林麻吉慢遊券</span> 乙本。</p>
                                <p><img src="./images/icon/leaf_R.svg" alt=""> 集結薰衣草森林全品牌加碼的限量優惠（值市價＄10,000元)，好吃、好住、好玩、好逛，一本包辦</p>
                                <p><img src="./images/icon/leaf_R.svg" alt=""> 森林體驗－手作DIY，與孩子一同享手作樂趣將成為你們暑期最悠閒的日常❤️
                                <p>&emsp;&emsp;✅平日手作DIY體驗買一送一（新社/初衷小屋、年輪郵局）<br>&emsp;&emsp;✅平日新社店年輪郵局明信片買一送一</p>
                            </div>
                            <div class="card-body p-3 m-0 justify-content center">
                                <p><a href="event.php"><i class="fas fa-democrat fa-2x"></i> ※森林體驗－線上訂票系統</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <div id="restaurantInfo">
                <h2 class="title1 b-green rot-135 c_1 ">森林咖啡館 <span>Forest Cafe</span></h2>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link row   align-items-center  " data-toggle="collapse" href="#collapseSixth">
                                <h4 class="col-lg-8 col-md-8 col-sm-12">醫護人員優惠</h4>
                                <p class="col-lg-4 col-md-4 col-sm-12">活動期間：~疫情結束</p>

                            </a>
                        </div>
                        <div id="collapseSixth" class="collapse" data-parent="#accordion">
                            <img class="card-img-top m-0" src="./images/news/restaurantNews_1.jpg" alt="Card image cap">
                            <div class="card-body p-3 m-0 justify-content center">
                                <p><a href="restaurant.php"><i class="fas fa-utensils  fa-2x"></i>&emsp; 森林咖啡館－線上訂位系統</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link row   align-items-center  " data-toggle="collapse" href="#collapseForth">
                                <h4 class="col-lg-8 col-md-8 col-sm-12">午茶套餐</h4>
                                <p class="col-lg-4 col-md-4 col-sm-12">活動期間：即日起~2021/12/31</p>
                            </a>
                        </div>
                        <div id="collapseForth" class="collapse" data-parent="#accordion">
                            <div class="row">
                                <img class="col-lg-3 col-md-3 col-sm-12" src="./images/news/restaurantNews2_1.jpg" alt="">
                                <img class="col-lg-3 col-md-3 col-sm-12" src="./images/news/restaurantNews2_2.jpg" alt="">
                                <img class="col-lg-3 col-md-3 col-sm-12" src="./images/news/restaurantNews2_3.jpg" alt="">
                                <img class="col-lg-3 col-md-3 col-sm-12" src="./images/news/restaurantNews2_4.jpg" alt="">
                            </div>
                            <div class="card-body  p-3 m-0 justify-content center">
                                <p>從一月一日起，推出 #午茶套餐 ，推出四款熱銷飲品搭配三種鹹甜點心，售價250元，優惠供應時段為每天14:00-16:30。另外新推出 #野菜天婦羅 ，單點180元，凡點主餐可享120元加購價。沒什麼比在美景中吃美食更愜意的，快來尖石吃頓飯吧！</p>
                            </div>
                            <div class="card-body p-3 m-0 justify-content center">
                                <p><a href="restaurant.php"><i class="fas fa-utensils  fa-2x"></i>&emsp; 森林咖啡館－線上訂位系統</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div id="hotelInfo">
                <h2 class="title1 b-green rot-135 c_1 ">夜宿薰衣草森林 <span>Staying the Night in Lavender Forest</span></h2>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link row   align-items-center  " data-toggle="collapse" href="#collapseFifth">
                                <h4 class="col-lg-8 col-md-8 col-sm-12">2021薰衣草節 #早鳥住宿開訂『每日限量四間』</h4>
                                <p class="col-lg-4 col-md-4 col-sm-12">活動期間：2021/1/1~2021/6/30</p>

                            </a>
                        </div>
                        <div id="collapseFifth" class="collapse" data-parent="#accordion">
                            <div class="d-flex">
                                <img src="./images/news/hotelNews1_1.jpg" alt="">
                                <img src="./images/news/hotelNews1_2.jpg" alt="">
                                <img src="./images/news/hotelNews1_3.jpg" alt="">
                                <img src="./images/news/hotelNews1_4.jpg" alt="">
                                <img src="./images/news/hotelNews1_5.jpg" alt="">
                            </div>
                            <div class="card-body p-3 m-0 justify-content center">
                                <h4>🌲享受被薰衣草花田喚醒的早晨🌲</h4>
                                <p>※ 2021薰衣草節 #早鳥住宿開訂『每日限量四間』</p>
                                <div>
                                    <p>
                                        ✅方案一：【多人包館】
                                        <br>&ensp;&ensp;<img src="./images/icon/checkmark.svg">適合15人以上（上限20人）
                                        <br>&ensp;&ensp;<img src="./images/icon/checkmark.svg">平日$1,000/人、旺日$1,200/人
                                    </p>
                                    <br>
                                    <p>
                                        ✅方案二：【6人小團】：
                                        <br>&ensp;&ensp;<img src="./images/icon/checkmark.svg">本館房型；每日限量一組
                                        <br>&ensp;&ensp;<img src="./images/icon/checkmark.svg">平日NT$6,400；旺日NT$7,600
                                        <br>&ensp;&ensp;<img src="./images/icon/checkmark.svg">四人房+雙人房+7.8坪溫馨客廳
                                    </p>

                                     
                                </div>
                                <div>
                                    <p>💬專案說明：
                                        <ul>
                                            <li>2021/1/1~2021/6/30入住均適用</li>
                                            <li>本專案假日、連續假期、農曆春節不適用</li>
                                            <li>不得與其他住宿優惠專案併用</li>
                                            <li>不與其他訂房平台並用</li>
                                            <li>薰衣草林保有專案最終解釋權力</li>
                                        </ul>
                                    </p>
                                </div>
                                <div>
                                    <p><a href="hotel.php"><i class="fas fa-bed fa-2x"></i>&emsp; 夜宿薰衣草森林－線上訂房系統</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    








    </main>

<?php include __DIR__ . '/parts/scripts.php'; ?>

<script>


</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>