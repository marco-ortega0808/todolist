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
                <?php $areglo = $_GET['id'];
                            $name = $_GET['name'];
                            $correo = $_GET['correo'];
                            $rol = $_GET['rol'];
                        ?>
                <a class="nav-link active text-center" aria-current="page" href="editar-registro.php?id=<?php print $areglo;?>&name=<?php print $name;?>&correo=<?php print $correo;?>&rol=<?php print $rol;?>">
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
                    <h3 class="mb-3">Cambiar rol</h3>
                    <div class="contebox" style="text-align: -moz-center;">
                        <?php 
                            $rol = $_GET['rol'];
                            $areglo = $_GET['id'];
                            if($rol == 1 ){
                        ?><div >    
                            <form action="actualizar-rol.php" method="POST" class="col-2 text-start aling">
                            <div class="form-check col">
                                <input type="text" name="id" value="<?php print $areglo;?>" style="display: none;">
                                <input class="form-check-input" type="radio" name="roles" id="xampleRadios2" value="admin" checked>
                                <label class="form-check-label" for="exampleRadios2">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="roles" id="xampleRadios2" value="profesor" >
                                <label class="form-check-label" for="exampleRadios2">
                                    Profesor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="roles" id="xampleRadios3" value="alumno">
                                <label class="form-check-label" for="exampleRadios3">
                                    alumno
                                </label>
                            </div>
                                <input type="submit" name="submit" class="btn btn-primary mt-3" value="Actualizar">
                        </form>
                            </div>
                        <?php
                            }
                        ?>
                        <?php 
                            if($rol == 2 ){
                        ?>
                            <form action="actualizar-rol.php" method="POST" class="col-2 text-start">
                                <div class="col">
                                <input type="text" name="id" value="<?php print $areglo;?>" style="display: none;">
                                <input class="form-check-input col-3" type="radio" name="roles" id="xampleRadios2" value="admin" >
                                <label class="form-check-label col-3" for="exampleRadios2">
                                    Admin
                                </label>
                                </div>
                                <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="roles" id="xampleRadios2" value="profesor" checked>
                                <label class="form-check-label" for="exampleRadios2">
                                    Profesor
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="roles" id="xampleRadios3" value="alumno">
                                <label class="form-check-label" for="exampleRadios3">
                                    alumno
                                </label>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary mt-3" value="Actualizar">
                                </form>
                                <?php
                                    }
                                ?>
                        <?php 
                            if($rol == 3){
                        ?>
                            <form action="actualizar-rol.php" method="POST" class="col-2 text-start">
                                <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="roles" id="xampleRadios2" value="admin" >
                                <label class="form-check-label" for="exampleRadios2">
                                    Admin
                                </label>
                                </div>
                        
                                <div class="form-check">
                                <input type="text" name="id" value="<?php print $areglo;?>" style="display: none;">
                                <input class="form-check-input" type="radio" name="roles" id="ampleRadios2" value="profesor" >
                                <label class="form-check-label" for="exampleRadios2">
                                    Profesor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="roles" id="ampleRadios3" value="alumno" checked>
                                <label class="form-check-label" for="exampleRadios3">
                                    alumno
                                </label>
                            </div>
                                <input type="submit" name="submit" class="btn btn-primary mt-3" value="Actualizar">
                                </form>     
                        <?php
                            }
                        ?>
                    <a href="editar-registro.php?id=<?php print $areglo;?>&name=<?php print $name;?>&correo=<?php print $correo;?>&rol=<?php print $rol;?>">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>