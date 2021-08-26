<?php require __DIR__ . '/parts/config.php'; ?>
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
        position: relative;
        background-color: gray;
        color: rgba(255, 255, 255, 1);
        font-weight: 600;
        text-decoration: none;
        display: block;
        padding: 16px;
        border-radius: 8px;
        box-shadow: 0 9px 0 rgba(75, 75, 75, 1),0px 9px 9px rgba(0, 0, 0, .7);
        margin: 100px auto;
        width: 160px;
        text-align: center;
        margin:1.2rem;
        cursor: pointer;
        letter-spacing: 3px;
        font-size: 1.5rem;

    }
    .box a:active {
        box-shadow: 0 3px 0 rgba(75, 75, 75, 1),0px 3px 6px rgba(0, 0, 0, .7);
        position: relative;
        top: 6px;
    }
    .box div a:hover{
        background: linear-gradient(135deg, #dcc5ef 40%, #adda9a 100%);
        text-shadow: 0 0 0.2em #0000e3, 0 0 0.25em #9aff02, -1px -1px white, 1px 1px rgb(26, 2, 94);
    }


</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

<main class="box">

    <!-- (div>a[href=#]{Link})*6 -->
    <div class=" row justify-content-center align-items-center">
        <div><a class=" " href="staff_helpdesk.php">客服信箱回覆</a></div>
        <div><a class=" " href="staff_order_search.php"> 訂單出貨管理</a></div>
        <div><a class=" " href="staff_member_info_search.php"> 會員資料查詢</a></div>
        <div><a class=" " href="staff_coupon_create.php"> 購物金<br>發放</a></div>
        <div><a class=" " href="staff_coupon_editor.php"> 購物金<br>排程</a></div>
        <div><a class=" " href="staff_coupon_search.php"> 兌換券<br>管理</a></div>
        <div><a class=" " href="staff_edm_create.php"> EDM新增&寄發</a></div>
        <div><a class=" " href="staff_edm_search.php"> EDM維護&寄發</a></div>
        <div><a class=" " href="staff_event_create.php"> 森林體驗新增</a></div>
        <div><a class=" " href="staff_event_search.php"> 森林體驗維護</a></div>
        <div><a class=" " href="staff_forestnews_create.php"> 森林快報新增</a></div>
        <div><a class=" " href="staff_forestnews_search.php"> 森林快報維護</a></div>
        <div><a class=" " href="staff_madol_create.php">彈跳視窗新增</a></div>
        <div><a class=" " href="staff_madol_search.php">彈跳視窗維護</a></div>
        <div><a class=" " href="staff_gallery.php">首頁&相簿維護</a></div>
        <div><a class=" " href="staff_category_editor.php"> 各項種類維護</a></div>
    </div>
    <hr>
    <div class=" row justify-content-center align-items-center">
        <?php if (in_array($_SESSION['staff']['role'] ?? "", $aceept_role)): ?>
        <div><a class=" " href="staff_register.php">新增員工帳號</a></div>
        <div><a class=" " href="staff_info_search.php"> 員工資料查詢</a></div>
        <div><a class=" " href="staff_info_position_editor.php">員工職稱修改</a></div>
        <?php endif?>

    </div>
</main>
<?php include __DIR__ . '/js/staff_scripts.php'; ?>

<script>
  
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

