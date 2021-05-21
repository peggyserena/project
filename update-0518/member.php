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
        background: linear-gradient(45deg, #e1ebdc 0%, #e8ddf1 100%);
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
        border-bottom: darkolivegreen 1px solid;
        width: 100%;
    }
</style>
<?php include __DIR__ . '/parts/navbar.php'; ?>


<body>
    <main>
        <div class="container">
            <div class="row justify-content-center ">
                <div class="box col-8  p-0 ">
                    <ul id="myTab" class="nav nav-tabs t_shadow">
                        <li class="active b-green rot-135"><a data-toggle="tab" href="#profile">
                                <h3 class="m-0">會員中心</h3>
                            </a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#tradeRecord">
                                <h3 class="m-0">交易訂單查詢</h3>
                            </a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#coupon">
                                <h3 class="m-0">購物金查詢</h3>
                            </a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#wishList">
                                <h3 class="m-0">追蹤清單</h3>
                            </a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#setting">
                                <h3 class="m-0">其他設定</h3>
                            </a></li>
                    </ul>



                    <div id="myTabContent" class="tab-content">



                        <div id="profile" class="tab-pane fade in active">

                            <div class="col-12 con_01 m-0 p-0">
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
                                        <label for="zipcode">郵遞區號： </label><span><?= $r['zipcode'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">縣市： </label><span><?= $r['city'] ?></span></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">區域及地址： </label><span><?= htmlentities($r['address']) ?></span>
                                    </div>
                                    <a href="edit.php" class="custom-btn btn-4 text-center">修改</a>
                            </div>
                            <hr>
                            </form>
                        </div>




                        <div id="tradeRecord" class="tab-pane fade">
                            <label for="">
                                <h4>交易期間</h4>
                            </label>
                            <div><input type="date">　～　<input type="date"><button type="submit" onclick="" class="custom-btn btn-4 t_shadow ml-4">查詢</button> </div>

                            <div class="panel-title  mt-4 ">
                                <a>
                                    <div class="d-flex justify-content-between">
                                        <div>訂單編號</div>
                                        <div>訂單日期</div>
                                        <div>訂單金額</div>
                                        <div>訂單狀態</div>
                                    </div>
                                </a>
                            </div>

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <p class="panel-title  ">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="d-flex justify-content-between">
                                                <div class=" ">
                                                    <div>訂單編號</div>
                                                    <div>訂單日期</div>
                                                    <div>訂單金額</div>
                                                    <div>訂單狀態</div>
                                                </div>
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <?php
                                            $total = 0;
                                            foreach ($_SESSION['cart']['event'] as $v) {
                                                echo "<div>活動名稱：" . $v['name'] . "</div>";
                                                echo "<div>日期／時間：" . $v['date'] . "&emsp; " . $v['time'] . "</div>";
                                                echo "<div>單價：" . $v['price'] . "元" . "</div>";
                                                echo "<div>數量：" . $v['quantity'] . "</div>";
                                                echo "<div>總金額：" . $v['price'] * $v['quantity'] . "元" . "</div>";
                                                $total += $v['price'] * $v['quantity'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
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






                        <div id="wishList" class="tab-pane fade">
                            <div class="col">
                                <?php if (empty($_SESSION['cart']['event'])) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        目前購物車裡沒有商品, 請至商品列表選購
                                    </div>
                                <?php else : ?>

                            </div>
                            <div class="col ">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="b-green rot-135 text-white">
                                            <th scope="col" class="m-0 t_shadow text-center">
                                                項目名稱
                                            </th>
                                            <th scope="col" class="m-0 t_shadow text-center">日期／時間</th>
                                            <th scope="col" class="m-0 t_shadow text-center">數量</th>
                                            <th scope="col" class="m-0 t_shadow text-center">單價</th>
                                            <th scope="col" class="m-0 t_shadow text-center">小計</th>
                                            <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($_SESSION['cart']['event']))
                                            foreach ($_SESSION['cart']['event'] as $event) : ?>
                                            <tr data-sid="<?= $v['sid'] ?>">
                                                <td><?= $event['name'] ?></td>
                                                <td><?= $event['date'] . "/" . $event['time'] ?></td>
                                                <td><input style="width: 4rem;" class="quantity" type="number" min=1 max="<?= $event["limitNum"] ?>" value="<?= $event['quantity'] ?>" onchange="calPrices()" /></td>
                                                <td class="price" data-price="<?= $event['price'] ?>"></td>
                                                <td class="sub-total"><?= intval(1) * 100 ?></td>
                                                <td>
                                                    <a href="javascript:" onclick="deleteItem(event, '<?= $event['id'] ?>')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col">
                                <div class="alert alert-primary text-center" role="alert">
                                    <h4 class="m-0"> 總計: <span class="totalPrice  "></span></h4>
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

        // document ready
        $(function() {
            // 呈現數量
            quantity.each(function() {
                const qty = $(this).attr('data-qty') * 1;
                $(this).val(qty);
            });

            calPrices();

        });


        console.log(location.search.replace('?tab=', ''))

        const nowTab = location.search.replace('?tab=', '');
        if (nowTab === '') {
            $('#myTab li:eq(0) a').tab('show');
        }
        if (nowTab === 'wishList') {
            $('#myTab li:eq(3) a').tab('show');
        }

        // member.php?tab=wishList 可直接連結到追蹤清單
    </script>

    <?php include __DIR__ . '/parts/html-foot.php'; ?>