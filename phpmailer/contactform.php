<?php
require "PHPMailer.php";
require "Exception.php";
require "SMTP.php";


$email=$_POST['contact_email'];
$name=$_POST['contact_name'];
$number=$_POST['contact_number'];
$message=$_POST['contact_message'];
$date_check_out=$_POST['contact_check_out'];
$date_check_in=$_POST['contact_check_in'];
$room=$_POST['contact_room'];


$mail = new PHPMailer\PHPMailer\PHPMailer(true); 
//Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tullio.pizz@gmail.com';                 // SMTP username
    $mail->Password = 'AmoreBarbara';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tullio.pizz@gmail.com', 'I suoni di valle Martina');
    $mail->addAddress('isuonidivallemartina@gmail.com', 'I suoni di valle Martina');     // Add a recipient
	$mail->AddCC("tullio.pizz@gmail.com");


 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "prenotazione ".$email;
    $mail->Body    = 
		'<p>Email: '.$email.'</p>'.
		'<p>Numero:  '.$number.'</p>'.
		'<p>Nome,Cognome:  '.$name.'</p>'.
		'<p>Data check in: '.$date_check_in.'</p>'.
		'<p>Data check out: '.$date_check_out.'</p>'.
		'<p>Stanza: '.$room.'</p>'.
		'<p>Messaggio:  '.$message.'</p>';
	
    $mail->send();
    echo 'true';
try {
    
} catch (Exception $e) {
	error_log('PHPMAILER EXCEPTION: '.$mail->ErrorInfo);
    echo 'false';
}

?>