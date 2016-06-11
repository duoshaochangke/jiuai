<?php 
header("Content-type: text/html; charset=utf-8"); 
// 必要导入
 require("class.phpmailer.php");
 require("class.smtp.php");
 date_default_timezone_set('Asia/Shanghai');//设定时区东八区
$mail = new PHPMailer(); //建立邮件发送类

// 接收申请数据
$title = $_POST['title'];
$link = $_POST['link'];
$author = $_POST['author'];
$contact = $_POST['contact'];
// echo $sitedesc." ".$siteurl.' '.$sitename;

$address = "";   //邮件接收者
$mail->IsSMTP(); // 使用SMTP方式发送
$mail->CharSet ="UTF-8";//设置编码  否则发送中文乱码
$mail->Host = "smtp.qq.com"; // 您的企业邮局域名
$mail->SMTPAuth = true; // 启用SMTP验证功能
$mail->Username = ""; // 邮局用户名(请填写完整的email地址)
$mail->Password = ""; // 邮局密码

$mail->From = ""; //邮件发送者email地址
$mail->FromName = "";           //邮件发送者的名称     
$mail->AddAddress($address, "");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//$mail->AddReplyTo("", "");

//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
//$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式

$mail->Subject = "久艾分享投稿"; //邮件标题
$mail->Body = "文章标题：".$title."\n文章链接：".$link."\n投稿人：".$author."\n联系方式：".$contact; //邮件内容
// $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
 $mail->Send();  //发送邮件
 header("location:../baoliao.php");
?>

