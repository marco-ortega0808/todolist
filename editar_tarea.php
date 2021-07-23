<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <title>Todolist Web App</title>
</head>
<body>
<div class="row">
        <div class="container">
            <div class="col-md-12">
                  

                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3">My todo WebApp</h1>
                    <form action="editar_tarea.php" method="POST">
                        <?php
                            require_once 'conn.php';
                            $idTareas = $_GET['id_tarea'];
                            $infoTarea = $_GET['info_tarea'];
                        ?>
                        <input type="text" name="tareaEditada" value="<?php print $infoTarea; ?>" class="form-control" >
                        <input style="display: none;" type="text" name="id" value="<?php print $idTareas; ?>">
                        <button type="submit" class="btn btn-primary mt-3" name="ediTarea">Editar tarae</button>
                       
                    </form> 
                    <?php require_once 'conn.php';

                        if (isset($_POST['ediTarea'])) {
                            
                            if ($_POST['tareaEditada']) {
                               
                                $editarTarea = $_POST['tareaEditada'];
                                $id = $_POST['id'];
                                
                                $conenctaBD->query("UPDATE tareas SET info_tarea = '$editarTarea' WHERE id_tarea = $id") or die(mysqli_errno($conenctaBD));
                                header('location:index.php');
                            }
                        } 
                    ?> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>