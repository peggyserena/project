<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員方案 FＡQ & 折扣及優惠說明';
$pageName = 'membership';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<style>

    body {
        background: linear-gradient(45deg, #e1ebdc 0%, #e8ddf1 100%);
        color:black;
        text-align:justify;
    }
    main .container >div>div{
        margin:2rem;
    }

    main .container >div>div>p:first-child{
        color:#0000e3;
        font-weight:500;

    }
    main .container >div>div>h4:last-child{
        color:black;
        font-weight:500;
    }
    main h3{
        line-height:2rem;
        font-weight:700;
    }
    main h4{
        line-height:1.6rem;
        font-weight:600;
        font-size:1.2rem;
    }
    #memberFAQ  p span{
        color:#0000e3;
        font-weight:600;
    }
    #membrtNote  h4 span{
        color:#0000e3;
        font-weight:600;
    }

    #membrtNote  p{
        line-height:1.6rem;
        font-weight:500;
        text-indent: 2rem;
        margin-bottom:1rem;

    }
    main li{
        line-height:1.6rem;
        margin-bottom:0.5rem;
    }


/* ======================================== collapseOne ======================================== */


    #collapseOne h3{
        margin:0;
        display:inline-block;
    }
    #collapseOne h4{
        margin:0;
        display:inline-block;
    }

    #collapseOne img{
        width:100%;
    }

    #collapseOne .col-12{
        padding:0;
    }

    #collapseOne .card-body{
        padding:2rem;
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
    

    #collapseOne .box_cellphone .col-8 h4{
        text-shadow: 0.5px 0.5px 0 white, 0.5px -0.5px 0 white, -0.5px 0.5px 0 white, -0.5px -0.5px 0 white, 0.5px 0px 0 white, 0px 0.5px 0 white, -0.5px 0px 0 white, 0px -0.5px 0 white;
    }
    #collapseOne .card-body:first-child>div h4{
        text-align:center;
        text-shadow: 0.5px 0.5px 0 white, 0.5px -0.5px 0 white, -0.5px 0.5px 0 white, -0.5px -0.5px 0 white, 0.5px 0px 0 white, 0px 0.5px 0 white, -0.5px 0px 0 white, 0px -0.5px 0 white;
    }

    #collapseOne .card-body .col-lg-5 .row span{
        color:gray;
        font-size:0.9rem;
        font-weight:400;
    }
    #collapseOne .card-body .col-lg-5:nth-child(7)>h4{
        font-size:0.9rem;
    }

    #collapseOne .card-body:first-child>div .col-12 h4{
        font-size:1.1rem;
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


    #collapseOne .box_cellphone >div>div{
        font-size:0.9rem;
    }
    #collapseOne .box_cellphone >div>div span{
        font-size:0.8rem;
        font-weight:400;
    }

    #collapseOne .box_cellphone .col-4 p{
        text-shadow: 0.5px 0.5px 0 white, 0.5px -0.5px 0 white, -0.5px 0.5px 0 white, -0.5px -0.5px 0 white, 0.5px 0px 0 white, 0px 0.5px 0 white, -0.5px 0px 0 white, 0px -0.5px 0 white;
    }

</style>

<?php include __DIR__ . '/parts/navbar.php'; ?>
<main>
    <div id="memberFAQ" class="container  mt-5 mb-5 p-0 box_shadow">
        <h2 class="title text-center"> 會員方案 FＡQ</h2>
        <div style="background-color: white;" class="p-3">
            <h3 class="text-center">《薰衣草森林。會員方案 FＡQ》</h3>
             

            <div>
                <p>Q1：如何成為薰衣草森林「好朋友」？</p>
                <p>A1：<strong><a href="register.php">官網註冊</a></strong>，享有專屬優惠服務。</p>
            </div>
            <div>
                <p>Q1：如何成為薰衣草森林「家族成員」？</p>
                <p>A1：凡一年內在薰衣草森林官方商城累計消費達5,000元，消費額滿（付款成功）後，系統將自動於次日將您的會員級別由「好朋友」升級為「家族成員」，升等日即為啟用日，享有專屬優惠服務。</p>
            </div>
            <div>
                <p>Q2：消費如何累計？</p>
                <p>A2：消費金額系統自動累計。</p>
            </div>
            <div>
                <p>Q3：消費累計如何查詢？</p>
                <p>A3：登入官網「會員專區」中查詢。</p>
            </div>
            <div>
                <p>Q4：薰衣草森林「家族成員」是否有期限？</p>
                <p>A4：有的，薰衣草森林「家族成員」限以一年為期。</p>
            </div>
            <div  >
                <p>Q5：如何能延續薰衣草森林「家族成員」？</p>
                <p>A5：薰衣草森林「家族成員」的一年期限內，累計消費 3 次(每次消費達 1000)或總額 3,000元，並未退貨，將自動延續次年之會員資格。若未達條件，待薰衣草森林「家族成員」身份到期後，將不再享有薰衣草森林「家族成員」資格，累計金額歸零重新計算。</p>
            </div>
        </div>

 
    <h2 class="title text-center"> 折扣及優惠說明</h2>
    <div style="background-color: white;" class="p-3">
        <h3 class="text-center">《薰衣草森林。折扣及優惠說明》</h3>
         

        <div class="m-sm-0 ">
            <div id="collapseOne" class="">
                <div class="card-body row  pt-sm-0 ">
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
                        <div> <h4 style="color:#0000e3">薰衣草森林「好朋友」&ensp;</h4><img src="./images/icon/smile.svg" alt=""></div>
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
                        <div>滿&ensp; <h4>$ 1,500</h4>&ensp;免運</div>
                        <div class="col-12">贈門票&ensp;<h4>1</h4>&ensp;張</div>
                    </div>

                    <div class="box_desktop col-lg-5 col-md-5 col-sm-4">
                        <div> <h4 style="color:#0000e3">薰衣草森林「家族成員」&ensp;</h4><i class="fa-lg fas fa-crown ts1" style="color:gold"></i></div>
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
                            <div class="col-12"><span>(有效期限~當年度12/31)</span></div>
                        </div>
                        <div class="box_desktop row m-0">
                            <div class="col-12">單次消費滿$ 3,000，送&ensp;<h4>$ 100</h4>&ensp;購物金</div>
                            <div class="col-12"><span>(可於下次購物使用)</span></div>
                        </div>
                        <div>滿&ensp;<h4>$ 1,000</h4>&ensp;免運</div>
                        <div class="col-12">贈門票&ensp;<h4>2</h4>&ensp; 張</div>
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
                        <div> <h4 style="color:#0000e3">薰衣草森林「好朋友」&ensp;</h4><img src="./images/icon/smile.svg" alt=""></div>
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
                        <div>滿&ensp; <h4>$ 1,500</h4>&ensp;免運</div>
                        <div class="col-12">贈門票&ensp;<h4>1</h4>&ensp;張</div>
                    </div>


                    <div class="box_tablet col-lg-5 col-md-5 col-sm-4">
                        <div> <h4 style="color:#0000e3">薰衣草森林「家族成員」&ensp;</h4><i class="fa-lg fas fa-crown ts1" style="color:gold"></i></div>
                        <div class="row m-0">
                            <div class="col-12">定價<h4>85</h4>折</div>
                            <div class="col-12"><span>(森林體驗、夜宿薰衣草森林、餐飲)</span></div>
                        </div>
                        <div>一年內累積消費達 <h4 >$ 5,000</h4></div>
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
                        <div>滿&ensp;<h4 >$ 1,000</h4>&ensp;免運</div>
                        <div class="col-12">贈門票&ensp;<h4>2</h4>&ensp; 張</div>

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
                        <div> <h4 style="color:#0000e3">薰衣草森林「好朋友」</h4></div>
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
                        <div>滿&ensp; <h4 >$ 1,500</h4>&ensp;免運</div>
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
                        <div><h4 calss="text-center" style="color:#0000e3">薰衣草森林「家族成員」<h4></div>
                        <div class="row m-0">
                            <div class="col-12">定價<h4>85</h4>折</div>
                            <div class="col-12"><span>(森林體驗、夜宿薰衣草森林、餐飲)</span></div>
                        </div>
                        <div>一年內累積消費達 <h4 >$ 5,000</h4></div>
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
                        <div>滿&ensp;<h4 >$ 1,000</h4>&ensp;免運</div>
                        <div class="col-12">贈門票&ensp;<h4>2</h4>&ensp; 張</div>
                    </div>
                </div>

            </div>
        </div>

        <div id="membrtNote" class="mt-5">
            <h4><span>▋</span>注意事項</h4>
            <p>薰衣草森林「家族成員」計畫(以下簡稱本計畫)為僅適用於薰衣草森林官方商城，於其他電商通路或實體通路消費之金額不列入合併計算。
            入會購物金相關事項：入會即贈 100元購物金，首次消費即可折抵使用。購物金折抵機制為單筆消費滿 1,000元及可折抵 100元。</p>
            <br>
            <h4><span>▋</span>生日禮相關事項：</h4>
            <p>
                <ul>
                    <li>生日禮金由系統於生日當天自動發送，使用期限為一個月。<br>Ex: 3/26生日之會員，購物金使用期限為 3/26-4/26。</li>
                    <li>凡加入薰衣草森林官方商城會員即會自動訂閱電子報，無須另外手動訂閱。</li>
                    <li>申請註冊會員時，請正確填寫生日資訊（年／月／日）及電子信箱，並不可任意修改，以保障獲取專屬生日禮物之權益。</li>
                    <li>會員限個人申請，且以一次為限。若重覆入會或以不實資料申請會籍，除取消會員資格與權益外，消費亦不列入積點>。</li>
                    <li>會員瞭解薰衣草森林官方商城得隨時變更或調整會員制度、相關權益及注意事項，故您於每次進入或使用本網站時，請留意會員權益及注意事項。</li>
                    <li>所變更或調整之內容，除特別聲明者外，於變更時生效。相關內容變更後如您繼續使用本網站，即視為您已同意遵守並接受變更內容之拘束。</li>
                </ul>
            </p>
            <br>
            <h4><span>▋</span>升等方式與升等禮相關事項：</h4>
            <p>
                <ul>
                    <li>當每一會員消費於五個月內累積消費達 5,000元，並付款成功且確認無退貨後，系統將自動於次日將您的會員級別升等，升等日即為啟用日，享有專屬優惠服務。</li>
                    <li>現有會員則需完成一筆訂單並付款後，系統會自動追溯該會員過往的消費紀錄，來確認是否有符合設定條件。<br>EX. 會員於6月完成一筆訂單，系統會由新訂單起追溯前6個月的訂單消費金額，來確認是否符合升等條件。</li>
                    <li>薰衣草森林官方商城為會員舉辦不定時專屬活動，特定商品特別優惠價格，請隨時關注官網活動，薰衣草森林官方商城不定期主動通知。</li>
                    <li>會員點數累積以單一會員帳號為主，無法與不同會員帳號合併計算、轉讓。累積會員消費金額紀錄以官方商城會員專區之系統資料庫為主要依據。</li>
                </ul>  
            </p>
            <br>
            <p>薰衣草森林為提供您完善與多元的會員服務，謹依個人資料保護法與本「隱私權保護」蒐集、處理及利用您的個人資料，並承諾尊重以及保護您個人於本公司服務平台的隱私權。請詳細閱讀本隱私權政策，透過本隱私權政策，您將瞭解到本公司如何蒐集、處理、利用以及保護您所提供的資訊。</p>
            <p>如果您對薰衣草森林官方商城有任何建議或疑問，歡迎透過專線與我們聯繫。</p>
            <p>為維護會員權益，如系統產生異常狀況時，薰衣草森林官方商城將暫停消費累積或優惠服務；異常狀況解除時，薰衣草森林官方商城隨即恢復相關服務。</p>
        </div>
    </div>
</main>










<?php include __DIR__ . '/parts/scripts.php'; ?>

<script>

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>