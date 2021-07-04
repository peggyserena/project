<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林-管理系統';
$pageName = 'index_staff';

if(
  ! isset($_SESSION['user'])
){
header('Location: staff_login.php');
exit;
}

$sql = "SELECT * FROM staff WHERE id=" . $_SESSION['user']['id'];
$r = $pdo->query($sql)->fetch();

?>

<main>
    <div class="container">
        <div id="profile" class="tab-pane fade in active">
                    <div class="col-8 col-md-8 col-sm-12 con_01 m-0 p-0 m-auto ">
                        <label for="staff_id">員工編號</label>
                        <div type="text" id="staff_id"><?= $_SESSION['staff']['staff_id'] ?></div>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="identityNum">身分證字號</label><span><?= $r['identityNum'] ?></span>
                        <input type="text" class="form-control" id="identityNum" name="identityNum" autofocus required>
                        <small class="form-text error"></small>
                    </div>
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
                        <label for="zipcode">郵遞區號： </label><span><?= $r['zipcode'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="city">縣市： </label><span><?= $r['city'] ?></span></span>
                    </div>
                    <div class="form-group">
                        <label for="address">區域及地址： </label><span><?= htmlentities($r['address']) ?></span>
                    </div>
                    <div  class="text-center"><a href="staff_editor.php" class="custom-btn btn-4 text-center">修改</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

