<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林快報新增';
$pageName = 'staff_forestnews_create';
// $stmt = $pdo->query($sql); // $forestnewss = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<link rel="stylesheet" href="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css">

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
                  <label for="cat_id_E">分類-英文</label>
                  <select type="text" class="form-control" id="cat_id_E" name="cat_id"  required></select>
              </div>
              <div class="form-group">
                  <label for="name">標題</label>
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
                  <label for="content">活動內容</label>
                  <textarea type="text" class="form-control" id="content" name="content"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="notice">注意事項</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="link_address">網址</label>
                  <textarea type="text" class="form-control" id="link_address" name="link_address"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="link_title">網址標題</label>
                  <textarea type="text" class="form-control" id="link_title" name="link_title"  required></textarea>
              </div>

              <div class="form-group">
                  <label for="img">圖片</label>
                  <input type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
                  <input type="hidden" id="img_order" name="img_order">
              </div>
              <div class="form-group" id="preview">
                <ul id="sortable" class="row list-unstyled">
                </ul>
              </div>
              <div class="button m-4 text-center"><button type="submit" class="custom-btn btn-4 t_shadow ">送出</button></div>
              <hr>
          </form>
      <div>
      
    </div>
  </main>

<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script src="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script>
$("#img")

  $( function() {
    $( "#sortable" ).sortable();
    // $( "#sortable" ).disableSelection();
  } );

  $("#img").change(() => {
    $("#preview #sortable").html("");
    const files = $("#img")[0].files
    for(var i = 0; i < files.length; i++){
      var file = files[i];
      if (file) {
        var img = ` <li class="ui-state-default" data-order="${i}">
                      <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${URL.createObjectURL(file)}" alt="your image" />
                    </li>`;
        $("#preview #sortable").append(img);
      }
    }
  });

  
</script>
<script>

// 設定end_date大於start_date
$("#start_date").change(function(){
  var min = $("#start_date").val();
  $("#end_date").attr("min", min);
})


</script>
<script>
  $.post('<?= WEB_API ?>/forestnews-api.php', {
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

  $.post('<?= WEB_API ?>/forestnews-api.php', {
    'action': 'readCat',
  }, function(data){
    var output = `<option value="" disabled hidden selected>請選擇</option>`;
    $("#cat_id_E").append(output);
    data.forEach(function (cat){
      var output = `<option value="${cat['id']}">${cat['en_name']}</option>`;
      $("#cat_id_E").append(output);
    });
  }, 'json').fail(function(data){
    console.log(data);
  })
  
  function create(){
    var img_order = [];
    $("#preview #sortable li").each(function(ind, elem){
      img_order[$(elem).data("order")] = ind + 1;
    })
    $("#img_order").val(JSON.stringify(img_order));
    $.ajax({
        url: '<?= WEB_API ?>/forestnews-api.php',
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
          insertText("#modal_content", "森林快報新增成功!");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.href = "staff_forestnews_search.php"}, 2000);

        },
        error: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_error.html");
          insertText("#modal_content", "資料傳輸失敗");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.href = "staff_forestnews_search.php"}, 2000);
        }
    });
  }

  // 設定date日期min為今日
  var d = new Date();
  var min = d.toISOString().split("T")[0];
  $("#date").attr("min", min);

  // 設定分類中英文自動調換
  $("#cat_id_E, #cat_id_H").change(function(){
      $("#cat_id_E, #cat_id_H").val(this.value);
  })
</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
