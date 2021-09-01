<?php require __DIR__ . '/parts/config.php'; ?>
<?php

$title = '客服中心';
$pageName = 'helpdesk';




?>
<link rel="stylesheet" href="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css">
<link rel="stylesheet" href="<?= WEB_ROOT ?>/css/helpdesk.css">
<?php include __DIR__ . '/parts/html-head.php'; ?>
<style>






</style>

<?php include __DIR__ . '/parts/navbar.php'; ?>
<?php include "parts/modal.php"?>

<main>

    <form onsubmit="create(); return false;" enctype="multipart/form-data" id="myForm">
    <input type="hidden" name="action" value="add"/>
    <div class="container my-5">
        <div class="con_01 row">
            <h2 class="title b-green rot-135 text-center col-sm-12">客服中心</h2>
            <div class="col-md-6 message text-secondary mb-5">
                <div class="form-container buyer1">
                    <?php if (isset($_SESSION['user'])) : ?>
                    <?php else : ?>
                        <div class="alert alert-danger text-center p-0  mt-3 " role="alert">

                            <?= $pageName == 'login' ? 'active' : '' ?>
                            <a class="nav-link" href="login.php">
                                <p class=" m-0 text-danger">請登入會員後再留言，或選擇 "其他參訪者"</p>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="m-2">
                    <input id="buyer1" type="radio" name="name" value="buyer1" /><label for="buyer1 ">同會員</label>
                    <input id="buyer2" type="radio" name="name" value="buyer2" /><label for="buyer2"> 其他參訪者</label>
                    <span class="text-center m-2 form-container buyer1 "><a href="memberEditor.php" class="custom-btn btn-4 text-center text-white c_1" style="width:90px">資料修改</a></span>

                </div>
                <div class="form-container buyer1 pl-3" id="myForm1">
                    <div class="form-group ">
                        <label for="fullname">姓名： <span><?= $_SESSION['user']['fullname'] ?? "" ?></span>
                    </div>
                    <div class="form-group ">
                        <label for="mobile">連絡電話： </label><span><?= $_SESSION['user']['mobile'] ?? ""?></span>
                    </div>
                    <div class="form-group ">
                        <label for="email">email ： </label><span><?= $_SESSION['user']['email'] ?? "" ?></span>
                    </div>
                </div>
                <div class="form-container buyer2 pl-3" id="myForm2">
                    <div class="form-group "><input class="form-control" type="text" name="g_name" placeholder="姓名" /></div>
                    <div class="form-group "><input class="form-control" type="text" name="g_mobile" placeholder="連絡電話" /></div>
                    <div class="form-group "><input class="form-control" type="text" name="g_email" placeholder="Email" /></div>
                </div>

                <div class="" id="myForm3">
                    <div class="form-group pl-3 ">
                        <input class="form-control my-3" type="text" name="topic" placeholder="主旨" />
                        <select id='cat_id' name='cat_id'class="form-control">
                        </select>
                    </div>
                    <div id="fillInfo_1" class="form-group pl-3 fillInfo">
                        <ul class="ml-3 mt-2  list-unstyled ">相關資訊：
                            <li><a  href="membership.php" target="_blank" >會員方案 FＡQ & 折扣及優惠說明</a></li>
                            <li><a href="privacyPolicy.php">隱私權政策</a></li>
                        </ul>
                    </div>
                    <div id="fillInfo_2" class="form-group pl-3 fillInfo">
                        <input class="form-control " type="text" name="order_num" placeholder="請填寫訂單編號" />
                        <ul class="ml-3 mt-2  list-unstyled ">相關資訊：
                            <li><a  href="member.php?tab=tradeRecord" target="_blank" >訂單編號查詢</a></li>
                            <li><a href="returnPolicy.php" target="_blank">退貨政策＆流程</a></li>
                        </ul>
                    </div>
                    <div id="fillInfo_3" class="form-group pl-3 fillInfo">
                        <ul class="ml-3 mt-2 list-unstyled ">相關資訊：
                            <li><a  href="index.php" target="_blank" >園區介紹&相簿</a></li>
                            <li><a  href="intinerary.php" target="_blank" >交通資訊</a></li>
                        </ul>
                    </div>
                    <div id="fillInfo_4" class="form-group pl-3 fillInfo">
                        <ul class="ml-3 mt-2 row list-unstyled">相關資訊：　
                            <li><a href="restaurant.php" target="_blank" >森林咖啡館菜單&線上訂位</a></li>
                        </ul>
                    </div>
                    <div id="fillInfo_5" class="form-group pl-3 fillInfo">
                        <ul class="ml-3 mt-2 row list-unstyled">相關資訊：
                            <li><a  href="event.php" target="_blank" >森林體驗訊息</a></li>
                        </ul>
                    </div>
                    <div id="fillInfo_6" class="form-group pl-3 fillInfo">
                        <ul class="ml-3 mt-2row list-unstyled ">相關資訊：
                            <li><a href="hotel.php"  target="_blank" >夜宿薰衣草介紹&線上訂房</a></li>
                        </ul>
                    </div>
                    <div class="form-group pl-3">
                        <textarea class="form-control" rows="6"  placeholder="歡迎留言，我們將會儘快請專人以郵件方式回覆您的問題。" name="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img" class="ml-3">圖片</label>
                        <input class=""type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
                        <input type="hidden" id="img_order" name="img_order">
                    </div>
                    <div class="form-group" id="preview">
                        <ul id="sortable" class="row  list-unstyled ml-3">
                        </ul>
                    </div>
                </div>
                <div class="text-center">
                    <button class="custom-btn btn-4 c_1" type="submit" value="">寄出</button>
                </div>

            </div>
            <div class="col-md-6 direct-contact-container  ">
                <h4 class="b-green rot-135 p-2 text-center text-white my-3 c_1">其他聯繫方式</h4>
                <ul class="contact-list p-0 ">
                    <li><a href="tel:+886-4-25931066"><img class="b-green rot-135" src="./images/icon/phone-call.svg" alt=""><span>(04)2593-1066 </a></span></li>
                    <li><a href="mailto:lavenderforestcafe@gmail.com?subject=Lavendar Forest %20使用者意見回饋&body=您好,%0A我在 薰衣草森林 遭遇了底下的問題，請協助處理～ %0A%0A謝謝"><img class="b-green rot-135" src="./images/icon/mail.svg" alt="">lavenderforestcafe@gmail.com</a></li>
                    <li><a href="https://goo.gl/maps/pb5HjaKtV1UCcrgz6" target="_blank"><img class="b-green rot-135" src="./images/icon/house.svg" alt="">426台中市新社區中興街20號</a> </li>   
                </ul>
                <hr>

                <ul class="social-media-list justify-content-center py-3 px-2 row ">
                    <li><a href="https://www.messenger.com/t/lavender2001/" target="_blank"><img src="./images/icon/FBM.svg" alt="" ></a></li>
                    <li><a href="https://line.me/ti/p/iHcxJM2qvH" target="_blank"><img src="./images/icon/line_small.svg"  alt="" ></a></li>
                    <li><a href="https://www.facebook.com/share.php?u=https://www.agrigaiatw.com/" target="_blank"><img src="./images/icon/fb_small.svg" alt=""></a></li>
                    <li><a href="http://www.nextbootstrap.com/" target="_blank"><img src="./images/icon/twitter.svg" alt=""> </a></li>
                    <li><a href="http://www.nextbootstrap.com/" target="_blank"><img src="./images/icon/ig.svg" alt=""> </a></li>
                    <li><a href="http://www.nextbootstrap.com/" target="_blank"><img src="./images/icon/p.svg" alt=""> </a></li>

                </ul>
            </div>
        </div>
    </div>
    </form>
</main>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script src="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
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

    $(document).ready(function() {
        function updateFormContainer() {
            $(".form-container").hide();
            $('input[type="radio"]:checked').each(function(i, elem) {

                var targetBox = $("." + elem.value);
                $(targetBox).show();
            });

        }
        $('input[type="radio"]').click(updateFormContainer);
        updateFormContainer();


        function updateFormFillInfo() {
            $(".fillInfo").hide();
            var id = '#fillInfo_' + $('select#cat_id').val();
            $(id).show();
        }
        $('select#cat_id').change(updateFormFillInfo);
        updateFormFillInfo();
    });
</script>
<script>
    $("#buyer1").attr("checked", '');
</script>
<script>
  $.post('<?= WEB_API ?>/helpdesk-api.php', {
    'action': 'readCat',
  }, function(data){
    var output = 
    `<option class="form-control" value="" disabled hidden selected>問題類型</option>`;
    $("#cat_id").append(output);

    data.forEach(function (cat){
      var output = 
      `<option value="${cat['id']}">${cat['name']}</option>`;
      $("#cat_id").append(output);
    });

  }, 'json').fail(function(data){
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
          insertPage("#modal_img", "animation/animation_mail.html");
          insertText("#modal_content", "感謝您的來信！我們會盡速回覆您！");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.href = "member.php?tab=helpdeskRecord"}, 5000);
        },
        error: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_error.html");
          insertText("#modal_content", "資料傳輸失敗，請稍後再試～");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.href = "helpdesk.php"}, 2000);
        }
    });
    
  }

  function deleteItem(elem){
    $(elem).parents("li").remove();
    $("#img_changed").val(1);
  }

  // 設定date日期min為今日
  var d = new Date();
  var min = d.toISOString().split("T")[0];
  $("#date").attr("min", min);
</script>


<?php include __DIR__ . '/parts/html-foot.php'; ?>