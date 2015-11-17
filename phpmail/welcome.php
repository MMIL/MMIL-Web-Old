<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host ='smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';                 // SMTP username
$mail->Password = '';                 // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = $_POST['email'];
$mail->FromName ='Feedback From JMIL WEB';
$mail->addAddress('spyshiv@gmail.com', 'Shiv Baran Singh');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =$_POST['subject'];
$mail->Body    = 'Message From <b>'.$_POST['subject'].'('.$_POST['email'].')</b>&nbsp;<br>'.$_POST['message'];


if(!$mail->send()) {
    $confirmation='Sorry '.$_POST['subject'].'! Your feedback could not be sent. Please Try Again.';
	 echo "<script type='text/javascript'>alert('$confirmation');
              window.location = '../index.html';
		      </script>";
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
     $confirmation='Thanks '.$_POST['subject'].'! For your Feedback.';
	 echo "<script type='text/javascript'>alert('$confirmation');
              window.location = '../index.html';
		      </script>";
}