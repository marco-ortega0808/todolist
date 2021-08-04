<?php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;
     use PHPMailer\PHPMailer\SMTP;

    require 'conn.php';
    $email = $_POST['correo'];
    $num_valida = $_POST['valida'];
    $pasword = $_POST['pasword'];
    $codigo = $_POST['code'];
    $hassh = md5($pasword);
    if($num_valida == $codigo){
        $consulta = mysqli_query ($conenctaBD, "SELECT *  FROM registro WHERE correo = '$email'",);
        $row = mysqli_fetch_row($consulta);
        $conenctaBD->query("UPDATE registro SET contrasena = '$hassh' WHERE id_regitro = $row[0]") or die(mysqli_errno($conenctaBD));

    require ('PHPMailer/src/Exception.php');
    require ('PHPMailer/src/PHPMailer.php');
    require ('PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                  
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'marcoantoniot089@gmail.com';
        $mail->Password   = 'marco9908P';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('marcoantoniot089@gmail.com', 'WebApp');
        $mail->addAddress($email);
        $mail->addReplyTo('marcoantoniot089@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Se a cambiado tu contraseña';
        $mail->Body = 'Tu nueva contraseña es: <br>'.$pasword ;

        $mail->send();

    }
        catch(Exception $e){
        print "error {$mail->ErrorInfo}";
    }
    header('location:inicio-sesion.php');
    }
    else {
        header('location:restablecer.php?emaill='.$email);
    }

?>