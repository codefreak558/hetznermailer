<?php
require '../PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->Host = "hostname";
$mail->Port = 25;
$mail->SMTPAuth = false;
$mail->setFrom('email@email.com', 'First Last');
$mail->addReplyTo('email@email.com', 'First Last');
$mail->addAddress('email@email.com', 'John Doe');
$mail->Subject = 'PHPMailer SMTP test';
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
