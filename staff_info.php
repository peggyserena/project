<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林-管理系統';
$pageName = 'index_staff';

if(
  ! isset($_SESSION['staff'])
){
header('Location: staff_login.php');
exit;
}

$sql = "SELECT * FROM staff WHERE staff_id='" . $_SESSION['staff']['staff_id']."'";
$r = $pdo->query($sql)->fetch();

$role = $_GET['role'] ?? "";
$sql = "SELECT `s`.*, sc.role as `sc_role` FROM `staff` as s";
$sql .= " JOIN `staff_role_category` as sc ON `role` = sc.`id`";
// role類別
$sql = "SELECT * FROM `staff_role_category`";
$stmt = $pdo->query($sql);
$staff_role_category = $stmt->fetchAll();

?>
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
  #profile .form-group {
        padding-bottom:3px;
        background: 
        linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%)
        bottom
        no-repeat; 
        background-size:100% 3px ;
    }

</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>
    <div class="container  my-5">
       <div class="row m-1 justify-content-center ">

          <div id="profile" class="con_01 col-md-8 col-sm-12  p-0">
            <h2 class="title b-green rot-135  ">員工個人資料</h2>
            <div class="p-md-5 p-sm-2">
                <div class="form-group">
                    <label for="staff_id">員工編號： </label>
                    <span type="text" id="staff_id"><?= $_SESSION['staff']['staff_id'] ?></span>
                </div>
                <div class="form-group">
                    <label for="position">職稱： </label><span> <?= $r["role"] ?></span></span>
                </div>
                <div class="form-group">
                    <label for="identityNum">身分證字號： </label><span><?= $r['identityNum'] ?></span>
                </div>
                <div class="form-group">
                    <label for="email">E-mail： </label><span><?= $r['email'] ?></span>
                </div>
                <div class="form-group">
                    <label for="fullname">姓名： </label><span><?= $r['fullname'] ?></span>
                </div>
                <div class="form-group">
                    <label for="birthday">生日： </label><span><?= $r['birthday'] ?></span>
                </div>
                <div class="form-group">
                    <label for="mobile">手機： </label><span><?= $r['mobile'] ?></span>
                </div>
                <div class="form-group">
                    <label for="county">地址： </label><span><?= $r['zipcode'] ?></span><span><?= $r['county'] ?></span><span><?= $r['district'] ?></span><span><?= htmlentities($r['address']) ?></span>
                </div>
     
                <div  class="text-center"><a href="staff_info_editor.php" class="custom-btn btn-4 text-center t_shadow">修改</a>
                </div>
            </div>

       </div>
    </div>
</main>


<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

