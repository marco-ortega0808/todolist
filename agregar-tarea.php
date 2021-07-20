<?php

    require_once 'conn.php';
    
    if (isset($_POST['agregaTarea'])) {
        if ($_POST['tarea'] ) {
            $tarea = $_POST['tarea'];
            $conenctaBD->query("INSERT INTO tareas (info_tarea) VALUES ('$tarea')");
            header('location:index.php');
        }
    }
    else {
        print(":v000");
    }
?>