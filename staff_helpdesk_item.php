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
.load{
    background-color: rgba(0,0,0, 0.3);
    /* opacity: 0.4; */
    height: 100vh;
    width: 100vw;
    z-index: 9999;
    position: fixed;
    top: 0;
    display: none;
}
</style>
<div class="load">
    <?php include "animation/X_loading3.html"?>
</div>
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
<?php include "parts/modal.php"?>
    <div class="container con_01 p-0 mb-3 ">
        <div  >
            <form id="myForm" enctype="multipart/form-data">
                <input name="action" value="addReply" type="hidden"/>
                <input name="id" value="<?= $_GET['id'] ?>" type="hidden"/>
                <h2 class="title b-green rot-135 col-sm-12">客服信箱回覆</h2>
                <div class="">
                    <h4 class="bg-dark text-white text-center p-2 m-0">信件內容</h4>
                    <div class="userData "></div>
                    <div class="hdItem  "></div>
                </div>
                <h4 class="bg-dark p-2 text-white  text-center m-0 ">回覆內容</h4>
                <div class="addReply text-center py-3 px-5 my-3 "  style="display: none;">
                    <textarea id="helpdesk_reply" class="form-control p-3" name="reply" rows="5"></textarea>
                    <div class="form-group my-3">
                            <label for="img" class="ml-3">圖片</label>
                            <input class=""type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
                            <input type="hidden" id="img_order" name="img_order">
                        </div>
                        <div class="form-group" id="preview">
                            <ul id="sortable" class="row  list-unstyled ml-3">
                            </ul>
                        </div>

                    <button class="custom-btn btn-4 c_1 " type="button" onclick="helpdeskAddReply();">回覆</button>
                </div>
                <div class="repliedContentBox" style="display: none;">
                    <div>
                        <div class="py-2 px-3"><span>回覆時間：</span><span class="replied_at"></span></div>
                        <div><pre><p class="repliedContent py-2 px-3 mb-3"></p></pre></div>
                        <div class="repliedContentImg d-flex" style="flex-wrap: wrap;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<div class="text-center mb-5">   
    <a class="custom-btn btn-4 text-center c_1" href="<?= WEB_ROOT ?>/staff_helpdesk.php">回上頁</a>
</div>
<?php include __DIR__ . '/js/staff_scripts.php'; ?>
<script src="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script>
$("#img")

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
                        <div style="display: grid;">
                          <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${URL.createObjectURL(file)}" alt="your image" />
                          <button type="button" onclick="deleteItem(this);">X</button>
                        </div>
                      </li>`;
        $("#preview #sortable").append(img);
      }
    }
  });
</script>
<script>
function helpdeskRecord(){
    $.post('<?= WEB_API ?>/helpdesk-api.php', {
        action: 'staffRead',
        id: <?= $_GET['id']?>,
    },function(result) {
        console.log(result);
        data = result['data'];
        user = result['user'];
        imgList_members = result['img']['members'] ?? [];
        imgList_staff = result['img']['staff'] ?? [];
        $(".hdItem").html("");
        var hdi_output = "";
        imgList_members.forEach(function(hdi){
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

            
            var hdi_output = "";
            imgList_staff.forEach(function(hdi){
                hdi_output += `<div class="text-center fancybox p-1 m-0"> 
                                    <a id="fancybox" href="${hdi['path']}"  data-fancybox='F_box1' data-caption= ''>
                                    <img width="120px" src="${hdi['path']}" alt=''  >
                                    </a>
                                </div>`;
            });
            $(".repliedContentImg").html(hdi_output);
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
    var img_order = [];
    $("#preview #sortable li").each(function(ind, elem){
      img_order[$(elem).data("order")] = ind + 1;
    })
    $("#img_order").val(JSON.stringify(img_order));
    $.ajax({
        url: '<?= WEB_API ?>/helpdesk-api.php',
        data: new FormData($("#myForm")[0]),
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(result){
            if (result[0] === "success"){
                $(".load").show();
                helpdeskSendReplyMail();
            }else{
                alert("error add reply");
            }
        },
        error: function(result){
          console.log(result);
          modal_init();
          insertPage("#modal_img", "animation/animation_error.html");
          insertText("#modal_content", "資料傳輸失敗");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.reload();}, 2000);
          // setTimeout(function(){location.href = "staff_event_search.php"}, 2000);
        }
    });
}
function helpdeskSendReplyMail(){
    $.post('<?= WEB_API ?>/email-api.php', {
        action: 'helpdeskReply',
        id: <?= $_GET['id'] ?>,
    },function(result) {
        console.log("sending email");
        $(".load").hide();
        modal_init();
        insertPage("#modal_img", "animation/animation_success.html");
        insertText("#modal_content", "信件回覆成功");
        $("#modal_alert").modal("show");
        setTimeout(function(){location.reload();}, 2000);
    }, 'json')
    .fail(
        function(e) {
            $(".load").hide();
            modal_init();
            insertPage("#modal_img", "animation/animation_error.html");
            insertText("#modal_content", "信件回覆失敗");
            $("#modal_alert").modal("show");
            setTimeout(function(){location.reload();}, 2000);
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

    function deleteItem(elem){
        $(elem).parents("li").remove();
        $("#img_changed").val(1);
    }
</script>

<?php include __DIR__ . '/parts/staff_html-foot.php'; ?>