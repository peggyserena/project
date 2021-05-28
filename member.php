<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員中心';
$pageName = 'member';
// $total = 0;

// $perPage = 5;
$sql = "SELECT * FROM members WHERE id=" . $_SESSION['user']['id'];
// $sql = "SELECT * FROM members WHERE `id`=$id";

// $t_sql = "SELECT COUNT(1) FROM memebers";
// $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// $totalPages = ceil($totalRows / $perPage);

// $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// if ($page < 1) $page = 1;
// if ($page > $totalPages) $page = $totalPages;

// $sql = sprintf("SELECT * FROM memebers ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

$r = $pdo->query($sql)->fetch();

?>


<?php include __DIR__ . '/parts/html-head.php'; ?>
<style>
    body {
        background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
    }

    h3 {
        font-size: 1.2rem;
        text-shadow: 0 0 0.2em #0000E3, 0 0 0.25em #9AFF02, -1px -1px white, 1px 1px rgb(26, 2, 94);
    }

    .box {
        margin: 5% 0;
        color: gray;
        font-weight: 600;
        border-radius: 0.6rem;
    }

    #myTabContent {
        padding: 5% 7.5%;
        background-color: white;
        box-shadow: 0px 0px 15px #666E9C;
        -webkit-box-shadow: 0px 0px 15px #666E9C;
        -moz-box-shadow: 0px 0px 15px #666E9C;
        position: relative;
    }

    #profile .form-group span {
        color: gray;
        font-size: 1rem;

    }

    #myTab li {
        box-shadow: 0px -4px 15px #666E9C;
        -webkit-box-shadow: 0px -4px 15px #666E9C;
        -moz-box-shadow: 0px -4px 15px #666E9C;
        position: relative;
        z-index: 9;
    }

    table {
        width: 100%;
    }

    #profile .form-group {
        padding-bottom:3px;
        background: 
        linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%)
        bottom
        no-repeat; 
        background-size:100% 3px ;
    }
    #myTabContent a:hover{
	box-shadow: 0px 0px 20px rgb(0, 255, 191);
	transform: scale(1.05);
    /* color:white; */
    text-decoration:none
}
#tradeRecord table tbody td{
    font-weight:400;
    font-size:1rem;
    text-align: left
    }

</style>
<?php include __DIR__ . '/parts/navbar.php'; ?>


<body>
    <main>
        <div class="container">
            <div class="row justify-content-center ">
                <div class="box col-8  p-0 ">
                    <ul id="myTab" class="nav nav-tabs t_shadow">
                        <li class="active b-green rot-135"><a data-toggle="tab" href="#profile"> <h3 class="m-0">會員中心</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#tradeRecord"><h3 class="m-0">交易訂單查詢</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#wishList"><h3 class="m-0">追蹤清單</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#coupon"><h3 class="m-0">購物金查詢</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#setting"><h3 class="m-0">其他設定</h3></a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">



                        <div id="profile" class="tab-pane fade in active">
                            <div class="col-12 con_01 m-0 p-0 ">
                                <form name="form1" method="post">
                                    <div class="form-group">
                                        <label for="email">帳號 ( email )： </label><span><?= $r['email'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">姓名： </label><span><?= $r['fullname'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">生日： </label><span><?= $r['birthday'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">手機： </label><span><?= $r['mobile'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_2nd">備用email： </label><span><?= $r['email_2nd'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="zipcode">郵遞區號： </label><span><?= $r['zipcode'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">縣市： </label><span><?= $r['city'] ?></span></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">區域及地址： </label><span><?= htmlentities($r['address']) ?></span>
                                    </div>
                                    <div  class="text-center"><a href="editMember.php" class="custom-btn btn-4 text-center">修改</a>
                                    </div>
                                </form>
                            </div>
                        </div>




                        <div id="tradeRecord" class="tab-pane fade">
                            <label for="">
                                <h4>交易期間</h4>
                            </label>
                            <div><input type="date" id="start_date">　～　<input type="date" id="end_date"><button type="submit" onclick="readOrder()" class="custom-btn btn-4 t_shadow ml-4">查詢</button> </div>

                            <div class="mt-4">
                                <table class="table table-striped table-bordered">
                                    <h3 class="c_pink_t">設訂單連結,顯示cart-confirm的資料</h3>
                                    <thead>
                                        <tr class="b-green rot-135 text-white">
                                            <th scope="col" class="m-0 t_shadow text-center">訂單編號</th>
                                            <th scope="col" class="m-0 t_shadow text-center">訂單日期</th>
                                            <th scope="col" class="m-0 t_shadow text-center">訂單</th>
                                            <th scope="col" class="m-0 t_shadow text-center">狀態</th>
                                            <th scope="col" class="m-0 t_shadow text-center">取消</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>











                        <div id="wishList" class="tab-pane fade">
                            <div class="col ">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="b-green rot-135 text-white">
                                            <th scope="col" class="m-0 t_shadow text-center">
                                                項目名稱
                                            </th>
                                            <th scope="col" class="m-0 t_shadow text-center">日期／時間</th>
                                            <th scope="col" class="m-0 t_shadow text-center">費用</th>
                                            <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <h3 class="title  custom-btn btn-4 text-center c_1" ><a href="javascript:" id="" class="text-white"  onclick="" >清空</a></h3>

                            </div>
                        </div>














                        <div id="coupon" class="tab-pane fade">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title d-flex justify-content-between  ">
                                        <div>日期</div>
                                        <div>購物金項目</div>
                                        <div>購物金金額</div>
                                        <div>到期日</div>
                                        <div>餘額</div>
                                    </div>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    </div>
                                </div>
                            </div>

                        </div>







                        <div id="setting" class="tab-pane fade">
                            <div class=" text-center  mt-4"><button type="submit" onclick="" class="custom-btn btn-4 t_shadow">查詢</button></div>
                        </div>




                    </div>
                </div>
            </div>
        </div>




    </main>

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
        function getWishList(){
            $.post('wishList-api.php', {
                action: 'read'
            }, function(data){
                
                console.log("getWishList");
                console.log(data);
                data.forEach(function(elem){
                    var output = "";
                    output += "<td>" + elem['name'] + "</td>";
                    output += "<td>" + elem['date'] + elem['time'] + "</td>";
                    output += "<td>" + elem['price'] + "</td>";
                    output += '<td><a href="javascript:" onclick="deleteWishList(event,' + elem['wish_list_id'] + ')"><i class="fas fa-trash-alt"></i></a></td>';
                    output = '<tr>' + output + '</tr>';
                    $("#wishList table tbody").append(output);
                    console.log(output);
                });
            }, 'json')
        }
        function deleteWishList(event, id){
            console.log(id);
            let t = $(event.currentTarget);
            $.post('wishList-api.php', {
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
            getWishList();
        });
        
        console.log(location.search.replace('?tab=', ''))

        const nowTab = location.search.replace('?tab=', '');
        if (nowTab === '') {
            $('#myTab li:eq(0) a').tab('show');
        }
        if (nowTab === 'wishList') {
            $('#myTab li:eq(2) a').tab('show');
        }
        if (nowTab === 'tradeRecord') {
            $('#myTab li:eq(1) a').tab('show');
        }
    </script>

    <?php include __DIR__ . '/parts/html-foot.php'; ?>