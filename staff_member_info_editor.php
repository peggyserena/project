<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員註冊';
$pageName ='staff_register';


$sql = "SELECT * FROM staff WHERE staff_id='" . $_SESSION['staff']['staff_id']."'";
$stamt = $pdo->query($sql)->fetch();



$sql = "SELECT * FROM `members` WHERE id=id";
$r = $pdo->query($sql)->fetchAll();


?>
<?php include __DIR__. '/parts/staff_html-head.php'; ?>

<style>

    .button {
        text-align: center;
    }

    form {
        color: gray;
        padding: 5% 7.5%;
        background: white;
        font-weight: 600;
    }

    .form-group ::-webkit-input required-placeholder {
        color: #a4b0be;
    }
    input[value]{
        color: blue;
    }

/* =============================== modal =============================== */
 
</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>


<main>
    <!-- ===============================  modal - 確認登入 =============================== -->
    <?php include "parts/modal.php"?>
    <div class="container my-5 ">
        <div class="row justify-content-center  ">
            <div class="col-md-8 col-sm-12 con_01 m-2 p-0">
                <h2 class="title b-green rot-135">修改會員資料</h2>
                <form name="form1" id="myForm" method="post" novalidate onsubmit="checkForm(); return false;">
                    <input required type="hidden" name="action" value="changeProfile"/>
                    <div class="form-group">
                        <label for="staff_id">會員編號： </label>
                        <span type="text" id="member_id"><?= ['member']['id'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">帳號(email) </label>
                        <input required type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required value="<?= ['member']['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="fb_id">FB 帳號</label>
                        <input required type="text" class="form-control" id="fb_id" name="fb_id" placeholder="" required value="<?= ['member']['fb_id'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="fullname">姓名</label>
                        <input required type="text" class="form-control" name="fullname" id="fullname" placeholder="林小花" autofocus value="<?= ['member']['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">性別 </label>
                        <input type="radio"  name="gender" value="男">男
                        <input type="radio"  name="gender" value="女">女
                        <input type="radio"  name="gender" value="無">不填
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="birthday">生日 </label>
                        <input required type="date" class="form-control" id="birthday" name="birthday" required value="<?= ['member']['birthday'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="mobile">手機</label>
                        <input required type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" placeholder="0987-654-321" value="<?= ['member']['mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="county">縣市</label>
                        <select class="form-control" name="county" id="county"></select>
                    </div>
                    <div class="form-group">
                        <label for="district">鄉鎮市區</label>
                        <select class="form-control" name="district" id="district"></select>
                    </div>
                    <div class="form-group">
                        <label for="zipcode">郵遞區號</label>
                        <input required type="text" class="form-control" name="zipcode" id="zipcode" placeholder="236" value="<?= ['member']['zipcode'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">地址</label>
                        <input required type="text" class="form-control" name="address" id="address" placeholder="＊＊區＊＊路＊＊巷＊＊號＊＊樓" value="<?= ['member']['address'] ?>">
                    </div>
                    <div class="button m-4"><button type="submit" class="custom-btn btn-4 t_shadow ">送出</button></div>
                    <hr>
                </form>
            </div>
        </div>
    </div>

</main>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script src="erTWZipcode-master/js/er.twzipcode.data.js"></script>
<script src="erTWZipcode-master/js/er.twzipcode.min.js"></script>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $birthday = $('#birthday'),
          $email = $('#email'),
          $mobile = $("#mobile");
    const fileds = [$birthday, $email, $mobile];


    function checkForm() {
        // 回復原來的狀態
        fileds.forEach(el => {
            el.css('border', '1px solid #CCCCCC');
            el.next().text('');
        });

        let isPass = true;

        if($birthday.val().length != 10){
            isPass = false;
            $birthday.css('border', '1px solid red');
            $birthday.next().text('請輸入生日');
        }
        
        if (!email_re.test($email.val())) {
            isPass = false;
            $email.css('border', '1px solid red');
            $email.next().text('請輸入正確的 email');
        }
        
        if (!mobile_re.test($mobile.val())) {
            isPass = false;
            $mobile.css('border', '1px solid red');
            $mobile.next().text('請輸入正確的手機號碼');
        }
        // if(! mobile_re.test($mobile.val())){
        //     alert("t5");
        //     isPass = false;
        //     $mobile.css('border', '1px solid red');
        //     $mobile.next().text('請輸入正確的手機號碼');
        //     alert("t6");
        // }
        if (isPass) {
            var data = $(document.form1).serialize() + "&zipcode=" + $("#zipcode").val();
            $.post(
                '<?= WEB_API?>/staff-api.php',
                data,
                function(data) {
                    console.log(data);
                    if (data.success) {
                        modal_init();
                        insertPage("#modal_img", "animation/animation_success.html");
                        insertText("#modal_content", "修改成功");
                        $("#modal_alert").modal("show");
                        setTimeout(function(){window.history.back();}, 2000);
                        // alert('註冊成功');
                        //window.history.back();
                    } else {
                        alert(data.error);
                    }
                },
                'json'
            ).fail(function(d){
                modal_init();
                insertPage("#modal_img", "animation/animation_error.html");
                insertText("#modal_content", "資料傳輸失敗");
                $("#modal_alert").modal("show");
                setTimeout(function(){window.history.back();}, 2000);
                console.log(d);
            })
        }

    }
</script>
<script>
// 設定birthday日期max為今日
var d = new Date();
var max = d.toISOString().split("T")[0];
$("#birthday").attr("max", max);
</script>
<script>
  erTWZipcode({
    defaultCountyText: "請選擇",
    defaultDistrictText: "請選擇"
  });
  var distEl = document.querySelector('#myForm select[name=district]');
  document.querySelector('#myForm select[name=county]')
    .addEventListener("change", function(evt){
      //refresh district element
    //   M.FormSelect.init(distEl);
    });
  //first time init all select elements in #myForm
//   M.FormSelect.init(document.querySelectorAll('#myForm select'));
  document.querySelector('#myForm select[name=county]').value = "<?= $_SESSION['staff']['county'] ?>";
  document.querySelector('#myForm select[name=county]').dispatchEvent(new Event("change"));
  document.querySelector('#myForm select[name=district]').value = "<?= $_SESSION['staff']['district'] ?>";
  document.querySelector('#myForm select[name=district]').dispatchEvent(new Event("change"));
</script>
<?php // unset($_SESSION['staff'])?>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
