<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ''){
        header('location:inicia.sesion.php');
        die();
    }
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
                <?php $id = $_GET['id'];
                            $name = $_GET['name'];
                            $correo = $_GET['correo']?>
                <a class="nav-link active text-center" aria-current="page" href="editar-registro.php?id=<?php print $id;?>&name=<?php print $name;?>&correo=<?php print $correo;?>">
                    <span class="fas fa-arrow-circle-left"></span>Regresar
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link" href="cerrar-sesion.php"><span class="fas fa-sign-out-alt"></span>Cerrar sesión</a>
                </li>
            </div>
        </div>
    </nav>
</header>
<div class="row">
        <div class="container">
            <div class="col-md-12">
                  
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3">My todo WebApp</h1>
                    <h3>
                        Actulizar datos
                    </h3><div class="contebox">
                    <form action="actualizar-nombre.php" method="POST">
                        <?php
                            $id = $_GET['id'];
                            $name = $_GET['name'];
                            $correo = $_GET['correo']
                        ?>
                        <input type="text" name="nombre" value="<?php print $name; ?>" class="col-6 mb-3 mt-2" >
                            <input type="text" style="display: none;" name="idr" value="<?php print $id?>">
                            <input type="email" name="email" style="display: none;" value="<?php print $correo;?>">
                            <button type="submit" class="btn btn-primary " name="botonName">Actualizar</button>
                       
                    </form> </div>
                    <?php 
                        require_once 'conn.php';
                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;
                        use PHPMailer\PHPMailer\SMTP;
                        
                        if (isset($_POST['botonName'])) {
                            
                            if ($_POST['nombre']) {
                                require 'conn.php';
                                $name = $_GET['name'];
                                $nombre = $_POST['nombre'];
                                $idr = $_POST['idr'];
                                $core = $_POST['email'];
                                $conenctaBD->query("UPDATE registro SET nombre = '$nombre' WHERE id_regitro = $idr") or die(mysqli_errno($conenctaBD));
                                $respueta = "Nombre actualizado";
                                header('location:editar-registro.php?res='.$respueta.'&name='.$nombre.'&correo='.$core);
                        
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
                                    $mail->addAddress($core);
                                    //$mail->addCC('luis@tygonsoft.com');
                                    $mail->addReplyTo('marcoantoniot089@gmail.com');
                        
                                    $mail->isHTML(true);
                                    $mail->Subject = 'Has actualizado tu nombre';
                                    $mail->Body = "Por<br>Nuevo: ".$nombre;
                        
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