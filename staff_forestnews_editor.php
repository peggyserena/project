<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林體驗查詢';
$pageName = 'staff_forestnews_editor';

 ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<link rel="stylesheet" href="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css">

<style>


</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<?php include "parts/modal.php" ?>
  <main>
  <div class="container ">
    <div class="con_01 row mx-0 ">
        <h2 class="title b-green rot-135 col-sm-12">修改活動</h2>
        <form action="<?= WEB_API ?>/forestnews-api.php" class="p-5 col-sm-12" name="form1" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
          <input type="hidden" name="type" value="edit"/>
          <input type="hidden" name="id" value="<?= $_GET['id']?>"/>


          <div class="form-group">
                  <label for="cat_id_H">分類-中文</label>
                  <select type="text" class="form-control" id="cat_id_H" name="cat_id" autofocus required></select>
              </div>
              <div class="form-group">
                  <label for="cat_id_E">分類-英文</label>
                  <select type="text" class="form-control" id="cat_id_E" required></select>
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
                  <label for="img">圖片</label>
                  <input type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
                  <input type="hidden" id="img_order" name="img_order">
                  <input type="hidden" id="img_changed" name="img_changed" value="0">
              </div>
              <div class="form-group" id="preview">
                <ul id="sortable" class="row list-unstyled">
                </ul>
              </div>




            <hr>
            
           <div class="button my-4  text-center" ><button type="submit" class="custom-btn btn-4 t_shadow " style="width: 100%;">送出</button></div>
        </form>


        </div>

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
        var img = ` <li class="ui-state-default" data-order="${i}">
                      <div style="display: grid;">
                        <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${URL.createObjectURL(file)}" alt="your image" />
                        <button type="button">X</button>
                      </div>
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
  fillCat();
  function fillCat(){
    $.post('<?= WEB_API ?>/forestnews-api.php', {
      'action': 'readCat',
    }, function(data){
      var output = `<option value="" disabled hidden selected>請選擇</option>`;
      $("#cat_id_H").append(output);
      data.forEach(function (cat){
        var output = `<option value="${cat['id']}">${cat['name']}</option>`;
        $("#cat_id_H").append(output);
      });
      $("#cat_id_E").append(output);
      data.forEach(function (cat){
        var output = `<option value="${cat['id']}">${cat['en_name']}</option>`;
        $("#cat_id_E").append(output);
      });
      fillData();
    }, 'json').fail(function(data){
      console.log(data);
    })
  }
  function fillData(){
    $.post('<?= WEB_API ?>/forestnews-api.php', {
      'type': 'read',
      'id': <?= $_GET['id']?>
    }, function(result){
      console.log("result");
      console.log(result);
      data = result['data'];
      files = result['img'];
      console.log(data);
      var columns = ['cat_id', 'name', 'start_date', 'end_date', 'content','notice']
      columns.forEach(function(elem){
        $(`#${elem}`).val(data[elem]);
      });
      $("#cat_id_H, #cat_id_E").val(data['cat_id']);
      
      $("#preview #sortable").html("");
      for(var i = 0; i < files.length; i++){
        var file = files[i];
        if (file) {
          var img = ` <li class="ui-state-default" data-order="${i}">
                        <div style="display: grid;">
                          <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${file.path}" alt="your image" />
                          <button type="button" onclick="deleteItem(this);">X</button>
                        </div>
                      </li>`;
          $("#preview #sortable").append(img);
        }
      }
      
      $("#start_date").trigger("change");
    }, 'json').fail(function(data){
      console.log(data);
    })
  }
  
  function create(){
    var img_order = {};
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
          insertText("#modal_content", "修改成功!");
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

  function deleteItem(elem){
    $(elem).parents("li").remove();
    $("#img_changed").val(1);
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
