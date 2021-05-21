<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員中心';
$pageName = 'member';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="./js/jQuery-TWzipcode-master/jquery.twzipcode.min.js"></script>

<style>

</style>

<?php include __DIR__ . '/parts/navbar.php'; ?>
<main>
<div class="contain  ">
        <div class="row m-3 " id="zipcode3">
            <div class="col-3 " data-role="county"></div>
            <div class="col-3  " data-role="district"></div>
        </div>
        <div>        
            <input name="Address" type="text" class="col-6 address form-control ">
        </div>
    </div>

</main>

<!-- <?php include __DIR__ . '/parts/scripts.php'; ?>
和以下有衝突
<script src="<?= WEB_ROOT ?>/js/jquery-3.6.0.js"></script>
 -->

<script>
    $("#zipcode3").twzipcode({
        "zipcodeIntoDistrict": true,
        "css": ["city form-control", "town form-control"],
        "countyName": "city", // 指定城市 select name
        "districtName": "town" // 指定地區 select name
    });
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>