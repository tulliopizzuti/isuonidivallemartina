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
    $mail->Host = 'smtps.aruba.it';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'prenotazioni@isuonidivallemartina.it';                 // SMTP username
    $mail->Password = 'Progetto1';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('prenotazioni@isuonidivallemartina.it', 'I suoni di valle Martina');
    $mail->addAddress('isuonidivallemartina@gmail.com', 'I suoni di valle Martina');     // Add a recipient
	$mail->AddCC("giusyagresta@alice.it");


 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "prenotazione ".$email;
    $mail->Body    = 
		'<p>Email: '.$email.'</p>'.
		'<p>Numero:  '.$number.'</p>'.
		'<p>Nome, Cognome:  '.$name.'</p>'.
		'<p>Data check in: '.$date_check_in.'</p>'.
		'<p>Data check out: '.$date_check_out.'</p>'.
		'<p>Stanza: '.$room.'</p>'.
		'<p>Messaggio:  '.$message.'</p>';
	
    $mail->send();
$mail_2=new PHPMailer\PHPMailer\PHPMailer(true); 
//Server settings
    $mail_2->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail_2->isSMTP();                                      // Set mailer to use SMTP
    $mail_2->Host = 'smtps.aruba.it';  // Specify main and backup SMTP servers
    $mail_2->SMTPAuth = true;                               // Enable SMTP authentication
    $mail_2->Username = 'prenotazioni@isuonidivallemartina.it';                 // SMTP username
    $mail_2->Password = 'Progetto1';                           // SMTP password
    $mail_2->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail_2->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail_2->setFrom('prenotazioni@isuonidivallemartina.it', 'I suoni di valle Martina');
	$mail_2->addAddress($email);     // Add a recipient
	
    //Content
    $mail_2->isHTML(true);                                  // Set email format to HTML
    $mail_2->Subject = "prenotazione ".$email;
    $mail_2->Body    = 
		'<p>Sarai contattato a breve per la conferma della prenotazione. Ti ringraziamo per averci scelto per la tua vacanza.</p>';
	
    $mail_2->send();		
    echo 'true';
try {
    
} catch (Exception $e) {
	error_log('PHPMAILER EXCEPTION: '.$mail->ErrorInfo);
    echo 'false';
}

?>