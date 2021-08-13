<?php require __DIR__ . '/parts/config.php'; ?>
<?php

$title = '客服中心';
$pageName = 'staff_helpdesk';

?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<style>



#helpdeskRecord table tbody td {
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
    <div class="container con_01 p-0 ">
        <h2 class="title b-green rot-135 col-sm-12">客服信箱回覆</h2>
        <div id="helpdeskRecord" class="mb-5  ">
            <form onsubmit="helpdeskRecord(); return false;">
                <div id="searchBar" class="m-0 p-0">
                    <ul class="p-2 m-auto row list-unstyled justify-content-center align-items-center ">
                        <li class=" " >
                            <select id="helpdesk_select_id" name='cat_id'>
                                <option value=""disabled hidden selected>問題類別</option>
                                <option value="all">全部</option>

                            </select>
                        </li>
                        <li class="">
                            <select id="helpdesk_select_year" name="year">
                                <option value=""disabled hidden selected>年份</option>
                                <option value="all">全部</option>
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
                                <option value="all">全部</option>
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
                        <li class="">
                            <select id="helpdesk_select_reply" name="reply">
                                <option value=""disabled hidden selected>回覆狀態</option>
                                <option value="all">全部</option>
                                <option value="">已回覆</option>
                                <option value="">未回覆</option>
                            </select>
                        </li>
                        <li><button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>
                    </ul>
                </div>

                <div class="hdItem  p-0 m-0">
                    <table class="table table-striped table-bordered  table-hover">
                        <thead  class="bg-dark text-white text-center">
                            <tr>
                                <td width=15% >圖片</td>
                                <td width=15%>日期</td>
                                <td width=15%>問題類型</td>
                                <td >信件主旨</td>
                                <td  width=15%>訂單編號</td>
                                <td  width=10%>狀態</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </form>
        </div>
</main>

<?php include __DIR__ . '/parts/staff_scripts.php'; ?>

<script>
helpdeskRecord();
function helpdeskRecord(){
    $.post('<?= WEB_API ?>/helpdesk-api.php', {
        action: 'staffReadAll',
        cat_id: $("#helpdesk_select_id").val(),
        year: $("#helpdesk_select_year").val(),
        month: $("#helpdesk_select_month").val(),
        status: $("#helpdesk_select_reply").val(),
    },function(result) {
        data = result['data'];
        img = result['img'];
        $(".hdItem tbody").html("");

        data.forEach(function(hd){
            var hdi_output = "";
            var imgList = img[hd['id']] ?? [];
            var style = "";

            if (hd['status'] === "未回覆"){
                style = "background-color: #c9dac2; font-weight: 700";
            }
            else if (hd['status'] === "已回覆"){
                style = "font-style: italic; color: gray";
            }
            var output = `<tr style='${style}'>
                            <td class="text-center"><img width="120px" src="${ imgList.length != 0 ? imgList[0]['path'] : '' }"/></td>
                            
                            <td>${ hd['created_at'] }</td>
                            <td>${ hd['cat_name'] }</td>
                            <td>${ hd['topic'] }</td>
                            <td>${ hd['order_num'] }</td>
                            <td  class="text-center"><a href="staff_helpdesk_item.php?id=${ hd['id'] }">${hd['status']}</a></td>
                        </tr>`;
            $(".hdItem tbody").append(output);
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
        if (ind > 1) {
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
        if (ind === 2){
            elem.text = "之前";
            elem.value = `~${year}`;
        }else if (ind > 2) {
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
    $.post('<?= WEB_API ?>/helpdesk-api.php', {
        'action': 'readCat',
    }, function(data){
        var output = `<option value="" disabled hidden selected>問題類型</option>`;
        $("#helpdesk_select_id").append(output);
        data.forEach(function (cat){
        var output = `<option value="${cat['id']}">${cat['name']}</option>`;
        $("#helpdesk_select_id").append(output);
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
            url: '<?= WEB_API ?>/helpdesk-api.php',
            data: new FormData($("#myForm")[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST', // For jQuery < 1.9
            success: function(data){
            console.log(data);
            modal_init();
            insertPage("#modal_img", "animation/animation_success.html");
            insertText("#modal_content", "信件回覆成功!");
            $("#modal_alert").modal("show");
            setTimeout(function(){location.href = "staff_helpdesk_search.php"}, 2000);

            },
            error: function(data){
            console.log(data);
            modal_init();
            insertPage("#modal_img", "animation/animation_error.html");
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