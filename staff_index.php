<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林 管理系統';
$pageName = 'staff_index';
// $stmt = $pdo->query($sql);
// $events = $stmt->fetchAll();
// $sql = "SELECT * FROM `index`";
if (!isset($pageName)) {
    $pageName = '';
}
$aceept_role = [1, 2];
?>


?>
<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>
    .box{
        margin: 100px auto;
        width: 75%;

    }
    .box a {
        text-align: center;
        border-radius: 5px;
        margin: 2rem;
        padding: 40px 40px;
        background-image: linear-gradient(315deg, #adda9a 0%, #dcc5ef 74%);
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 3px 3px 5px rgba(119, 119, 119, 0.5);
        letter-spacing: 3px;
        font-size: 200%;
    }
    .box a {
        color: #fff;
        text-shadow: 0 0 0.2em #0000e3, 0 0 0.25em #9aff02, -1px -1px white, 1px 1px rgb(26, 2, 94);

    }

    /* button */

    .box a:hover {
        /* box-shadow: 0px 0px 10px rgb(0, 255, 191); */
        transform: scale(0.975);
        /* filter: hue-rotate(45deg); */
    }
</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

<main>

    <!-- (div>a[href=#]{Link})*6 -->
    <div class="box row justify-content-center align-items-center">
        <a class="col-md-3 col-sm-12 " href="staff_helpdesk.php"><div >客服信箱回覆</div></a>
        <a class="col-md-3 col-sm-12 " href="staff_gallery.php"><div >相簿維護</div></a>
        <a class="col-md-3 col-sm-12 " href="staff_forestnews.php"> <div >森林快報</div></a>
        <a class="col-md-3 col-sm-12 " href="staff_event_create.php"> <div >森林體驗新增</div></a>
        <a class="col-md-3 col-sm-12 " href="staff_event_search.php"> <div >森林體驗維護</div></a>
        <a class="col-md-3 col-sm-12 " href="staff_member_order_search.php"> <div >交易訂單查詢</div></a>
        <a class="col-md-3 col-sm-12 " href="staff_member_info_search.php"> <div >會員資料查詢</div></a>
        <?php if (in_array($_SESSION['staff']['role'] ?? "", $aceept_role)): ?>
        <a class="col-md-3 col-sm-12 " href="staff_info_search.php"> <div >員工資料查詢</div></a>
        <a class="col-md-3 col-sm-12 " href="staff_register.php"> <div >新增員工帳密</div></a>
        <?php endif?>

    </div>
</main>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

