<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require ('PHPMailer/src/Exception.php');
require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/SMTP.php');


$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();                  
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'marcoantoniot089@gmail.com';
    $mail->Password   = 'marco9908P';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('marcoantoniot089@gmail.com', 'Marco Antonio Ortega Trejo');
    $mail->addAddress('poyoespro@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'correo de prueba';
    $mail->Body = '';

    $mail->send();
    print "correo enviado";

}
catch(Exception $e){
    print "error {$mail->ErrorInfo}";
}
?>