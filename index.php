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
                <?php 
                    $usuario = $_SESSION['usuario'];
                    require 'conn.php';
                    $consulta = mysqli_query ($conenctaBD, "SELECT nombre  FROM registro WHERE correo = '$usuario'",);
                    $row = mysqli_fetch_row($consulta);
                ?>
              <a class="nav-link active text-center" aria-current="page" href="datos-usuario.php">
                  <span class="fas fa-cog"></span>
                  <?php print $row[0];?>
                </a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="cerrar-sesion.php"><span class="fas fa-sign-out-alt"></span>Cerrar sesión</a>
            </li>
            <?php 
                $usuario = $_SESSION['usuario'];
                $consulta = mysqli_query ($conenctaBD, "SELECT *  FROM registro WHERE correo = '$usuario'",);
                $row = mysqli_fetch_row($consulta);
                if ($row[4] == 2 || $row[4] == 1) {
            ?>
                <li class="nav-item text-center">
                    <a class="nav-link" href="lista-usuarios.php"><span class="fas fa-user"></span>Usuarios</a>
                </li>
            <?php
                }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3">My todo WebApp</h1>
                    <?php
                        if ($row[4] == 3  || $row[4] == 1) {
                    ?>
                            <form action="agregar-tarea.php" method="POST">
                                <input type="text" name="tarea" placeholder="Escribe el nombre de tu tarea a realizar" class="form-control" >
                                <button type="submit" class="btn btn-primary mt-3" name="agregaTarea">AGREGAR TAREA</button>
                            </form>
                    <?php
                        }
                    ?>        
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
                            $usuario = $_SESSION['usuario'];
                            $consulta = mysqli_query ($conenctaBD, "SELECT *  FROM registro WHERE correo = '$usuario'",);
                            $row = mysqli_fetch_row($consulta);
                            if ($row[4] == 3) {
                                $registroTarea = mysqli_query ($conenctaBD,"SELECT * FROM tareas WHERE registro_id_regitro = $row[0]");
                            
                            for ($resiveTarea =0; $resiveTarea = $areglo= mysqli_fetch_row($registroTarea); $resiveTarea++) {
                                $cont ++;
                                
                        ?>  
                            
                            <tr class="text-center">
                            <td class="text-center"><?php print $areglo[0];?></td>
                            <td class="text-left "><?php print $areglo[1]; ?></td>
                            <td class="text-center <?php $areglo[2] == 'Finalizada' ? print 'text-success' :  print 'text-warning'; $areglo[2] == 'Nueva' ? print 'text-light' : ''?>">
                            <?php print $areglo[2];?>
                            </td>

                            <td>

                                <?php if($areglo[2] == "Nueva" ){?>
                                    <a href="actualizar-tarea.php?id_tarea=<?php print $areglo[0];?>&info_tarea=<?php print $areglo[1];?>&estado=<?php print $areglo[2];?>" class="btn btn-warning">
                                        <span class="fas fa-stopwatch"></span>
                                    </a>
                                <?php
                                    }
                                ?>

                                <?php if($areglo[2] == "En progreso"){ ?>
                                    <a href="tarea-finalizada.php?id_tarea=<?php print $areglo[0];?>&info_tarea=<?php print $areglo[1];?>&estado=<?php print $areglo[2];?>" class="btn btn-success">
                                        <span class="fas fa-check"></span>
                                    </a>
                                <?php
                                    }
                                ?>

                                <?php if($areglo[2] == "Finalizada"){ ?>
                                    <a href="" class="btn btn-success">
                                        <span class="fas fa-clipboard-check"></span>
                                    </a>
                                <?php
                                    }
                                ?>

                                <?php if($areglo[2] == "Nueva" ||$areglo[2] == "En progreso") {?>
                                    <a href="editar_tarea.php?id_tarea=<?php print $areglo[0];?>&info_tarea=<?php print $areglo[1];?>" class="btn btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                    
                                <?php
                                }
                                ?>

                                <a href="eliminar-tarea.php?id_tarea=<?php print $areglo[0];?>&info_tarea=<?php print $areglo[1];?>&estado=<?php print $areglo[2];?>" class="btn btn-danger">
                                    <span class="fa fa-trash-alt"></span>
                                </a>
                            </td>
                        <?php
                            }
                        }
                        ?> 
                                    <!------------------------Admin-------------------Profe--------->

                        <?php
                            if ($row[4] == 2 || $row[4] == 1) {
                                
                            $registroTarea = mysqli_query ($conenctaBD,"SELECT * FROM tareas");
                            
                            for ($resiveTarea =0; $resiveTarea = $areglo= mysqli_fetch_row($registroTarea); $resiveTarea++) {
                                $cont ++;
                            
                        ?>
                            
                            <tr class="text-center">
                                <td class="text-center"><?php print $areglo[0];?></td>
                                <td class="text-left "><?php print $areglo[1]; ?></td>
                                <td class="text-center <?php $areglo[2] == 'Finalizada' ? print 'text-success' :  print 'text-warning'; $areglo[2] == 'Nueva' ? print 'text-light' : ''?>">
                                <?php print $areglo[2];?>
                                </td>

                                <td>
                                    
                                    <?php 
                                        if ($row[4] == 1 || $row[4] == 3 ) {
                                    ?>

                                        <?php if($areglo[2] == "Nueva" ){?>
                                            <a href="actualizar-tarea.php?id_tarea=<?php print $areglo[0];?>&info_tarea=<?php print $areglo[1];?>&estado=<?php print $areglo[2];?>" class="btn btn-warning">
                                                <span class="fas fa-stopwatch"></span>
                                            </a>
                                        <?php
                                            }
                                        ?>

                                        <?php if($areglo[2] == "En progreso"){ ?>
                                            <a href="tarea-finalizada.php?id_tarea=<?php print $areglo[0];?>&info_tarea=<?php print $areglo[1];?>&estado=<?php print $areglo[2];?>" class="btn btn-success">
                                                <span class="fas fa-check"></span>
                                            </a>
                                        <?php
                                            }
                                        ?>

                                        <?php if($areglo[2] == "Finalizada"){ ?>
                                            <a href="" class="btn btn-success">
                                                <span class="fas fa-clipboard-check"></span>
                                            </a>
                                        <?php
                                            }
                                        ?>

                                        <?php if($areglo[2] == "Nueva" ||$areglo[2] == "En progreso") {?>
                                            <a href="editar_tarea.php?id_tarea=<?php print $areglo[0];?>&info_tarea=<?php print $areglo[1];?>" class="btn btn-info">
                                                <span class="fas fa-pencil-alt"></span>
                                            </a>
                                        
                                        <?php
                                        }
                                        ?>

                                        <a href="eliminar-tarea.php?id_tarea=<?php print $areglo[0];?>&info_tarea=<?php print $areglo[1];?>&estado=<?php print $areglo[2];?>" class="btn btn-danger">
                                            <span class="fa fa-trash-alt"></span>
                                        </a>

                                    <?php
                                    }
                                    ?>
                                </td>

                            </tr>
                        
                            
                        <?php
                            }
                        }
                        ?>                       
                    
                </table>
        </div>
    </div>
    
</body>
</html>