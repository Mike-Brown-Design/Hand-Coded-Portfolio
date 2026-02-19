<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('America/New_York');
require 'PHPMailer/PHPMailerAutoload.php';

//sumbission data
$ipaddress = $_SERVER['REMOTE_ADDR'];
$date = date('d/m/Y');
$time = date('H:i:s');

//form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 465;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "brown.michael701@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "Kelsey7980";
//Set who the message is to be sent from - same with Username
$mail->setFrom('mike.brown264@gmail.com', 'Website Inquiry');
//Set an alternative reply-to address
$mail->addReplyTo($email);
//Set who the message is to be sent to
$mail->addAddress('brown.michael701@gmail.com', 'Mike Brown');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML( "<p>You have recieved a new message from the enquiries form on your website.</p>
					  <p><strong>Name: </strong> {$name} </p>
					  <p><strong>Email Address: </strong> {$email} </p>
					  <p><strong>Phone: </strong> {$phone} </p>
					  <p><strong>Subject: </strong> {$subject} </p>
					  <p><strong>Message: </strong> {$message} </p>
					  <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>" );
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
