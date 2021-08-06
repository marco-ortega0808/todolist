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
            $resul = "Registro exitoso";
            header('location:inicio-sesion.php?resulta='.$resul);

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
            
                $mail->setFrom('marcoantoniot089@gmail.com', 'WebApp');
                $mail->addAddress($correo);
                //$mail->addCC('luis@tygonsoft.com');
                $mail->addReplyTo('marcoantoniot089@gmail.com');
            
                $mail->isHTML(true);
                $mail->Subject = 'Gracias por registrarte';
                $mail->Body = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"></head> <html><h1>Te damos la bienvenida '.$nombre.'</h1><br> <p><b>Datos ingresado:</b> <br><b>Correo</b>: '.$correo.' <br> <b>Contraseña</b>: '.$contrasena.' </p> <br><a href="http://practica-php.test/todolist/inicio-sesion.php">Inicia tu sesión</a></html>';
            
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