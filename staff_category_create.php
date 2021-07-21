<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '種類新增';
$pageName = 'staff_category_create';
// $stmt = $pdo->query($sql); // $events = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<link rel="stylesheet" href="<?= WEB_ROOT ?>/js/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css">

<style>

table td{
  padding: 0 !important;
}
form h3{
  background-color: #83a573;
  text-align: center;
  color: white;
  margin: 0;
}
</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

  <main>
  <?php include "parts/modal.php"?>

  <div class="container ">
    <div class="con_01 row ">
        <h2 class="title b-green rot-135 col-sm-12">新增種類</h2>
        <form class="p-5 col-sm-12" name="form" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
            <input type="hidden" name="type" value="add"/>

            <!-- event/forestnews/helpdesk -->
            <h3  class=" p-2 c_1 ">森林活動</h3>
                <table id="" class="table table-bordered table-Primary table-hover text-center m-0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 10%;">序號</th>
                            <th>種類名稱</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-dark text-white" style="border: #454d55 1px solid ;">1</td>
                            <td><input type="text" class="form-control " id="" name=""  ></td>
                        </tr>
                        <tr>
                            <td class="bg-dark text-white" style="border: #454d55 1px solid ;">2</td>
                            <td><input type="text" class="form-control " id="" name=""  ></td>
                        </tr>
                        <tr>
                            <td class="bg-dark text-white" style="border: #454d55 1px solid ;">3</td>
                            <td><input type="text" class="form-control " id="" name=""  ></td>
                        </tr>
                        <tr>
                            <td class="bg-dark text-white" style="border: #454d55 1px solid ;">4</td>
                            <td><input type="text" class="form-control " id="" name=""  ></td>
                        </tr>
                        <tr>
                            <td class="bg-dark text-white" style="border: #454d55 1px solid ;">5</td>
                            <td><input type="text" class="form-control " id="" name=""  ></td>
                        </tr>
                    </tbody>
                </table>
                <button class="text-center  custom-btn btn-4 t_shadow m-0" style="width:100%;border-radius:0.25rem;transform: none;" >送出</button>

            </div>

            
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
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_success.html");
          insertText("#modal_content", "森林體驗新增成功!");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.href = "staff_category_search.php"}, 2000);

        },
        error: function(data){
          console.log(data);
          modal_init();
          insertPage("#modal_img", "animation/animation_error.html");
          insertText("#modal_content", "資料傳輸失敗");
          $("#modal_alert").modal("show");
          setTimeout(function(){location.href = "staff_category_create.php"}, 2000);
        }
    });
  }

  // 設定date日期min為今日
  var d = new Date();
  var min = d.toISOString().split("T")[0];
  $("#date").attr("min", min);
</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
