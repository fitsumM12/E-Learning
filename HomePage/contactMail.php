<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  require 'vendor/autoload.php';


  class myPHPMailer{
    public static function sendEmail($from,$content){

      $mail = new PHPMailer();
     

      $mail->IsSMTP();
      $mail->SMTPSecure = 'ssl'; 
      $mail->Port = 465;  
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'ourgroupemail2018@gmail.com';
      $mail->Password = 'Tecoder@123';
     
      //set mail header

      $mail->setFrom($from, 'Customer Contact');
      $mail->addReplyTo('ourgroupemail2018@gmail.com', 'Temam');
      $mail->addAddress('ourgroupemail2018@gmail.com','Temam');
      $mail->AddBCC('bcc2@example.com', 'Temam');
      $mail->AddBCC('bcc3@example.com', 'Temam');

      $mail->isHTML(true);

      $mail->Subject = "Global E-Learning Registration ".date('Y');
      $mailcontnt = $content;
      $mail->addEmbeddedImage('images/love.png', 'site Logo');
      $mail->Body = $mailcontnt;
      $mail->Body = $mail->Body. '<img src="cid:site Logo"> Mail body in HTML';
      $mail->AltBody = 'This is the plain text version of the email content';
      return true;

      if(!$mail->send()){
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
          echo 'Message has been sent';

      }
    }
  }
        // $mail->SMTPDebug = 1;//SMTP::DEBUG_SERVER;      // $mail->SMTPDebug = 2;
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; port 587;
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS port 465;
       // $mail->CharSet = PHPMailer::CHARSET_UTF8;

?>
