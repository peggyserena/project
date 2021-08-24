<?php include __DIR__. '/parts/config.php'; ?>
<?php
$title = '感謝購買';
$pageName = 'cart-confirm';

if(
        ! isset($_SESSION['user'])
){
    header('Location: index.php');
    exit;
}
$sum = 0;
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>

<style>
    body {
        background: linear-gradient(45deg, #e8ddf1 0%, #e1ebdc 100%);
        position: relative;
        z-index: -10;

    }



    .card img{
        width:2.5rem;
    }
    .orderStatus div{
        margin:1rem;
    }
    .orderStatus span{
        color:gray;
    }
    .discountTip{
        background-color:#fff1ab; 
        color:gray;
        padding:0;
    }
    .finalPrice{
        background-color:#fff1ab; 
        color:darkblue;
        border-bottom:1px solid lightgray;
    }
    
    .container{
        text-align:justify;
    }
    .cardContent span{
        line-height:2rem;
    }
    .track img{
      width: auto;
      height: 12.8px;
      margin: 0.5rem 0.3rem 0.5rem 0rem ;
    }
    .track li {
      margin: 0 1rem  ;
      transition: 0.5s ease;
    }
    .track li:hover{
    transform: translateX(0.5rem);
    }
    .track li a:hover{
    color:#83a573;
    font-weight: 700;
    }

    </style>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<div class="container mt-5 mb-5  ">
    <div class="card  row mb-5 con_01" >
        <div class="card-body " >
            <?php if (($_GET['type'] ?? "") != 'search') : ?>
                <div class="cardContent alert-danger">
                    <h3 class=" b-green rot-13 p-2 title  d-none d-sm-block"><img src="./images/icon/leaf_L.svg" alt="">&emsp;感謝您的訂購！期待與您在薰衣草相見喔！&emsp;<img src="./images/icon/leaf_R.svg" alt=""></h3> 
                    <h3 class=" b-green rot-13 p-2 title  d-sm-block d-md-none row mx-0">
                        <img class="co1-2" src="./images/icon/leaf_L.svg" alt="">
                        <span class="col-8 px-2" >&emsp;感謝您的訂購！<br> 期待與您在薰衣草相見喔！&emsp;</span>
                        <img class="co1-1" src="./images/icon/leaf_R.svg" alt="">
                    </h3> 
                    <h4 class="pt-4 text-dark text-center">⚠️ 提醒您 ⚠️</h4> 
                    <p class="p-4 text-dark">最近網路詐騙猖獗，您完成購買後（或是未曾購買過），我們都不會以電話通知您更改付款方式、 或是要求給予銀行帳號及密碼。<br>若有接到此類電話且，非薰衣草森林的客服專線02-25962996撥打，則請勿理會！或撥打165反詐騙專線、165反詐騙APP報案！<br>如有任何問題，歡迎私訊薰衣草森林粉絲團或官方LINE詢問，也可於上班時間（週一至週日9:30-18:00）撥打客服電話詢問</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row card con_01 ">
        <div class="col-12 pt-4 text-secondary">
            <h4>訂單編號：<span id="order_id"></span></h4> 
        </div>
        <div class="col-12  ">
            <table class="table table-striped table-bordered" id="restaurant_table" style="display: none;">
                <thead>
                    <tr class=" title b-green rot-135">
                        <td colspan="100%"><h4 class=" title b-green rot-135 p-1">訂單明細 - 森林咖啡館</h4></td>
                    </tr>
                    <tr class="b-green rot-135 text-white">
                        <th scope="col" class="m-0 t_shadow text-center">
                            訂位日期
                        </th>
                        <th scope="col" class="m-0 t_shadow text-center">時段</th>
                        <th scope="col" class="m-0 t_shadow text-center">人數</th>
                        <th scope="col" class="m-0 t_shadow text-center">桌號</th>
                        <th scope="col" class="m-0 t_shadow text-center">單價</th>
                        <th scope="col" class="m-0 t_shadow text-center">小計</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <table class="table table-striped table-bordered" id="event_table" style="display: none;">
                <thead>
                    
                    <tr class=" title b-green rot-135">
                        <td colspan="100%"><h4 class=" title b-green rot-135 p-1">訂單明細 - 森林體驗</h4></td>
                    </tr>
                    
                    <tr class="b-green rot-135 text-white">
                        <th scope="col" class="m-0 t_shadow text-center">
                            項目名稱
                        </th>
                        <th scope="col" class="m-0 t_shadow text-center">日期／時間</th>
                        <th scope="col" class="m-0 t_shadow text-center">人數</th>
                        <th scope="col" class="m-0 t_shadow text-center">單價</th>
                        <th scope="col" class="m-0 t_shadow text-center">小計</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <table class="table table-striped table-bordered" id="hotel_table" style="display: none;">
                <thead>
                    
                    <tr class=" title b-green rot-135">
                        <td colspan="100%"><h4 class=" title b-green rot-135 p-1">訂單明細 - 夜宿薰衣草</h4></td>
                    </tr>
                    <tr class="b-green rot-135 text-white">
                        <th scope="col" class="m-0 t_shadow text-center">
                            項目名稱
                        </th>
                        <th scope="col" class="m-0 t_shadow text-center">住宿日期</th>
                        <th scope="col" class="m-0 t_shadow text-center">房數</th>
                        <th scope="col" class="m-0 t_shadow text-center">人數</th>
                        <th scope="col" class="m-0 t_shadow text-center">單價</th>
                        <th scope="col" class="m-0 t_shadow text-center">小計</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="finalPrice alert  text-center mx-0 my-5" role="alert">
                <h4 class="m-0">原價 : <span class="originalPrice"></span> - 折扣: <span class="discountPrice"></span> - 購物金： <span class="couponPrice"></span> + 運費： <span class="ShippingFee"></span> = 總計: <span class="totalPrice c_pink_t"></span></h4>
                <hr>
                <div class="row ">
                    <div class="discountTip col">
                        <h4 class="alert text-center m-0 p-0 "　 role="alert"> </h4>
                    </div>
                </div>
            </div>
            <div class="orderStatus text-secondary ">
                <div class="d-flex"> 
                    <h4>訂單狀態：<small id="status"></small></h4> &emsp;
                    <h4>付款方式：<small id="payment_method"></small></h4>
                </div>
                <hr>
                <div>
                    <h4>收貨人資料</h4>
                    <div class="">
                        <p>收貨人：<span id="fullname"></span></p>
                        <p>連絡電話：<span id="mobile"></span></p>
                        <p>送貨地址：
                          <span id="zipcode"></span>
                          <span id="county"></span>
                          <span id="district"></span>
                          <span id="address"></span>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="receiptType">
                    <h4>發票類型</h4>
                    <div id="cloudR" type="radio" name="receiptType" value="cloudR">雲端發票 捐贈發票 公司紙本 個人紙本<div>
                        <div class="cloudR">＊雲端發票＊會員載具 手機條碼 自然人憑證條碼</div>
                        <div class="DR"> ＊捐贈發票＊捐贈單位全名</div>
                        <div class="CR"> ＊公司紙本＊請輸入發票抬頭 請輸入統一編號
                            <div class="cr_information">發票寄送地址：同訂購人 同收件人 其他 </div>
                        </div>
                        <div class="PR"> ＊個人紙本＊請輸入發票抬頭 請輸入統一編號
                            <div class="pr_information">發票寄送地址：同訂購人 同收件人 其他 </div>
                        </div>
                    </div>
                </div>
                <hr>                
                <div>
                    <h4>物流狀態</h4>
                    <p class="mb-3">寄送方式：<span id="shipment"></span>&emsp;<span id="shipmentNote"></span></p>
                    <h4>貨件追蹤查詢</h4>
                    <div class="track" id="shipmentTrack">
                        <ul class=" row list-unstyled">
                        </ul>
                    </div>
            

                    <p class="mb-3">顯示備貨/出貨</p>
                    <p class="mb-3">物流編號：</p>
                </div>
            </div>
            <hr>

        </div>

        <div class="mb-5 text-center">
            <a href="index.php" class="custom-btn btn-4 text-center m-3">回首頁</a>
            <a href="member.php?tab=tradeRecord"  class="custom-btn btn-4 text-center m-3">查詢訂單</a>
        </div>
    </div>
</div>

<?php include __DIR__. '/parts/scripts.php'; ?>
<script>
$(document).ready(function(){
    fillTable();
});

function fillTable(){
    var url_string = window.location.href
    var url = new URL(url_string);
    var id = url.searchParams.get("id");
    $.post('<?= WEB_API ?>/order-api.php', {
        'action': 'readOne',
        id
    }, function(data){
        var type_list = ['event', 'hotel', 'restaurant'];
        type_list.forEach(function(elem){
            if (data[elem].length > 0){
                $(`#${elem}_table`).show();
            }
        })
        
        // discountTip
        var empty = function (data){
            return data.length == 0;
        }
        var output = "";
        if (empty(data['event']) && empty(data['hotel']) && !empty(data['restaurant'])) { 
            output = '<h4 class="m-0 text-left">加購<a href="event.php">「森林體驗」</a>或<a href="hotel.php">「夜宿薰衣草森林」</a>，出示「森林體驗」票券或房卡，可享有「森林咖啡館」用餐<span class="c_pink_t">9</span>折；如加購兩者，可享全面<span class="c_pink_t">85</span>折優惠喔！</h4>';
        } else if (!empty(data['event']) && !empty(data['hotel']) && !empty(data['restaurant'])) { 
            output = '<h4 class="m-0">目前折扣為<span class="c_pink_t">85</span>折；出示房卡至「森林咖啡館」用餐，也享有<span class="c_pink_t">85</span>折優惠喔！</h4>';
        } else if (empty(data['event']) && !empty(data['hotel']) && !empty(data['restaurant'])) { 
            output = '<h4 class="m-0">出示房卡至「森林咖啡館」用餐，享有<span class="c_pink_t">9</span>折優惠喔！</h4>';
        } else if (!empty(data['event']) && empty(data['hotel']) && !empty(data['restaurant'])) { 
            output = '<h4 class="m-0">出示 "森林體驗票券" 至「森林咖啡館」用餐，享有<span class="c_pink_t">9</span>折優惠喔！</h4>';
        } else if (empty(data['event']) && !empty(data['hotel']) && empty(data['restaurant'])) { 
            output = '<h4 class="m-0">出示房卡至「森林咖啡館」用餐，享有<span class="c_pink_t">9</span>折優惠喔！</h4>';
        } else if (!empty(data['event']) && empty(data['hotel']) && empty(data['restaurant'])) { 
            output = '<h4 class="m-0">出示「森林體驗」票券至「森林咖啡館」用餐，享有<span class="c_pink_t">9</span> 折優惠喔！</h4>';
        } else if (!empty(data['event']) && !empty(data['hotel']) && empty(data['restaurant'])) { 
            output = '<h4 class="m-0">目前折扣為<span class="c_pink_t">85</span>折；出示房卡至「森林咖啡館」用餐，也享有<span class="c_pink_t">85</span>折優惠喔！</h4>';
        } 
        $(".discountTip h4").append(output);


        data['event'].forEach(function(elem){
            var id = elem['id'];
            tr = `<tr class="text-center">
                    <td><a href="event_item.php?id=${id}">${elem['name']}</a></td>
                    <td>${elem['order_datetime'].slice(0, elem['order_datetime'].length - 3)}</td>
                    <td>${elem['quantity']}</td>
                    <td class="event_price">$ ${dallorCommas(elem['price'])}</td>
                    <td class="event_sub-total">$ ${dallorCommas(elem['sub_total'])}</td>
                </tr>`;
            $('#event_table tbody').append(tr);
        });

        data['restaurant'].forEach(function(elem){
            tr = `<tr class="text-center" data-sid="${elem['id']}">
                                    <td>${elem['order_date']}</td>
                                    <td>${elem['order_time'].slice(0,5)}</td>
                                    <td>${elem['quantity']}</td>
                                    <td>${elem['id']}</td>
                                    <td class="restaurant_price">$0</td>
                                    <td class="restaurant_sub-total">$<?= intval(0) * 100 ?></td>
                                </tr>`;
            $('#restaurant_table tbody').append(tr);
        });

        data['hotel'].forEach(function(elem){
            tr = `<tr class="text-center" data-sid="${elem['id'] }">
                                    <td>${elem['name_zh'] }</br>${elem['name_en'] }</td>
                                    <td>${elem['order_date']}</td>
                                    <td>${elem['quantity'] }</td>
                                    <td>${elem['people_num'] }</td>
                                    <td class="hotel_price">$ ${dallorCommas(elem['price'])}</td>
                                    <td class="hotel_sub-total">$${dallorCommas(elem['sub_total'])} </td>
                                </tr>`;
            $('#hotel_table tbody').append(tr);
        });
         $("#order_id").text( data['order']['order_id']);
         $(".originalPrice").text( dallorCommas(data['order']['original_price']));
         $(".discountPrice").text( dallorCommas(data['order']['discount']));
         $(".couponPrice").text( dallorCommas(data['order']['coupon']));
         $(".ShippingFee").text( dallorCommas(data['order']['shipping_fee']));
         $(".totalPrice").text( dallorCommas(data['order']['price']));
         $("#fullname").html(data['order']['fullname']);
         $("#mobile").html( data['order']['mobile']);
         $("#zipcode").html(data['order']['zipcode']);
         $("#county").html(data['order']['county']);
         $("#district").html(data['order']['district']);
         $("#address").html(data['order']['address']);
         $("#status").html("" +  data['order']['status']);
         $("#payment_method").text(data['order']['payment_method']);
         $("#shipment").text(data['shipment']['name']);
         $("#shipmentNote ").text(data['shipment']['note']);

    }, 'json').fail(function(e){
    });

}
</script>
<script>
        function readShipment(){
        $.get('<?= WEB_API ?>/cart-api.php', {
            type: 'shipment',
            action: 'readAll',
        },function(data) {
            data.forEach(function(elem){
                outputTrack = `<li><a href="${elem['trackweb']}" target="_blank"><img src="./images/icon/arrow_g_r.svg" alt="">${elem['name']}</a></li>`;
                $("#shipmentTrack ul").append(outputTrack);
            })
            $("input[type='radio'][name='shipment']").change(function(){
                calPrices();
            });
        }, 'json')
    }
    readShipment();

</script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>