<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require_once 'conn.php';

    $id = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['correo'];
    if($id){

        $conenctaBD->query("DELETE FROM registro WHERE id_regitro = $id");

        header('location:lista-usuarios.php');

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
            $mail->addAddress($usuario);
            //$mail->addCC('luis@tygonsoft.com');
            $mail->addReplyTo('marcoantoniot089@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Se elimino un registro';
            $mail->Body = "<table><thead><tr style='border: 1px solid black;'><th>ID</th><th>Nombre</th><th>Correo</th></tr></thead><tr style='border: 1px solid black;'><td> ".$id." </td><td> ".$name." </td><td> ".$email.'</tr></table>';

            $mail->send();
            print "correo enviado";

        }
        catch(Exception $e){
            print "error {$mail->ErrorInfo}";
        }

    }
    else {
        print "no valid";
    }
?>