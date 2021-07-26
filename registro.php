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
</head>
<body>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3 text-decoration">
                        <a href="http://practica-php.test/todolist/index.php"> 
                        My todo WebApp</a></h1>

                    <form action="agrega-registro.php" method="POST">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                        <input type="text" name="correo" class="form-control" placeholder="Correo">
                        <input type="text" name="contrasena" class="form-control" placeholder="Contraseña">
                        <button type="submit" class="btn btn-primary mt-3" name="agregaRegistro">Agrgar registro</button>
                    </form>
                </div>
    
            </div>
    
        </div>
    
    </div>