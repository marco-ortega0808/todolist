<?php
    require 'sin-inicio-sesion.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Todolist Web App</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light row">
        <div class="container-fluid">
            <div class="col-3 ">
            <img src="img/logo.png" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse col-6" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-center" aria-current="page" href="index.php">
                    <span class="fas fa-home"></span> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-center" aria-current="page" href="datos-usuario.php">
                    <span class="fas fa-arrow-circle-left"></span>Regresar
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link" href="cerrar-sesion.php"><span class="fas fa-sign-out-alt"></span>Cerrar sesión</a>
                </li>
            </div>
            </div>
        </div>
    </nav>
</header>
<div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3">My todo WebApp</h1>
                    <h3 class=" mb-3">
                        Actuliza tu contraseña
                    </h3>
                    <div class="contebox">
                    <form action="editar-password.php" class="mt-3 mb-3" method="POST">
                        <input type="password" name="ediPasword" placeholder="**************" class="form-control" >
                        <button type="submit" class="btn btn-primary mt-3" name="boton">ACTUALIZAR</button>
                    </form> 
                    </div>
                    <a href="datos-usuario.php">Cancelar</a>
                    <?php 
                        require_once 'conn.php';
                        session_start();
                        $usuario = $_SESSION['usuario']; 
                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;
                        use PHPMailer\PHPMailer\SMTP;
                        
                        if (isset($_POST['boton'])) {
                            
                            if ($_POST['ediPasword']) {
                                $ediPasword = $_POST['ediPasword'];
                                $hash = md5($ediPasword);
                                $consulta = mysqli_query ($conenctaBD, "SELECT *  FROM registro WHERE correo = '$usuario'",);
                                $row = mysqli_fetch_row($consulta);
                                $conenctaBD->query("UPDATE registro SET contrasena = '$hash' WHERE id_regitro = $row[0]") or die(mysqli_errno($conenctaBD));
                                $estado = "Actualización exitosa";
                                header('location:datos-usuario.php?resul='.$estado);
                        
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
                                    $mail->Subject = 'Has actualizado tu contraseña';
                                    $mail->Body = "Nueva: ".$ediPasword;
                        
                                    $mail->send();
                                    
                                }
                                catch(Exception $e){
                                    print "error {$mail->ErrorInfo}";
                                }
                            }
                            else {
                                print "error";
                            }
                        }
                    ?> 
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>