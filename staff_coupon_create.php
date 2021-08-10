<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林快報新增';
$pageName = 'staff_coupon_create';
?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>

<style>


</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

  <main>
  <?php include "parts/modal.php"?>

    <div class="container ">
      <div class="con_01 row ">
          <h2 class="title b-green rot-135 col-sm-12">新增活動</h2>
          <form class="p-5 col-sm-12" name="form" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
              <input type="hidden" name="type" value="add"/>
              <div class="form-group">
                  <label for="cat_id_H">分類-中文</label>
                  <select type="text" class="form-control" id="cat_id_H" name="cat_id" autofocus required></select>
              </div>
              <div class="form-group">
                  <label for="name">優惠券名稱</label>
                  <input type="text" class="form-control" id="name" name="name"  >
              </div>
              <div class="form-group">
                  <!-- 或填中文 -->
                  <label for="start_date">開始日期</label>
                  <input type="date" class="form-control" id="start_date" name="start_date"  required>
              </div>
              <div class="form-group">
                  <label for="end_date">結束日期</label>
                  <input type="date" class="form-control" id="end_date" name="end_date"  required>
              </div>
              <div class="form-group">
                  <label for="price">金額</label>
                  <textarea type="text" class="form-control" id="content" name="content"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="notice">備註</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>
              <div class="button m-4 text-center"><button type="submit" class="custom-btn btn-4 t_shadow ">送出</button></div>
              <hr>
          </form>
      <div>
      
    </div>
  </main>

<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script>

// 設定end_date大於start_date
$("#start_date").change(function(){
  var min = $("#start_date").val();
  $("#end_date").attr("min", min);
})


</script>
<script>
  $.post('<?= WEB_API ?>/coupon-api.php', {
    'action': 'readCat',
  }, function(data){
    var output = `<option value="" disabled hidden selected>請選擇</option>`;
    $("#cat_id_H").append(output);
    data.forEach(function (cat){
      var output = `<option value="${cat['id']}">${cat['name']}</option>`;
      $("#cat_id_H").append(output);
    });
  }, 'json').fail(function(data){
    console.log(data);
  })

 

  // 設定date日期min為今日
  var d = new Date();
  var min = d.toISOString().split("T")[0];
  $("#date").attr("min", min);

</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
