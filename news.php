<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林快報';
$pageName = 'news';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<style>
body {
    background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
}
#gardenInfo, #eventInfo, #hotelInfo, #restaurantInfo{
    box-shadow: 0px 0px 15px #666E9C;
    -webkit-box-shadow: 0px 0px 15px #666E9C;
    -moz-box-shadow: 0px 0px 15px #666E9C;
    margin-bottom:2rem;
}
#gardenInfo img{
    height:3rem;
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
    font-weight:500;
}

#collapseOne .card-body>div{
    margin:0;
    padding:0;
}
#collapseOne .card-body .col-lg-2:first-child {
    background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
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
    color:#0000e3;
    padding:0.6rem 0.5rem 0.6rem 2rem;
}
#accordion .card .card-header h4 span {
    font-size:1.2rem;
    font-weight:500;
}

#collapseOne .card-body>div h4{
    color:#C07AB8;
}


#collapseThrid img{
    height:100%
}
#collapseTwo img{
    height:100%
}
.card-body h4{
    color:#0000e3;
}

h3, h4{
    margin:0;
    display:inline-block;
}

 


</style>

<?php include __DIR__ . '/parts/navbar.php'; ?>
    <main>
        <div class="container mt-5">
            <div id="gardenInfo">
                <h2 class="title1 b-green rot-135 c_1 ">園區相關 <span>Register</span></h2>
                <div id="accordion">
                    <div class="card ">
                        <div class="card-header  p-0">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            <h4 class="  ">會員優惠 <span>Membership Benefits</span></h4>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse " data-parent="#accordion">
                            <div class="card-body row p-0 m-0 ">
                                <div class="col-lg-2 col-md-2 col-sm-4">
                                    <div><img src="./images/logo/logo_nav.svg" alt=""> </div>
                                    <div>購物優惠</div>
                                    <div>入會條件<br>升級VIP</div>
                                    <div>生日禮</div>
                                    <div>會員紅利</div>
                                    <div>滿額購物金</div>
                                    <div>免運條件</div>
                                    <div>其他優惠</div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-4">
                                    <div><h4>薰衣草森林好友</h4></div>
                                    <div><span><h4>－</h4></span></div>
                                    <div><a href="register.php">官網註冊</a></div>
                                    <div class="row m-0">
                                        <div class="col-12"><h4>$ 200</h4> 購物金</div>
                                        <div class="col-12"><span>(使用期限一個月內)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">消費 $ 100換1點，1點折抵1元</div>
                                        <div class="col-12"><span>(有效期限至當年度12/31)</span></div>
                                    </div>
                                    <div><span><h4>－</h4></span></div>
                                    <div>滿&ensp; <h4>$ 1,500</h4>&ensp;免運</div>
                                    <div class="col-12">贈門票&ensp;<h4>1</h4>&ensp;張</div>

                                </div>

                                <div class="col-lg-5 col-md-5 col-sm-4">
                                    <div><h4>薰衣草森林家族成員&ensp;<i class="fas fa-crown" style="color:gold"></i></h4></div>
                                    <div class="row m-0">
                                        <div class="col-12">定價<h4>85</h4>折</div>
                                        <div class="col-12"><span>(森林體驗、夜宿薰衣草森林、餐飲、網購)</span></div>
                                    </div>
                                    <div>一年內累積消費達 <h4>$ 5,000</h4></div>
                                    <div class="row m-0">
                                        <div class="col-12"><h4>$ 500</h4> 購物金 </div>
                                        <div class="col-12"><span>(使用期限一個月內)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">消費 $ 100換1點，1點折抵1元</div>
                                        <div class="col-12"><span>(有效期限至當年度12/31)</span></div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">單次消費滿$ 3,000，送&ensp;<h4>$ 100</h4>&ensp;購物金</div>
                                        <div class="col-12"><span>(可於下次購物使用)</span></div>
                                    </div>
                                    <div>滿&ensp;<h4>$ 1,000</h4>&ensp;免運</div>
                                    <div class="col-12">贈門票&ensp;<h4>2</h4>&ensp; 張</div>

                                </div>
                                <div>
                                    <a href="">▋會員方案 FAQ ＆優惠說明</a><a href="">▋隱私權政策</a><a href="">▋退換貨政策</a>
                                </div>


 
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                            <h4 class="  ">森林防疫懶人包<span></span></h4>
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
                <h2 class="title1 b-green rot-135 c_1 ">森林體驗 <span>Forest Events</span></h2>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link" data-toggle="collapse" href="#collapseThrid">
                            <h4 class="  ">醫護人員優惠 <span>Medical Workers Benefits</span></h4>
                            </a>
                        </div>
                        <div id="collapseThrid" class="collapse" data-parent="#accordion">
                            <img class="card-img-top m-0" src="./images/news/restaurantNews_1.jpg" alt="Card image cap">
                            <div class="card-body row p-0 m-0 justify-content center">
 
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            <h4 class="  ">會員優惠 <span>Membership Benefits</span></h4>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body row p-0 m-0 justify-content center">
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
                            <a class="card-link" data-toggle="collapse" href="#collapseThrid">
                            <h4 class="  ">醫護人員優惠 <span>Medical Workers Benefits</span></h4>
                            </a>
                        </div>
                        <div id="collapseThrid" class="collapse" data-parent="#accordion">
                            <img class="card-img-top m-0" src="./images/news/restaurantNews_1.jpg" alt="Card image cap">
                            <div class="card-body row p-0 m-0 justify-content center">
 
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            <h4 class="  ">會員優惠 <span>Membership Benefits</span></h4>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body row p-0 m-0 justify-content center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="hotelInfo">
                <h2 class="title1 b-green rot-135 c_1 ">夜宿薰衣草森林 <span>Sleeping in Lavender Forest</span></h2>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link" data-toggle="collapse" href="#collapseThrid">
                            <h4 class="  ">醫護人員優惠 <span>Medical Workers Benefits</span></h4>
                            </a>
                        </div>
                        <div id="collapseThrid" class="collapse" data-parent="#accordion">
                            <img class="card-img-top m-0" src="./images/news/restaurantNews_1.jpg" alt="Card image cap">
                            <div class="card-body row p-0 m-0 justify-content center">
 
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header  p-0">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            <h4 class="  ">會員優惠 <span>Membership Benefits</span></h4>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body row p-0 m-0 justify-content center">
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