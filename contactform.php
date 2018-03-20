<?php
require "htdocs/isuonidivallemartina/phpmailer/PHPMailer.php";
require "htdocs/isuonidivallemartina/phpmailer/Exception.php";
require "htdocs/isuonidivallemartina/phpmailer/SMTP.php";


$email=$_POST['contact_email'];
$name=$_POST['contact_name'];
$number=$_POST['contact_number'];
$message=$_POST['contact_message'];
$date_check_out=$_POST['contact_check_out'];
$date_check_in=$_POST['contact_check_in'];


$mail = new PHPMailer\PHPMailer\PHPMailer(true); 
//Server settings
    $mail->SMTPDebug = 5;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tullio.pizz@gmail.com';                 // SMTP username
    $mail->Password = 'AmoreBarbara';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tullio.pizz@gmail.com', 'Mailer');
    $mail->addAddress('tullio.pizz@outlook.it', 'Joe User');     // Add a recipient



 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
echo 'Message pre sent';
    $mail->send();
    echo 'Message has been sent';
try {
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>