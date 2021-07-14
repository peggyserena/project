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


$sql = "SELECT * FROM members WHERE id='id'";
$r = $pdo->query($sql)->fetch();



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


<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<style>
    
</style>
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>


<body>
    <main>
        <div class="container">
            <div class="con_01">

                <div class=" " id="searchBar" >
                    <form action="staff_member_order_search.php" method="post" >
                        <ul class="row list-unstyled p-2 m-0 justify-content-center align-items-center ">
                            <li class=" "><input type="text" value="" placeholder="帳號(E-mail)"> </li>
                            <li class=" "><input type="text" value="" placeholder="姓名"></li>
                            <li class=" "><input type="text" value="" placeholder="手機"></li>
                            <li class="">
                                <select id="age" name="age">
                                    <option value="" disabled hidden selected>年齡區間</option>
                                    <option value="0-6">0-6歲</option>
                                    <option value="6-12">6-12歲</option>
                                    <option value="12-15">12-15歲</option>
                                    <option value="15-18">15-18歲</option>
                                    <option value="18-22">18-22歲</option>
                                    <option value="23-30">23-30歲</option>
                                    <option value="31-40">31-40歲</option>
                                    <option value="41-50">41-50歲</option>
                                    <option value="51-100">51歲以上</option>
                                </select>
                            </li>

                            <li><span style="font-size: 1.3rem;">交易期間：</span><input type="date" id="start_date">　～　<input type="date" id="end_date"> </li>
                            <li><button type="submit" onclick="readOrder()" class="custom-btn btn-4 t_shadow ml-4">查詢</button></li>
                        </ul>
                    </form>
                </div>

                <div id="tradeRecord" class="tab-pane fade">
                    

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

            </div>
        </div>

    </main>

    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>


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




        $("#end_date").val(getFormattedDate(new Date()));
        
        function getFormattedDate(d){
            var formatted_month = (d.getMonth() + 1).toString().padStart(2, "0");
            var formatted_date = (d.getDate()).toString().padStart(2, "0");
            var formatted_date = `${d.getFullYear()}-${formatted_month}-${formatted_date}`;
            return formatted_date;
        }
    </script>
        <script>

    </script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
