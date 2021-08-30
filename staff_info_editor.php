<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員註冊';
$pageName ='staff_register';

// role類別
// $sql = "SELECT * FROM `staff_role_category`";
// $stmt = $pdo->query($sql);
// $result = $stmt->fetchAll();
// $staff_role_category = [];
//ArrayArray ( [1] => 管理者 [2] => 經理 [3] => 會計 [4] => 一般員工 )
// foreach($result as $role_cat){
//     $staff_role_category[$role_cat['id']] = $role_cat['name'];
// }
// print_r($_SESSION['staff']);
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
                <h2 class="title b-green rot-135">修改個人資料</h2>
                <form name="form1" id="myForm" method="post" novalidate onsubmit="checkForm(); return false;">
                    <input required type="hidden" name="action" value="changeProfile"/>
                    <div class="form-group">
                        <label for="staff_id">員工編號： </label>
                        <span type="text" id="staff_id"></span>
                    </div>
                    <div class="form-group">
                        <label for="position">職稱： </label>
                        <span type="text" id="position"></span>
                    </div>
                    <div class="form-group">
                        <label for="fullname">姓名</label>
                        <input required type="text" class="form-control" name="fullname" id="fullname" placeholder="林小花" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="gender">性別 </label>
                        <input type="radio" class="gender" name="gender" value="先生">先生
                        <input type="radio" class="gender"  name="gender" value="小姐">小姐
                        <input type="radio" class="gender"  name="gender" value="不表明">不表明
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="identityNum">身分證字號</label>
                        <input required type="text" class="form-control" id="identityNum" name="identityNum"  required>
                    </div>
                    <div class="form-group">
                        <label for="birthday">生日 </label>
                        <input required type="date" class="form-control" id="birthday" name="birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">手機</label>
                        <input required type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" placeholder="0987-654-321">
                    </div>
                    <div class="form-group">
                        <label for="email">email </label>
                        <input required type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
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
                        <input required type="text" class="form-control" name="zipcode" id="zipcode" placeholder="236" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">地址</label>
                        <input required type="text" class="form-control" name="address" id="address" placeholder="＊＊區＊＊路＊＊巷＊＊號＊＊樓" >
                    </div>
                    <div class="form-group">
                    <label for="created_at">到職日： </label><span id='created_at'></span>
                    <input type="date" class="form-control" id="created_at" name="created_at" required>

                    </div>
                    <div class="form-group">
                        <label for="left_at">離職日： </label><span id='left_at'></span>
                        <input type="date" class="form-control" id="left_at" name="left_at">

                    </div>

                    <div class="button m-4"><button type="submit" class="custom-btn btn-4 t_shadow ">送出</button></div>
                    <hr>
                </form>
            </div>
        </div>
    </div>

</main>
<?php include __DIR__ . '/parts/staff_scripts.php'; ?>
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
    $.post('api/staff-api.php', {
        action: 'readCurrent',
    }, function(result){
        data = result['data'];
        output = $("#myForm");
        fillData(data, output);
    }, 'json').fail(function(data){
        console.log('error');
        console.log(data);
    })

    function fillData(data, elem){
        list = [
            {
                selector: "#staff_id",
                text: data['staff_id']
            },
            {
                selector: "#position",
                text: data['role_name']
            },
            {
                selector: "#fullname",
                value: data['fullname']
            },
            {
                selector: `.gender[value='${data["gender"]}']`,
                attr: {
                    "checked" : "checked",
                }
            },
            {
                selector: "#birthday",
                value: data['birthday']
            },
            {
                selector: "#identityNum",
                value: data['identityNum']
            },
            {
                selector: "#email",
                value: data['email']
            },
            {
                selector: "#mobile",
                value: data['mobile']
            },
            {
                selector: "#zipcode",
                value: data['zipcode']
            },
            {
                selector: "#county",
                value: data['county']
            },
            {
                selector: "#district",
                value: data['district']
            },
            {
                selector: "#address",
                value: data['address']
            },
            {
                selector: "#created_at",
                text: data['created_at']
            },
            {
                selector: "#left_at",
                text: data['left_at']
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