<?php include __DIR__ . '/parts/config.php'; ?>
<?php

$title = '客服中心';
$pageName = 'helpdesk';
if (isset($_SESSION['user'])) {
    $sql = "SELECT * FROM members WHERE id=" . $_SESSION['user']['id'];

    $r = $pdo->query($sql)->fetch();
}


$cat_id = "";
$cat_id = $_GET['cat_id'] ?? "";


$sql .= " JOIN `helpdesk_category` as hc ON `cat_id` = hc.`id`";

// $stmt = $pdo->query($sql);
// $helpdeskes = $stmt->fetchAll();

// print($helpdesk_img[$helpdesk['id']] ?? "" );

// 問題類別
$sql = "SELECT * FROM `helpdesk_category`";

$stmt = $pdo->query($sql);
$helpdesk_category = $stmt->fetchAll();






?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<style>





body {
    background: linear-gradient(45deg, #e8ddf1 0%, #e1ebdc 100%);
    position: relative;
    z-index: -10;

}

.con01{
    box-shadow: 0px 0px 15px #666E9C;
    -webkit-box-shadow: 0px 0px 15px #666E9C;
    -moz-box-shadow: 0px 0px 15px #666E9C;
    background-color:whitesmoke;

}


.direct-contact-container .contact-list li img{
    width: 2rem;
    border-radius:50%;
    padding:5px;
    margin: 0 1rem 0 0
}
.direct-contact-container .contact-list li{
    margin: 0.5rem 0;
}
.direct-contact-container .contact-list li a{
    color:gray;
}
.direct-contact-container .contact-list{
    list-style-type: none;
}

.send-button {
    width: 100%;
    height:2rem;
    overflow: hidden;
    transition: all .2s ease-in-out;
}
.send-text {
  display: block;
  margin-top: 10px;
  font: 700 1rem;
  letter-spacing: 2px;
}

.alt-send-button:hover {
  transform: translate3d(0px, -55px, 0px);

  
}



.social-media-list li {
  position: relative; 
  display: inline-block;
  cursor: pointer; 
  transition: all .2s ease-in-out;
  width: 2rem;
  margin:0 0.5rem;
}

.social-media-list li:hover {
    transform: translateY(-1rem);
}

hr {
  border-bottom: 3px solid white;
}





</style>

<?php include __DIR__ . '/parts/navbar.php'; ?>
<main>
    <div class="container">
        <div class="con01 my-3 ">
            <h2 class="title b-green rot-135 text-center">客服中心</h2>
            <div class="row my-3 p-4">
                <div class="col-md-6 message text-secondary ">
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
                    <div class="form-container buyer1 ">
                        <?php
                        if (isset($r)) {
                        ?>
                            <form class=" pl-3" name="form1"  method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
                                <div class="form-group ">
                                    <label for="fullname">姓名： <span><?= $r['fullname'] ?></span>
                                </div>
                                <div class="form-group ">
                                    <label for="mobile">連絡電話： </label><span><?= $r['mobile'] ?></span>
                                </div>
                                <div class="form-group ">
                                    <label for="email">email ： </label><span><?= $r['email'] ?></span>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="form-container buyer2 ">
                        <form action="" name="form2" class=" pl-3  " method="post">
                            <div class="form-group "><input class="form-control" type="text" name="g_name" placeholder="姓名" /></div>
                            <div class="form-group "><input class="form-control" type="text" name="g_mobile" placeholder="連絡電話" /></div>
                            <div class="form-group "><input class="form-control" type="text" name="g_email" placeholder="Email" /></div>
                        </form>
                    </div>

                    <div class="">
                    <form class="" name="form3" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
                            <div class="form-group pl-3 ">
                                <input class="form-control my-3" type="text" name="topic" placeholder="主旨" />
                                <select id=selected name='cat_id'>
                                    <option value="">問題類型</option>
                                    <?php foreach ($helpdesk_category as $cat) { ?>
                                        <option value='<?= $cat['id'] ?>'><?= $cat['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div id="fillInfo_member" class="form-group pl-3 fillInfo">
                                <ul class="ml-3 mt-2  row list-unstyled ">
                                    <li><a  href="membership.php" target="_blank" >會員方案 FＡQ & 折扣及優惠說明</a></li>
                                    <li><a href="privacyPolicy.php">隱私權政策</a></li>
                                </ul>
                            </div>
                            <div id="fillInfo_order" class="form-group pl-3 fillInfo">
                                <input class="form-control " type="text" name="order_num" placeholder="請填寫訂單編號" />
                                <ul class="ml-3 mt-2 row list-unstyled ">
                                    <li><a  href="member.php?tab=tradeRecord" target="_blank" >訂單編號查詢</a></li>
                                    <li><a href="returnPolicy.php" target="_blank">退貨政策＆流程</a></li>
                                </ul>
                            </div>
                            <div id="fillInfo_garden" class="form-group pl-3 fillInfo">
                                <ul class="ml-3 mt-2 ">
                                    <li><a  href="index.php" target="_blank" >園區介紹&相簿</a></li>
                                    <li><a  href="intinerary.php" target="_blank" >交通資訊</a></li>
                                </ul>
                            </div>
                            <div id="fillInfo_restaurant" class="form-group pl-3 fillInfo">
                                <ul class="ml-3 mt-2 ">
                                    <li><a href="restaurant.php" target="_blank" >森林咖啡館菜單&線上訂位</a></li>
                                </ul>
                            </div>
                            <div id="fillInfo_event" class="form-group pl-3 fillInfo">
                                <ul class="ml-3 mt-2 ">
                                    <li><a  href="event.php" target="_blank" >森林體驗訊息</a></li>
                                </ul>
                            </div>
                            <div id="fillInfo_hotel" class="form-group pl-3 fillInfo">
                                <ul class="ml-3 mt-2 ">
                                    <li><a href="hotel.php"  target="_blank" >夜宿薰衣草介紹&線上訂房</a></li>
                                </ul>
                            </div>
                            <div class="form-group pl-3">
                                <textarea class="form-control" rows="6" placeholder="歡迎留言，我們將會儘快請專人以郵件方式回覆您的問題。" name="content" required></textarea>
                            </div>
                            <div class="form-group pl-3">
                                <label for="img">圖片</label>
                                <input type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
                                <input type="hidden" id="img_order" name="img_order">
                            </div>

                        </form>
                    </div>

                    <button class="custom-btn btn-4 send-button" type="submit" value="SEND">
                        <div class="alt-send-button"><i class="fa fa-paper-plane"></i><span class="send-text">送出</span></div>
                    </button>
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
    </div>
</main>

<?php include __DIR__ . '/parts/scripts.php'; ?>

<script>
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
            var id = '#fillInfo_' + $('select#select_id').val();
            $(id).show();
        }
        $('select#select_id').change(updateFormFillInfo);
        updateFormFillInfo();
    });
</script>
<script>
    $("#buyer1").attr("checked", '');
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
          insertText("#modal_content", "森林體驗新增成功!");
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


<?php include __DIR__ . '/parts/html-foot.php'; ?>