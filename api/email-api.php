<?php
include __DIR__ . '/../parts/config.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$action = $_POST['action'];
$result = [];
switch ($action){
    case "forget_password":
        $email = $_POST['email'];
        try {
            // 取得member
            $sql = "SELECT * FROM `members` WHERE `email` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            $id = $user['id'];
            $key = bin2hex(random_bytes(32));
            // 新增金鑰
            $sql = "UPDATE `members` SET forget_password = ? WHERE `email` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$key, $email]);

            if ($user){
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'lavenderforestcafe@gmail.com';                     //SMTP username
                $mail->Password   = 'Lavender0617$';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->CharSet = "UTF-8"; 
                //Recipients
                $mail->setFrom('lavenderforestcafe@gmail.com', 'Mailer');
                // $mail->addAddress('lavenderforestcafe@gmail.com', 'Joe User');     //Add a recipient
                $mail->addAddress($email, $user['fullname']);               //Name is optional

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = '密碼重設';
                $mail->Body    = "<a href='localhost/".WEB_ROOT."/forgetPassword.php?id=$id&key=$key'>點選重設</a>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $result['info'] = "信件寄送成功";
            } else{
                $result['info'] = "此信箱尚未註冊";
            }
        } catch (Exception $e) {
            $result['error'] = "系統錯誤，請重新嘗試，或是聯絡系統管理員";
        }
        
        break;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);