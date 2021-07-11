<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '新增森林體驗';
$pageName = 'staff_event_create';
// $stmt = $pdo->query($sql); // $events = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>



  .con_01 {
    background-color: whitesmoke;
    }


</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

  <main>
  <?php include "parts/modal.php"?>

  <div class="container my-5 ">
    <div class="con_01 row ">
        <h2 class="title b-green rot-135 col-sm-12">新增活動</h2>
        <form class="p-5 col-sm-12" name="form" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
            <input type="hidden" name="type" value="add"/>
            <div class="form-group">
                <label for="cat_id">分類</label>
                <select type="text" class="form-control" id="cat_id" name="cat_id" autofocus required></select>
            </div>
            <div class="form-group">
                <label for="name">活動名稱</label>
                <input type="text" class="form-control" id="name" name="name" autofocus required>
            </div>
            <div class="form-group">
                <label for="date">活動日期</label>
                <input type="date" class="form-control" id="date" name="date" autofocus required>
            </div>
            <div class="form-group">
                <label for="time">活動時間</label>
                <input type="time" class="form-control" id="time" name="time" autofocus required>
            </div>
            <div class="form-group">
                <label for="price">金額</label>
                <input type="number" class="form-control" id="price" name="price" min=0 autofocus required>
            </div>
            <div class="form-group">
                <label for="limitNum">開放人數</label>
                <input type="number" class="form-control" id="limitNum" name="limitNum" min=1 autofocus required>
            </div>
            <div class="form-group">
                <label for="description">活動簡介</label>
                <textarea type="text" class="form-control" id="description" name="description" autofocus required></textarea>
            </div>
            <div class="form-group">
                <label for="des_title">詳情標題</label>
                <input type="text" class="form-control" id="title" name="title" autofocus required>
            </div>
            <div class="form-group">
                <label for="age">年齡/參加者條件</label>
                <textarea type="text" class="form-control" id="age" name="age" autofocus required></textarea>
            </div>
            <div class="form-group">
                <label for="location">集合地點</label>
                <textarea type="text" class="form-control" id="location" name="location" autofocus required></textarea>
            </div>
            <div class="form-group">
                <label for="content">活動內容</label>
                <textarea type="text" class="form-control" id="content" name="content" autofocus required></textarea>
            </div>
            <div class="form-group">
                <label for="info">活動任務</label>
                <textarea type="text" class="form-control" id="info" name="info" autofocus required></textarea>
            </div>
            <div class="form-group">
                <label for="notice">注意事項</label>
                <textarea type="text" class="form-control" id="notice" name="notice" autofocus required></textarea>
            </div>

            <div class="form-group">
                <label for="video">影片網址</label>
                <input type="text" class="form-control" id="video" name="video" autofocus required>
            </div>
            <div class="form-group">
                <label for="video_img">影片縮圖</label>
                <input type="file" id="video_img" name="video_img" accept=".png,.jpeg,.jpg">
            </div>


            <div class="form-group">
                <label for="img">圖片</label>
                <input type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
            </div>
            <div class="button m-4 text-center"><button type="submit" class="custom-btn btn-4 t_shadow ">送出</button></div>
            <hr>
        </form>

        </div>
    </div>
  </main>

<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script>
  $.post('event-api.php', {
    'type': 'readCat',
  }, function(data){
    var output = `<option value="" disabled hidden selected>請選擇</option>`;
    $("#cat_id").append(output);
    data.forEach(function (cat){
      var output = `<option value="${cat['id']}">${cat['name']}</option>`;
      $("#cat_id").append(output);
    });
  }, 'json').fail(function(data){
    console.log(data);
  })
  function create(){
    $.ajax({
        url: 'event-api.php',
        data: new FormData($("#myForm")[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data){
          modal_init();
          insertPage("#modal_img", "animation_success.html");
          insertText("#modal_content", "森林體驗新增成功!");
          $("#modal_alert").modal("show");
          setTimeout(function(){window.history.back();}, 2000);

        },
        error: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation_error.html");
          insertText("#modal_content", "資料傳輸失敗");
          $("#modal_alert").modal("show");
          setTimeout(function(){window.history.back();}, 2000);
        }
    });
  }

  // 設定date日期min為今日
  var d = new Date();
  var min = d.toISOString().split("T")[0];
  $("#date").attr("min", min);
</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
