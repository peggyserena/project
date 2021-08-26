<?php require __DIR__ . '/parts/config.php'; ?>
<?php
    if (isset($_SESSION['staff'])) header('Location: staff_index.php'); 
$title = '會員登入';
$pageName ='staff_login';
?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
<style>
 
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



</style>

<!-- ===============================  modal - 確認登入 =============================== -->

<?php include "parts/modal.php"?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7 con_01 p-0 m-0">
      <h2 class="title b-green rot-135">員工登入</h2>

      <form name="form1" method="post" novalidate onsubmit="checkForm(); return false;">
        <input type="hidden" name="action" value="admin" />
        <div class="form-group">
          <label for="staff_id">員工編號 <span>(必填)</span></label>
          <input type="text" class="form-control" id="staff_id" name="staff_id" required />
          <small class="form-text error"></small>
        </div>
        <div class="form-group">
          <label for="password">密碼 <span>(必填)</span></label>
          <input type="password" class="form-control" id="password" name="password" required />
          <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" ></span>
          <small class="form-text error"></small>
        </div>

        <div class="text-center">
          <button type="submit" class="custom-btn btn-4 t_shadow m-3">登入</button>
        </div>
        <hr />
      </form>
    </div>
  </div>
</div>
<?php include __DIR__ . '/js/staff_scripts.php'; ?>
<script>
  const staff_id_re = /^[A-Z]\d{5}$/
  const $staff_id = $('#staff_id')
  const fileds = [$staff_id]

  function checkForm() {
    // 回復原來的狀態
    fileds.forEach((el) => {
      el.css('border', '1px solid #CCCCCC')
      el.next().text('')
    })

    let isPass = true

    if (!staff_id_re.test($staff_id.val())) {
      console.log('$staff_id.val()')
      console.log($staff_id.val())
      isPass = false
      $staff_id.css('border', '1px solid red')
      $staff_id.next().text('請輸入正確的 staff_id')
    }

    if (isPass) {
      console.log("test1");
      $.post(
        '<?= WEB_API?>/login-api.php',
        $(document.form1).serialize(),
        function (data) {
          console.log(data);
          if (data.success) {
            // alert('資料修改成功');
            // swal('Title...', 'Hello World!', 'success');
            modal_init()
            insertPage('#modal_img', 'animation/animation_success.html')
            insertText('#modal_content', '登入成功')
            $('#modal_alert').modal('show')
            setTimeout(function () {
              window.history.back()
            }, 2000)
            // location.href = './staff_index.php';
          } else {
            modal_init();
            insertPage("#modal_img", "animation/animation_error.html");
            insertText("#modal_content", "登入失敗，請確認員工編號和密碼！");
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
<?php include __DIR__ . '/parts/staff_html-foot.php'; ?>
