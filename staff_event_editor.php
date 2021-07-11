<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林 Lavender Forest';
$pageName = 'staff_event.php';
// $stmt = $pdo->query($sql); // $events = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>

  body {
      background: linear-gradient(45deg, #e8ddf1 0%,  #e1ebdc 100%);
    }

  .con_01 {
    background-color: whitesmoke;
    border-radius: 0.25rem;
    box-shadow: 0px 0px 15px #666e9c;
    -webkit-box-shadow: 0px 0px 15px #666e9c;
    -moz-box-shadow: 0px 0px 15px #666e9c;
  }


</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

  <main>
  <div class="container my-5 ">
    <div class="con_01 row mx-0 ">
        <h2 class="title b-green rot-135 col-sm-12">修改活動</h2>
        <form action="event-api.php" class="p-5 col-sm-12" name="form1" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
          <input type="hidden" name="type" value="edit"/>
          <input type="hidden" name="id" value="<?= $_GET['id']?>"/>
            <div class="form-group">
                <label for="cat_id">分類</label>
                <select type="text" class="form-control" id="cat_id" name="cat_id"  required> </select>
            </div>
            <div class="form-group">
                <label for="name">活動名稱</label>
                <input type="text" class="form-control" id="name" name="name" autofocus required >
            </div>
            <div class="form-group">
                <label for="date">活動日期</label>
                <input type="date" class="form-control" id="date" name="date"  required >
            </div>
            <div class="form-group">
                <label for="time">活動時間</label>
                <input type="time" class="form-control" id="time" name="time"  required >
            </div>
            <div class="form-group">
                <label for="price">金額</label>
                <input type="number" class="form-control" id="price" name="price" min=0  required >
            </div>
            <div class="form-group">
                <label for="limitNum">人數限制</label>
                <input type="number" class="form-control" id="limitNum" name="limitNum" min=1  required >
            </div>
            <div class="form-group">
                <label for="description">活動簡介</label>
                <textarea type="text" class="form-control" id="description" name="description"  required ></textarea>
            </div>
            <div class="form-group">
                <label for="des_title">詳情標題</label>
                <input type="text" class="form-control" id="title" name="title"  required >
            </div>
            <div class="form-group">
                <label for="age">年齡/參加者條件</label>
                <textarea type="text" class="form-control" id="age" name="age"  required ></textarea>
            </div>
            <div class="form-group">
                <label for="location">集合地點</label>
                <textarea type="text" class="form-control" id="location" name="location"  required ></textarea>
            </div>
            <div class="form-group">
                <label for="content">活動內容</label>
                <textarea type="text" class="form-control" id="content" name="content"  required ></textarea>
            </div>
            <div class="form-group">
                <label for="info">活動任務</label>
                <textarea type="text" class="form-control" id="info" name="info"  required ></textarea>
            </div>
            <div class="form-group">
                <label for="notice">注意事項</label>
                <textarea type="text" class="form-control" id="notice" name="notice"  required ></textarea>
            </div>

            <div class="form-group">
                <label for="video">影片網址</label>
                <input type="text" class="form-control" id="video" name="video"  required >
            </div>
            <div class="form-group">
                <label for="video_img">影片縮圖</label>
                <input type="file" id="video_img" name="video_img" accept=".png,.jpeg,.jpg">
            </div>


            <div class="form-group">
                <label for="limitNum">圖片</label>
                <input type="file" id="img" name="img[]" accept=".png,.jpeg,.jpg" multiple>
            </div>
            <hr>
            
           <div class="button my-4  text-center" ><button type="submit" class="custom-btn btn-4 t_shadow " style="width: 100%;">送出</button></div>
        </form>


        </div>

    </div>

  </main>

<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script> 
  fillCat();
  function fillCat(){
    $.post('event-api.php', {
      'type': 'readCat',
    }, function(data){
      var output = `<option value="" disabled hidden selected>請選擇</option>`;
      $("#cat_id").append(output);
      data.forEach(function (cat){
        var output = `<option value="${cat['id']}">${cat['name']}</option>`;
        $("#cat_id").append(output);
      });
      fillData();
    }, 'json').fail(function(data){
      console.log(data);
    })
  }
  function fillData(){
    $.post('event-api.php', {
      'type': 'read',
      'id': <?= $_GET['id']?>
    }, function(data){
      var columns = ['cat_id', 'name','date','time','price','limitNum','description','title','age','location','content','info','notice','video']
      columns.forEach(function(elem){
        $(`#${elem}`).val(data[elem]);
      });
    }, 'json').fail(function(data){
      console.log(data);
    })
  }
  
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
          insertText("#modal_content", "修改成功!");
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
