<?php require __DIR__ . '/parts/config.php'; ?>
<?php

$title = '客服中心';
$pageName = 'staff_helpdesk_item';

?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<style>



.custom-btn {
  margin-top: 1.5rem;
}


.hdItem >  div {
  border: lightgray solid;
  border-width: 0px 12px 12px 12px;
}
.repliedContentBox > div  {
  border: lightgray 12px solid;
}
.userData > div  {
  border: lightgray 12px solid;
}

.hdItem > div >div:hover{
    background-color:  #dcedd5;
}
.userData >div:hover{
    background-color:  #dcedd5;
}

.addReply >div:hover{
    background-color:  #dcedd5;
}
.repliedContentBox >div:hover{
    background-color:  #dcedd5;
}
a:hover{
    color: white
}

.d-flex a {
        flex: 1 1 0;
    }
</style>

<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
    <div class="container con_01 p-0 mb-3 ">
        <div  >
            <h2 class="title b-green rot-135 col-sm-12">客服信箱回覆</h2>
            <div class="">
                <h4 class="bg-dark text-white text-center p-2 m-0">信件內容</h4>
                <div class="userData "></div>
                <div class="hdItem  "></div>
            </div>
            <h4 class="bg-dark p-2 text-white  text-center m-0 ">回覆內容</h4>
            <div class="addReply text-center py-3 px-5 my-3 "  style="display: none;">
                <textarea id="helpdesk_reply" class="form-control p-3"  rows="5"></textarea>
                <div class="form-group my-3">
                        <label for="img" class="ml-3">圖片</label>
                        <input class=""type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
                        <input type="hidden" id="img_order" name="img_order">
                    </div>
                    <div class="form-group" id="preview">
                        <ul id="sortable" class="row  list-unstyled ml-3">
                        </ul>
                    </div>

                <button class="custom-btn btn-4 c_1 " onclick="helpdeskAddReply();">回覆</button>
            </div>
            <div class="repliedContentBox" style="display: none;">
                <div>
                    <div class="py-2 px-3"><span>回覆時間：</span><span class="replied_at"></span></div>
                    <div><pre><p class="repliedContent py-2 px-3 mb-3"></p></pre></div>
                    <div class="repliedContentImg" >
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="text-center mb-5">   
    <a class="custom-btn btn-4 text-center c_1" href="<?= WEB_ROOT ?>/staff_helpdesk.php">回上頁</a>
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
        var hdi_output = "";
        imgList.forEach(function(hdi){
            hdi_output += `<div class="text-center fancybox d-flex row p-1 m-0"> 
                                <a id="fancybox" href="${hdi['path']}"  data-fancybox='F_box1' data-caption= ''>
                                <img width="120px" src="${hdi['path']}" alt=''  >
                                </a>
                            </div>`;

        });

        var output = `<div class="row m-0">
                        <div class="col-md-12 row m-0 py-2">圖片：${ hdi_output }</div>
                        <div class="col-md-12 py-3" ">
                            <div>來信日期：<span>${ data['created_at'] }</span></div>
                            <div>信件主旨：<span>${ data["topic"] } </span></div>
                            <div>問題類型：<span>${ data["cat_name"] }</span></div>
                            <div>訂單編號：<span>${ data["order_num"] }</span></div>
                        </div>
                        <div class="col-md-12">
                            <div class=" py-2">信件內容：</div><p class=" mb-3">${ data["content"] }</p></div>
                        </div>`;
        $(".hdItem").append(output);


        $(".userData").html("");
        // user ? user['fullname'] : data['g_name']
        // if user 是true, 則回傳user['fullname'],否則回傳data['g_name']
        output = `
                <div class="px-3 py-2" >
                    <div style="font-weight:700">客戶資料：</div>
                    <div class=" "><span>姓名： ${user ? user['fullname'] : data['g_name']}<span></div>
                    <div class=""><span>電話： ${user ? user['mobile'] : data['g_mobile']}<span></div>
                    <div class=""><span>email： ${user ? user['email'] : data['g_email']}<span></div>
                    
                </div>`
        $(".userData").append(output);


        if (data['status'] === "已回覆"){
            $(".replied_at").text(data['replied_at']);
            $(".repliedContent").text(data['reply']);
            $(".repliedContentBox").show();
        }else{
            $(".addReply").show();
        }
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
        if (result[0] === "success"){
            helpdeskSendReplyMail();
        }else{
            alert("error");
        }
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
        location.reload();
    }, 'json')
    .fail(
        function(e) {
            alert( "error" );
            console.log(e.responseText);
    });
}
helpdeskRecord();
</script>

<script>
        $( function() {
    $( "#sortable" ).sortable({
      change: function( event, ui ) {
        $("#img_changed").val(1);
      }
    });
    // $( "#sortable" ).disableSelection();
  } );

    $("#img").change(() => {
        $("#img_changed").val(1);
        $("#preview #sortable").html("");
        const files = $("#img")[0].files
        for(var i = 0; i < files.length; i++){
        var file = files[i];
        if (file) {
            
        var img =`<li class="ui-state-default" data-order="${i}">
                            <div style="display: grid;" class="px-1">
                            <img class="preview_img " style="max-width: 120px; max-height: 120px" src="${URL.createObjectURL(file)}" alt="your image" />
                            <button type="button" onclick="deleteItem(this);">X</button>
                            </div>
                        </li>`;
            $("#preview #sortable").append(img);
        }
        }
    });
</script>

<?php include __DIR__ . '/parts/staff_html-foot.php'; ?>