<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

if($_POST["submit"]=="query") 
{
    $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "soumyadpsdhn@gmail.com";
  $mail->Password   = "dpsrollno19mw";

  $mail->IsHTML(true);
  $sender=$_POST["sender"];
  $mail->AddAddress("soumyabrata040@gmail.com", "BookShack");
  $mail->SetFrom("soumyadpsdhn@gmail.com", $sender);
  //$mail->AddReplyTo("reply-to-email", "reply-to-name");
  //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
  $message=$_POST["message"];
  $mail->Subject = "Query from bookstore";
  $content = "<b>I have a query.</b><br/>" .$message ;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
  } else {
    echo "Your Message has been successfully sent! Our customer executive would respond shortly.";
  }

}
?>
<html>
<body>
<br/>
<br/>
<a href="index.php">Home</a>