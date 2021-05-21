<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '購物車';
$pageName = 'cart';
if (isset($_SESSION['user'])){
    $sql = "SELECT * FROM members WHERE id=" . $_SESSION['user']['id'];
    
    $r = $pdo->query($sql)->fetch();
}

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>



<style>
    body {
        background: linear-gradient(45deg, #e1ebdc 0%, #e8ddf1 100%);
        position: relative;
        z-index: -10;

    }

    .form-container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .card-wrapper {
        background-color: #FFFFDA;
        width: 100%;
        display: flex;
        color: green;
        /* display: none */
    }

    input {
        margin: 1px 0;
        padding-left: 3%;
        font-size: 1rem;
        border: 1px solid lightgray;
        color: darkblue
    }

    input[type="text"] {
        display: block;
        height: 2.5rem;
        width: 100%;
    }

    input[type="email"] {
        display: block;
        height: 2.5rem;
        width: 100%;
    }

    #column-left {
        width: 49.9%;
        float: left;
        margin-bottom: 2px;
    }

    #column-right {
        width: 49.9%;
        float: right;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }
    .buyer1 form div{
        margin: 1px 0;
        padding: 5px 3%;
        font-size: 1rem;
        color: darkblue;
        background-color:white;
    }
    .buyer1 form label{
        margin:0;
        padding:5px
        }
    input[type="text"]{
        padding-left:1rem
    }
    .card-wrapper{
        display:none
    }

</style>
<?php var_dump($_SESSION['cart']); ?>
<?php var_dump("test"); ?>
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

<div class="container mt-5 text-center ">
    <div class="row  ">
        <div class="col ">
            <?php if (empty($_SESSION['cart']['event']) && empty($_SESSION['cart']['restaurant'])) : ?>
                <div class="alert alert-danger" role="alert">
                    目前購物車裡沒有商品, 請至商品列表選購
                </div>
            <?php else: ?>

                <?php if (!empty($_SESSION['cart']['event'])): ?>
                    <table class="table table-striped table-bordered" id="event_table">
                        <thead>
                            <h3 class=" title b-green rot-135">購物車明細</h3>
                            <tr class="b-green rot-135 text-white">
                                <th scope="col" class="m-0 t_shadow text-center">
                                    項目名稱
                                </th>
                                <th scope="col" class="m-0 t_shadow text-center">日期／時間</th>
                                <th scope="col" class="m-0 t_shadow text-center">數量</th>
                                <th scope="col" class="m-0 t_shadow text-center">費用</th>
                                <th scope="col" class="m-0 t_shadow text-center">小計</th>
                                <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_SESSION['cart']['event']))
                                foreach ($_SESSION['cart']['event'] as $key => $event) : ?>
                                <tr data-sid="<?= $event['id'] ?>">
                                    <a href="even.php? <?= $event['name'] ?>"></a><td><?= $event['name'] ?></td><a>
                                    <td><?= $event['date'] . "/" . $event['time'] ?></td>
                                    <td><input style="width: 4rem;" class="event_quantity" type="number" min=1 max="<?= $event["limitNum"] ?>" value="<?= $event['quantity'] ?>" onchange="calPrices()" /></td>
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
                <?php if (!empty($_SESSION['cart']['restaurant'])): ?>
                    <table class="table table-striped table-bordered" id="restaurant_table">
                        <thead>
                            <h3 class=" title b-green rot-135">購物車明細</h3>
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
                                    <td><?= implode ("、", $restaurant['id']) ?></td>
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
            <?php endif;?>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="alert alert-primary text-center" role="alert">
                <h4 class="m-0"> 總計: <span class="totalPrice  "></span></h4>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="mb-5 ">
        <h3 class=" title p-2 b-green rot-135">收件人資料</h3>
        <div class="m-2">
            <input id="buyer1" type="radio" name="name" value="buyer1"/><label for="buyer1 ">同訂購人</label> 
            <input id="buyer2" type="radio" name="name" value="buyer2"/><label for="buyer2"> 其他收件人</label>
            <a href="https://www.post.gov.tw/post/internet/Postal/index.jsp?ID=208">郵遞區號查詢</a>
        </div>
        <div class="form-container buyer1">
            <?php 
                if (isset($r)){
            ?>
            <form name="form1" class="row card-body " method="post">
                <div  class="form-group col-lg-6 col-sm-12">
                    <label for="fullname">姓名： <span><?= $r['fullname'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="mobile">連絡電話： </label><span><?= $r['mobile'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="email">帳號 ( email )： </label><span><?= $r['email'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="email_2nd">備用eamil： </label><span><?= $r['email_2nd'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="zipcode">郵遞區號： </label><span><?= $r['zipcode'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="city">縣市： </label><span><?= $r['city'] ?></span></span>
                </div>
                <div class="form-group col-lg-12 col-sm-12">
                    <label for="address">區域及地址： </label><span><?= htmlentities($r['address']) ?></span>
                </div>
                <textarea style="width:100%" type="text" name="notes"  autocomplete="on" placeholder="需求備註" ></textarea>
                
            </form>
            <div  class="text-center m-2"><a href="editMember.php" class=" custom-btn btn-4 text-center c_1" style="width:150px">會員資料修改</a></div>
            <?php
                }
            ?>
        </div>
        <div class="form-container buyer2">
            <input id="input-field" type="text" name="name" placeholder="真實姓名" />
            <input id="column-left" type="text" name="email" placeholder="Email" />
            <input id="column-right" type="text" name="mobile" placeholder="連絡電話" />
            <input id="column-right" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="縣市名稱" />
            <input id="column-left" type="text" name="zipcode" autocomplete="on" pattern="[0-9]*" maxlength="5" placeholder="郵遞區號" />
            <input id="input-field" type="text" name="address" required="required" autocomplete="on" placeholder="區域及地址" />
            <input id="input-field" type="text" name="notes" required="required" autocomplete="on" placeholder="需求備註" />
        </div>
    </div>
    <div class="mb-5">
        <div>
            <h3 class="title p-2 b-green rot-135">付款方式</h3>
        </div>
        <div class="m-2">
            <input id="cd" type="radio" name="payway" value="creditCard" /><label for="cd">信用卡</label>
            <input id="cod" type="radio" name="payway" value="COD" /><label for="cod">貨到付款</label> 
        </div>
        <div class="payment">
            <form action="" method="">
                <div class="form-container creditCard ">
                    <div class="card-wrapper"></div>
                    <div>
                        <input id="input-field" type="text" name="first-name" placeholder="持卡人全名" />
                        <input id="input-field" type="text" name="number" placeholder="信用卡卡號" />
                        <input id="column-left" type="text" name="expiry" placeholder="到期日 (MM / YY)" />
                        <input id="column-right" type="text" name="cvc" placeholder="安全碼 (CVC)" />
                    </div>
                </div>
                <div class="form-container COD ">
                </div>
            </form>
        </div>
    </div>
    <div class="m-2">
        <input  id="agree" type="checkbox"><label for="agree"> 我同意<a  href="privacyPolicy.php">網站服務條款及隱私政策</a></label>
    </div>
</div>

<div class="container">
    <div class="row mb-5">
        <div class="col-12 mb-3 ">
            <div class="alert alert-danger text-center p-0 m-0 " id="warning_msg_payway" role="alert" style="display: none;">
                <a class="nav-link" href="editMember.php">
                    <h4 class=" m-0  text-danger">請完成收件人資料、付款方式填寫，及 <img src="./images/icon/checked.svg" alt=""> 同意網站服務條款及隱私政策</h4>
                </a>
            </div>
        </div>
        <div class="col-12">
            <?php if (isset($_SESSION['user'])) : ?>
                <!-- <a href="javascript:" id="checkOutBtn" style="width:100%;" class="custom-btn btn-4 text-center c_1" onclick="checkOutCart()" >確認結帳</a> -->

                <h3 class="title  custom-btn btn-4 text-center c_1" style="width:100%;"><a href="javascript:" id="checkOutBtn" class="text-white"  onclick="checkOutCart()" >確認結帳</a></h3>
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




<?php include __DIR__ . '/parts/scripts.php'; ?>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js"></script>

<script>
    const quantity = $('select.quantity');
    // 金額轉換, 加逗號
    const dallorCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    const deleteItem = function(event, type, key) {
        let t = $(event.currentTarget);
        console.log('event:', event);
        $.get('cart-api.php', {
            action: 'delete',
            type: type,
            key: key
        }, function(data) {
            console.log(t);
            console.log(data);
            t.closest('tr').remove();

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
            console.log(price);
            console.log(qty);
            console.log(total);
        });
        $('.totalPrice').text('$ ' + dallorCommas(total));
    };

    const changeQty = function(event, type, key, qty) {
        const el = $(event.currentTarget);

        $.get('cart-api.php', {
            action: 'update',
            type: type,
            key: key,
            qty : qty
        }, function(data) {
            showCartCount(data);
            calPrices();
        }, 'json');
    };

    const checkOutCart = function() {
        $.post('order-api.php', {
            action: 'add'
        }
        ,function(data) {
            console.log(data);
            // location.reload();  // 刷頁面
            if ($('tbody>tr').length < 1) {
                 // location.reload(); // 重新載入
            }
            showCartCount(data);
            calPrices();
            location.href = 'cart-confirm.php';
        }, 'json')
        .fail(function(e) {
        alert( "error" );
        console.log(e.responseText);
        });
    };

    // document ready
    $(function() {
        // 呈現數量
        quantity.each(function() {
            const qty = $(this).attr('data-qty') * 1;
            $(this).val(qty);
        });

        calPrices();

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
$(document).ready(function(){
    function updateFormContainer(){
        $(".form-container").hide();
        $('input[type="radio"]:checked').each(function(i, elem){
            
            var targetBox = $("." + elem.value);
            $(targetBox).show();
        });
        
    }
    $('input[type="radio"]').click(updateFormContainer);
    $('input[type="radio"]').click(isCompletedPayWayData);
    updateFormContainer();
    isCompletedUserData();
    isCompletedPayWayData();
});
function isCompletedUserData(){
    $.post('member-api.php', {
        'action': 'isCompletedUserData',
    }, function(data){
        
        console.log(data);
        result = data[0];
        if (!result) {
            $("#checkOutBtn").addClass("disabled");
            $("#warning_msg").show();
        }else{
            $("#checkOutBtn").removeClass("disabled");
            $("#warning_msg").hide();
        }
    }, 'json').fail(function(e){
        console.log("error");
        console.log(e);
    });
}

function isCompletedPayWayData(){
    var checked_count = $("input[name='payway']:checked").length + $("input[name='name']:checked").length;
    if (checked_count == 2){
        $("#checkOutBtn").removeClass("disabled");
        $("#warning_msg_payway").hide();
    }else{
        $("#checkOutBtn").addClass("disabled");
        $("#warning_msg_payway").show();
    }
}
</script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>