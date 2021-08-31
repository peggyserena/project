<?php require __DIR__ . '/parts/config.php'; ?>
<?php

$title = '購物車';
$pageName = 'cart';
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="./css/cart.css">



<style>

</style>
<!-- <?php var_dump($_SESSION['cart']); ?> -->
<?php include __DIR__ . '/parts/navbar.php'; ?>
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <?php if (isset($_SESSION['user'])) : ?>
              
                <!-- <h3><a href="cart-confirm.php" style="width:100%;" class="custom-btn btn-4 text-center c_1 ">確認結帳</a> </h3> -->
                <!-- <a href="javascript:" onclick="checkOutCart()" >確認結帳</a> -->
            <?php else : ?>
            <div class="alert alert-danger text-center p-0  mt-3 " role="alert">

                <?= $pageName == 'login' ? 'active' : '' ?>
                <a class="nav-link" href="login.php">
                    <h4 class="p-1 m-0 text-danger">請登入會員後再結帳</h4>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if (empty($_SESSION['cart']['event']) && empty($_SESSION['cart']['restaurant']) && empty($_SESSION['cart']['hotel'])) : ?>
    <div class="container mt-5 text-center ">
        <div class="row  ">
            <div class="col ">
                <div class="box_desktop alert alert-danger" role="alert">
                    目前購物車裡沒有商品, 請至商品列表選購～
                </div>
                <div class="box_tablet alert alert-danger" role="alert">
                    目前購物車裡沒有商品, 請至商品列表選購～
                </div>
                <div class="box_cellphone alert alert-danger" role="alert">
                    目前購物車裡沒有商品, 請至商品列表選購～
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
<div class="container mt-5  ">
    <div class="row  text-center ">
        <div class="col ">
            
                <?php if (!empty($_SESSION['cart']['event'])) : ?>
                    <table class="table table-striped table-bordered" id="event_table">
                        <thead>
                            <tr class="b-green rot-135 text-white">
                                <th scope="col" colspan="100%" class="m-0 t_shadow ">
                                    <h3 class=" title2 b-green rot-135">購物車明細 - 森林體驗</h3>
                                </th>
                            </tr>
                            <tr class="b-green rot-135 text-white">
                                <th scope="col" class="m-0 t_shadow ">
                                    項目名稱
                                </th>
                                <th scope="col" class="m-0 t_shadow ">日期／時間</th>
                                <th scope="col" class="m-0 t_shadow ">數量</th>
                                <th scope="col" class="m-0 t_shadow ">費用</th>
                                <th scope="col" class="m-0 t_shadow ">小計</th>
                                <th scope="col" class="m-0 t_shadow "><i class="fas fa-trash-alt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_SESSION['cart']['event']))
                                foreach ($_SESSION['cart']['event'] as $key => $event) : ?>
                                <tr data-sid="<?= $event['id'] ?>">
                                    <a href="even.php? <?= $event['name'] ?>"></a>
                                    <td><?= $event['name'] ?></td><a>
                                        <td><?= $event['date'] . "/" . substr($event["time"], 0, 5) ?></td>
                                        <td><input style="width: 4rem;" class="event_quantity" type="number" min=1 max="<?= $event["limitNum"] - $event["order_quantity"] ?>" value="<?= $event['quantity'] ?>" onchange="calPrices();changeQty(event,'event', <?= $key ?>, this.value)" /></td>
                                        <td class="event_price" data-price="<?= $event['price'] ?>"></td>
                                        <td class="event_sub-total"><?= intval(1) * 100 ?></td>
                                        <td>
                                            <a href="javascript:" onclick="deleteItem(event, 'event', '<?= $key ?>')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (!empty($_SESSION['cart']['restaurant'])) : ?>
                    <table class="table table-striped table-bordered" id="restaurant_table">
                        <thead>
                            <tr class="b-green rot-135 text-white">
                                <th scope="col" colspan="100%" class="m-0 t_shadow text-center">
                                    <h3 class=" title2 b-green rot-135">購物車明細 - 森林咖啡館</h3>
                                </th>
                            </tr>
                            <tr class="b-green rot-135 text-white">
                                <th scope="col" class="m-0 t_shadow text-center">
                                    訂位日期
                                </th>
                                <th scope="col" class="m-0 t_shadow text-center">訂位時段</th>
                                <th scope="col" class="m-0 t_shadow text-center">訂位人數</th>
                                <th scope="col" class="m-0 t_shadow text-center">訂位桌號</th>
                                <th scope="col" class="m-0 t_shadow text-center">費用</th>
                                <th scope="col" class="m-0 t_shadow text-center">小計</th>
                                <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION['cart']['restaurant'] as $key => $restaurant) : ?>
                                <tr data-sid="<?= $restaurant['id'] ?>">
                                    <td><?= $restaurant['order_date'] ?></td>
                                    <td><?= $restaurant['order_time'] ?></td>
                                    <td><?= $restaurant['quantity'] ?></td>
                                    <td><?= implode("、", $restaurant['id']) ?></td>
                                    <td class="restaurant_price">$0</td>
                                    <td class="restaurant_sub-total">$<?= intval(0) * 100 ?></td>
                                    <td>
                                        <a href="javascript:" onclick="deleteItem(event, 'restaurant', '<?= $key ?>')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if (!empty($_SESSION['cart']['hotel'])) : ?>
                    <table class="table table-striped table-bordered" id="hotel_table">
                        <thead>
                            <tr class="b-green rot-135 text-white">
                                <th scope="col" colspan="100%" class="m-0 t_shadow text-center">
                                    <h3 class=" title2 b-green rot-135">購物車明細 - 夜宿薰衣草森林</h3>
                                </th>
                            </tr>
                            <tr class="b-green rot-135 text-white">
                                <th scope="col" class="m-0 t_shadow text-center">
                                    項目名稱
                                </th>
                                <th scope="col" class="m-0 t_shadow text-center">日期</th>
                                <th scope="col" class="m-0 t_shadow text-center">數量</th>
                                <th scope="col" class="m-0 t_shadow text-center">人數</th>
                                <th scope="col" class="m-0 t_shadow text-center">費用</th>
                                <th scope="col" class="m-0 t_shadow text-center">小計</th>
                                <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_SESSION['cart']['hotel']))
                                foreach ($_SESSION['cart']['hotel'] as $key => $hotel) : ?>
                                <tr data-sid="<?= $hotel['id'] ?>">
                                    <td><?= $hotel['name_zh'] ?></br><?= $hotel['name_en'] ?></td><a>
                                        <td><?= $hotel['order_date'] ?></td>
                                        <td><input style="width: 4rem;" class="hotel_quantity" type="number" min=1 max="<?= $hotel['quantity_limit'] - $hotel["order_quantity"] ?>" value="<?= $hotel['quantity'] ?>" onchange="calPrices();changeQty(event,'hotel', <?= $key ?>, this.value)" /></td>
                                        <td><input style="width: 4rem;" class="hotel_people_num" type="number" data-peopleNumLimit="<?= $hotel['people_num_limit'] ?>" min=1 max="" value="<?= $hotel['people_num'] ?>" onchange="changePeopleNum(event,'hotel', <?= $key ?>, this.value);" /></td>
                                        <td class="hotel_price" data-price="<?= $hotel['price'] ?>"></td>
                                        <td class="hotel_sub-total"><?= intval(1) * 100 ?></td>
                                        <td>
                                            <a href="javascript:" onclick="deleteItem(event, 'hotel', '<?= $key ?>')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

        </div>
    </div>
    <div class="shipway ">
        <h3 class="title p-2 b-green rot-135">寄送方式</h3>
        <div class="row mx-2 my-4 " id="shipmentRadio">
        </div>
    </div>

    <div>
        <h3 class="title p-2 b-green rot-135">金額計算</h3>
        <div class="alert  m-0" role="alert">
            <h4>使用購物金： <input class="pl-0"style="width:120px;text-align: center;"  type="number" id="couponBalanceInput" value="0" min=0/> <span> <a href='member.php?tab=coupon'target="_blnk">&emsp;<img src="./images/icon/arrow_g_r.svg" alt=""><small class='font-weight-bold' >購物金查詢</small></a></span></h4> 
                <div class="d-flex text-secondary font-weight-bold">
                    <p class="mr-2"> 目前可使用金額/總購物金餘額： <span id="couponBalance"></span>/<span id="couponTotal"></span></p>
                    <p class="mx-2"> 本次使用金額： <span id="couponBalanceUsed"></span>；</p>
                    <p class="mx-2"> 使用後餘額： <span id="couponFinalBalance"></span></p>
                </div>
        </div>

        <div class="">
            <div class="finalPrice alert   m-0" role="alert">
                <h4 class="m-0"> 原價： <span class="originalPrice c_pink_t"></span> - 折扣： <span class="discountPrice c_pink_t"></span> - 購物金： <span class="couponPrice c_pink_t"></span> + 運費： <span class="ShippingFee c_pink_t"></span> = 總計： <span class="totalPrice c_pink_t"></span></h4>
            </div>
            <div class="discountTip ">
                <div class="alert"　 role="alert">
                   
                </div>
            </div>

        </div>
    </div>   
    <div class="mb-5">
        
        <div>
            <h3 class="title p-2 b-green rot-135">付款方式</h3>
            <div class="mx-2 my-3">
                <input id="cd" type="radio" name="payment_method" value="信用卡" /><label for="cd">信用卡</label>
                <input id="cod" type="radio" name="payment_method" value="付現" /><label for="cod">付現</label>
            </div>
        </div>

        <div class="payment">
            <form action="" method="post">
                <div class="form-container creditCard ">
                    <div class="card-wrapper"></div>
                    <div>
                        <input class="input-field" type="text" name="first-name" placeholder="持卡人全名" />
                        <input class="input-field" type="text" name="number" placeholder="信用卡卡號" />
                        <input class="column-left" type="text" name="expiry" placeholder="到期日 (MM / YY)" />
                        <input class="column-right" type="text" name="cvc" placeholder="安全碼 (CVC)" />
                    </div>
                </div>
                <div class="form-container COD ">
                </div>
            </form>
        </div>
    </div>


</div>


<div class="container">
    <div class="mb-5 ">
        <h3 class=" title p-2 b-green rot-135">收件人資料</h3>
        <div class="m-2">
            <input id="buyer1" type="radio" name="name" value="buyer1" /><label for="buyer1 ">同訂購人</label>
            <input id="buyer2" type="radio" name="name" value="buyer2" /><label for="buyer2"> 其他收件人</label>
            <a href="https://www.post.gov.tw/post/internet/Postal/index.jsp?ID=208">郵遞區號查詢</a>
        </div>
        <div class="form-container buyer1">
            <?php
            if (isset($user)) {
            ?>
                <form name="form1" class="row card-body " method="post">
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="fullname">姓名： <span><?= $user['fullname'] ?></span>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="mobile">連絡電話： </label><span><?= $user['mobile'] ?></span>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="email">email： </label><span><?= $user['email'] ?></span>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="zipcode">地址： </label><span><?= $user['zipcode'] ?></span><span><?= $user['county'] ?></span><span><?= $user['district'] ?></span><span><?= htmlentities($user['address']) ?></span>
                    </div>
                    <div class="form-group col-sm-12 ">
                      <textarea style="width:100%; " type="text" name="notes" autocomplete="on" placeholder="需求備註"></textarea>
                    </div>

                </form>
                <div class="text-center m-2"><a href="memberEditor.php" class="custom-btn btn-4 text-center text-white c_1" style="width:150px">會員資料修改</a></div>
            <?php
            }
            ?>
        </div>
        <div class="form-container buyer2">
            <form name="form2" class="row card-body " method="post">
                <div class="form-group col-md-6 m-0 p-0">
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="真實姓名"></input>
                </div>
                <div class="form-group col-md-6 m-0 p-0">
                    <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" placeholder="聯絡電話">
                </div>
                <div class="form-group col-md-6 m-0 p-0">
                    <input class="form-control" name="email" placeholder=" Email"　></input>
                </div>

                <div class="form-group col-md-6 m-0 p-0">
                    <select class="form-control" name="county" id="county" placeholder="縣市"　></select>
                </div>
                <div class="form-group col-md-6 m-0 p-0">
                    <select class="form-control" name="district" id="district" placeholder="鄉鎮市區"></select>
                </div>
                <div class="form-group col-md-6 m-0 p-0">
                    <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="郵遞區號" disabled>
                </div>
                <div class="form-group col-sm-12 m-0 p-0">
                    <input type="text" class="form-control" name="address" id="address" placeholder="道路或街名" >
                </div>
                <div class="form-group col-sm-12 m-0 p-0">
                  <textarea style="width:100%; padding-left:1rem" type="text" name="notes" autocomplete="on" placeholder="需求備註"></textarea>
                </div>

            </form>
        </div>
        <div class="m-2 form-container buyer2">
            <input id="newReceiver" type="checkbox" class="mr-2"><label for="newReceiver"> 儲存這個送貨地址</label>
            <input id="saveNewReceiver" type="checkbox"class="mr-2 ml-3"><label for="saveNewReceiver"> 設定為預設地址</label>
        </div>
    </div>
    <div class="mb-5">
        <div>
            <h3 class="title p-2 b-green rot-135">發票類型</h3>
        </div>
        <div class="">
            <div class="mx-2 my-3">
                <input id="cloudR" type="radio" name="receiptType" value="cloudR" /><label for="cloudR">雲端發票</label>
                <input id="DR" type="radio" name="receiptType" value="DR" /><label for="DR">捐贈發票</label>
                <input id="CR" type="radio" name="receiptType" value="CR" /><label for="CR">公司紙本</label>
                <input id="PR" type="radio" name="receiptType" value="PR" /><label for="PR">個人紙本</label>
            </div>
            <div>
                <div class="form-container cloudR bg-secondary text-white pl-2 mx-2 my-3">
                    <input id="memberR" type="radio" name="rmc" value="receiptR" /><label for="memberR" class=" mb-0">會員載具</label>
                    <input id="mobileR" type="radio" name="rmc" value="mobileR" /><label for="mobileR" class=" mb-0">手機條碼</label>
                    <input id="CDCR" type="radio" name="rmc" value="CDCR" /><label for="CDCR" class=" mb-0">自然人憑證條碼</label>
                </div>
                <div class="form-container mobileR ">
                    <input type="text" placeholder="請輸入 '/' 後大寫英文數字共 7 碼 ">
                    <input id="agreeReceipt" type="checkbox" checked><label for="agreeReceipt"> <span>我同意紀錄本次自然人憑證條碼為常用載具</span></label>
                </div>
                <div class="form-container CDCR">
                    <input type="text" placeholder="請輸入大寫英文數字共 16 碼 ">

                </div>
                <div class="form-container DR ">
                    <input type="text" placeholder="請輸入捐贈單位全名 ">
                </div>
                <div class="form-container CR row mx-2 my-3">
                    <input class="col-6" type="text" placeholder="請輸入發票抬頭 ">
                    <input class="col-6" type="text" placeholder="請輸入統一編號 ">
                    <div class="form-container CR mx-2 my-3">
                        <h4>發票寄送地址</h4>
                        <input id="agreeReceipt1" type="radio" name="addressRecepit" value="addressRecepit1"><label for="agreeReceipt1"> 同訂購人</label>
                        <input id="agreeReceipt2" type="radio" name="addressRecepit" value="addressRecepit2"><label for="agreeReceipt2"> 同收件人</label>
                        <input id="agreeReceipt3" type="radio" name="addressRecepit" value="addressRecepit3"><label for="agreeReceipt3"> 其他</label>
                    </div>

                </div>
                <div class="form-container PR mx-2 my-3">
                    <h4>發票寄送地址</h4>
                    <input id="agreeReceipt1" type="radio" name="addressRecepit" value="addressRecepit1"><label for="agreeReceipt1"> 同訂購人</label>
                    <input id="agreeReceipt2" type="radio" name="addressRecepit" value="addressRecepit2"><label for="agreeReceipt2"> 同收件人</label>
                    <input id="agreeReceipt3" type="radio" name="addressRecepit" value="addressRecepit3"><label for="agreeReceipt3"> 其他</label>
                </div>
                <div class="form-container addressRecepit3 mx-2 my-2 ">
                    <input class="input-field" type="text" name="name" required="required" placeholder="真實姓名" />
                    <input class="column-right" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="縣市名稱" />
                    <input class="column-left" type="text" name="zipcode" required="required" autocomplete="on" pattern="[0-9]*" maxlength="5" placeholder="郵遞區號" />
                    <input class="input-field" type="text" name="address" required="required" autocomplete="on" placeholder="區域及地址" />
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <input id="agree" class="mx-2 " type="checkbox" checked ><label for="agree"> <span>我同意<a href="privacyPolicy.php">網站服務條款及隱私權政策</a></span></label>
    </div>
</div>

<div class="container">
    <div class="row mb-5">
        <div class="col-12 my-4">
            <div class="alert alert-danger " id="warning_msg_payment_method" role="alert" style="display: none;">
                    <ul><h4>請確認以下資料填寫完整 </h4>
                      <li>收件人資料</li>
                      <li>寄送方式</li>
                      <li>付款方式</li>
                      <li>勾選<img src="./images/icon/checked.svg" alt=""> 同意網站服務條款及隱私政策</li>
                    </ul>
            </div>
        </div>
        <div class="col-12">
            <?php if (isset($_SESSION['user'])) : ?>
                <!-- <a href="javascript:" id="checkOutBtn" style="width:100%;" class="custom-btn btn-4 text-center c_1" onclick="checkOutCart()" >確認結帳</a> -->

                <h3 class="custom-btn btn-4 text-center c_1" style="width:100%;"><a href="javascript:" id="checkOutBtn" class="text-white" onclick="checkOutCart()">確認結帳</a></h3>
            <?php else : ?>
                <div class="alert alert-danger text-center p-0 m-0 " role="alert">

                    <?= $pageName == 'login' ? 'active' : '' ?>
                    <a class="nav-link" href="login.php">
                        <h4 class="p-1 m-0 text-danger">請登入會員後再結帳</h4>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>



<?php include __DIR__ . '/parts/scripts.php'; ?>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js"></script>
<script src="erTWZipcode-master/js/er.twzipcode.data.js"></script>
<script src="erTWZipcode-master/js/er.twzipcode.min.js"></script>

<script>
    const quantity = $('select.quantity');

    const deleteItem = function(event, type, key) {
        let t = $(event.currentTarget);
        console.log('event:', event);
        $.get('<?= WEB_API ?>/cart-api.php', {
            action: 'delete',
            type: type,
            key: key
        }, function(data) {
            t.closest('tr').remove();
            updateDiscountTip();
            updateTable();
            // location.reload();  // 刷頁面
            if ($('tbody>tr').length < 1) {
                location.reload(); // 重新載入
            }
            showCartCount(data);
            calPrices();
        }, 'json');
    };

    // 計算並呈現價格
    const calPrices = function() {
        let total = 0;
        $('#event_table tbody>tr').each(function() {
            const $price = $(this).find('.event_price');
            const price = $price.attr('data-price') * 1;
            $price.text('$ ' + dallorCommas(price));

            const qty = $(this).find('.event_quantity').val() * 1;

            $(this).find('.event_sub-total').text('$ ' + dallorCommas(price * qty));

            total += price * qty;
        });
        $('#hotel_table tbody>tr').each(function() {
            const $price = $(this).find('.hotel_price');
            const price = $price.attr('data-price') * 1;
            $price.text('$ ' + dallorCommas(price));

            const qty = $(this).find('.hotel_quantity').val() * 1;

            $(this).find('.hotel_sub-total').text('$ ' + dallorCommas(price * qty));

            total += price * qty;
        });

        var isDiscount = $("#event_table tbody tr").length >= 1 && $("#hotel_table tbody tr").length >= 1;
        var discountPrice = 0;

        if (isDiscount) {
            discountPrice = Math.round(total * 0.15);
        }
        couponPrice = $("#couponBalanceInput").val();
        if (total - discountPrice - couponPrice < 0){
            couponPrice = total - discountPrice;
            $("#couponBalanceInput").val(couponPrice);
            $("#couponBalanceInput").trigger("change");
        }

        shoppingFee = $("input[type='radio'][name='shipment']:checked").data("fee");
        shoppingFee = shoppingFee ?? 0;
        $('.originalPrice').text('$ ' + dallorCommas(total));
        $('.discountPrice').text('$ ' + dallorCommas(discountPrice));
        $('.couponPrice').text('$ ' + dallorCommas(couponPrice));
        $('.ShippingFee').text('$ ' + dallorCommas(shoppingFee));
        $('.totalPrice').text('$ ' + dallorCommas(total - discountPrice - couponPrice + shoppingFee));
    };

    const changeQty = function(event, type, key, qty) {
        const el = $(event.currentTarget);
        console.log([type, key, qty]);
        $.get('<?= WEB_API ?>/cart-api.php', {
            action: 'update',
            type: type,
            key: key,
            qty: qty
        }, function(data) {
            showCartCount(data);
            calPrices();
        }, 'json').fail(function(e) {
            alert("error");
        });;
    };
    const changePeopleNum = function(event, type, key, peopleNum) {
        const el = $(event.currentTarget);
        console.log("changePeopleNum");
        console.log([type, key, peopleNum]);
        $.get('<?= WEB_API ?>/cart-api.php', {
            action: 'update',
            type: type,
            key: key,
            people_num: peopleNum
        }, function(data) {
            showCartCount(data);
            calPrices();
        }, 'json').fail(function(e) {
            alert("error");
        });;
    };

    const checkOutCart = function() {
        $.post('<?= WEB_API ?>/order-api.php', {
                action: 'add',
                coupon: $("#couponBalanceInput").val(),
                shipment_id: $("input[type='radio'][name='shipment']:checked").val(),
                payment_method: $("input[type='radio'][name='payment_method']:checked").val(),
            }, function(data) {
                // location.reload();  // 刷頁面
                if ($('tbody>tr').length < 1) {
                    // location.reload(); // 重新載入
                }
                if ("info" in data){
                    alert(data["info"]);
                    if ("redirect" in data){
                        location.href = data['redirect'];
                    }
                } else{
                    location.href = 'cart-confirm.php?id=' + data[0];
                }

                
            }, 'json')
            .fail(function(e) {
                console.log("error-checkoutCart");
                console.log(e);
                alert("error");
            });
    };

    $(".hotel_quantity").change(function(){
        var hotel_quantity = $(this).val();
        var peopleNum_elem = $(this).parents("tr").find(".hotel_people_num");
        var peopleNumLimit = peopleNum_elem.data("peoplenumlimit");
        var peopleNum_elem_limit = hotel_quantity * peopleNumLimit;
        peopleNum_elem.attr("max", peopleNum_elem_limit);
        if (peopleNum_elem.val() > peopleNum_elem_limit){
            peopleNum_elem.val(peopleNum_elem_limit);
            peopleNum_elem.trigger("change");
        }
        console.log([this, hotel_quantity, peopleNum_elem, peopleNumLimit, peopleNum_elem.value, peopleNum_elem]);
    })
    // document ready
    $(function() {
        // 呈現數量
        quantity.each(function() {
            const qty = $(this).attr('data-qty') * 1;
            $(this).val(qty);
        });

        $(".hotel_quantity").trigger("change");
        calPrices();

        // 塞入html物件
        var url = new URL(location.href);
        var html_entity = url.searchParams.get("html_entity");
        $("#html_entity h4").append(html_entity);
    });
</script>
<script>
    $('form').card({
        container: '.card-wrapper',
        width: 280,

        formSelectors: {
            nameInput: 'input[name="first-name"], input[name="last-name"]'
        }
    });
</script>
<script>
    $(document).ready(function() {
        function updateFormContainer() {
            $(".form-container").hide();
            $('input[type="radio"]:checked').each(function(i, elem) {

                var targetBox = $("." + elem.value);
                $(targetBox).show();
            });

        }
        $('input[type="radio"]').click(updateFormContainer);
        updateFormContainer();
        isCompletedUserData();

        
        var url = new URL(location.href);
        url.searchParams.set("html_entity", "");
        window.history.pushState({}, document.title, url.href);
        updateDiscountTip();
    });

    
    function isCompletedUserData() {
        $.post('<?= WEB_API ?>/member-api.php', {
            'action': 'isCompletedUserData',
        }, function(data) {
            result = data[0];
            if (!result) {
                $("#warning_msg_payment_method").show();
                $("#checkOutBtn").addClass("disabled");
            } else {
                $("#checkOutBtn").removeClass("disabled");
                $('input[type="radio"]').click(isCompleted);
            }
            isCompleted();
            
        }, 'json').fail(function(e) {
            console.log("error");
            console.log(e);
        });
    }
    function isCompleted(){
        window.isCompletedUserData;
        let isCompleteda = isCompletedPaymentMethodData() && isCompletedShipmentData();
        if (isCompleteda){
            $("#checkOutBtn").removeClass("disabled");
            $("#warning_msg_payment_method").hide();
        }else{
            $("#checkOutBtn").addClass("disabled");
            $("#warning_msg_payment_method").show();
        }
    }
    function isCompletedPaymentMethodData() {
        var checked_count = $("input[name='payment_method']:checked").length + $("input[name='name']:checked").length;
        return checked_count == 2;
    }
    function isCompletedShipmentData() {
        var checked_count = $("input[name='shipment']:checked").length;
        return checked_count == 1;
    }
</script>
<script>
    $("#cloudR,#memberR,#buyer1").attr("checked", '');
</script>
<script>
    function updateDiscountTip(){
        $.get('<?= WEB_API ?>/cart-api.php', {
            action: 'read',
            type: 'cart'
        }, function(data) {
            console.log("updateDiscountTip");
            console.log(data);
            function empty(obj){
                if (typeof obj !== 'undefined'){
                    return obj.length == 0;
                }
                return true;
            }

            if (empty(data['event']) && empty(data['hotel']) && !empty(data['restaurant'])) {
                output = `<h4 class="m-0 text-left">加購<a href="event.php">「森林體驗」</a>或<a href="hotel.php">「夜宿薰衣草森林」</a>，出示「森林體驗」票券或房卡，可享有「森林咖啡館」用餐<span class="c_pink_t">9</span>折； 如加購兩者，可享全面<span class="c_pink_t">85</span>折優惠喔！</h4>`;
            } else if (!empty(data['event']) && !empty(data['hotel']) && !empty(data['restaurant'])) {
                output = `<h4 class="m-0">目前折扣為<span class="c_pink_t">85</span>折；出示房卡至「森林咖啡館」用餐，也享有<span class="c_pink_t">85</span>折優惠喔！</h4>`;
            } else if (empty(data['event']) && !empty(data['hotel']) && !empty(data['restaurant'])) {
                output = `<h4 class="m-0">出示房卡至「森林咖啡館」用餐，享有<span class="c_pink_t">9</span>折優惠；如再加購<a href="event.php">「森林體驗」</a>，可享全面<span class="c_pink_t">85</span>折優惠喔！</h4>`;
            } else if (!empty(data['event']) && empty(data['hotel']) && !empty(data['restaurant'])) {
                output = `<h4 class="m-0">出示 "森林體驗票券" 至「森林咖啡館」用餐，享有<span class="c_pink_t">9</span>折優惠；如再加購<a href="hotel.php">「夜宿薰衣草森林」</a>，可享全面<span class="c_pink_t">85</span>折優惠喔！</h4>`;
            } else if (empty(data['event']) && !empty(data['hotel']) && empty(data['restaurant'])) {
                output = `<h4 class="m-0">出示房卡至「森林咖啡館」用餐，享有<span class="c_pink_t">9</span>折優惠；如再加購<a href="event.php">「森林體驗」</a>，可享全面<span class="c_pink_t">85</span>折優惠喔！</h4>`;
            } else if (!empty(data['event']) && empty(data['hotel']) && empty(data['restaurant'])) {
                output = `<h4 class="m-0">出示「森林體驗」票券至「森林咖啡館」用餐，享有<span class="c_pink_t">9</span> 折優惠；如再加購<a href="hotel.php">「夜宿薰衣草森林」</a>，可享全面<span class="c_pink_t">85</span>折優惠喔！</h4>`;
            } else if (!empty(data['event']) && !empty(data['hotel']) && empty(data['restaurant'])) {
                output = `<h4 class="m-0">目前折扣為<span class="c_pink_t">85</span>折；出示房卡至「森林咖啡館」用餐，也享有<span class="c_pink_t">85</span>折優惠喔！</h4>`;
            }
            $(".discountTip div").html(output);
            
        }, 'json');
        
    }
    
    function updateTable(){
        var table_id = ['#event_table', '#hotel_table', '#restaurant_table'];
        table_id.forEach(function(id){
            if ($(`${id} tbody tr`).length === 0){
            $(id).hide();
        }
        });
    }

    function couponBalance(){
        $.post('<?= WEB_API ?>/coupon-api.php', {
            action: 'balance',
        },function(data) {
            balance = data['data']['couponBalance'];
            total = data['data']['couponTotal'];
            window.total = total;
            $("#couponTotal").text('$ ' + dallorCommas(total));
            // $("#couponTotal").data("value", total);
            
            $("#couponBalance").text('$ ' + dallorCommas(balance));
            $("#couponBalance").data("value", balance);
            $("#couponBalanceInput").attr("max", balance);
            
        }, 'json')
    }
    couponBalance();
    $("#couponBalanceInput").change(function(){
        balanceUsed = $(this).val(); // input value
        finalBalance = parseInt(window.total) - balanceUsed;
        // finalBalance = parseInt($("#couponTotal").data("value")) - balanceUsed;
        if (finalBalance < 0){
            finalBalance = 0;
            balanceUsed = $(this).attr("max");
            $(this).val(balanceUsed);
        }
        $("#couponBalanceUsed").text('$ ' + dallorCommas(balanceUsed));
        $("#couponFinalBalance").text('$ ' + dallorCommas(finalBalance));
        calPrices();
    })

    
    function readShipment(){
        $.get('<?= WEB_API ?>/cart-api.php', {
            type: 'shipment',
            action: 'readAll',
        },function(data) {
            data.forEach(function(elem){
                outputRadio = `<div><input id="shipemnt_radio_${elem['id']}" type="radio" name="shipment" value="${elem['id']}" data-fee="${elem['fee']}"/><label for="shipemnt_radio_${elem['id']}"><img src="${elem['img']}" alt=""></label></div>`;
                outputTrack = `<li><a href="${elem['trackweb']}" target="_blank"><img src="./images/icon/arrow_g_r.svg" alt="">${elem['name']}</a></li>`;
                $("#shipmentRadio").append(outputRadio);
                $("#shipmentTrack ul").append(outputTrack);
            })
            $("input[type='radio'][name='shipment']").change(function(){
                calPrices();
            });
        }, 'json')
    }
    readShipment();
</script>
<script>
  erTWZipcode({
    defaultCountyText: "請選擇",
    defaultDistrictText: "請選擇"
  });
  var distEl = document.querySelector('select[name=district]');
  document.querySelector('select[name=county]')
    .addEventListener("change", function(evt){
      //refresh district element
    //   M.FormSelect.init(distEl);
    });
  //first time init all select elements in #myForm
//   M.FormSelect.init(document.querySelectorAll('#myForm select'));
</script>


<?php include __DIR__ . '/parts/html-foot.php'; ?>