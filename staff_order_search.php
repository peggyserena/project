<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '訂單查詢';
$pageName = 'staff_order_search';

if(
    ! isset($_SESSION['staff'])
  ){
  header('Location: staff_login.php');
  exit;
  }


?>


<?php include __DIR__ . '/parts/staff_html-head.php'; ?>

<style>
    .box{
        margin: 100px auto;
        width: 95%;

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
                            <li class=" "><input type="text" value="" placeholder="帳號(E-mail)"> </li>
                            <li class=" "><input type="text" value="" placeholder="姓名"></li>
                            <li class=" "><input type="text" value="" placeholder="手機"></li>
                            <li class=" "><input type="text" value="" placeholder="訂單編號"></li>
                        </ul>
                        <ul class="row list-unstyled p-2 m-0 justify-content-center align-items-center ">
                            <li><span style="font-size: 1.2rem;">交易期間：</span><input type="date" id="start_date">　～　<input type="date" id="end_date"> </li>
                            <li><span style="font-size: 1.2rem;"></span>
                            <select id="helpdesk_select_reply" name="reply">
                                <option value=""disabled hidden selected>付款狀態</option>
                                <option value="all">全部</option>
                                <option value="">已付款</option>
                                <option value="">未付款</option>
                            </select>
                            <select id="helpdesk_select_reply" name="reply">
                                <option value=""disabled hidden selected>出貨狀態</option>
                                <option value="all">全部</option>
                                <option value="">已出貨</option>
                                <option value="">未出貨</option>
                            </select>
                        </li>

                        
                            </li>
                            <li><button type="submit" onclick="readOrder()" class="custom-btn btn-4 ml-4">查詢</button></li>

                        </ul>
                    </form>
                </div>

                <div id="tradeRecord" class="tab-pane ">
                    

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th scope="col" class="m-0 text-center" style="width: 5%">序號</th>
                                    <th scope="col" class="m-0 text-center" style="width: 10%">圖片</th>
                                    <th scope="col" class="m-0 text-center" style="width: 10%">訂單編號</th>
                                    <th scope="col" class="m-0 text-center" style="width: 10%">訂單日期</th>
                                    <th scope="col" class="m-0 text-center" style="width: 12.5%">客戶帳號</th>
                                    <th scope="col" class="m-0 text-center" style="width: 10%">姓名</th>
                                    <th scope="col" class="m-0 text-center" style="width: 10%">手機</th>
                                    <th scope="col" class="m-0 text-right" style="width: 7.5%">金額</th>
                                    <th scope="col" class="m-0 text-center" style="width: 7.5%">付款狀態</th>
                                    <th scope="col" class="m-0 text-center" style="width: 7.5%">出貨狀態</th>
                                    <th scope="col" class="m-0 text-center" style="width: 7.5%">取消交易</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                </div>

            </div>
        </div>

    </main>

    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>
<script>
  function memberIntoSearch(){
    $.post('<?= WEB_API ?>/member-api.php', {
        action: 'readAll',
        fullname: $("#fullname").val(),
        mobile: $("#mobile").val(),
        email: $("#email").val(),
    },function(data) {
        console.log(data);
        members_list = data['result'];
        $("#profile table tbody").html("");
        members_list.forEach(function(members, index){
            var output = `<tr>
                            <td class="bg-dark text-white" style="border: #454d55 1px solid ;">${index + 1}</td>
                            <td>${nullTo(members['fullname'])}</td>
                            <td>${nullTo(members['email'])}</td>
                            <td>${nullTo(members['mobile'])}</td>
                            <td><a hreef="staff_member_order_item.php"> </td>

                            </tr>`;
            $("#profile table tbody").append(output);
        })
    }, 'json')
    .fail(
        function(e) {
            alert( "error" );
            console.log(e.responseText);
    });
  }
  function nullTo(str){
    return str === null ? "" : str; 
  }
</script>

<script>
        function readOrder(){
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        $.post('<?= WEB_API ?>/order-api.php', {
            action: 'read',
            start_date: start_date,
            end_date: end_date
        },function(data) {
            $("#tradeRecord table tbody").html("");
            var maxLength = 12;
            data.forEach(function(elem){
                var order_id = "";
                var status_class = "";
                if (elem['status'] == "已取消"){
                    status_class = "text-danger";
                }
                var tr = `<tr>
                        <td class="order_id">${elem['order_id']}</td>
                        <td class="order_date">${elem['create_datetime']}</td>
                        <td class="order_price">${dallorCommas(elem['price'])}</td>
                        <td class="order_status">${status_class}">${elem['status']}</td>
                        <td class="order_status"><a href="cart-confirm.php?id=${elem['id']}&type='search'">查詢</a></td>
                        <td class="order_status"><a onclick="orderCancel(${elem['order_id']})">取消</a></td>
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
        $.post('<?= WEB_API ?>/order-api.php', {
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
    


    $("#end_date").val(getFormattedDate(new Date()));
    
    function getFormattedDate(d){
        var formatted_month = (d.getMonth() + 1).toString().padStart(2, "0");
        var formatted_date = (d.getDate()).toString().padStart(2, "0");
        var formatted_date = `${d.getFullYear()}-${formatted_month}-${formatted_date}`;
        return formatted_date;
    }
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
