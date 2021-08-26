<?php include __DIR__. '/parts/config.php'; ?>
<?php
$title = '出貨管理';
$pageName = 'staff_cart-confirm';

$sum = 0;
?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>

<style>
    @media print{
    * {-webkit-print-color-adjust: exact !important;}
    }
    body {
  background: linear-gradient(45deg, #e8ddf1 0%, #e1ebdc 100%);
  position: relative;
  z-index: -10;
}

.card img {
    width: 2.5rem;
}
.orderStatus div {
    margin: 1rem;
}
.discountTip {
    background-color: #fff1ab;
    padding: 0;
}
.finalPrice {
    background-color: #fff1ab;
    color: darkblue;
    border-bottom: 1px solid lightgray;
}

.container {
    text-align: justify;
}
.cardContent span {
    line-height: 2rem;
}
.track img {
    width: auto;
    height: 12.8px;
    margin: 0.5rem 0.3rem 0.5rem 0rem;
}
</style>

<?php include "parts/modal.php"?>
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
    <div id="div_print">
        <div class="row card con_01 mb-5" >
            <div class="col-12 pt-4  d-flex justify-content-between">
                <h4>訂單編號：<span id="order_id"></span></h4> 
                <h4>訂單日期：<span id="order_create_datetime"></span></h4> 
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
            </div>

            <div class="" style="padding: 0 15px;">
                <h3 class="title p-2 b-green rot-135">金額計算</h3>
                <div class="finalPrice alert   m-0" role="alert">
                    <h4 class="m-0"> 原價： <span class="originalPrice c_pink_t"></span> - 折扣： <span class="discountPrice c_pink_t"></span> - 購物金： <span class="couponPrice c_pink_t"></span> + 運費： <span class="ShippingFee c_pink_t"></span> = 總計： <span class="totalPrice c_pink_t"></span></h4>
                </div>
                <div class="discountTip ">
                    <div class="alert"　 role="alert">
                    
                    </div>
                </div>

            </div>
            <div class="orderStatus  " style="padding: 0 15px;">
                <div class="d-flex"> 
                    <h4>訂單狀態：<small id="status"></small></h4> &emsp;
                    <h4>付款方式：<small class="payment_method"></small></h4>
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
                    <div id="cloudR" type="radio" name="receiptType" value="cloudR">雲端發票 捐贈發票 公司紙本 個人紙本</div>
                    <div class="cloudR">＊雲端發票＊會員載具 手機條碼 自然人憑證條碼</div>
                    <div class="DR"> ＊捐贈發票＊捐贈單位全名</div>
                    <div class="CR"> ＊公司紙本＊請輸入發票抬頭 請輸入統一編號
                        <div class="cr_information">發票寄送地址：同訂購人 同收件人 其他 </div>
                    </div>
                    <div class="PR"> ＊個人紙本＊請輸入發票抬頭 請輸入統一編號
                        <div class="pr_information">發票寄送地址：同訂購人 同收件人 其他 </div>
                    </div>
                </div>
                <hr>                
                <div>
                    <h4>寄送方式：<small class="mb-3"><span id="shipment"></span>&emsp;<span id="shipmentNote"></span></small></h4>
                    <h4>出貨狀態：<small class=""><span class="shipment_status"></span></small></h4>
                </div>
            </div>


        </div>

        <div class="row card con_01  mt-5">
            <h3 class="title p-2 b-green rot-135">出貨管理</h3>
            <div style="padding: 15px;">
                <div id="inputContentBox" style="display: none;">
                    <form onsubmit="shipmentConfirm(); return false;">
                        <h4>物流編號：<input type="text" name="shipment_num" class="shipment_num" required><button type="submit" class="custom-btn btn-4 text-center m-3 c_1 shipmentConfirm"><small>出貨確認</small></button></h4>
                    </form>
                    
                    <form onsubmit="shipmentConfirm(); return false;">
                        <h4>現場取貨付款：
                            <input id="cd" type="radio" name="payment_method" value="信用卡" required/><label for="cd">信用卡</label>
                            <input id="cod" type="radio" name="payment_method" value="付現" required/><label for="cod">付現</label>
                            <img src="./images/icon/arrow_g_r.svg" alt="" style="  width: auto;height: 12.8px; margin: 0.5rem 0 0.5rem 0.3rem;">
                            <label for="cash">收取金額：</label><input type="number" id="receiveMoney" required><!-- 確認輸入金額=銷售金額 -->
                            <button type="submit" class="custom-btn btn-4 text-center m-3 c_1 shipmentConfirm"><small>出貨確認</small></button>
                        </h4>
                    </form>
                </div>
                <div id="textContentBox" style="display: none;">
                    <h4>付款方式：<span class="payment_method"></span></h4>
                    <h4 id="shipment_num_h4">物流編號：<span class="shipment_num"></span></h4>
                    <h4><span id="pickup"></span></h4>
                    <h4 class="">出貨狀態：<span class="shipment_status"></span></h4>
                    <h4 class="">出貨時間：<span class="shipment_datetime"></span></h4>
                </div>
                <h4>貨件追蹤查詢：<span style="font-size: 1rem;"class="track" id="shipmentTrack">
                </span></h4>
            </div>
        </div>
    </div>
</div>
<div class="m-3 text-center">
    <button name="print" type="button" id="bt"  class="custom-btn btn-4 text-center m-3 c_1" value="" >點選列印</button>
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
        'action': 'readOneStaff',
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
            $(".discountTip div").html(output);


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
         $("#order_create_datetime").text( data['order']['create_datetime']);
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
         $(".payment_method").text(data['order']['payment_method']);
         $("#shipment").text(data['shipment']['name']);
         $("#shipmentNote ").text(data['shipment']['note']);
         $(".shipment_status ").text(data['order']['shipment_status']);
         $(".shipment_num ").text(data['order']['shipment_num']);
         $(".shipment_datetime ").text(data['order']['shipment_datetime']);
         $("#receiveMoney").attr("max", data['order']['price']);
         $("#receiveMoney").attr("min", data['order']['price']);
         if (data['order']['shipment_status'] === "已出貨"){
            $("#textContentBox").show();
         }else{
            $("#inputContentBox").show();
         }
         if (data['order']['shipment_num'] === ""){
            $("#shipment_num_h4").hide();
            $("#pickup").text("現場付款取貨");
         }
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
                outputTrack = `<span><a href="${elem['trackweb']}" target="_blank"><img src="./images/icon/arrow_g_r.svg" alt="" style="  width: auto;height: 12.8px; margin: 0.5rem 0.3rem 0.5rem 0rem;">${elem['name']}</a></span>`;
                $("#shipmentTrack").append(outputTrack);
            })
            $("input[type='radio'][name='shipment']").change(function(){
                calPrices();
            });
        }, 'json')
    }
    readShipment();

</script>
<script>
        const shipmentConfirm = function() {
        $.post('<?= WEB_API ?>/staff_order-api.php', {
                action: 'shipment',
                order_id: <?= $_GET['id'] ?>,
                shipment_num: $("[name='shipment_num']").val(),
                payment_method: $("input[type='radio'][name='payment_method']:checked").val(),
            }, function(data) {
                if (data[0] === "success"){
                    modal_init();
                    insertPage("#modal_img", "animation/animation_success.html");
                    insertText("#modal_content", "確認出貨");
                    $("#modal_alert").modal("show");
                    setTimeout(function(){ location.href = "staff_order_search.php"}, 2000);
                }
            }, 'json')
            .fail(function(e) {
                console.log("error-checkoutCart");
                console.log(e);
                alert("error");
            });
    };
    function checkReceiveMoney(){
        value = $("#receiveMoney").val();
        max = $("#receiveMoney").attr("max");
        console.log([value , max]);
        if (value !== max){
            $(".shipmentConfirm").prop("disabled", "addAttribute");
        }else{
            $(".shipmentConfirm").prop("disabled", "");
        }
    }
    $("#receiveMoney").change(checkReceiveMoney);
</script>
<script language="javascript"> 
    function printdiv(printpage){ 
        var newstr = printpage.innerHTML; 
        var oldstr = document.body.innerHTML; 
        document.body.innerHTML =newstr; 
        window.print(); 
        document.body.innerHTML=oldstr; 
        return false; 
        } 
        window.onload=function()
        {
        var bt=document.getElementById("bt");
        var div_print=document.getElementById("div_print");
        bt.onclick=function()
        {
        printdiv(div_print);
        }
    }
    
</script> 

<?php include __DIR__ . '/parts/html-foot.php'; ?>