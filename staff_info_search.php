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

$sql ="SELECT * FROM `staff` WHERE `staff_id`=?";
$r = $pdo->query($sql)->fetchAll();



// role類別
$sql = "SELECT * FROM `staff_role_category`";
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll();
$staff_role_category = [];
//ArrayArray ( [1] => 管理者 [2] => 經理 [3] => 會計 [4] => 一般員工 )
foreach($result as $role_cat){
    $staff_role_category[$role_cat['id']] = $role_cat['position'];
}
// 陣列
// print_r, var_dump

// 字串
// 都可以 print_r, var_dump, echo, print


// $sql = "SELECT staff.*, src.position as position FROM staff JOIN `staff_role_category` as src ON src.id = id WHERE staff_id='" . $_SESSION['staff']['staff_id']."'";
// $r = $pdo->query($sql)->fetch();

?>
<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>


  #profile .form-group {
        padding-bottom:3px;
        background: 
        linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%)
        bottom
        no-repeat; 
        background-size:100% 3px ;
    }
    select{
      height: 30px;
  }
  li{
      margin: 0 0.5rem;
  }
</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>
    <div class="container ">
        <div class="con_01 col-md-9 col-sm-12  p-0  m-auto">
            <div id="searchBar"  class=" " >
                <h2 class="title b-green rot-135  ">員工個人資料</h2>

                <form action="staff_info_search.php" method="post" >
                    <ul class="row list-unstyled p-2 m-0 justify-content-center align-items-center">
                        <li class=" ">
                            <input type="text" value="" placeholder="員工編號">          
                        </li>
                        <li class=" ">
                            <input type="text" value="" placeholder="姓名">          
                        </li>
                        <li class=" ">
                            <input type="text" value="" placeholder="手機">          
                        </li>
                        <li class="">
                            <select id="age" name="age">
                                <option value="" disabled hidden selected>年齡區間</option>
                                <option value="18-22">18-20歲</option>
                                <option value="23-30">21-30歲</option>
                                <option value="31-40">31-40歲</option>
                                <option value="41-50">41-50歲</option>
                                <option value="51-100">51歲以上</option>
                            </select>
                        </li>
                        <li><button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>

                    </ul>
                </form>
            </div>

            <div id="profile" class="  p-0  m-0">
                <div class="p-md-5 p-sm-2">
                    <div class="form-group">
                        <label for="staff_id">員工編號： </label>
                        <span type="text" id="staff_id"><?=['staff']['staff_id'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="position">職稱： </label><span> <?= $staff_role_category[$r["role"]] ?></span></span>
                    </div>
                    <div class="form-group">
                        <label for="fullname">姓名： </label><span><?= $r['fullname'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="birthday">生日： </label><span><?= $r['birthday'] ?></span>
                    </div>


                    <div class="form-group">
                        <label for="identityNum">身分證字號： </label><span><?= $r['identityNum'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail： </label><span><?= $r['email'] ?></span>
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

    </div>
</main>


<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

