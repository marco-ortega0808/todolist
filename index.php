<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist Web App</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
</head>
<body>
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
                
                    <tbody>
                        <?php
                            require 'conn.php';

                            $registroTarea = $conenctaBD->query("SELECT * FROM tareas ORDER BY id_tarea ASC");
                                
                            for ($resiveTarea =0; $resiveTarea = $registroTarea->fetch_array(); $resiveTarea++) {
                        ?>

                            <tr class="text-center">
                                <td><?php print $resiveTarea['id_tarea'] ?></td>
                                <td><?php print $resiveTarea['info_tarea'] ?></td>
                                <td><?php print $resiveTarea['estado'] ?></td>
                                <td>
                                    <a href="" class="btn btn-success">
                                        <span class="fa fa-check"></span>
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
    
</body>
</html>