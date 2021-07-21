<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '相簿';
$pageName = 'staff_gallery';

// $sql = "SELECT * FROM `index`";
// $stmt = $pdo->query($sql);
// $indexs = $stmt->fetchAll();



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
    <ul class="row m-0 px-md-5 p-sm-1 py-0 list-unstyled ">
        <?php foreach ($indexs as $ind) : ?>
        <li class=" mx-2 ">
          <a  href="#<?= $ind['name']?>"><span class=" text-white"  id="<?= $ind['id']?>" ><?= $ind["title"] ?></span></a>
        </li>
        <?php endforeach; ?>
    </ul>
  </div>

  <div class="container">

    <form class="" action="" name="formGallery" id="formGallery" method="post"  enctype="multipart/form-data">
    </form>

  </div>

</main>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  fillData();
  function fillData(){
    console.log("read");
    $.post('<?= WEB_API ?>/staff_gallery-api.php', {
      'action': 'readAll'
    }, function(data){
      var formGallery = $("#formGallery");
      data['data'].forEach(function(elem){
        var img_output = "";
        if (elem['id'] in data['img']){
          data['img'][elem['id']].forEach(function(img_elem){
            img_output += `<img src='<?= WEB_ROOT."/" ?>${img_elem['path']}' alt=''>`;
          });
        }
        var output = `<div id="${elem['name']}" class="form-group con_01 my-5 row justify-content-center align-items-center">
                        <h3 class="col-sm-12  text-center "id="${elem['id']}">${elem["title"] }</h3>

                        <h4 class="col-sm-12 m-0 p-2 bg-dark text-white text-center">圖片</h4>

                        <div class="col-sm-12" id="show_${elem['name']}">
                            ${img_output}
                        </div>

                        <h4 class="col-sm-12 m-0 p-2 bg-dark text-white text-center">圖片說明</h4>

                        <textarea class=" form-control col-sm-12 p-3 m-0" id="content_${elem['name']}" name="" disabled cols="30" rows="5" >${elem["content"] }</textarea>
                        <textarea class=" form-control col-sm-12 p-3 m-0" id="content_${elem['name']}" name="" disabled cols="30" rows="5" >${elem["content_tablet"] }</textarea>
                        <textarea class=" form-control col-sm-12 p-3 m-0" id="content_${elem['name']}" name="" disabled cols="30" rows="5" >${elem["content_cellphone"] }</textarea>

                        <a class="text-center custom-btn btn-4 t_shadow" style="width:100%;border-radius: 0;transform: none;" href="staff_gallery_editor.php?id=${elem['id']}" target="_blank"><h4 class="m-2">修改</h4></a>


                      </div>`;
          $("#formGallery").append(output);    
      });
      

      // 圖片預覽
      // $("#preview #sortable").html("");
      // const files = data['img'];
      // for(var i = 0; i < files.length; i++){
      //   var file = files[i];
      //   if (file) {
      //     var img = ` <li class="ui-state-default" data-order="${i}">
      //                   <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${file.path}" alt="your image" />
      //                 </li>`;
      //     $("#preview #sortable").append(img);
      //   }
      // }
    }, 'json').fail(function(data){
    })
  }
  function scroll(){
      console.log('test' + window.scrollY);
      if (location.href.indexOf("#<?= $ind['name']?>") > -1){
          window.scrollTo(0, window.scrollY - 152)
      }
  }


</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
