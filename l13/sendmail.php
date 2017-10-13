<?php 
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();// Set mailer to use SMTP
    $mail->Host = "smtp.gmail.com";// Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'truongnhatnam2204@gmail.com';                 // SMTP username
    $mail->Password = 'hoanganhq12345'; // SMTP password
    $mail->SMTPSecure = "ssl"; // Enable TLS encryption, `ssl` also accepted
    //Recipients
    $mail->setFrom('truongnhatnam2204@gmail.com', 'SinhvienPoly');

    $mail->addAddress('thienth@fpt.edu.vn', 'ThienTH Poly');     // Email nhan
    $mail->addAddress('haotvph04791@fpt.edu.vn', 'truong van hao');               // Name is optional
    $mail->addReplyTo('thienth32@gmail.com', 'thienth');

    //Attachments
    // $mail->addAttachment('./public/images/doan-chi-binh.jpg');         // Add attachments

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test send email from localhost';
    $mail->Body    = '
		<h1>Hello world!</h1>
		<strong>Da gui mail thanh cong!</strong>
    ';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}



 ?>