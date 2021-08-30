<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林快報新增';
$pageName = 'staff_modal_create';
// $stmt = $pdo->query($sql); // $forestnewss = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>

<style>


</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

  <main>
    <div class="container ">
      <div class="con_01 row ">
          <h2 class="title b-green rot-135 col-sm-12">新增彈跳視窗</h2>
          <form class="p-5 col-sm-12" name="form" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
              <input type="hidden" name="type" value="add"/>
              <div class="form-group">
                  <label for="cat_id_H">放置網頁於</label>
                  <select type="text" class="form-control" id="cat_id_H" name="cat_id" autofocus required></select>
              </div>
              <div class="form-group">
                  <label for="title">標題</label>
                  <input type="text" class="form-control" id="name" name="name"  >
              </div>
              <div class="form-group">
                  <label for="content">活動內容</label>
                  <textarea type="text" class="form-control" id="content" name="content"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="notice">注意事項</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>
          </form>
      <div>
      
    </div>
  </main>

<?php include __DIR__ . '/parts/staff_scripts.php'; ?>
<script>
  $.post('<?= WEB_API ?>/forestnews-api.php', {
    'action': 'readAll',
  }, function(data){
  })
</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
