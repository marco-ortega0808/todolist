<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ''){
        print "No has iniciado sesión";
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist Web App</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
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
                <span class="fas fa-home"></span>Home
                </a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="cerrar-sesion.php"><span class="fas fa-sign-out-alt"></span>Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<header>
<section>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3 text-decoration">
                        My todo WebApp
                    </h1>
                    <h3>
                        Actuliza tus datos
                    </h3>
                    <?php
                            $usuario = $_SESSION['usuario'];
                            require 'conn.php';
                            $consulta = mysqli_query ($conenctaBD, "SELECT *  FROM registro WHERE correo = '$usuario'",);
                            $row = mysqli_fetch_row($consulta);
                    ?>
                        <div class="container">
                            <div class="row mt-3 mb-3">
                                <span class="fas fa-user col"></span>
                                <label class="col-6 text-start">
                                    <?php 
                                        print $row[1];
                                    ?>
                                </label>
                                <a href="editar-nombre.php?nombre=<?php print $row[1];?>" class="col-4 text-start"> Editar Nombre </a>
                            </div>
                            <div class="row mb-3">
                                <span class="fas fa-at col"></span>
                                <label class="col-6 text-start">
                                    <?php 
                                        print $row[2];
                                    ?>
                                </label>
                                <a href="editar-correo.php?correo=<?php print $row[2];?>" class="col-4 text-start"> Editar Correo </a>
                            </div>
                            <div class="row mb-3">
                                <span class="fas fa-unlock-alt col"></span>
                                <label class="col-6 text-start">
                                    **************
                                </label>
                                <a href="editar-password.php" class="col-4 text-start"> Editar Contraseña </a>
                            </div>
                        </div>    
                        <p>
                            <?php
                                $mostrarEstado = $_GET['respuesta'];
                                print $mostrarEstado;
                            ?>
                        </p>

                    <?php
                        $nombre = $_POST['nombre'];
                        $email = $_POST['correo'];
                        $pasword = $_POST['pasword'];
                        $hassh = md5($pasword);
     
                        if($nombre || $email || $pasword){
                            $conenctaBD->query("UPDATE registro SET nombre = '$nombre', correo = '$email', contrasena = '$hassh' WHERE id_regitro = $row[0]") or die(mysqli_errno($conenctaBD));
                            $estado = "Actualización exitosa";
                            header('location:datos-usuario.php?respuesta='.$estado);
                        }
                    ?>

                </div>
    
            </div>
    
        </div>
    
    </div>
</section>
</body>
</html>