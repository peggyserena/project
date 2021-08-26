<?php
include __DIR__ . '/../parts/config.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$action = $_POST['action'];
$result = [];
$staff = $_SESSION['staff'] ?? null;

// $.post('/project/api/email-api.php', 
// {'action': 'newCoupon', userIdpst, coupon}, function(d){
//     console.log(d)
// }).fail(function(d){
//     console.log(d)
// });
switch ($action){
    case 'test':
        beforeSendMail();
        $sql = "SELECT * FROM `members` WHERE id = 35";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch();

        $email = "19980726kevin@gmail.com";
        $fullname = $user['fullname'];
        $mail->addAddress($email, $fullname);               //Name is optional
    
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "禮金發放";
        $content = file_get_contents('../edm/beefree-laxecmficnr.html');
        $content = str_replace("%fullname%", $fullname, $content);

        $mail->Body    =  $content;

        print_r($mail->Body);
        $mail->AltBody = 'This is the body in plain text for non-HTML mail cpents';

        $mail->send();

        $result['info'] = "信件寄送成功";
        break;
    case 'testSimple':
        beforeSendMail();
        $sql = "SELECT * FROM `members` WHERE id = 35";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch();

        $email = "19980726kevin@gmail.com";
        $fullname = $user['fullname'];
        $mail->addAddress($email, $fullname);               //Name is optional
    
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "禮金發放";
        $mail->Body  = file_get_contents('../edm/beefree-laxecmficnr.html');

        print_r($mail->Body);
        $mail->AltBody = 'This is the body in plain text for non-HTML mail cpents';

        $mail->send();

        $result['info'] = "信件寄送成功";
        break;
    case 'newCoupon':
        if (!empty($staff)){
            $userIdpst = $_POST['userIdpst'];
            $coupon = $_POST['coupon'];
            
            $sql = "SELECT * FROM `coupon_category` WHERE `id` = ?";
            $stmt = $pdo->prepare($sql);
            print($sql);
            print_r($coupon);
            $stmt->execute([$coupon['id']]);
            $coupon_category = $stmt->fetch();
            $coupon_category_name = $coupon_category['name'];

            $sql = "SELECT * FROM `members` WHERE id in (".substr(str_repeat("?,", count($userIdpst)), 0, -1).")";
            $stmt = $pdo->prepare($sql);
            print($sql);
            print_r($userIdpst);
            $stmt->execute($userIdpst);
            $userpst = $stmt->fetchAll();
            beforeSendMail();


            foreach($userpst as $user){
                $email = $user['email'];
                $fullname = $user['fullname'];
                $note = $coupon['note'];
                $startDate = $coupon['start_date'];
                $endDate = $coupon['end_date'];
                
                $mail->addAddress($email, $fullname);               //Name is optional
    
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "$coupon_category_name-禮金發放";
                $mail->Body    = " <div>$fullname 恭喜獲得$coupon_category_name</div>
                        <div>使用日期為$startDate~$endDate</div>
                        <div>$note</div>
                        <a href='localhost/".WEB_ROOT."/member.php?tab=coupon'>前往我的購物金</a>";
               
                
                $mail->AltBody = 'This is the body in plain text for non-HTML mail cpents';
    
                $mail->send();
            }

            
            
            $result['info'] = "信件寄送成功";

        }
        break;
    case 'helpdeskReply':
        if (!empty($staff)){
            $id = $_POST['id'];
            $sql = "SELECT h.*, hc.name as `cat_name` FROM `helpdesk` as h JOIN `helpdesk_category` as hc on h.`cat_id` = hc.`id` WHERE h.`id` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $result['data'] = $stmt->fetch();

            $sql = "SELECT `fullname`, `mobile`, `email`, `gender` FROM `members` WHERE id = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([$result['data']['user_id']]);
            $result['user'] = $stmt->fetch();
            
            
            $sql = "SELECT * FROM `helpdesk_image` WHERE helpdesk_id = ? AND `type` = ? ORDER BY num_order";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id, 'staff']);
            $result['img'] = $stmt->fetchAll();
            
            if ($result['user']){
                $fullname = $result['user']['fullname'];
                $email = $result['user']['email'];
                $mobile = $result['user']['mobile'];
            }else{
                $fullname = $result['data']['g_name'];
                $email = $result['data']['g_email'];
                $mobile = $result['data']['g_mobile'];
            }

            beforeSendMail();
            // $mail->addAddress('lavenderforestcafe@gmail.com', 'Joe User');     //Add a recipient
            $mail->addAddress($email, $fullname);               //Name is optional

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
            foreach($result['img'] as $key => $img){
                $mail->addAttachment($_SERVER['DOCUMENT_ROOT'].WEB_ROOT."/".$img['path']);
            }
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = '客服回答';
            $mail->Body    = " <div style='margin: 2rem 0 2rem 0 ;'>
            
                                    <p>親愛的 ".$result['user']['fullname'].$result['user']['gender']." 您好～感謝您的來信與建議，以下是我們真誠地回覆～</p>
                                    <table style='box-shadow: 0px 0px 15px #666e9c; border: 1px solid #adda9a;'>
                                        <tr>
                                            <td style=' background-color: #adda9a;' >日期</td>
                                            <td>".$result['data']['created_at']."</td>
                                        </tr>
                                        <tr>
                                            <td style=' background-color: #adda9a;'>信件主旨</td>
                                            <td>".$result['data']['topic']."</td>
                                        </tr>
                                        <tr>
                                            <td style=' background-color: #adda9a;'>類型</td>
                                            <td>".$result['data']['cat_name']."</td>
                                        </tr>
                                        <tr>
                                            <td style=' background-color: #adda9a;'>訂單編號</td>
                                            <td>".$result['data']['order_num']."</td>
                                        </tr>
                                        <tr>
                                            <td style=' background-color: #adda9a;'>內容</td>
                                            <td>".$result['data']['content']."</td>
                                        </tr>
                                        <tr style='background-color: pghtblue'>
                                            <td style=' background-color: #adda9a;'>回覆內容</td>
                                            <td><pre>".$result['data']['reply']."</pre></td>
                                        </tr>
                                    </table>
                                    <div style='
                                                text-aling: center;
                                                height: 40px;
                                                border-radius: 5px;'>
                                        <a style='  background-image: pnear-gradient(315deg, #adda9a 0%, #dcc5ef 74%);
                                                    width: 100px;
                                                    padding: 10px 25px;
                                                    cursor: pointer;
                                                    text-decoration: none' 
                                        href='localhost/'.WEB_ROOT.'/member.php?tab=helpdeskRecord'>前往客服紀錄</a>
                                    </div>
                                    <div class=''>
                                        <h4>聯絡薰衣草森林</h4>
                                        <p>TEL：<a href='tel:+886-4-25931066'>(04)2593-1066</a></p>
                                        <p>E-mail：<a href='mailto:lavenderforestcafe@gmail.com?subject=Lavendar Forest %20使用者意見回饋&body=您好,%0A我在 薰衣草森林 遭遇了底下的問題，請協助處理～ %0A%0A謝謝'>lavenderforestcafe@gmail.com</a></p>
                                        <p>ADD：<a href='https://goo.gl/maps/pb5HjaKtV1UCcrgz6' target='_blank'>426台中市新社區中興街20號</a> </p>
                                        <p><a href='https://www.messenger.com/t/lavender2001/' target='_blank'>FB messanger</a></p>
                                        <p><a href='https://pne.me/ti/p/iHcxJM2qvH' target='_blank'>LINE</a></p>
                                    </div>
                                </div>";
           
            
            $mail->AltBody = 'This is the body in plain text for non-HTML mail cpents';

            $mail->send();
            $result['info'] = "信件寄送成功";

        }
        break;
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
                beforeSendMail();
                // $mail->addAddress('lavenderforestcafe@gmail.com', 'Joe User');     //Add a recipient
                $mail->addAddress($email, $user['fullname']);               //Name is optional

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = '密碼重設';
                $mail->Body    = "<a href='localhost/".WEB_ROOT."/forgetPassword.php?id=$id&key=$key'>點選重設</a>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail cpents';

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
function beforeSendMail(){
    global $mail;
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
    $mail->setFrom('lavenderforestcafe@gmail.com', '薰衣草森林');
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);