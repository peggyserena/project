<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '取消交易';
$pageName = 'tradeCancel';

$sql = "SELECT * FROM members WHERE id=" . $_SESSION['user']['id'];
$r = $pdo->query($sql)->fetch();
?>

<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    form .form-group small.error {
        color: red;
    }
    body {
        background: linear-gradient(45deg,#e8ddf1  0%,  #e1ebdc 100%);
        position: relative;

    }

    .form-container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .card{
        box-shadow: 0px -4px 15px #666E9C;
        -webkit-box-shadow: 0px -4px 15px #666E9C;
        -moz-box-shadow: 0px -4px 15px #666E9C;
        color: gray;
        font-size:1.2rem;
        font-weight: 600;
        padding:7.5%
    }
    /* input[type=text] {
        width: 100%;
        padding: 20px 20px;
        box-sizing: border-box;
        border:2px solid;
        border-image-source: linear-gradient(to left, #adda9a , #DCC5EF );
        border-image-slice: 1;
        color:#6A8AD9;
        font-weight: 500;
        font-size:1.2rem; */

    }
    h2{
        box-shadow: 0px -4px 15px #666E9C;
        -webkit-box-shadow: 0px -4px 15px #666E9C;
        -moz-box-shadow: 0px -4px 15px #666E9C;
        position: relative;
        z-index: 9;
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

</style>



<div class="container mt-5">
    <div class=" orderCancel mb-5 ">
        <h3 class=" title p-2 b-green rot-135">退貨商品</h3>
        <div>
            <?php if (!empty($_SESSION['cart']['event'])): ?>
                <table class="table table-striped table-bordered" id="event_table">
                    <thead>
                        <h4 class=" title b-green rot-135">商品明細-活動</h4>
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
                    <h4 class=" title b-green rot-135">商品明細-餐廳</h4>
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
        </div>
        <div class="mb-5 ">
            <h3 class=" title p-2 b-green rot-135">退貨人資料</h3>
            <div class="m-2">
                <input id="buyer1" type="radio" name="name" value="buyer1"/><label for="buyer1 ">同訂購人</label> 
                <input id="buyer2" type="radio" name="name" value="buyer2"/><label for="buyer2"> 修改退貨人</label>
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
                <?php
                    }
                ?>
            </div>
            <div class="form-container buyer2">
                <form name="form2" class="row card-body " method="post">
                    <input id="input-field" type="text" name="name" placeholder="真實姓名" />
                    <input id="column-left" type="text" name="email" placeholder="Eemail" />
                    <input id="column-right" type="text" name="mobile" placeholder="連絡電話" />
                    <input id="column-right" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="縣市名稱" />
                    <input id="column-left" type="text" name="zipcode" autocomplete="on" pattern="[0-9]*" maxlength="5" placeholder="郵遞區號" />
                    <input id="input-field" type="text" name="address" required="required" autocomplete="on" placeholder="區域及地址" />
                    <textarea style="width:100%" type="text" name="notes"  autocomplete="on" placeholder="需求備註" ></textarea>
                </form>
            </div>
            <div>
                <h4>退款帳戶</h4>
            </div>
        </div>
        <div>
        <input id="agree" type="checkbox" checked><label for="agree">  <span>我同意我同意辦理退貨時，由薰衣草森林代為處理發票及銷貨退回證明單，以加速退貨退款作業。依統一發票使用辦法規定，個人發票一經開立，不得更改或改開公司戶發票。<a href="https://www.einvoice.nat.gov.tw/?CSRT=6201288656407980614">財政部電子發票流程說明</a></span></label>
    </div>
    <div class="text-center mb-5">
        <button type="submit" class="custom-btn btn-4 m-0 p-0 " >送出</button>
    </div>


</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
        const quantity = $('select.quantity');
        // 金額轉換, 加逗號
        const dallorCommas = function(n) {
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        };

        const deleteItem = function(event, id) {
            let t = $(event.currentTarget);
            console.log('event:', event);
            $.get('cart-api.php', {
                action: 'delete',
                id: id
            }, function(data) {
                console.log(t);
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
            $('tbody>tr').each(function() {
                const $price = $(this).find('.price');
                const price = $price.attr('data-price') * 1;
                $price.text('$ ' + dallorCommas(price));

                const qty = $(this).find('.quantity').val() * 1;

                $(this).find('.sub-total').text('$ ' + dallorCommas(price * qty));
                total += price * qty;
                console.log(price);
                console.log(qty);
                console.log(total);
            });
            $('.totalPrice').text('$ ' + dallorCommas(total));
        };

        const changeQty = function(event) {
            const el = $(event.currentTarget);
            const qty = el.val();
            const pid = el.closest('tr').attr('data-sid');

            $.get('cart-api.php', {
                action: 'add',
                pid,
                qty
            }, function(data) {
                showCartCount(data);
                calPrices();
            }, 'json');
        };
        function getorderCancel(){
            $.post('orderCancel-api.php', {
                action: 'read'
            }, function(data){
                
                console.log("getorderCancel");
                console.log(data);
                data.forEach(function(elem){
                    var output = "";
                    output += "<td>" + elem['name'] + "</td>";
                    output += "<td>" + elem['date'] + elem['time'] + "</td>";
                    output += "<td>" + elem['price'] + "</td>";
                    output += '<td><a href="javascript:" onclick="deleteorderCancel(event,' + elem['wish_list_id'] + ')"><i class="fas fa-trash-alt"></i></a></td>';
                    output = '<tr>' + output + '</tr>';
                    $("#orderCancel table tbody").append(output);
                    console.log(output);
                });
            }, 'json')
        }
        function deleteorderCancel(event, id){
            console.log(id);
            let t = $(event.currentTarget);
            $.post('orderCancel-api.php', {
                action: 'delete',
                id: id,
            }, function(data){
                
                t.closest('tr').remove();
                console.log(data);
                console.log(t);
            }, 'json').fail(function(e){
                console.log(e);
            })
        }

        function readOrder(){
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            $.post('order-api.php', {
                    action: 'read',
                    start_date: start_date,
                    end_date: end_date
                },function(data) {
                    $("#tradeRecord table tbody").html("");
                    console.log(data);
                    var maxLength = 12;
                    data.forEach(function(elem){
                        var order_id = "";
                        var tr = `<tr>
                                <td class="order_id text-center">${elem['order_id']}</td>
                                <td class="order_date text-center">${elem['create_datetime']}</td>
                                <td class="order_price text-left">${elem['price']}</td>
                                <td class="order_status text-center">${elem['status']}</td>
                                <td class="order_status text-center "><a href="orderCancel.php">取消</a></td>
                            </tr>`;
                        $("#tradeRecord table tbody").append(tr);
                    });
                    
                    
                }, 'json')
                .fail(
                    function(e) {
                        alert( "error" );
                        console.log(e.responseText);
                });
        }

        // document ready
        $(function() {
            // 呈現數量
            quantity.each(function() {
                const qty = $(this).attr('data-qty') * 1;
                $(this).val(qty);
            });

            calPrices();
            getorderCancel();
        });
        
       
    </script>

<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $email = $('#email');

    // const $name = $('#name'),
    //     $email = $('#email'),
    //     $mobile = $('#mobile');

    // const fileds = [$name, $email, $mobile];
    // const smalls = [$name.next(), $email.next(), $mobile.next()];

    function checkForm() {
        // 回復原來的狀態
        fileds.forEach(el => {
            el.css('border', '1px solid #CCCCCC');
            el.next().text('');
        });

        let isPass = true;

        if (!email_re.test($email.val())) {
            isPass = false;
            $email.css('border', '1px solid red');
            $email.next().text('請輸入正確的 email');
        }


        if (isPass) {
            $.post(
                'editMember-api.php',
                $(document.form1).serialize(),
                function(data) {
                    if (data.success) {
                        alert('資料修改成功');
                    } else {
                        alert(data.error);
                    }
                },
                'json'
            )
        }

    }
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
    updateFormContainer();
    isCompletedUserData();
});</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>