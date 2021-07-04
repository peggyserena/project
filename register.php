<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員註冊';
$pageName = 'register';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<style>
    body {
      background: linear-gradient(45deg, #e8ddf1 0%,  #e1ebdc 100%);
    }

    .con_01 {
        border-radius: 0.25rem;

        box-shadow: 0px 0px 15px #666E9C;
        -webkit-box-shadow: 0px 0px 15px #666E9C;
        -moz-box-shadow: 0px 0px 15px #666E9C;
    }

    form .form-group small.error {
        color: red;
    }

    .btnGroup button.facebook {
        background-color: #3b5998;
    }

    .btnGroup button.twitter {
        background-color: #1da1f2;
    }

    .btnGroup button.google {
        background-color: #dd4b39;
    }

    span {
        color: rgb(224, 100, 100);
        font-size: 0.8rem;
    }

    .container {
        margin: 5% auto;
    }

    .button {
        text-align: center;
    }

    form {
        color: gray;
        padding: 5% 7.5%;
        background: white;
        font-weight: 600;

    }

    .form-group ::-webkit-input-placeholder {
        color: #a4b0be;
    }
    .form1 .form-group{
        position: relative;
    }

    .field-icon {
        position:absolute;
        top:65%;
        right:2.5%;
        z-index: 2;
        color:gray;

        }
/* =============================== modal =============================== */

    .bee svg{
        width: 100px;
        height:100px;
        margin:1rem;
    }

</style>

<?php include __DIR__ . '/parts/navbar.php'; ?>
<main>
    <!-- ===============================  modal - 確認登入 =============================== -->

    <?php include "parts/modal.php"?>


    <div class="container ">
        <div class="row justify-content-center  ">
            <div class="col-md-7 con_01 m-0 p-0">
                <h2 class="title b-green rot-135">會員註冊</h2>
                <form class="form1" name="form1" method="post" novalidate onsubmit="checkForm(); return false;">
                    <input type="hidden" name="fb_id" value="<?= $_GET['fb_id'] ?? '' ?>"/>
                    <input type="hidden" name="action" value="register"/>
                    <div class="form-group">
                        <label for="email">email <span>(必填)</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" autofocus required>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="password">密碼 <span>(必填)</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="＊＊＊＊＊＊" required>
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" ></span>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="fullname">姓名</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $_GET['fullname'] ?? '' ?>" placeholder="林小花"></input>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="birthday">生日 <span>(必填)</span></label>
                        <input type="date" class="form-control" id="birthday" name="birthday" required>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="mobile">手機</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" placeholder="0987-654-321">
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="email_2nd">備用eamil</label>
                        <input type="email" class="form-control" id="email2" name="email2" placeholder="example@gmail.com" >
                    </div>
                    <div class="form-group">
                        <label for="zipcode">郵遞區號</label>
                        <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="236"></input>
                    </div>
                    <div class="form-group">
                        <label for="city">縣市</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="新北市"></input>
                    </div>
                    <div class="form-group">
                        <label for="address">區域及地址</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="＊＊區＊＊路＊＊巷＊＊號＊＊樓"></input>
                    </div>
                    <div class="button m-4"><button type="submit" class="custom-btn btn-4 t_shadow ">註冊</button></div>
                    <hr>
                    <p class="text-center m-4">＊其他註冊方式＊</p>
                    <div class="form-group">
                        <div class="btnGroup justify-content-between row ">
                            <button type="button" class="btn facebook  text-white  col-sm-3 "><i class="fa fa-facebook"></i> Facebook</button>
                            <button type="button" class="btn twitter  text-white col-sm-3 "><i class="fa fa-twitter"></i> Twitter</button>
                            <button type="button" class="btn google  text-white  col-sm-3 "><i class="fa fa-google-plus"></i> Google</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $birthday = $('#birthday'),
          $email = $('#email');
    const fileds = [$birthday, $email];


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
        
        // if(! mobile_re.test($mobile.val())){
        //     alert("t5");
        //     isPass = false;
        //     $mobile.css('border', '1px solid red');
        //     $mobile.next().text('請輸入正確的手機號碼');
        //     alert("t6");
        // }
        if (isPass) {
            $.post(
                'register-api.php',
                $(document.form1).serialize(),
                function(data) {
                    console.log(data);
                    if (data.success) {
                        modal_init();
                        insertPage("#modal_img", "animation_register.html");
                        insertText("#modal_content", "歡迎加入薰衣草森林家族～");
                        $("#modal_alert").modal("show");
                        // alert('註冊成功');
                        setTimeout(function(){window.history.back();}, 2000);
                    } else {
                        alert(data.error);
                    }
                },
                'json'
            ).fail(function(d){
                alert(d);
                console.log(d);
            })
        }

    }
</script>
<script>
    

</script>
<script>
    //眼睛
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
    });
</script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>