<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '忘記密碼';
$pageName = 'editMember';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>

<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    form .form-group small.error {
        color: red;
    }
    body {
        background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
    }

    .card{
        box-shadow: 0px -4px 15px #666E9C;
        -webkit-box-shadow: 0px -4px 15px #666E9C;
        -moz-box-shadow: 0px -4px 15px #666E9C;
        color: gray;
        font-size:1.2rem;
        font-weight: 600;
        padding:7.5%
    }
    input[type=text] {
        width: 100%;
        padding: 20px 20px;
        box-sizing: border-box;
        border:2px solid;
        border-image-source: linear-gradient(to left, #adda9a , #DCC5EF );
        border-image-slice: 1;
        color:#6A8AD9;
        font-weight: 500;
        font-size:1.2rem;

    }
    h2{
        box-shadow: 0px -4px 15px #666E9C;
        -webkit-box-shadow: 0px -4px 15px #666E9C;
        -moz-box-shadow: 0px -4px 15px #666E9C;
        position: relative;
        z-index: 9;
    }
</style>
<div class="container mt-5 mb-5" id="forget_password" style="display: none;">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <h2 class="title m-0 ">修改資料</h2>
            <div class="card">
                <!-- alert 的方式 -->
                <!-- <form name="form1" action="member-api.php" method="post" onsubmit="return checkForm();">
                    <input type="hidden" name="action" value="changePassword"/>
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>
                    <div class="form-group">
                        <label for="password autofocus ">密碼</label>
                        <input type="password" class="form-control" name="password" id="password" value="" required></input>
                    </div>
                    <div class="form-group">
                        <label for="check_password autofocus ">確認密碼</label>
                        <input type="password" class="form-control" id="check_password" value=""></input>
                    </div>
                    <div class=" text-center mt-4"><button type="submit" class="custom-btn btn-4 t_shadow">修改</button></div>
                </form> -->
                <form name="form1" action="member-api.php" method="post" onsubmit="return checkForm();">
                    <div class="form-group">
                        <label for="password autofocus ">密碼</label>
                        <input type="password" class="form-control" name="password" id="password" value="" required></input>
                    </div>
                    <div class="form-group">
                        <label for="check_password autofocus ">確認密碼</label>
                        <input type="password" class="form-control" id="check_password" value=""></input>
                    </div>
                    <div class=" text-center mt-4"><button type="submit" class="custom-btn btn-4 t_shadow">修改</button></div>
                </form>
            </div>


        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<?php include __DIR__ . '/parts/html-foot.php'; ?>

<script>
    // alert 的方式
    // function checkForm(){
    //     if ($("#password").val() !== $("#check_password").val()) {
    //         alert('密碼不相符');
    //         return false;
    //     } 
    //     return true;
    // }
    function checkForm(){
        if ($("#password").val() === $("#check_password").val()) {
            $.post('member-api.php', {
                action: 'changePassword',
                id: <?= $_GET['id'] ?>,
                key: '<?= $_GET['key'] ?>',
                password: $("#password").val(),
            }, function(data){
                if (data[0]){
                    alert('密碼更新成功');
                    location.href = 'login.php';
                }
            });
        } 
        return false;
    }
    function checkKey(){
        $.post('member-api.php', {
            action: 'checkKey',
            id: <?= $_GET['id'] ?>,
            key: '<?= $_GET['key'] ?>',
        }, function(data){
            if (!data[0]){
                location.href = 'index.php';
            }else{
                $("#forget_password").show();
            }
        }, 'json');
    }
    checkKey();
</script>