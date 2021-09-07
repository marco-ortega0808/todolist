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
                    <a class="nav-link active text-center" aria-current="page" href="roles.php">
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
<section></section>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                  
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3">My todo WebApp</h1>
                    <h3>Editar rol</h3>
                    <div class="contebox">
                    <?php
                            require_once 'conn.php';
                            $id = $_GET['id'];
                            $nameRol = $_GET['name'];
                            
                        ?>
                        <form class="mb-3" action="editar-rol.php" method="POST">
                        <input type="text" name="rol" value="<?php print $nameRol; ?>" class="form-control" >
                        <input style="display: none;" type="text" name="id" value="<?php print $id; ?>">
                        <button type="submit" class="btn btn-primary mt-3" name="boton">Actualizar</button>
                       
                    </form> 
                    </div>
                    <a href="roles.php">Cancelar</a>
                    <?php 
                    $res = $_GET['res'];
                    print $res;?>
                    <?php
                    if (isset($_POST['boton'])) {
                                                
                        if ($_POST['rol']) {
                            $idr = $_POST['id'];
                            $rol = $_POST['rol'];
                            
                            $conenctaBD->query("UPDATE roles SET name_rol = '$rol' WHERE id = $idr") or die(mysqli_errno($conenctaBD));
                            $estado = "Actualización exitosa";
                            header('location:roles.php?respuesta='.$estado);
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>
</body>
</html>