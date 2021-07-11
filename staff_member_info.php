<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林-管理系統';
$pageName = 'staff_info';

if(
  ! isset($_SESSION['staff'])
){
header('Location: staff_login.php');
exit;
}

$sql = "SELECT * FROM staff WHERE staff_id='" . $_SESSION['staff']['staff_id']."'";
$r = $pdo->query($sql)->fetch();

// role類別
$sql = "SELECT * FROM `staff_role_category`";
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll();
$staff_role_category = [];
//ArrayArray ( [1] => 管理者 [2] => 經理 [3] => 會計 [4] => 一般員工 )
foreach($result as $role_cat){
    $staff_role_category[$role_cat['id']] = $role_cat['position'];
}


$sql = "SELECT * FROM members WHERE id=" . $_SESSION['user']['id'];
$r = $pdo->query($sql)->fetch();


?>



<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>
  body {
      background: linear-gradient(45deg, #e8ddf1 0%,  #e1ebdc 100%);
    }

  .con_01 {
    background-color: whitesmoke;
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
            <div class="col-md-8 col-sm-12  m-0 p-0 m-auto ">
                <form name="form1" method="post">
                    <div class="form-group">
                        <label for="email">帳號 ( email )： </label><span><?= $r['email'] ?></span>
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
                        <label for="email_2nd">備用email： </label><span><?= $r['email_2nd'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="zipcode">地址： </label><span><?= $r['zipcode'] ?></span><span><?= $r['county'] ?></span><span><?= $r['district'] ?></span><span><?= htmlentities($r['address']) ?></span>
                    </div>

                    <div  class="text-center"><a href="memberEditor.php" class="custom-btn btn-4 t_shadow text-center">修改</a>
                    </div>
                </form>
            </div>

       </div>
    </div>
</main>


<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

