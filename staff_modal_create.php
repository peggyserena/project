<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '彈跳視窗新增';
$pageName = 'staff_modal_create';
// $stmt = $pdo->query($sql); // $staff_modals = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>

<style>


</style>
<?php include __DIR__. '/parts/modal.php'; ?>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

  <main>
    <div class="container ">
      <div class="con_01 row ">
          <h2 class="title b-green rot-135 col-sm-12">新增彈跳視窗</h2>
          <form class="p-5 col-sm-12" name="form" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
              <input type="hidden" name="action" value="add"/>
              <div class="form-group">
                  <label for="cat_id">放置網頁於</label>
                  <select class="form-control" id="select_cat_id" name="cat_id" ></select>
              </div>
              <div class="form-group">
                  <label for="title">標題</label>
                  <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="form-group">
                  <label for="content">活動內容</label>
                  <textarea type="text" class="form-control" id="content" name="content"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="notice">備註</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="link_name">連結標題</label>
                  <textarea type="text" class="form-control" id="link_name" name="link_name"  ></textarea>
              </div>
              <div class="form-group">
                  <label for="link_address">連結網址</label>
                  <textarea type="text" class="form-control" id="link_address" name="link_address" ></textarea>
              </div>
              <div class="form-group">
                  <label for="link_address">狀態</label>
                  <input class="status_used" type="radio" name="status" value="使用">使用 &emsp; <input class="status_disable" type="radio" name="status" value="停用">停用
              </div>
              <button type="submit">送出</button>
          </form>
      <div>
      
    </div>
  </main>

<?php include __DIR__ . '/parts/staff_scripts.php'; ?>

<script>
      $(document).ready(function() {
          readCat();
      });

      function readCat(){
          $.post('api/staff_modal-api.php', {
              action: 'readCat',
          }, function(result){
              
              var selected_cat_id = parseInt("<?= $_GET['cat_id'] ?? ''?>");
              result['data'].forEach(function(elem){
                  output = `<option value='${elem['id']}' ${selected_cat_id == elem['id'] ? "selected" : ""}>${elem['name']}</option>`;
                  $("#select_cat_id").append(output);
              })
          }, 'json').fail(function(data){
              console.log('error');
              console.log(data);
          })
      }


  function create(){
    $.ajax({
        url: '<?= WEB_API ?>/staff_modal-api.php',
        data: new FormData($("#myForm")[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_success.html");
          insertText("#modal_content", "彈跳視窗新增成功!");
          $("#modal_alert").modal("show");
        //   setTimeout(function(){location.href = "staff_staff_modal_search.php"}, 2000);

        },
        error: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_error.html");
          insertText("#modal_content", "資料傳輸失敗");
          $("#modal_alert").modal("show");
        //   setTimeout(function(){location.href = "staff_staff_modal_search.php"}, 2000);
        }
    });
  }

</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
