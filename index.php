<?php
if (!isset ($EmailADDR)) $EmailADDR = "";
if (!isset ($Subject)) $Subject = "";
$message = "hello";


				include_once("Mail.php");
				include_once('Mail/mime.php');   


				$Host = "dedi12.cpt2.host-h.net";
				$Username = "aidan@darkblue.co.za";
				$Password = "Amt20040515!";
				$From_Name = "Aidan";
				$From_Email = "aidan@darkblue.co.za";

				 
				$From = $From_Name . " <" . $From_Email . ">"; 
				$To = "aidan@darkblue.co.za";

				$crlf = "\n";         
				$headers = array(                         
				'From'          => $From,                         
				'Return-Path'   => $From_Email,                      
				'Subject'       => $Subject,
				'To'            => $To                         );   
								   
				////$message .= $_SESSION['CO_SIGN'] . "\n\n\n";
								  
				$mime = new Mail_mime($crlf);                 
 
				$mime->setHTMLBody($message); 
												 
				$body = $mime->get();         
				$headers = $mime->headers($headers);      
				
				$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => false, 'username' => $Username, 'password' => $Password));
				  
				$mail = $SMTP->send($EmailADDR, $headers, $body);

				echo "<p align='center'><b><font face='Tahoma' size='4'>";

				if (PEAR::isError($mail)){
				echo($mail->getMessage());
				} else {
				echo("The Booking Confirmation For Booking No. Was Emailed To:<br></b><i><br>" . $EmailADDR . "</i><br>");
				}
?>