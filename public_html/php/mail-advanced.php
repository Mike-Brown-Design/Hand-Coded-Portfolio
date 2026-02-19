<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require_once("PHPMailer/class.phpmailer.php");
require_once("PHPMailer/class.smtp.php");

//sumbission data
$ipaddress = $_SERVER['REMOTE_ADDR'];
$date = date('d/m/Y');
$time = date('H:i:s');

//form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$website = $_POST['website'];
$message = $_POST['message'];
$date = $_POST['date'];
$radioSubject = $_POST['radioSubject'];


//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.example.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "yourname@example.com";
//Password to use for SMTP authentication
$mail->Password = "yourpassword";
//Set who the message is to be sent from
$mail->setFrom('noreply@example.com', 'Quadra Exclusive Theme');
//Set an alternative reply-to address
$mail->addReplyTo($email);
//Set who the message is to be sent to
$mail->addAddress('whoto@example.com', 'John Doe');
//If you don't want to attach any files, remove that code below
$uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['userfile']['name']));
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
$mail->addAttachment($uploadfile, 'Customer File');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//HTML body of message
$mail->msgHTML( "<p>You have recieved a new message from the enquiries form on your website.</p>
                 <p><strong>Name: </strong> {$name} </p>
                 <p><strong>Email Address: </strong> {$email} </p>
                 <p><strong>Subject: </strong> {$subject} </p>
                 <p><strong>Website: </strong> {$website} </p>
                 <p><strong>Message: </strong> {$message} </p>
                 <p><strong>date: </strong> {$date} </p>
                 <p><strong>radioSubject: </strong> {$radioSubject} </p>
                 <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>" );
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

