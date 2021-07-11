<?php include __DIR__ . '/parts/config.php'; ?>
<?php
    if (isset($_SESSION['user'])) header('Location: index.php'); 
$title = '會員登入';
$pageName = 'login';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    body {
        background: linear-gradient(45deg, #e1ebdc 0%, #e8ddf1 100%);
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


    form {
        color: gray;
        padding: 5% 7.5%;
        background: white;
        font-weight: 600;
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

</style>

<!-- ===============================  modal - 確認登入 =============================== -->


<?php include "parts/modal.php"?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 con_01 p-0 m-0 ">
            <h2 class="title b-green rot-135 ">會員登入</h2>

            <form class="form1" name="form1" method="post" novalidate onsubmit="checkForm(); return false;">
                <input type="hidden" name="action" value="guest"/>
                <div class="form-group">
                    <label for="email">email <span>(必填)</span></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <small class="form-text error"></small>
                </div>
                <div class="form-group">
                    <label for="password">密碼 <span>(必填)</span></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" ></span>
                    <small class="form-text error"></small>
                </div>

                <div class="text-center">
                    <button type="submit" class="custom-btn btn-4 t_shadow m-3 ">登入</button>
                    <p class="text-center"><a href="forget.php">我忘記密碼了 (๑ↀᆺↀ๑)</a></p> 
                </div>
                <hr>
                <p class="text-center m-4">＊其他登入方式＊</p>
                <div class="form-group">
                    <div class="btnGroup justify-content-between row ">
                        <button type="button" class="btn facebook  text-white  col-sm-3 "><i class="fa fa-facebook mr-1"></i> Facebook</button>
                        <button type="button" class="btn twitter  text-white col-sm-3 "><i class="fa fa-twitter mr-1"></i> Twitter</button>
                        <button type="button" class="btn google  text-white  col-sm-3 "><i class="fa fa-google-plus mr-1"></i> Google</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $email = $('#email');
    const fileds = [$email];

    function checkForm() {
        // 回復原來的狀態
        fileds.forEach(el => {
            el.css('border', '1px solid #CCCCCC');
            el.next().text('');
        });

        let isPass = true;

        if (!email_re.test($email.val())) {
            isPass = false;
            $email.css('border', '1px solid red');
            $email.next().text('請輸入正確的 email');
        }


        if (isPass) {
            $.post(
                'login-api.php',
                $(document.form1).serialize() + "&action=guest",
                function(data) {
                    if (data.success) {
                        // alert('資料修改成功');
                        // swal('Title...', 'Hello World!', 'success');
                        // Alert Modal Type
                        modal_init();
                        insertPage("#modal_img", "animation_success.html");
                        insertText("#modal_content", "歡迎您登入薰衣草森林會員～");
                        $("#modal_alert").modal("show");
                        setTimeout(function(){window.history.back();}, 2000);
                        // location.href = './index.php';
                    } else {
                        modal_init();
                        insertPage("#modal_img", "animation_error.html");
                        insertText("#modal_content", "登入失敗，請確認帳號和密碼～");
                        $("#modal_alert").modal("show");
                        setTimeout(function(){window.history.back();}, 2000);
                    }
                },
                'json'
            )
        }

    }
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