<?php
include __DIR__ . '/parts/config.php';

$output = [];

$member_id = $_SESSION['user']['id'];

$fullname = $_POST['fullname'];
$email_2nd = $_POST['email_2nd'];
$mobile = $_POST['mobile'];
$zipcode = $_POST['zipcode'];
$county = $_POST['county'];
$district = $_POST['district'];
$address = $_POST['address'];
$email_2nd = $_POST['email_2nd'];

$a_sql = "UPDATE `members` SET 
            `fullname`= '$fullname',
            `email_2nd`= '$email_2nd',
            `mobile`='$mobile',
            `zipcode`='$zipcode',
            `county`='$county',
            `district`='$district',
            `address`='$address'
            WHERE id = $member_id";
$a_stmt = $pdo->prepare($a_sql);
// $a_stmt->execute([$fullname, $mobile, $zipcode, $county, $address]);
$a_stmt->execute();


$a_sql = "SELECT * FROM `members` WHERE id = $member_id";
$a_stmt = $pdo->prepare($a_sql);
$a_stmt->execute();
$row = $a_stmt->fetch();
unset($row['password']);
unset($row['hash']);
$_SESSION['user'] = $row;
$output['success'] = "資料修改成功";



// $a_sql = "SELECT * FROM `members` WHERE id = $member_id";
// $a_stmt = $pdo->prepare($a_sql);
// $_SESSION['user'] = $a_stmt->execute()->fetch();
// header('Location: member.php');
echo json_encode($output, JSON_UNESCAPED_UNICODE);
