<?php
if (!isset($pageName)) {
    $pageName = '';
}
?>
<style>

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
        <li class="nav-item <?= $pageName == 'index_staff' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_event.php" role="button" aria-haspopup="true" aria-expanded="false" target="blank"> 森林體驗新增</a>
        </li>
        <li class="nav-item <?= $pageName == 'staff_event_check.php' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_event_check.php" role="button" aria-haspopup="true" aria-expanded="false" target="blank"> 森林體驗查詢 </a>
        </li>
        <li class="nav-item <?= $pageName == 'event' ? 'active' : '' ?>">
          <a class="nav-link" href="event.php" role="button" aria-haspopup="true" aria-expanded="false" target="blank"> 森林體驗 </a>
        </li>
        <li class="nav-item <?= $pageName == 'staff_register' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_register.php" role="button" aria-haspopup="true" aria-expanded="false" > 新增員工編號 </a>
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
        <li class="nav-item <?= $pageName == 'staff_editor' ? 'active' : '' ?>">
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
