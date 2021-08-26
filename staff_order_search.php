<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '訂單出貨管理';
$pageName = 'staff_order_search';

?>


<?php include __DIR__ . '/parts/staff_html-head.php'; ?>

<style>
    .box{
        margin: 100px auto;
        width: 95%;
    }
    .order_cancel{
        cursor: pointer;
    }
</style>

<?php include __DIR__ . '/parts/staff_navbar.php'; ?>

<body>
    <main>
        <div class="box">
            <div class="con_01">

                <div class=" " id="searchBar" >
                    <form action="staff_member_order_search.php" method="post" >
                        <ul class="row list-unstyled p-2 m-0 justify-content-center align-items-center ">
                            <li class=" "><input type="text" id="search_email" value="" placeholder="帳號(E-mail)"> </li>
                            <li class=" "><input type="text" id="search_fullname" value="" placeholder="姓名"></li>
                            <li class=" "><input type="text" id="search_mobile" value="" placeholder="手機"></li>
                            <li class=" "><input type="text" id="search_order_id" value="" placeholder="訂單編號"></li>
                        </ul>
                        <ul class="row list-unstyled p-2 m-0 justify-content-center align-items-center ">
                            <li><span style="font-size: 1.2rem;">交易期間：</span><input type="date" id="start_date">　～　<input type="date" id="end_date"> </li>
                            <li><span style="font-size: 1.2rem;"></span>
                            <select id="search_status" name="reply">
                                <option value=""disabled hidden selected>付款狀態</option>
                                <option value="all">全部</option>
                                <option value="已付款">已付款</option>
                                <option value="未付款">未付款</option>
                            </select>
                            <select id="search_shipment_status" name="reply">
                                <option value=""disabled hidden selected>出貨狀態</option>
                                <option value="all">全部</option>
                                <option value="已出貨">已出貨</option>
                                <option value="未出貨">未出貨</option>
                            </select>
                        </li>

                        
                            </li>
                            <li><button type="button" onclick="readOrder()" class="custom-btn btn-4 ml-4">查詢</button></li>

                        </ul>
                    </form>
                </div>

                <div id="tradeRecord" class="tab-pane ">
                    

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="bg-dark text-white text-center m-0">
                                    <th scope="col" class=" " style="width: 5%">序號</th>
                                    <th scope="col" class=" " style="width: 10%">訂單編號</th>
                                    <th scope="col" class=" " style="width: 10%">訂單日期</th>
                                    <th scope="col" class=" " style="width: 12.5%">客戶帳號</th>
                                    <th scope="col" class=" " style="width: 10%">姓名</th>
                                    <th scope="col" class=" " style="width: 10%">手機</th>
                                    <th scope="col" class=" " style="width: 7.5%">金額</th>
                                    <th scope="col" class=" " style="width: 7.5%">付款狀態</th>
                                    <th scope="col" class=" " style="width: 7.5%">出貨狀態</th>
                                    <th scope="col" class=" " style="width: 7.5%;">取消交易</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                </div>

            </div>
        </div>

    </main>

    <?php include __DIR__ . '/js/staff_scripts.php'; ?>
<script>
  function nullTo(str){
    return str === null ? "" : str; 
  }
</script>

<script>
    readOrder()
    function readOrder(){
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        $.post('<?= WEB_API ?>/staff_order-api.php', {
            action: 'readAll',
            email: $("#search_email").val(),
            fullname: $("#search_fullname").val(),
            mobile: $("#search_mobile").val(),
            order_id: $("#search_order_id").val(),
            status: $("#search_status").val(),
            shipment_status: $("#search_shipment_status").val(),
            start_date: start_date,
            end_date: end_date,
        },function(data) {
            console.log("data");
            console.log(data);
            $("#tradeRecord table tbody").html("");
            var maxLength = 12;
            data.forEach(function(elem, ind){
                var order_id = "";
                var status_class = "";
                if (elem['status'] == "已取消"){
                    status_class = "text-danger";
                }
                var tr = `<tr>
                        <td class="order_id">${ind + 1}</td>
                        <td class="order_id">${elem['order_id']}</td>
                        <td class="order_date">${elem['create_datetime']}</td>
                        <td class="order_date">${elem['email']}</td>
                        <td class="order_date text-center">${elem['fullname']}</td>
                        <td class="order_date text-center">${elem['mobile']}</td>
                        <td class="order_price text-right">$ ${dallorCommas(elem['price'])}</td>
                        <td class="order_status text-center">${elem['status']}</td>
                        <td class="order_shipment_status text-center"><a href="staff_order_cart-confirm.php?id=${elem['order_id']}">${elem['shipment_status']}</a></td>
                        <td class="order_cancel text-center"><a href="" onclick="orderCancel(${elem['order_id']})">取消</a></td>
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
        $.post('<?= WEB_API ?>/staff_order-api.php', {
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
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
