<?php
require '../PHPMailerAutoload.php';

$mail = new PHPMailer;
/**$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
*/
$mail->Host = "41.204.200.12";
$mail->Port = 25;
$mail->SMTPAuth = false;
//$mail->Username = "aidan@darkblue.co.za";
//$mail->Password = "Amt20040515!";
$mail->setFrom('aidan@darkblue.co.za', 'First Last');
$mail->addReplyTo('aidan@darkblue.co.za', 'First Last');
$mail->addAddress('aidantaylor140@gmail.com', 'John Doe');
$mail->Subject = 'PHPMailer SMTP test';
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
