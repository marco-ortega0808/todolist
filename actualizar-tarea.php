<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'conn.php';
    
    $idTareas = $_GET['id_tarea'];
    $info_tarea = $_GET['info_tarea'];
    $estado = $_GET['estado'];

    if($estado="Nueva"){
        $conenctaBD->query("UPDATE tareas SET estado = 'En progreso' WHERE id_tarea = $idTareas") or die(mysqli_errno($conenctaBD));
        header('location:index.php');

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
            //$mail->addCC('luis@tygonsoft.com');
            $mail->addReplyTo('marcoantoniot089@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Tarea en progreso';
            $mail->Body = "<table><thead><tr style='border: 1px solid black;'><th>ID</th><th>TAREA</th><th>STATUS</th></tr></thead><tr style='border: 1px solid black;'><td> ".$idTareas." </td><td> ".$info_tarea.' </td> <td> En progreso </td></tr></table>';

            $mail->send();
            print "correo enviado";

        }
        catch(Exception $e){
            print "error {$mail->ErrorInfo}";
        }
    }
    
    else {
        print 'no fuciona';
    }
?>