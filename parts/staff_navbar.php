<?php
if (!isset($pageName)) {
    $pageName = '';
}
?>
<style>
  nav.navbar .nav-item.active {
    background-color: #5dc0df;
    border-radius: 10px;
  }
</style>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light active">
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

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto" style="flex-wrap: wrap">
        <li class="nav-item dropdown<?= $pageName == 'index_staff' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_event.php" role="button" aria-haspopup="true" aria-expanded="false"> 活動管理 </a>
        </li>
        <li class="nav-item dropdown<?= $pageName == 'staff_register' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_register.php" role="button" aria-haspopup="true" aria-expanded="false"> 新增員工編號 </a>
        </li>
        <li class="nav-item dropdown<?= $pageName == 'staff_editor' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_info.php" role="button" aria-haspopup="true" aria-expanded="false"> 個人資料 </a>
        </li>
        <li class="nav-item dropdown<?= $pageName == 'staff_password_editor' ? 'active' : '' ?>">
          <a class="nav-link" href="staff_password_editor.php" role="button" aria-haspopup="true" aria-expanded="false"> 修改密碼 </a>
        </li>
 

        <?php if (isset($_SESSION['user'])) : ?>
          
        <li class="nav-item">
            <a class="nav-link"><?= htmlentities($_SESSION['user']['fullname']) ?></a>
        </li>
        <li class="nav-item" style="flex-shrink: 0">
          <a class="nav-link" href="staff_logout.php">登出</a>
        </li>
        <li class="nav-item p-0 m-0 <?= $pageName == 'staff_editor' ? 'active' : '' ?>">
          <a class="nav-link p-0 m-0" href="staff_info.php"><img src="./images/icon/member.svg" alt="" />個人資料</a>
        </li>
        <li class="nav-item p-0 m-0 <?= $pageName == 'staff_password_editor' ? 'active' : '' ?>">
          <a class="nav-link p-0 m-0" href="staff_password_editor.php"><img src="./images/icon/member.svg" alt="" />修改密碼 </a>
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
