<?php include __DIR__. '/parts/config.php'; ?>
<?php

include_once("connect.php");//連線資料庫 
$email = stripslashes(trim($_POST['mail'])); 
$sql = "select id,username,password from `t_user` where `email`='$email'"; 
$query = mysql_query($sql); 
$num = mysql_num_rows($query); 

if($num==0){//該郵箱尚未註冊！ 
echo 'noreg'; 
exit; 
}else{ 
$row = mysql_fetch_array($query); 
$getpasstime = time(); 
$uid = $row['id']; 
$token = md5($uid.$row['username'].$row['password']);//組合驗證碼 
$url = "/demo/resetpass/reset.php?email=".$email." 
&token=".$token;//構造URL 
$time = date('Y-m-d H:i'); 
$result = sendmail($time,$email,$url); 

if($result==1){//郵件傳送成功 
$msg = '系統已向您的郵箱傳送了一封郵件<br/>請登入到您的郵箱及時重置您的密碼！'; 
//更新資料傳送時間 
mysql_query("update `t_user` set `getpasstime`='$getpasstime' where id='$uid '"); 
}else{ 
$msg = $result; 
} 
echo $msg; 
} 
//傳送郵件 
function sendmail($time,$email,$url){ 
include_once("smtp.class.php"); 
$smtpserver = ""; //SMTP伺服器，如smtp.163.com 
$smtpserverport = 25; //SMTP伺服器埠 
$smtpusermail = ""; //SMTP伺服器的使用者郵箱 
$smtpuser = ""; //SMTP伺服器的使用者帳號 
$smtppass = ""; //SMTP伺服器的使用者密碼 
$smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); 
//這裡面的一個true是表示使用身份驗證,否則不使用身份驗證. 
$emailtype = "HTML"; //信件型別，文字:text；網頁：HTML 
$smtpemailto = $email; 
$smtpemailfrom = $smtpusermail; 
$emailsubject = "www.jb51.net - 找回密碼"; 
$emailbody = "親愛的".$email."：<br/>您在".$time."提交了找回密碼請求。請點選下面的連結重置密碼 
（按鈕24小時內有效）。<br/><a href='".$url."'target='_blank'>".$url."</a>"; 
$rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype); 

return $rs; 
}

?>