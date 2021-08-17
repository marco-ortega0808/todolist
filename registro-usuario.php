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
              <a class="nav-link active text-center" aria-current="page" href="inicio-sesion.php">
                <span class="fas fa-sign-in-alt"></span>
                Iniciar sesión
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<header>

    <div class="row">
        <div class="container">
            <div class="col-md-12">
                
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3 text-decoration">
                        My todo WebApp
                    </h1>

                    <form action="agrega-usuario.php" method="POST">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                        <input type="text" name="correo" class="form-control" placeholder="Correo">
                        <input type="password"  name="contrasena" class="form-control encript" placeholder="Contraseña">
                        <input type="text" name="rol" style="display: none;" value="usuario">
                        <button type="submit" class="btn btn-primary mt-3" name="agregaRegistro">Agrgar registro</button>
                    </form>
                    <?php
                     $res =  $_GET['respuesta'];
                     print $res;
                     ?>
                </div>
    
            </div>
    
        </div>
    
    </div>

</body>
</html>