<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '購物金&禮券發放排程';
$pageName = 'staff_coupon_editor';

 ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>

<style>


</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<?php include "parts/modal.php" ?>
  <main>
  <div class="container ">
    <div class="con_01 row mx-0 ">
        <h2 class="title b-green rot-135 col-sm-12">購物金&禮券發放排程</h2>
        <form action="<?= WEB_API ?>/coupon-api.php" class="p-5 col-sm-12" name="form1" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
          <input type="hidden" name="type" value="edit"/>
          <input type="hidden" name="id" value="<?= $_GET['id']?>"/>


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
                  <label for="notice">備註</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>

            <hr>
            
           <div class="button my-4  text-center" ><button type="submit" class="custom-btn btn-4 t_shadow " style="width: 100%;">送出</button></div>
        </form>


        </div>

    </div>

  </main>

<?php include __DIR__ . '/js/staff_scripts.php'; ?>

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
    $.post('<?= WEB_API ?>/coupon-api.php', {
      'action': 'readCat',
    }, function(data){
      var output = `<option value="" disabled hidden selected>請選擇</option>`;
      $("#cat_id_H").append(output);
      data.forEach(function (cat){
        var output = `<option value="${cat['id']}">${cat['name']}</option>`;
        $("#cat_id_H").append(output);
      });
      fillData();
    }, 'json').fail(function(data){
      console.log(data);
    })
  }
  function fillData(){
    $.post('<?= WEB_API ?>/coupon-api.php', {
      'type': 'read',
      'id': <?= $_GET['id']?>
    }, function(result){
      console.log("result");
      console.log(result);
      data = result['data'];
      files = result['img'];

      var columns = ['cat_id', 'name', 'start_date', 'end_date','notice']
      columns.forEach(function(elem){
        $(`#${elem}`).val(data[elem]);
      });

      $("#cat_id_H, #cat_id_E").val(data['cat_id']);
      
      
      $("#start_date").trigger("change");
    }, 'json').fail(function(data){
      console.log(data);
    })
  }
  
  function create(){
    $.ajax({
        url: '<?= WEB_API ?>/coupon-api.php',
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
          setTimeout(function(){location.href = "staff_coupon_search.php"}, 2000);

        },
        error: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_error.html");
          insertText("#modal_content", "資料傳輸失敗");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.href = "staff_coupon_search.php"}, 2000);
        }
    });
  }


  // 設定date日期min為今日
  var d = new Date();
  var min = d.toISOString().split("T")[0];
  $("#date").attr("min", min);
  
</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
