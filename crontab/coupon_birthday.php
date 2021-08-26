<?php
require_once './parts/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require_once './vendor/autoload.php';

global $pdo;



$current_month = intval(date("m"));
$next_month = $current_month + 1;
$start_date = date("Y-").$next_month."-01";
$end_date = date("Y-m-t", strtotime($start_date));


$coupon = [
    'id' => 1,
    'start_date' => $start_date,
    'end_date' => $end_date
];

// 抓取類別名稱
$sql = "SELECT * FROM `coupon_category` WHERE `id` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$coupon['id']]);
$coupon_category = $stmt->fetch();
$coupon_category_name = $coupon_category['name'];
$coupon_category_price = $coupon_category['price'];
$coupon_category_note = $coupon_category['note'];
$coupon_category_img = $coupon_category['img'];

// 抓取條件相符的會員
$sql = "SELECT * FROM `members` WHERE MONTH(`birthday`) = $next_month";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$userList = $stmt->fetchAll();

$mail = new PHPMailer(true);
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'lavenderforestcafe@gmail.com';                     //SMTP username
$mail->Password   = 'Lavender0617$';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
$mail->CharSet = "UTF-8"; 
//Recipients
$mail->setFrom('lavenderforestcafe@gmail.com', '薰衣草森林');


foreach($userList as $user){
    $email = $user['email'];
    $fullname = $user['fullname'];
    $note = $coupon_category_note;
    $startDate = $coupon['start_date'];
    $endDate = $coupon['end_date'];
    
    $mail->addAddress($email, $fullname);               //Name is optional

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$coupon_category_name-禮金發放";
    $mail->Body    = " <div>$fullname 恭喜獲得$coupon_category_name $coupon_category_price 元</div>
            <div>使用日期為$startDate~$endDate</div>
            <div>$coupon_category_name</div>
            <div>$note</div>
            <a href='localhost/".WEB_ROOT."/member.php?tab=coupon'>前往我的購物金</a>";
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail cpents';

    $mail->addAttachment($_SERVER['DOCUMENT_ROOT'].WEB_ROOT."/".$coupon_category_img);

    $mail->send();
    $mail->clearAllRecipients();
    print_r($user);
}
print_r("信件寄送成功");


// 新增coupon
$userIdList = [];
foreach($userList as $user){
    // insert coupon
    $columns = ['user_id', 'cat_id', 'price', 'balance', 'note'];
    $param = [$user['id'], $coupon['id'], $coupon_category_price, $coupon_category_price, $coupon_category_note];
    $sql = "INSERT INTO `coupon` ";

    $sql .= "(`".implode("`,`", $columns)."`, 
                `start_date`, `end_date`, `created_at`) 
            VALUES (".substr(str_repeat("?,", count($columns)), 0, -1).", 
                '$startDate', '$endDate', NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($param);
    array_push($userIdList, $user['id']);
}
print_r("禮金發放成功");

?>