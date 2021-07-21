<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林 管理系統';
$pageName = 'staff_index';

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
        margin:1rem;
        padding: 30px;
        background-image: linear-gradient(315deg, #79b65f 10%, #7d30bd 30%);
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        box-shadow: 3px 3px 5px rgba(119, 119, 119, 0.5);
        letter-spacing: 3px;
        font-size: 1.5rem;
        /* filter: grayscale(100%); */
    }
    .box a {
        color: #fff;

    }

    /* button */

    .box a:hover {
        /* box-shadow: none; */
        transform: scale(0.95);
        cursor: pointer;
        color: white;
        font-weight: 900;
        text-shadow: none;
        background-image: linear-gradient(315deg, #adda9a 0%, #dcc5ef 74%);
        text-shadow: 0 0 0.2em #0000e3, 0 0 0.25em #9aff02, -1px -1px white, 1px 1px rgb(26, 2, 94);

    }

    
</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

<main class="box">

    <!-- (div>a[href=#]{Link})*6 -->
    <div class=" row justify-content-center align-items-center">
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_helpdesk.php"><div >客服信箱回覆</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_member_info_search.php"> <div >會員資料查詢</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_member_order_search.php"> <div >交易訂單查詢</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_category_create.php"> <div >各項種類新增</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_category_search.php"> <div >各項種類維護</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_forestnews_create.php"> <div >電子報新增&寄發</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_forestnews_search.php"> <div >電子報維護&寄發</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_forestnews_create.php"> <div >森林快報新增</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_forestnews_search.php"> <div >森林快報維護</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_madol_create.php"><div >彈跳視窗新增</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_madol_search.php"><div >彈跳視窗維護</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_event_create.php"> <div >森林體驗新增</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_event_search.php"> <div >森林體驗維護</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_gallery.php"><div >園區相簿維護</div></a>
    </div>
    <hr>
    <div class=" row justify-content-center align-items-center">
        <?php if (in_array($_SESSION['staff']['role'] ?? "", $aceept_role)): ?>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_info_search.php"> <div >員工資料查詢</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_category_create.php"> <div >員工職稱新增</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_category_editor.php"> <div >員工職稱修改</div></a>
        <a class="col-lg-2 col-md-3 col-sm-12 " href="staff_register.php"> <div >新增員工帳密</div></a>
        <?php endif?>

    </div>
</main>
<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

