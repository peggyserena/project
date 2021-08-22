<!doctype html>
<?php
$request_arr = explode( "/", $_SERVER['REQUEST_URI']);
$current_path = end($request_arr);
if(
    ! isset($_SESSION['staff']) &&
    $current_path != 'staff_login.php'
){
header('Location: staff_login.php');
exit;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? '薰衣草森林' ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/css/style.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/css/style_desktop.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/css/style_tablet.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/css/style_cellphone.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/css/staff_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">


</head>

<body>