<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '相簿修改';
$pageName = 'staff_gallery_editor';

$sql = "SELECT * FROM `index`";
$stmt = $pdo->query($sql);
$indexs = $stmt->fetchAll();




?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>

<style>
 
  h3{
    margin:0;
    padding: 0.5rem 0;
    background-color: #83a573;
    color: white;
    }
    
  h4{
    font-weight: 500;
  }


  .form-group {
    width: 100%;
    height: auto;
    margin: 1rem 0;
    background-color: whitesmoke;
    }
 

  .form-group img {
    width: 120px;
    height: auto;
    object-fit: cover;
    margin: 0.5rem 0.25rem;
  }
  .btn-4{
    box-shadow: none;
  }

  .galleryBar {
    background-color: gray;
    z-index: 99;
    position: sticky;
    top: 60px;
    left: 0;
    text-align: justify;
  }

  
  .galleryBar ul li a:hover {
      color: white;
      text-shadow: 0px 0px 10px rgb(0, 255, 191);
  }
  a:hover {
      color: white;
  }



</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>

  <div class="galleryBar col-sm-12 mt-0 p-2 text-left ">
    <ul class="row m-0 px-md-5 p-sm-1 py-0 ">
        <?php foreach ($indexs as $ind) : ?>
        <li class=" mx-2 list-unstyled">
          <a  href="#<?= $ind['name']?>"><span class=" text-white" name="title" id="<?= $ind['id']?>" ><?= $ind["title"] ?></span></a>
        </li>
        <?php endforeach; ?>
    </ul>
  </div>

  <div class="container my-5">
    <form class="" action="staff_gallery-api.php" name="formGallery" id="formGallery" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">

      <?php foreach ($indexs as $ind) : ?>

      <div id="<?= $ind['name']?>" class="form-group con_01 my-5 row justify-content-center align-items-center">

       <h3 class="col-sm-12 p-1 "id="<?= $ind['id']?>"> <input class="form-control text-center text-white " style="background-color: #83a573;font-size:1.3rem;font-weight: 700; " type="text"  value="<?= $ind["title"] ?>"></h3>

        <label  class="col-sm-12 text-center custom-btn btn-4 t_shadow" style="width:100%;border-radius: 0;transform: none;"  for="<?= $ind['name']?>">

          <input class=" " style="display: none" type="file" id="<?= $ind['name']?>" name="<?= $ind['name']?>[]" accept=".png,.jpeg,.jpg" multiple /><h4 class="p-2">上傳圖片 </h4>

        </label>

        <div class=" col-sm-12" id="show_<?= $ind['name']?>">
          <img src="./images/album/farm/farm_1.jpg" alt="" />
        </div>

        <h4 class=" col-sm-12 m-0 p-2 bg-dark text-white text-center">圖片說明</h4>

        <textarea class=" form-control col-sm-12 p-3 m-0 id="content_<?= $ind['name']?> name="content"  cols="30" rows="5" ><?= $ind["content"] ?></textarea>

        <button type="submit" class="custom-btn btn-4 t_shadow" style="width:100%;border-radius: 0;transform: none;"> <h4 class="p-2">確認送出</h4></button>

      </div>

      <?php endforeach; ?>

    </form>

  </div>

</main>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script>

function fillData(){
    $.post('staff_gallery-api.php', {
      'type': 'read',
      'id': <?= $_GET['id']?>
    }, function(data){
      var columns = ['name','title','content']
      columns.forEach(function(elem){
        $(`#${elem}`).val(data[elem]);
      });
    }, 'json').fail(function(data){
      console.log(data);
    })
  }
  
  function create(){
    $.ajax({
        url: 'staff_gallery-api.php',
        data: new FormData($("#formGallery")[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data){
            console.log(data);
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

</script>

<script>
  function scroll(){
      console.log('test' + window.scrollY);
      if (location.href.indexOf("#<?= $ind['name']?>") > -1){
          window.scrollTo(0, window.scrollY - 152)
      }
  }

</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
