<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '相簿修改';
$pageName = 'staff_gallery_editor';
?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<link rel="stylesheet" href="./css/staff_gallery.css">

<style>
 


</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>
  <?php include "parts/modal.php"?>
  <div class="container my-5">
    <form class="" action="<?= WEB_API ?>/staff_gallery-api.php" name="formGallery" id="formGallery" method="post" onsubmit="edit(); return false;" enctype="multipart/form-data">
      <input type="hidden" name="action" value="edit"/>
      <input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>

      <div class="form-group con_01 my-5 row justify-content-center align-items-center">

        <h3 class='col-sm-12 p-1 '> 
          <input class='form-control text-center text-white data-toggle="tooltip" data-placement="right"  title="點選修改" ' style="background-color: #83a573;font-size:1.3rem;font-weight: 700; " type="text" id="gallery_title" value="" name="title">
        </h3>

        <label  class="col-sm-12 text-center custom-btn btn-4 t_shadow" style="width:100%;border-radius: 0;transform: none;"  for="img">

          <input class=" " style="display: none" type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple /><h4 class="p-2">上傳圖片 </h4>
          <input type="hidden" id="img_order" name="img_order">
          <input type="hidden" id="img_changed" name="img_changed" value="0">

        </label>

        <div class=" col-sm-12" id="preview">
            <ul id="sortable" class="row list-unstyled">
            </ul>
        </div>
        <h4 class=" col-sm-12 m-0 p-2 bg-dark text-white text-center">圖片說明</h4>
        <textarea class=" form-control col-sm-12 p-3 m-0" id="gallery_content1" name="content"  cols="30" rows="5" ></textarea>
        <textarea class=" form-control col-sm-12 p-3 m-0" id="gallery_content2" name="content_tablet"  cols="30" rows="5" ></textarea>
        <textarea class=" form-control col-sm-12 p-3 m-0" id="gallery_content3" name="content_cellphone"  cols="30" rows="5" ></textarea>

        <button type="submit" class="custom-btn btn-4 t_shadow" style="width:100%;border-radius: 0;transform: none;"> <h4 class="p-2">確認送出</h4></button>

      </div>
    </form>

  </div>

</main>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script src="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script>
fillData();
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
  const files = $("#img")[0].files // [file1, file2]
  for(var i = 0; i < files.length; i++){
    var file = files[i];
    if (file) {
      var img = ` <li class="ui-state-default" data-order="${i}">
                    <div style="display: grid;">
                      <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${URL.createObjectURL(file)}" alt="your image" />
                      <button type="button" onclick="deleteItem(this);">X</button>
                    </div>
                  </li>`;
      $("#preview #sortable").append(img);
    }
  }
});
function fillData(){
    $.post('<?= WEB_API ?>/staff_gallery-api.php', {
      'action': 'read',
      'id': <?= $_GET['id']?>,
    }, function(data){
      $("#gallery_title").val(data['title']);
      $("#gallery_content1").text(data['content']);
      $("#gallery_content2").text(data['content_tablet']);
      $("#gallery_content3").text(data['content_cellphone']);

      // 圖片預覽
      $("#preview #sortable").html("");
      const files = data['img'];
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
    }, 'json').fail(function(data){
      console.log(data);
    })
  }
  
  function edit(){
    var img_order = []; 
    // [1,2,3] 
    // img_order[0] = 1
    $("#preview #sortable li").each(function(ind, elem){
      img_order[$(elem).data("order")] = ind + 1;
    })
    $("#img_order").val(JSON.stringify(img_order)); 
    // "[1,2,3]" 
    // $("#img_order").val()[0] = "["
    $.ajax({
        url: '<?= WEB_API ?>/staff_gallery-api.php',
        data: new FormData($("#formGallery")[0]),
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
            setTimeout(location.href = "staff_gallery.php", 2000);

        },
        error: function(data){
            console.log(data);
            modal_init();
            insertPage("#modal_img", "animation/animation_error.html");
            insertText("#modal_content", "資料傳輸失敗");
            $("#modal_alert").modal("show");
            setTimeout(function(){window.history.back();}, 2000);
        }
    });
  }

  function deleteItem(elem){
    $(elem).parents("li").remove();
    $("#img_changed").val(1);
  }
</script>

<script>
  function scroll(){
      console.log('test' + window.scrollY);
      if (location.href.indexOf("#<?= $ind['name']?>") > -1){
          window.scrollTo(0, window.scrollY - 152)
      }
  }

</script>
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
