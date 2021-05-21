<?php
include __DIR__ . '/parts/config.php';

$member_id = $_SESSION['user']['id'];

$fullname = $_POST['fullname'];
$email_2nd = $_POST['email_2nd'];
$mobile = $_POST['mobile'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$address = $_POST['address'];
$email_2nd = $_POST['email_2nd'];

$a_sql = "UPDATE `members` SET 
            `fullname`= '$fullname',
            `email_2nd`= '$email_2nd',
            `mobile`='$mobile',
            `zipcode`='$zipcode',
            `city`='$city',
            `address`='$address'
            WHERE id = $member_id";
$a_stmt = $pdo->prepare($a_sql);
// $a_stmt->execute([$fullname, $mobile, $zipcode, $city, $address]);
$a_stmt->execute();


$a_sql = "SELECT * FROM `members` WHERE id = $member_id";
$a_stmt = $pdo->prepare($a_sql);
$a_stmt->execute();
$row = $a_stmt->fetch();
unset($row['password']);
unset($row['hash']);
$_SESSION['user'] = $row;




// $a_sql = "SELECT * FROM `members` WHERE id = $member_id";
// $a_stmt = $pdo->prepare($a_sql);
// $_SESSION['user'] = $a_stmt->execute()->fetch();
header('Location: member.php');
