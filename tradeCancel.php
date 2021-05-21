<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '取消交易';
$pageName = 'tradeCancel';

$sql = "SELECT * FROM members WHERE id=" . $_SESSION['user']['id'];
$r = $pdo->query($sql)->fetch();
?>

<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    form .form-group small.error {
        color: red;
    }
    body {
        background: linear-gradient(45deg,#e8ddf1  0%,  #e1ebdc 100%);
        position: relative;

    }

    .form-container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
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
    /* input[type=text] {
        width: 100%;
        padding: 20px 20px;
        box-sizing: border-box;
        border:2px solid;
        border-image-source: linear-gradient(to left, #adda9a , #DCC5EF );
        border-image-slice: 1;
        color:#6A8AD9;
        font-weight: 500;
        font-size:1.2rem; */

    }
    h2{
        box-shadow: 0px -4px 15px #666E9C;
        -webkit-box-shadow: 0px -4px 15px #666E9C;
        -moz-box-shadow: 0px -4px 15px #666E9C;
        position: relative;
        z-index: 9;
    }
    input {
        margin: 1px 0;
        padding-left: 3%;
        font-size: 1rem;
        border: 1px solid lightgray;
        color: darkblue
    }

    input[type="text"] {
        display: block;
        height: 2.5rem;
        width: 100%;
    }

    input[type="email"] {
        display: block;
        height: 2.5rem;
        width: 100%;
    }

    #column-left {
        width: 49.9%;
        float: left;
        margin-bottom: 2px;
    }

    #column-right {
        width: 49.9%;
        float: right;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }
    .buyer1 form div{
        margin: 1px 0;
        padding: 5px 3%;
        font-size: 1rem;
        color: darkblue;
        background-color:white;
    }
    .buyer1 form label{
        margin:0;
        padding:5px
        }
    input[type="text"]{
        padding-left:1rem
    }

</style>



<div class="container">
    <div class="mb-5 ">
        <h3 class=" title p-2 b-green rot-135">退貨人資料</h3>
        <div class="m-2">
            <input id="buyer1" type="radio" name="name" value="buyer1"/><label for="buyer1 ">同訂購人</label> 
            <input id="buyer2" type="radio" name="name" value="buyer2"/><label for="buyer2"> 修改退貨人</label>
            <a href="https://www.post.gov.tw/post/internet/Postal/index.jsp?ID=208">郵遞區號查詢</a>
        </div>
        <div class="form-container buyer1">
            <?php 
                if (isset($r)){
            ?>
            <form name="form1" class="row card-body " method="post">
                <div  class="form-group col-lg-6 col-sm-12">
                    <label for="fullname">姓名： <span><?= $r['fullname'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="mobile">連絡電話： </label><span><?= $r['mobile'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="email">帳號 ( email )： </label><span><?= $r['email'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="email_2nd">備用eamil： </label><span><?= $r['email_2nd'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="zipcode">郵遞區號： </label><span><?= $r['zipcode'] ?></span>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="city">縣市： </label><span><?= $r['city'] ?></span></span>
                </div>
                <div class="form-group col-lg-12 col-sm-12">
                    <label for="address">區域及地址： </label><span><?= htmlentities($r['address']) ?></span>
                </div>
                <textarea style="width:100%" type="text" name="notes"  autocomplete="on" placeholder="需求備註" ></textarea>
                
            </form>
            <?php
                }
            ?>
        </div>
        <div class="form-container buyer2">
            <input id="input-field" type="text" name="name" placeholder="真實姓名" />
            <input id="column-left" type="text" name="email" placeholder="Eemail" />
            <input id="column-right" type="text" name="mobile" placeholder="連絡電話" />
            <input id="column-right" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="縣市名稱" />
            <input id="column-left" type="text" name="zipcode" autocomplete="on" pattern="[0-9]*" maxlength="5" placeholder="郵遞區號" />
            <input id="input-field" type="text" name="address" required="required" autocomplete="on" placeholder="區域及地址" />
            <textarea style="width:100%" type="text" name="notes"  autocomplete="on" placeholder="需求備註" ></textarea>
        </div>
    </div>
</div>


<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $email = $('#email');

    // const $name = $('#name'),
    //     $email = $('#email'),
    //     $mobile = $('#mobile');

    // const fileds = [$name, $email, $mobile];
    // const smalls = [$name.next(), $email.next(), $mobile.next()];

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
                'editMember-api.php',
                $(document.form1).serialize(),
                function(data) {
                    if (data.success) {
                        alert('資料修改成功');
                    } else {
                        alert(data.error);
                    }
                },
                'json'
            )
        }

    }
</script>
<script>
$(document).ready(function(){
    function updateFormContainer(){
        $(".form-container").hide();
        $('input[type="radio"]:checked').each(function(i, elem){
            
            var targetBox = $("." + elem.value);
            $(targetBox).show();
        });
        
    }
    $('input[type="radio"]').click(updateFormContainer);
    updateFormContainer();
    isCompletedUserData();
});</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>