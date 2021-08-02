<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <title>Todolist Web App</title>
</head>
<body>
<div class="row">
        <div class="container">
            <div class="col-md-12">
                  

                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3">My todo WebApp</h1>
                    <form action="editar_tarea.php" method="POST">
                        <?php
                            require_once 'conn.php';
                            $idTareas = $_GET['id_tarea'];
                            $infoTarea = $_GET['info_tarea'];
                            
                        ?>
                        <input type="text" name="tareaEditada" value="<?php print $infoTarea; ?>" class="form-control" >
                        <input style="display: none;" type="text" name="id" value="<?php print $idTareas; ?>">
                        <input style="display: none;" type="text" name="tarea" value="<?php print $infoTarea; ?>">
                        <button type="submit" class="btn btn-primary mt-3" name="ediTarea">Editar tarae</button>
                       
                    </form> 
                    <?php require_once 'conn.php';

                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;
                        use PHPMailer\PHPMailer\SMTP;

                        if (isset($_POST['ediTarea'])) {
                            
                            if ($_POST['tareaEditada']) {
                               
                                $editarTarea = $_POST['tareaEditada'];
                                $id = $_POST['id'];
                                $anteriorTarea = $_POST['tarea'];
                                $conenctaBD->query("UPDATE tareas SET info_tarea = '$editarTarea' WHERE id_tarea = $id") or die(mysqli_errno($conenctaBD));
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
                                    $mail->Subject = 'Has editado tu tarea';
                                    $mail->Body = $id." ".$anteriorTarea." por <br> ".$id." ".$editarTarea;
                                    $mail->Body = "<table><thead><tr style='border: 1px solid black;'><th>ID</th><th>TAREA</th><th>MENSAJE</th></tr></thead><tr style='border: 1px solid black;'><td> ".$id." </td> ".$anteriorTarea.' </td><td> VIEJO</td></tr><tr><td> '.$id.' </td><td>' .$editarTarea.' </td><td> NUEVO</td></tr></table>';
                        
                                    $mail->send();
                                    print "correo enviado";
                        
                                }
                                catch(Exception $e){
                                    print "error {$mail->ErrorInfo}";
                                }

                            }
                        } 
                    ?> 
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>