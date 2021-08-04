<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require_once 'conn.php';
    session_start();
    $usuario = $_SESSION['usuario']; 
    if (isset($_POST['agregaTarea'])) {
        if ($_POST['tarea'] ) {
            $tarea = $_POST['tarea'];
            $conenctaBD->query("INSERT INTO tareas (info_tarea, estado) VALUES ('$tarea', 'Nueva')");
            header('location:index.php');
//------------------envio de correo-------
            
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
                $mail->Subject = 'Alta de nueva tarea';
                $mail->Body = "<table><thead><tr style='border: 1px solid black;'><th>TAREA</th><th>STATUS</th></tr></thead><tr style='border: 1px solid black;'><td>".$tarea.'</td> <td>Nueva</td></tr></table>';
            
                $mail->send();
                
            }
            catch(Exception $e){
                print "error {$mail->ErrorInfo}";
            }
       
        }
        else {
            
            header('location:index.php');
        }
//----------------------------------------
        
    }
    else {
        print("Error");
    }
?>