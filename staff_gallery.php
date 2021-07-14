<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '相簿';
$pageName = 'staff_gallery';

$sql = "SELECT * FROM `index`";
$stmt = $pdo->query($sql);
$indexs = $stmt->fetchAll();



// 抓圖片
// $sql = "SELECT * FROM `index_image` WHERE index_id = ".$index['id'];
// $stmt = $pdo->prepare($sql);
// $stmt->execute([]);
// $index_img = $stmt->fetchAll();

?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<link rel="stylesheet" href="./css/staff_gallery.css">


<style>



</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>

  <div class="galleryBar col-sm-12 mt-0 p-2 text-left ">
    <ul class="row m-0 px-md-5 p-sm-1 py-0 ">
        <?php foreach ($indexs as $ind) : ?>
        <li class=" mx-2 list-unstyled">
          <a  href="#<?= $ind['name']?>"><span class=" text-white"  id="<?= $ind['id']?>" ><?= $ind["title"] ?></span></a>
        </li>
        <?php endforeach; ?>
    </ul>
  </div>

  <div class="container">

    <form class="" action="" name="formGallery" id="formGallery" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">

      <?php foreach ($indexs as $ind) : ?>

      <div id="<?= $ind['name']?>" class="form-group con_01 my-5 row justify-content-center align-items-center">
        <h3 class="col-sm-12  text-center "id="<?= $ind['id']?>"><?= $ind["title"] ?></h3>

        <h4 class="col-sm-12 m-0 p-2 bg-dark text-white text-center">圖片</h4>

        <div class="col-sm-12" id="show_<?= $ind['name']?>">

          <img src="./images/album/farm/farm_1.jpg" alt="" />
          
          <?php for ($i = 1; $i < count($index_img); $i++) : ?>
                    <a href='<?= WEB_ROOT."/".$index_img[$i]['path'] ?>' data-fancybox='F_box1' data-caption=' <?= $ind['name'] ?>'>
                        <img src='<?= WEB_ROOT."/".$index_img[$i]['path'] ?>' alt=''>
                    </a>
          <?php endfor; ?>
        </div>

        <h4 class="col-sm-12 m-0 p-2 bg-dark text-white text-center">圖片說明</h4>

        <textarea class=" form-control col-sm-12 p-3 m-0" id="content_<?= $ind['name']?>" name="" disabled cols="30" rows="5" ><?= $ind["content"] ?></textarea>

        <a class="text-center custom-btn btn-4 t_shadow" style="width:100%;border-radius: 0;transform: none;" href="staff_gallery_editor.php?id=<?= $ind['id']?>" target="_blank"><h4 class="m-2">修改</h4></a>


      </div>

      <?php endforeach; ?>

    </form>

  </div>

</main>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  function scroll(){
      console.log('test' + window.scrollY);
      if (location.href.indexOf("#<?= $ind['name']?>") > -1){
          window.scrollTo(0, window.scrollY - 152)
      }
  }


</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
