<?php
    require 'sin-inicio-sesion.php'
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
                    <span class="fas fa-home"></span> Home
                    </a>
                </li>
                <li class="nav-item dropdown text-center">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fas fa-user btn-menu"></span>Usuarios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item text-center" href="lista-usuarios.php"><span class="fas fa-clipboard-list"></span>lista</a></a></li>
                      
                    <li><a class="dropdown-item text-center" href="registro.php"><span class="fas fa-user-edit"></span>Agregar usuario</a></li>
                        
                    </ul>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link" href="cerrar-sesion.php"><span class="fas fa-sign-out-alt"></span>Cerrar sesión</a>
                </li>
            </div>
        </div>
    </nav>
</header>
<section>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3 text-decoration">
                        My todo WebApp
                    </h1>
                    <h3>Roles</h3>
                    <div class="contebox">
                    <form action="roles.php" method="POST">
                        <input type="text" name="rol" placeholder="Escribe un nuevo rol" class="form-control" >
                        <div>
                        <button type="submit" class="btn btn-primary mt-3 " name="agregarRol">Guardar</button></div>  
                    </div>
                <?php
                 $estado = $_GET['respuesta'];
                 print $estado;
                 ?></div>
                 </form>
                 <div class="contebox">
                    <table class="table table-responsive mt-3 table table-striped ">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>ROL</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        
                        <?php

                            require 'conn.php';
                            $registroTarea = mysqli_query ($conenctaBD,"SELECT * FROM roles ");
                            for ($resiveTarea =0; $resiveTarea = $areglo= mysqli_fetch_row($registroTarea); $resiveTarea++) {

                        ?>  
                            
                            <tr class="text-center">
                            <td class="text-center"><?php print $areglo[0];?></td>
                            <td class="text-left "><?php print $areglo[1]; ?></td>
                            <td class="text-center">
                                
                                <a href="editar-rol.php?id=<?php print $areglo[0];?>&name=<?php print $areglo[1];?>" class="btn btn-info">
                                            <span class="fas fa-pencil-alt"></span>
                                </a>
                                <a href="eliminar-rol.php?id=<?php print $areglo[0];?>" class="btn btn-danger btn-top">
                                        <span class="fa fa-trash-alt"></span>
                                    </a>
                </div><?php }?>
            </div></div>
            <?php
            if (isset($_POST['agregarRol'])) {
                if($_POST['rol']){
                    $nameRol = $_POST['rol'];
                    $conenctaBD->query("INSERT INTO roles (name_rol) VALUES ('$nameRol')");
                    header('location:roles.php');
                }
            }
            ?>
        </div>
    </div>
</section>
</body>
</html>