<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林體驗新增';
$pageName = 'staff_event_create';
// $stmt = $pdo->query($sql); // $events = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

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
                <label for="cat_id">分類</label>
                <select type="text" class="form-control" id="cat_id" name="cat_id"  required></select>
            </div>
            <div class="form-group">
                <label for="name">活動名稱</label>
                <input type="text" class="form-control" id="name" name="name"  required>
            </div>
            <div class="form-group">
                <label for="date">活動日期</label>
                <input type="date" class="form-control" id="date" name="date"  required>
            </div>
            <div class="form-group">
                <label for="time">活動時間</label>
                <input type="time" class="form-control" id="time" name="time"  required>
            </div>
            <div class="form-group">
                <label for="price">金額</label>
                <input type="number" class="form-control" id="price" name="price" min=0  required>
            </div>
            <div class="form-group">
                <label for="limitNum">開放人數</label>
                <input type="number" class="form-control" id="limitNum" name="limitNum" min=1  required>
            </div>
            <div class="form-group">
                <label for="description">活動簡介</label>
                <textarea type="text" class="form-control" id="description" name="description"  required></textarea>
            </div>
            <div class="form-group">
                <label for="des_title">詳情標題</label>
                <input type="text" class="form-control" id="title" name="title"  required>
            </div>
            <div class="form-group">
                <label for="age">年齡/參加者條件</label>
                <textarea type="text" class="form-control" id="age" name="age"  required></textarea>
            </div>
            <div class="form-group">
                <label for="location">集合地點</label>
                <textarea type="text" class="form-control" id="location" name="location"  required></textarea>
            </div>
            <div class="form-group">
                <label for="content">活動內容</label>
                <textarea type="text" class="form-control" id="content" name="content"  required></textarea>
            </div>
            <div class="form-group">
                <label for="info">活動任務</label>
                <textarea type="text" class="form-control" id="info" name="info"  required></textarea>
            </div>
            <div class="form-group">
                <label for="notice">注意事項</label>
                <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
            </div>

            <div class="form-group">
                <label for="video">影片網址</label>
                <input type="text" class="form-control" id="video" name="video"  required>
            </div>
            <div class="form-group">
                <label for="video_img">影片縮圖</label>
                <input type="file" id="video_img" name="video_img" accept=".png,.jpeg,.jpg">
            </div>
            <div class="form-group" id="preview_video_img"></div>

            <div class="form-group">
                <label for="img">圖片</label>
                <input type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
                <input type="hidden" id="img_order" name="img_order">
            </div>
            <div class="form-group" id="preview">
              <ul id="sortable" class="row  list-unstyled">
              </ul>
            </div>
            <div class="button m-4 text-center"><button type="submit" class="custom-btn btn-4 t_shadow ">送出</button></div>
            <hr>
        </form>

        </div>
    </div>
    <div>
     
    </div>
  </main>

<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script src="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script>
$("#img")

$( function() {
    $( "#sortable" ).sortable({
      change: function( event, ui ) {
        $("#img_changed").val(1);
      }
    });
    // $( "#sortable" ).disableSelection();
  } );

  $("#img").change(() => {
    $("#img_changed").val(1);
    $("#preview #sortable").html("");
    const files = $("#img")[0].files
    for(var i = 0; i < files.length; i++){
      var file = files[i];
      if (file) {
        
      var img =`<li class="ui-state-default" data-order="${i}">
                        <div style="display: grid;">
                          <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${URL.createObjectURL(file)}" alt="your image" />
                          <button type="button" onclick="deleteItem(this);">X</button>
                        </div>
                      </li>`;
        $("#preview #sortable").append(img);
      }
    }
  });
  $("#video_img").change(() => {
    $("#video_img_changed").val(1);
    $("#preview_video_img").html("");
    const [file] = $("#video_img")[0].files
    if (file) {
      var img =`<li class="ui-state-default" data-order="${i}">
                        <div style="display: grid;">
                          <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${URL.createObjectURL(file)}" alt="your image" />
                          <button type="button" onclick="deleteItem(this);">X</button>
                        </div>
                      </li>`;
      $("#preview_video_img").append(img);
    }
  });

  
</script>

<script>
  $.post('<?= WEB_API ?>/event-api.php', {
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
    var img_order = [];
    $("#preview #sortable li").each(function(ind, elem){
      img_order[$(elem).data("order")] = ind + 1;
    })
    $("#img_order").val(JSON.stringify(img_order));
    $.ajax({
        url: '<?= WEB_API ?>/event-api.php',
        data: new FormData($("#myForm")[0]),
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data){
          data = data['data'];
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_success.html");
          insertText("#modal_content", "森林體驗新增成功!");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.href = `staff_event_confirm.php?id=${data['event_id']}`}, 2000);

        },
        error: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_error.html");
          insertText("#modal_content", "資料傳輸失敗");
          $("#modal_alert").modal("show");
          // setTimeout(function(){location.href = "staff_event_search.php"}, 2000);
        }
    });
  }

  // 設定date日期min為今日
  var d = new Date();
  var min = d.toISOString().split("T")[0];
  $("#date").attr("min", min);
</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
