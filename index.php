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
              <a class="nav-link active text-center" aria-current="page" href="datos-usuario.php">Usuario</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="cerrar-sesion.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3">My todo WebApp</h1>
                    <form action="agregar-tarea.php" method="POST">
                        <input type="text" name="tarea" placeholder="Escribe el nombre de tu tarea a realizar" class="form-control" >
                        <button type="submit" class="btn btn-primary mt-3" name="agregaTarea">AGRGAR TAREA</button>
                    </form>
                </div>

                    <table class="table mt-3">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>TAREA</th>
                                <th>STATUS</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        
                        <?php
                            require 'conn.php';

                            $registroTarea = $conenctaBD->query("SELECT * FROM tareas ORDER BY id_tarea ASC");

                            for ($resiveTarea =0; $resiveTarea = $registroTarea->fetch_array(); $resiveTarea++) {
                        ?>

                            <tr class="text-center">
                                <td class="text-center"><?php print $resiveTarea['id_tarea'];?></td>
                                <td class="text-left "><?php print $resiveTarea['info_tarea'] ?></td>
                                <td class="text-center <?php $resiveTarea['estado'] == 'Finalizada' ? print 'text-success' :  print 'text-warning'; $resiveTarea['estado'] == 'Nueva' ? print 'text-light' : ''?>">
                                <?php print $resiveTarea['estado'];?>
                                </td>

                                <td>
                                    <?php if($resiveTarea['estado'] == "Nueva" ){?>
                                        <a href="actualizar-tarea.php?id_tarea=<?php print $resiveTarea['id_tarea'];?>&info_tarea=<?php print $resiveTarea['info_tarea'];?>&estado=<?php print $resiveTarea['estado'];?>" class="btn btn-warning">
                                            <span class="fas fa-stopwatch"></span>
                                        </a>
                                    <?php
                                        }
                                    ?>

                                    <?php if($resiveTarea['estado'] == "En progreso"){ ?>
                                        <a href="tarea-finalizada.php?id_tarea=<?php print $resiveTarea['id_tarea'];?>&info_tarea=<?php print $resiveTarea['info_tarea'];?>&estado=<?php print $resiveTarea['estado'];?>" class="btn btn-success">
                                            <span class="fas fa-check"></span>
                                        </a>
                                    <?php
                                        }
                                    ?>

                                    <?php if($resiveTarea['estado'] == "Finalizada"){ ?>
                                        <a href="" class="btn btn-success">
                                            <span class="fas fa-clipboard-check"></span>
                                        </a>
                                    <?php
                                        }
                                    ?>

                                    <?php if($resiveTarea['estado'] == "Nueva" ||$resiveTarea['estado'] == "En progreso") {?>
                                        <a href="editar_tarea.php?id_tarea=<?php print $resiveTarea['id_tarea'];?>&info_tarea=<?php print $resiveTarea['info_tarea'];?>" class="btn btn-info">
                                            <span class="fas fa-pencil-alt"></span>
                                        </a>
                                        <!--<script> 
                                            function mostrar(){
                                                var muestra = document.getElementsByClassName("text-left");
                                                for(var i = 0; i< muestra.length; i++){
                                                    muestra[i].classList.toggle('ocultar');
                                                }
                                            }    
                                        </script>-->
                                    <?php
                                    }
                                    ?>

                                    <a href="eliminar-tarea.php?id_tarea=<?php print $resiveTarea['id_tarea'];?>&info_tarea=<?php print $resiveTarea['info_tarea'];?>&estado=<?php print $resiveTarea['estado'];?>" class="btn btn-danger">
                                        <span class="fa fa-trash-alt"></span>
                                    </a>
                                    
                                </td>

                            </tr>
                            
                            <tbody>
                        <?php
                        }
                        ?>                       
                    </tbody>
                </table>
        </div>
    </div>
    
</body>
</html>