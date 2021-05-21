<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員登入';
$pageName = 'login';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    body {
        background: linear-gradient(45deg, #e1ebdc 0%, #e8ddf1 100%);
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
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7 con_01 p-0 m-0 ">
            <h2 class="title b-green rot-135 ">會員登入</h2>

            <form name="form1" method="post" novalidate onsubmit="checkForm(); return false;">

                <div class="form-group">
                    <label for="email">email <span>(必填)</span></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <small class="form-text error"></small>
                </div>
                <div class="form-group">
                    <label for="password">密碼 <span>(必填)</span></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <small class="form-text error"></small>
                </div>

                <div class="button ">
                    <button type="submit" class="custom-btn btn-4 t_shadow m-3 ">登入</button>
                    <!-- <button type="submit" class="custom-btn btn-4 t_shadow m-3 ">忘記密碼</button> -->
                </div>

                <hr>
                <p class="text-center m-4">＊其他登入方式＊</p>
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
                $(document.form1).serialize(),
                function(data) {
                    if (data.success) {
                        alert('登入成功');
                        window.history.back();
                        // location.href = './index.php';
                    } else {
                        alert(data.error);
                    }
                },
                'json'
            )
        }

    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>