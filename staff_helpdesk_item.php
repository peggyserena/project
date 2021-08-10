<?php require __DIR__ . '/parts/config.php'; ?>
<?php

$title = '客服中心';
$pageName = 'staff_helpdesk_item';

?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<style>

.box {
    margin: 100px auto;
    width: 75%;
}

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
<div class="box">
    <div class="hdItem  p-0 m-0">
    </div>
    
    <div class="userData  p-0 m-0">
    </div>
    <div>
        <textarea id="helpdesk_reply"></textarea>
        <button onclick="helpdeskAddReply();">回覆</button>
    </div>
</div>
<?php include __DIR__ . '/parts/staff_scripts.php'; ?>
<script>
function helpdeskRecord(){
    $.post('<?= WEB_API ?>/helpdesk-api.php', {
        action: 'staffRead',
        id: <?= $_GET['id']?>,
    },function(result) {
        console.log(result);
        data = result['data'];
        user = result['user'];
        imgList = result['img'] ?? [];
        $(".hdItem").html("");
        // <img src='<?= WEB_ROOT ?>/${img[d['id']][ind]['path']}' alt=''>
        // const files = $("#img")[0].files
        // for(var i = 0; i < files.length; i++){
        // var file = files[i];
        // if (file) {
        // <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${URL.createObjectURL(file)}" alt="your image" />

        var hdi_output = "";
        imgList.forEach(function(hdi){
            hdi_output += `<div class="col"><img src='${hdi['path']}' alt='' style="width: 100%;"></div>`;
        });

        var output = `<div class="row m-0">
                        <div class="col-md-12"><div class="row">圖片：${ hdi_output }</div> </div>
                        <div class="col-md-12">
                            <div>日期：<span>${ data['created_at'] }</span></div>
                            <div>主題：<span>${ data["topic"] } </span></div>
                            <div>問題類型：<span>${ data["cat_name"] }</span></div>
                            <div>訂單編號：<span>${ data["order_num"] }</span></div>
                        </div>
                        <div class="col-md-12">內容：
                        <p>${ data["content"] }</ｐ></div>
                    </div>`;
        $(".hdItem").append(output);


        $(".userData").html("");
        // user ? user['fullname'] : data['g_name']
        // if user 是true, 則回傳user['fullname'],否則回傳data['g_name']
        output = `<div>姓名: ${user ? user['fullname'] : data['g_name']}</div>
                <div>電話: ${user ? user['mobile'] : data['g_mobile']}</div>
                <div>email: ${user ? user['email'] : data['g_email']}</div>`;
        $(".userData").append(output);
    }, 'json')
    .fail(
        function(e) {
            alert( "error" );
            console.log(e.responseText);
    });
}

function helpdeskAddReply(){
    $.post('<?= WEB_API ?>/helpdesk-api.php', {
        action: 'addReply',
        id: <?= $_GET['id'] ?>,
        reply: $("#helpdesk_reply").val(),
    },function(result) {
        alert("success");
        helpdeskSendReplyMail();
    }, 'json')
    .fail(
        function(e) {
            alert( "error" );
            console.log(e.responseText);
    });
}
function helpdeskSendReplyMail(){
    $.post('<?= WEB_API ?>/email-api.php', {
        action: 'helpdeskReply',
        id: <?= $_GET['id'] ?>,
    },function(result) {
        alert("success");
        
    }, 'json')
    .fail(
        function(e) {
            alert( "error" );
            console.log(e.responseText);
    });
}
helpdeskRecord();
</script>

<?php include __DIR__ . '/parts/staff_html-foot.php'; ?>