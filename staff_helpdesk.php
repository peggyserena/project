<?php include __DIR__ . '/parts/config.php'; ?>
<?php

$title = '客服中心';
$pageName = 'staff_helpdesk';

?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<style>



#helpdeskRecord table tbody td {
  font-weight: 400;
  font-size: 1rem;
  text-align: left;
}

#setting ul li {
  padding-bottom: 3px;
  background: linear-gradient(45deg, #dcc5ef 0%, #adda9a 100%) bottom no-repeat;
  background-size: 100% 3px;
  list-style: none;
}

.custom-btn {
  margin-top: 1.5rem;
}

.hdItem div {
  border: orange 1px solid;
}



</style>

<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
<main>
    <div class="container">
        <div id="helpdeskRecorde" class="tab-pane fade row mb-5">
            <form action="staff_deskhelp.php" method="get" onsubmit="helpdeskRecord(); return false;">
                <div id="searchBar" class="m-0 p-0">

                
                    <ul class="p-2 m-auto row list-unstyled justify-content-center align-items-center ">
                        <li class=" " >
                            <select id="helpdesk_select_id" name='cat_id'>
                                <option value=""disabled hidden selected>問題類別</option>
                                <?php foreach ($helpdesk_category as $cat) { ?>
                                    <option value='<?= $cat['id'] ?>'><?= $cat['name'] ?></option>
                                <?php } ?>
                            </select>
                        </li>
                        <li class="">
                            <select id="helpdesk_select_year" name="year">
                                <option value=""disabled hidden selected>年份</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </li>
                        <li class="">
                            <select id="helpdesk_select_month" name="month">
                                <option value=""disabled hidden selected>月份</option>
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
                </div>
                <div id="mailToUser "class="form-group pl-3">
                    <textarea class="form-control" rows="6"  placeholder="" name="toUser" required></textarea>
                </div>
                <button class="custom-btn btn-4 ">回覆</button>

            </form>
        </div>



</main>

<?php include __DIR__ . '/parts/staff_scripts.php'; ?>

<script>
function helpdeskRecord(){
    $.post('helpdesk-api.php', {
        type: 'readAll',
        cat_id: $("#helpdesk_select_id").val(),
        year: $("#helpdesk_select_year").val(),
        month: $("#helpdesk_select_month").val(),
    },function(data) {
        console.log(data);
        $(".hdItem").html("");
        data.forEach(function(hd){
            var output = `<div class="row m-0">
                            <div class="col-md-3">圖片<img src='#' alt='' style="width: 100%;"></div>
                            <div class="col-md-9">
                                <div>日期：<span>${ hd['create_datetime'] }</span></div>
                                <div>主題：<span>${ hd["topic"] } </span></div>
                                <div>問題類型：<span>${ hd["cat_name"] }</span></div>
                                <div>訂單編號：<span>${ hd["order_num"] }</span></div>
                            </div>
                            <div class="col-md-12">內容<span>${ hd["content"] }</span></div>
                            </div>`;
            $(".hdItem").append(output);
        })
    }, 'json')
    .fail(
        function(e) {
            alert( "error" );
            console.log(e.responseText);
    });
}
</script>
<script>
    var date = new Date();
    var year = date.getFullYear() - 3;
    var month = 1;
    var selectedMonth = "<?= $_GET['month'] ?? "" ?>";
    var selectedYear = "<?= $_GET['year'] ?? "" ?>";
    var selectedId = "<?= $_GET['cat_id'] ?? "" ?>";
    $("#helpdesk_select_month option").each(function(ind, elem) {
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
    $("#helpdesk_select_year option").each(function(ind, elem) {
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
    $("#helpdesk_select_id").val(selectedId);
    </script>
    <script>
    $.post('helpdesk-api.php', {
        'type': 'readCat',
    }, function(data){
        var output = `<option value="" disabled hidden selected>請選擇</option>`;
        $("#cat_id").append(output);
        data.forEach(function (cat){
        var output = `<option value="${cat['id']}">${cat['name']}</option>`;
        $("#cat_id").append(output);
        });
    }, 'json').fail(function(data){
        console.log(data);
    })
    function create(){
        var img_order = [];
        $("#preview #sortable li").each(function(ind, elem){
        img_order[$(elem).data("order")] = ind + 1;
        })
        $("#img_order").val(JSON.stringify(img_order));
        $.ajax({
            url: 'helpdesk-api.php',
            data: new FormData($("#myForm")[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST', // For jQuery < 1.9
            success: function(data){
            console.log(data);
            modal_init();
            insertPage("#modal_img", "animation_success.html");
            insertText("#modal_content", "信件回覆成功!");
            $("#modal_alert").modal("show");
            setTimeout(function(){location.href = "staff_helpdesk_search.php"}, 2000);

            },
            error: function(data){
            console.log(data);
            modal_init();
            insertPage("#modal_img", "animation_error.html");
            insertText("#modal_content", "資料傳輸失敗");
            $("#modal_alert").modal("show");
            setTimeout(function(){location.href = "staff_helpdesk_search.php"}, 2000);
            }
        });
    }

    // 設定date日期min為今日
    var d = new Date();
    var min = d.toISOString().split("T")[0];
    $("#date").attr("min", min);
</script>


<?php include __DIR__ . '/parts/staff_html-foot.php'; ?>