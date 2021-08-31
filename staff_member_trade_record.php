<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員交易紀錄';
$pageName = 'member_trade_Record';
?>


<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<style>
    #searchBar{
        padding: 0.5rem 0;
    }
    .table th, .table td {
    padding: 0.5rem;
    }
    </style>
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>

<div class="container">
    <div class="con_01">
        <div id="tradeRecord" class="" >
                                
            <div id="searchBar" class="text-center" >
                <span style="font-size: 1.3rem;">交易期間：</span><input type="date" id="start_date">　～　<input type="date" id="end_date"><button type="submit" onclick="readOrder()" class="custom-btn btn-4 t_shadow ml-4">查詢</button> 
            </div>

            <div class="mt-0">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-dark text-white">
                        <tr >
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
<?php include __DIR__ . '/parts/staff_scripts.php'; ?>

<script>
    $(document).ready(function(){
        readOrder();
    })

    const quantity = $('select.quantity');

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
</script>
<script>
    function readOrder(){
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        $.post('<?= WEB_API ?>/staff_order-api.php', {
            action: 'readAll',
            user_id: "<?= $_GET['id'] ?>",
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
                        <td class="order_status text-center "><button onclick="orderCancel(${elem['order_id']})">取消</button></td>
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
    
    $("#end_date").val(getFormattedDate(new Date()));
    
    function getFormattedDate(d){
        var formatted_month = (d.getMonth() + 1).toString().padStart(2, "0");
        var formatted_date = (d.getDate()).toString().padStart(2, "0");
        var formatted_date = `${d.getFullYear()}-${formatted_month}-${formatted_date}`;
        return formatted_date;
    }


</script>