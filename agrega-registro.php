<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require_once 'conn.php';
    
    if (isset($_POST['agregaRegistro'])) {
        if ($_POST['nombre'] && $_POST['correo'] && $_POST['contrasena']) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $hassh = md5($contrasena);
            $conenctaBD->query("INSERT INTO registro (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$hassh')");
            header('location:registro.php');

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
                $mail->addAddress($correo);
                //$mail->addCC('luis@tygonsoft.com');
                $mail->addReplyTo('marcoantoniot089@gmail.com');
            
                $mail->isHTML(true);
                $mail->Subject = 'Bienvenido ¡Gracias por registrarte!';
                $mail->Body = '<h1>Te damos la bienvenida '.$nombre.'</h1><br> <p><b>Datosingresado</b> <br><b>Correo</b>: '.$correo.' <br> <b>Contraseña</b>: '.$contrasena.' </p>';
            
                $mail->send();
                
            }
            catch(Exception $e){
                print "error {$mail->ErrorInfo}";
            }

        }
    }
    else {
        print("Error");
    }
?>