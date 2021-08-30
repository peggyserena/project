<?php
if (!isset($pageName)) {
    $pageName = '';
}
$aceept_role = [1, 2];
?>
<style>

body {
      background: linear-gradient(45deg, #e8ddf1 0%,  #e1ebdc 100%);
    }


.navbar {
  width: 100%;
  position: fixed;
  top: 0px;
  z-index: 999;
  border-bottom: 5px solid #dcc5ef;
}
.officalWebsite{
  background-color: #dcc5ef;
  text-shadow: 0 0 0.2em #0000e3, 0 0 0.25em #9aff02, -1px -1px white, 1px 1px rgb(26, 2, 94);
  padding: 0 0.5rem;
  margin: 0 0.5rem;
  border-radius: 50%;
  border:1.5px dashed #8856b1 ;
}
.dropdown-menu a:hover{
  color: black;
}

</style>
<header>
  <nav class=" py-2 navbar navbar-expand-lg navbar-light bg-light active">
    
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse  " id="navbarSupportedContent">
      <ul class="navbar-nav m-auto  " style="flex-wrap: wrap">
        <li class="nav-item officalWebsite<?= $pageName == 'index' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php" target="_blank" role="button" aria-haspopup="true" aria-expanded="false"> 官網</a>
        </li>
        <li class="nav-item <?= $pageName == 'staff_index' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_index.php" role="button" aria-haspopup="true" aria-expanded="false"> 首頁</a>
        </li>
        <li class="nav-item <?= $pageName == 'staff_helpdesk' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_helpdesk.php" role="button" aria-haspopup="true" aria-expanded="false"> 客服信箱</a>
        </li>
        <li class="nav-item <?= $pageName == 'staff_order_search' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_order_search.php" role="button" aria-haspopup="true" aria-expanded="false"> 訂單出貨</a>
        </li>

        <li class="nav-item <?= $pageName == 'staff_member_info_search' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_member_info_search.php" role="button" aria-haspopup="true" aria-expanded="false"> 會員資料</a>
        </li>
        <li class="nav-item dropdown<?= $pageName == 'staff_coupon' ? 'active' : '' ?>">
            <a class="nav-link dropdown-toggle" href="staff_coupon.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">購物金</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="staff_coupon_create.php"> 購物金寄發</a>
                <a class="dropdown-item" href="staff_coupon_editor.php"> 購物金&禮券排程 </a>
            </div>
        </li>
        <li class="nav-item dropdown<?= $pageName == 'staff_edm' ? 'active' : '' ?>">
            <a class="nav-link dropdown-toggle" href="staff_edm.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EDM</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="staff_edm_create.php"> EDM新增</a>
                <a class="dropdown-item" href="staff_edm_search.php"> EDM查詢&修改&寄發 </a>
            </div>
        </li>


        <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">森林體驗</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="staff_event_create.php"> 森林體驗新增</a>
                <a class="dropdown-item" href="staff_event_search.php"> 森林體驗查詢&修改 </a>
            </div>
        </li>
        <li class="nav-item dropdown<?= $pageName == 'staff_forestnews' ? 'active' : '' ?>">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">森林快報</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="staff_forestnews_create.php"> 森林快報新增</a>
                <a class="dropdown-item" href="staff_forestnews_search.php"> 森林快報查詢&修改 </a>
            </div>
        </li>


        <li class="nav-item <?= $pageName == 'staff_gallery' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_gallery.php" role="button" aria-haspopup="true" aria-expanded="false"> 首頁維護</a>
        </li>
        <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
            <a class="nav-link dropdown-toggle" href="staff_madol.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">彈跳視窗</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="staff_modol_create.php"> 彈跳視窗新增</a>
                <a class="dropdown-item" href="staff_modol_editor.php"> 彈跳視窗查詢&修改 </a>
            </div>
        </li>
        <li class="nav-item <?= $pageName == 'staff_category_editor' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_category_editor.php" role="button" aria-haspopup="true" aria-expanded="false"> 種類維護</a>
        </li>
    
        <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
        <?php if (in_array($_SESSION['staff']['role'] ?? "", $aceept_role)): ?>
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">員工資料</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="staff_register.php">員工編號新增 </a>
                <a class="dropdown-item" href="staff_info_search.php">員工資料查詢 </a>
                <a class="dropdown-item" href="staff_info_position_editor.php">員工職稱修改 </a>
            </div>
            <?php endif?>
        </li>

      </ul>
 
      <ul class="navbar-nav m-auto" style="flex-shrink:0">
        <?php if (isset($_SESSION['staff'])) : ?>
          
        <li class="nav-item">
            <a class="nav-link"><?= htmlentities($_SESSION['staff']['fullname']) ?></a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="staff_logout.php">登出</a>
        </li>
        <li class="nav-item <?= $pageName == 'staff_info' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_info.php" role="button" aria-haspopup="true" aria-expanded="false"> 個人資料 </a>
        </li>
        <li class="nav-item <?= $pageName == 'staff_password_editor' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_password_editor.php" role="button" aria-haspopup="true" aria-expanded="false"> 修改密碼 </a>
        </li>


        <?php else : ?>
        <li class="nav-item <?= $pageName == 'staff_login' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_login.php">登入</a>
        </li>

        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>
