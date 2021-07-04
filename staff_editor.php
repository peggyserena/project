<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員註冊';
$pageName ='staff_register';
?>
<?php include __DIR__. '/parts/staff_html-head.php'; ?>

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
/* =============================== modal =============================== */



    .bee svg{
        width: 100px;
        height:100px;
        margin:1rem;
    }

</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>


<main>
    <!-- ===============================  modal - 確認登入 =============================== -->
    
    <?php include "parts/modal.php"?>
    <div class="container ">
        <div class="row justify-content-center  ">
            <div class="col-7 con_01 m-0 p-0">
                <h2 class="title b-green rot-135">修改個人資料</h2>
                <form name="form1" method="post" novalidate onsubmit="checkForm(); return false;">
                    <input type="hidden" name="action" value="changeProfile"/>
                    <div class="form-group">
                        <label for="staff_id">員工編號</label>
                        <div type="text" id="staff_id"><?= $_SESSION['staff']['staff_id'] ?></div>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="identityNum">身分證字號<span>(必填)</span></label>
                        <input type="text" class="form-control" id="identityNum" name="identityNum" autofocus required>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">email <span>(必填)</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" autofocus required>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="fullname">姓名<span>(必填)</span></label>
                        <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $_GET['fullname'] ?? '' ?>" placeholder="林小花"></input>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="birthday">生日 <span>(必填)</span></label>
                        <input type="date" class="form-control" id="birthday" name="birthday" required>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="mobile">手機<span>(必填)</span></label>
                        <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" placeholder="0987-654-321">
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="zipcode">郵遞區號<span>(必填)</span></label>
                        <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="236"></input>
                    </div>
                    <div class="form-group">
                        <label for="city">縣市<span>(必填)</span></label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="新北市"></input>
                    </div>
                    <div class="form-group">
                        <label for="address">區域及地址<span>(必填)</span></label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="＊＊區＊＊路＊＊巷＊＊號＊＊樓"></input>
                    </div>
                    <div class="button m-4"><button type="submit" class="custom-btn btn-4 t_shadow ">送出</button></div>
                    <hr>
                </form>
            </div>
        </div>
    </div>

</main>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>
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
            $.post(
                'staff-api.php',
                $(document.form1).serialize(),
                function(data) {
                    console.log(data);
                    if (data.success) {
                        modal_init();
                        insertPage("#modal_img", "animation_login.html");
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
                alert(d);
                console.log(d);
            })
        }

    }
</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>