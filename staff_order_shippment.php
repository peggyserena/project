<?php include __DIR__. '/parts/config.php'; ?>
<?php
$title = '出貨管理';
$pageName = 'staff_order_shippment';

if(
    ! isset($_SESSION['staff'])
  ){
  header('Location: staff_login.php');
  exit;
  }
?>

<?php include __DIR__ . '/parts/staff_html-head.php'; ?>

<style>

    </style>
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>

    <div class="container mt-5 mb-5  ">
    </div>

<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script>
</script>

<?php include __DIR__ . '/parts/staff_html-foot.php'; ?>