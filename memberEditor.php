<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '修改資料';
$pageName = 'editMember';

if (empty($_SESSION['user'])) {
    header('Location: member.php');
    exit;
}


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


<?php include "parts/modal.php"?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <h2 class="title m-0 ">修改資料</h2>
            <div class="card">
                <form name="form1" id="myForm" action="<?= WEB_API ?>/memberEditor-api.php" method="post" novalidate onsubmit="checkForm(); return false;">
                    <div class="form-group">
                        <label for="fullname autofocus ">姓名</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" value=""></input>
                    </div>
                    <div class="form-group">
                        <label for="fullname autofocus ">性別</label>
                        <input type="radio"  name="gender" value="先生"required>先生
                        <input type="radio"  name="gender" value="小姐"required>小姐
                        <input type="radio"  name="gender" value="不表明"required>不表明
                    </div>
                    <div class="form-group">
                        <label for="mobile">手機</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" value="">
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="email_2nd">備用email</label>
                        <input type="text" class="form-control" name="email_2nd" id="email_2nd" value=""></input>
                    </div>
                    <div class="form-group">
                        <label for="county">縣市</label>
                        <select class="form-control" name="county" id="county" value=""></select>
                    </div>
                    <div class="form-group">
                        <label for="district">鄉鎮市區</label>
                        <select class="form-control" name="district" id="district" value=""></select>
                    </div>
                    <div class="form-group">
                        <label for="zipcode">郵遞區號</label>
                        <input required type="text" class="form-control" name="zipcode" id="zipcode" placeholder="236"  value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">地址</label>
                        <input required type="text" class="form-control" name="address" id="address" placeholder="＊＊區＊＊路＊＊巷＊＊號＊＊樓"  value="">
                    </div>

                    <div class=" text-center mt-4"><button type="submit" class="custom-btn btn-4 t_shadow">修改</button></div>


                </form>
            </div>


        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script src="erTWZipcode-master/js/er.twzipcode.data.js"></script>
<script src="erTWZipcode-master/js/er.twzipcode.min.js"></script>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    const $name = $('#name'),
        $email = $('#email_2nd'),
        $mobile = $('#mobile');

    const fileds = [$name, $email, $mobile];
    const smalls = [$name.next(), $email.next(), $mobile.next()];

    function checkForm() {
        // 回復原來的狀態
        fileds.forEach(el => {
            el.css('border', '1px solid #CCCCCC');
            el.next().text('');
        });

        let isPass = true;

        if (!email_re.test($email.val()) && $email.val() !== "") {
            isPass = false;
            $email.css('border', '1px solid red');
            $email.next().text('請輸入正確的 email');
        }


        if (isPass) {
            var data = $(document.form1).serialize() + "&zipcode=" + $("#zipcode").val();
            $.post(
                '<?= WEB_API?>/memberEditor-api.php',
                data,
                function(data) {
                    if (data.success) {
                        modal_init();
                        insertPage("#modal_img", "animation/animation_success.html");
                        insertText("#modal_content", '資料修改成功');
                        $("#modal_alert").modal("show");
                        setTimeout(function(){window.history.back();}, 2000);
                    } else {
                        modal_init();
                        insertPage("#modal_img", "animation/animation_error.html");
                        insertText("#modal_content", "資料傳輸失敗");
                        $("#modal_alert").modal("show");
                        setTimeout(function(){window.history.back();}, 2000);
                    }
                },
                'json'
            ).fail(function(e){
                console.log(e);
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
  document.querySelector('#myForm select[name=county]').value = "<?= $_SESSION['user']['county'] ?>";
  document.querySelector('#myForm select[name=county]').dispatchEvent(new Event("change"));
  document.querySelector('#myForm select[name=district]').value = "<?= $_SESSION['user']['district'] ?>";
  document.querySelector('#myForm select[name=district]').dispatchEvent(new Event("change"));
</script>
<script>
    $(document).ready(function() {
        $.post('api/member-api.php', {
            action: 'readCurrent'
        }, function(result){
            console.log(result);
            data = result['data'];
            output = $("#myForm");
            fillData(data, output);
            
        }, 'json').fail(function(data){
            console.log('error');
            console.log(data);
        })
    });
    function fillData(data, elem){
        var event_img_cover = "";
        if (typeof(data['img']) !== "undefined"){
            event_img_cover = "<?= WEB_ROOT."/" ?>" + data['img'][0]['path'];
        }
        list = [
            {
                selector: "#fullname",
                value: data['fullname']
            },
            {
                selector: `input[name='gender'][value='${data['gender']}']`,
                attr: {
                    "checked": "checked"
                }
            },
            {
                selector: "#mobile",
                value: data['mobile'],
            },
            {
                selector: "#email_2nd",
                value: data['email_2nd'],
            },
            {
                selector: "#county",
                value: data['county'],
            },
            {
                selector: "#district",
                value: data['district'],
            },
            {
                selector: "#zipcode",
                value: data['zipcode'],
            },
            {
                selector: "#address",
                value: data['address'],
            },
        ]
        
        // map
        // {
        //     selector: "#event_name",
        //     attr: {
        //         text: data['name']
        //     }
        // }
        list.forEach(function(m){
            // attr
            // attr: {
            //         src: <?= WEB_ROOT."/" ?>data['img'][0]['path']
            //     }
            if ('text' in m){
                $(elem).find(m['selector']).text(m['text']);
            }
            if ('value' in m){
                $(elem).find(m['selector']).val(m['value']);
            }
            for (attr_key in m['attr']){
                // fill_key = 'src'
                // m['attr']['src']
                $(elem).find(m['selector']).attr(attr_key, m['attr'][attr_key]);
            }
        });
    }

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>