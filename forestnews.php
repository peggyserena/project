<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林快報';
$pageName = 'news';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="./css/forestnews.css">
<style>



</style>
<body id="body" class="dark-mode">


<?php include __DIR__ . '/parts/navbar.php'; ?>
    <main>
        <div class="container mt-5" id="forestnews">
            <div id="gardenInfo">
                <h2 class="title1 b-green rot-135 c_1 ">園區相關 <span>Garden Information</span></h2>
                <div id="accordion">
                    <div class="card ">
                        <div class="card-header  py-1 pl-3">
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
                        <div class="card-header  py-1 pl-3">
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
                            <div class="card-footer">
                                <div class="text-muted">※ 繡球花節 活動期間4/17~6/30，<br>目前園區花卉還有 #鼠尾草 #追風草 #小天使花～</p></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <div id="" class="forestnews_row" style="display: none;">
                <h2 class="title1  b-green rot-135 c_1">
                    <span  class="cat_id_H" name="name"  >
                    </span>
                    <span  class="cat_id_E" name="name"  >
                    </span>
                </h2>
                <div class="accordion" style="display: none;">
                    <div class="card">
                        <div class="card-header py-1 pl-3">
                            <a class="card-link row   align-items-center" data-toggle="collapse" href="">
                                <h4 class="name col-lg-8 col-md-8 col-sm-12" name="name"></h4>
                                <p class="col-lg-4 col-md-4 col-sm-12">
                                    <span class="start_date" name="start_date" ></span> ～
                                    <span class="end_date" name="end_date"></span>
                                </p>
                            </a>
                        </div>
                        <div id="" class="collapse" data-parent="#accordion">
                        <img class="card-img-top m-0 forestnews_img_cover" alt="Card image cap">

                            <div class="card-body">
                                <h4 class="name card-title text-center" name="name"></h4>
                                <pre>
                                    <p class="content" name="content"class="card-text" ></p>
                                </pre>
                            </div>
                            <div class="card-footer">
                                <pre>
                                    <p class="notice" name="notice" class="text-muted"></p>
                                    <a id="link_address" name="link_address" href=""><p id="link_title" name="link_title"></p></a>
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    








    </main>

<?php include __DIR__ . '/parts/scripts.php'; ?>

<script>
    readCat();
    function readCat(){
        $.post('api/forestnews-api.php', {
            action: 'readCat',
        }, function(result){
            result.forEach(function(elem){
                output = $($(".forestnews_row")[0]).clone();
                output.find(".cat_id_H").text(elem['name']);
                output.find(".cat_id_E").text(elem['en_name']);
                output.attr("id", "forestnews_row" + elem['id']);
                output.show();
                $("#forestnews").append(output);
            })
            readData();
        }, 'json').fail(function(data){
            console.log('error');
            console.log(data);
        })
    }
    function readData(){
            d = new Date();
            year = d.getFullYear();
            month = d.getMonth() + 1;
            $.post('api/forestnews-api.php', {
                action: 'readAll',
                year,
                month,
                cat_id: "",
                order: "",
            }, function(result){
                data = result['data'];
                img = result['img'];
                data.forEach(function(elem){
                    forestnews_row = $(`#forestnews_row${elem['cat_id']}`);
                    accordion = $($(forestnews_row).find(".accordion")[0]).clone();
                    elem['img'] = img[elem['id']];
                    fillData(elem, accordion);
                    accordion.show();
                    forestnews_row.append(accordion);
                });

                
            }, 'json').fail(function(data){
            })
        }
    function fillData(data, elem){
        var forestnews_img_cover = "";
        if (typeof(data['img']) !== "undefined"){
            forestnews_img_cover = "<?= WEB_ROOT."/" ?>" + data['img'][0]['path'];
        }
        list = [
                {
                    selector: ".name",
                    text: data['name'],
                },
                {
                    selector: ".card-link",
                    attr: {
                        href: `#forestnews_${data['id']}`
                    }
                },
                {
                    selector: ".collapse",
                    attr: {
                        id: `forestnews_${data['id']}`
                    }
                },
                {
                    selector: ".start_date",
                    text: data['start_date'],
                },
                {
                    selector: ".end_date",
                    text: data['end_date'],
                },
                {
                    selector: ".content",
                    text: data['content'],
                },
                {
                    selector: ".notice",
                    text: data['notice'],
                },
                {
                    selector: "#link_address",
                    attr: {
                        src: data['link_address'],
                    }

                },
                 {
                    selector: "#link_title",
                    text: data['link_title'],
                },
                {
                    selector: ".forestnews_img_cover",
                    attr: {
                        src: data['img'][0]['path'],
                    },
                },
            ]
        
        // map
        // {
        //     selector: "#forestnews_name",
        //     attr: {
        //         text: data['name']
        //     }
        // }
        list.forEach(function(m){
            // attr
            // attr: {
            //         src: <?= WEB_ROOT."/" ?>data['img'][0]['path']
            //     }
            if ('text' in m){
                $(elem).find(m['selector']).text(m['text']);
            }
            if ('value' in m){
                $(elem).find(m['selector']).val(m['value']);
            }
            for (attr_key in m['attr']){
                // fill_key = 'src'
                // m['attr']['src']
                $(elem).find(m['selector']).attr(attr_key, m['attr'][attr_key]);
            }
        });

    }

</script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>