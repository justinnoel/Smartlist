<?php
include('phpmailer.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
  $mail->setFrom('hello@smartlist.ga', 'Mailer');
  $mail->addAddress('hello@smartlist.ga', 'Joe User');     //Add a recipient
  $mail->addAddress('hello@smartlist.ga');               //Name is optional
  $mail->addReplyTo('hello@smartlist.ga', 'Information');

  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
