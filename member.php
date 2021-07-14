<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員中心';
$pageName = 'member';

if(
    ! isset($_SESSION['user'])
){
header('Location: login.php');
exit;
}


$sql = "SELECT * FROM members WHERE id=" . $_SESSION['user']['id'];
$r = $pdo->query($sql)->fetch();

$sql = "SELECT * FROM `helpdesk`";
$stmt = $pdo->query($sql);
$helpdeskes = $stmt->fetchAll();


// helpdesk類別
// $sql = "SELECT * FROM `helpdesk_category`";
// $stmt = $pdo->query($sql);
// $result = $stmt->fetchAll();
// $helpdesk_category = [];
// //ArrayArray ( [1] => 管理者 [2] => 經理 [3] => 會計 [4] => 一般員工 )
// foreach($result as $helpdesk_cat){
//     $helpdesk_category[$helpdesk_cat['id']] = $helpdesk_cat['name'];
// }

//  helpdesk類別
$sql = "SELECT * FROM `helpdesk_category`";
$stmt = $pdo->query($sql);
$helpdesk_category = $stmt->fetchAll();
$sql .= " JOIN `helpdesk_category` as hc ON `cat_id` = hc.`id`";



// 抓圖片
if (!empty($helpdesk_id_list)){
    $sql = "SELECT * FROM `helpdesk_image` WHERE helpdesk_id in (".implode(",", $helpdesk_id_list).") ORDER BY num_order";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([]);
    $result = $stmt->fetchAll();
    $helpdesk_img = [];
    foreach($result as $cover_img){
        if (!array_key_exists($cover_img['helpdesk_id'], $helpdesk_img)){
            $helpdesk_img[$cover_img['helpdesk_id']] = $cover_img['path'];
        }
    }
}
// print($helpdesk_img[$helpdesk['id']] ?? "" );


?>


<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="./css/member.css">
<style>
    
</style>
<?php include __DIR__ . '/parts/navbar.php'; ?>


<body>
    <main>
        <div class="container">
            <div class="row justify-content-center ">
                <div class="box col-lg-9 col-md-9 col-sm-12 m-2   p-0 ">
                    <ul id="myTab" class="nav nav-tabs t_shadow ">
                        <li class="active b-green rot-135"><a data-toggle="tab" href="#profile"> <h3 class="m-0">會員中心</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#tradeRecord"><h3 class="m-0">交易訂單查詢</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#wishList"><h3 class="m-0">我的收藏</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#coupon"><h3 class="m-0">購物金查詢</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#setting"><h3 class="m-0">通知設定</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#helpdeskRecorde"><h3 class="m-0">客服紀錄</h3></a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">



                        <!-- ================================ 會員中心 ================================ -->



                        <div id="profile" class="tab-pane fade in active">
                            <div class="col-md-8 col-sm-12  m-0 p-0 m-auto ">
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
                                        <label for="zipcode">地址： </label><span><?= $r['zipcode'] ?></span><span><?= $r['county'] ?></span><span><?= $r['district'] ?></span><span><?= htmlentities($r['address']) ?></span>
                                    </div>

                                    <div  class="text-center"><a href="memberEditor.php" class="custom-btn btn-4 t_shadow text-center">修改</a>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <!-- ================================ 交易訂單查詢 ================================ -->



                        <div id="tradeRecord" class="tab-pane fade">
                            
                            <div><span style="font-size: 1.3rem;">交易期間：</span><input type="date" id="start_date">　～　<input type="date" id="end_date"><button type="submit" onclick="readOrder()" class="custom-btn btn-4 t_shadow ml-4">查詢</button> </div>

                            <div class="mt-4">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="b-green rot-135 text-white">
                                            <th scope="col" class="m-0 t_shadow text-center">訂單編號</th>
                                            <th scope="col" class="m-0 t_shadow text-center">訂單日期</th>
                                            <th scope="col" class="m-0 t_shadow text-center">金額</th>
                                            <th scope="col" class="m-0 t_shadow text-center">狀態</th>
                                            <th scope="col" class="m-0 t_shadow text-center">查詢</th>
                                            <th scope="col" class="m-0 t_shadow text-center">取消</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- ================================ 我的收藏查詢 ================================ -->



                        <div id="wishList" class="tab-pane fade">
                            <div class="col text-center">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="b-green rot-135 text-white">
                                            <th scope="col" class="m-0 t_shadow text-center">類型</th>
                                            <th scope="col" class="m-0 t_shadow text-center">
                                                項目名稱
                                            </th>
                                            <th scope="col" class="m-0 t_shadow text-center">日期／時間</th>
                                            <th scope="col" class="m-0 t_shadow text-center">單價</th>
                                            <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                                            <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <h3 class="custom-btn btn-4  c_1" ><a href="javascript:" id="" class="text-white"  onclick="deleteWishListAll()">清空</a></h3>

                            </div>
                        </div>




                        <!-- ================================ 購物金查詢 ================================ -->



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





                        <!-- ================================ 通知設定 ================================ -->



                        <div id="setting" class="tab-pane fade row mb-5">
                            <ul class="m-auto col-lg-9 col-md-9 col-sm-12 ">
                                    <li class="d-flex align-items-center justify-content-between mt-3 ">
                                        <p>訂閱電子報</p>
                                        <div class="toggle toggle-knob ">
                                            <input type="checkbox" id="toggle-knob1" class="toggle-checkbox">
                                            <label class="toggle-btn" for="toggle-knob1"><p class="toggle-feature" data-label-on="on"  data-label-off="off"></p></label>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between mt-3 ">
                                        <p>手機 簡訊通知</p>
                                        <div class="toggle toggle-knob ">
                                            <input type="checkbox" id="toggle-knob2" class="toggle-checkbox">
                                            <label class="toggle-btn" for="toggle-knob2"><p class="toggle-feature" data-label-on="on"  data-label-off="off"></p></label>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between mt-3 ">
                                        <p>LINE 簡訊通知</p>
                                        <div class="toggle toggle-knob ">
                                            <input type="checkbox" id="toggle-knob3" class="toggle-checkbox">
                                            <label class="toggle-btn" for="toggle-knob3"><p class="toggle-feature" data-label-on="on"  data-label-off="off"></p></label>
                                        </div>
                                    <li class="d-flex align-items-center justify-content-between mt-3 ">
                                        <p>Facebook Messager 簡訊通知</p>
                                        <div class="toggle toggle-knob ">
                                            <input type="checkbox" id="toggle-knob4" class="toggle-checkbox">
                                            <label class="toggle-btn" for="toggle-knob4"><p class="toggle-feature" data-label-on="on"  data-label-off="off"></p></label>
                                        </div>
                                    </li>
                                </li>
                            </ul>

                        </div>

                        <!-- ================================ 客服紀錄 ================================ -->



                        <div id="helpdeskRecorde" class="tab-pane fade row mb-5">
                            <form action="member.php" method="get" >
                                <div id="searchBar" class="m-0 p-0">

                                
                                    <ul class="p-2 m-auto row list-unstyled justify-content-center align-items-center ">
                                        <li class=" " >
                                            <select id="select_id" name='cat_id'>
                                                <option value="">問題類別</option>
                                                <!-- <?php foreach($helpdesk_category as $id => $name): ?>
                                                    <option value="<?=$id?>"><?=$name?></option>
                                                    <?php endforeach;?> -->
                                                <?php foreach ($helpdesk_category as $cat) { ?>
                                                    <option value='<?= $cat['id'] ?>'><?= $cat['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li class="">
                                            <select id="select_year" name="year">
                                                <option value="">年份</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </li>
                                        <li class="">
                                            <select id="select_month" name="month">
                                                <option value="">月份</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </li>
                                        <li><button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>
                                    </ul>
                                </div>

                                <div class="hdItem  p-0 m-0">
                                    <?php foreach ($helpdeskes as $hd) : ?>
                                        <div class="row m-0">
                                        <div class="col-md-3">圖片<img src='<?= WEB_ROOT."/".$helpdesk_img[$helpdesk['id']] ?>' alt='' style="width: 100%;"></div>
                                        <div class="col-md-9">
                                            <div>日期：<span><?= $hd['create_datetime'] ?></span></div>
                                            <div>主題：<span><?= $hd["topic"]?> </span></div>
                                            <div>問題類型：<span><?= $helpdesk_category[$hd["cat_id"]].[0] ?></span></div>
                                            <div>訂單編號：<span><?= $hd["order_num"] ?></span></div>
                                        </div>
                                        <div class="col-md-12">內容<span><?= $hd["content"]  ?></span></div>

                                        </div>
                                  <?php endforeach; ?>

                                </div>
                            </form>
                        </div>




                    </div>
                </div>
            </div>
        </div>




    </main>

    <?php include __DIR__ . '/parts/scripts.php'; ?>


    <script>
        const quantity = $('select.quantity');

        const deleteItem = function(hd, id) {
            let t = $(hd.currentTarget);
            console.log('hd:', hd);
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
                updateCartCount();
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

        const changeQty = function(hd) {
            const el = $(hd.currentTarget);
            const qty = el.val();
            const pid = el.closest('tr').attr('data-sid');

            $.get('cart-api.php', {
                action: 'add',
                pid,
                qty
            }, function(data) {
                updateCartCount();
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
                    var type_map = {restaurant: "森林咖啡館", hd: "森林體驗", hotel: "夜宿薰衣草森林"};
                    var goToWhere = `${elem['type']}.php`;
                    switch (elem['type']){
                        case 'hd':
                            goToWhere += `#hd_${elem['id']}`;
                            break;
                        case "hotel":
                            goToWhere += `#reservation`;
                            break;
                        case "restaurant":
                            goToWhere += `#bookSeat`;
                            break;
                    }
                    output += "<td>" + type_map[elem['type']] + "</td>";
                    output += "<td>" + elem['name'] + "</td>";
                    output += "<td>" + elem['date'] + "/" + elem['time'].slice(0, 5) + "</td>";
                    output += "<td>" + dallorCommas(elem['price']) + "</td>";
                    output += `<td><a href="${goToWhere}"><i class="fas fa-trash-alt"></i></a></td>`;
                    output += '<td><a href="javascript:" onclick="deleteWishList(hd,' + elem['wish_list_id'] + ')"><i class="fas fa-trash-alt"></i></a></td>';
                    output = '<tr>' + output + '</tr>';
                    $("#wishList table tbody").append(output);
                    console.log(output);
                });
            }, 'json')
        }
        function deleteWishList(hd, id){
            console.log(id);
            let t = $(hd.currentTarget);
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
        function deleteWishListAll(){
            $.post('wishList-api.php', {
                action: 'deleteAll',
            }, function(data){
                console.log(data);
                location.reload();
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
                    var status_class = "";
                    if (elem['status'] == "已取消"){
                        status_class = "text-danger";
                    }
                    var tr = `<tr>
                            <td class="order_id text-center">${elem['order_id']}</td>
                            <td class="order_date text-center">${elem['create_datetime']}</td>
                            <td class="order_price text-left">${dallorCommas(elem['price'])}</td>
                            <td class="order_status text-center ${status_class}">${elem['status']}</td>
                            <td class="order_status text-center "><a href="cart-confirm.php?id=${elem['id']}&type='search'">查詢</a></td>
                            <td class="order_status text-center "><a onclick="orderCancel(${elem['order_id']})">取消</a></td>
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

        function orderCancel(order_id){
            if (!confirm("確定刪除?")) return 0;
            $.post('order-api.php', {
                action: 'cancel',
                order_id
            },function(data) {
                console.log(data);
                if ("info" in data){
                    alert(data["info"]);
                }else{
                    alert("取消成功");
                    location.reload();
                }
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
        if (nowTab === 'coupon') {
            $('#myTab li:eq(3) a').tab('show');
        }
        if (nowTab === 'setting') {
            $('#myTab li:eq(4) a').tab('show');
        }


        $("#end_date").val(getFormattedDate(new Date()));
        
        function getFormattedDate(d){
            var formatted_month = (d.getMonth() + 1).toString().padStart(2, "0");
            var formatted_date = (d.getDate()).toString().padStart(2, "0");
            var formatted_date = `${d.getFullYear()}-${formatted_month}-${formatted_date}`;
            return formatted_date;
        }
    </script>
        <script>
        var date = new Date();
        var year = date.getFullYear() - 3;
        var month = date.getMonth() + 1;
        var selectedMonth = "<?= $_GET['month'] ?? "" ?>";
        var selectedYear = "<?= $_GET['year'] ?? "" ?>";
        var selectedId = "<?= $_GET['cat_id'] ?? "" ?>";
        $("#select_month option").each(function(ind, elem) {
            if (ind > 0) {
                elem.text = month;
                elem.value = month;
                month++;
            }
            if (month > 12) {
                month = 1;
            }
            if (elem.value === selectedMonth){
                elem.selected = true;
            }
        });
        $("#select_year option").each(function(ind, elem) {
            if (ind === 1){
                elem.text = "之前";
                elem.value = `~${year}`;
            }else if (ind > 0) {
                elem.text = year;
                elem.value = year;
                year++;
            }
            if (elem.value === selectedYear){
                elem.selected = true;
            }
        });
        $("#select_id").val(selectedId);
    </script>

    <?php include __DIR__ . '/parts/html-foot.php'; ?>