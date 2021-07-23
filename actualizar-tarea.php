<?php

    require 'conn.php';
    
    $idTareas = $_GET['id_tarea'];
    $estado = $_GET['estado'];

    if($estado="Nueva"){
        $conenctaBD->query("UPDATE tareas SET estado = 'Realizando' WHERE id_tarea = $idTareas") or die(mysqli_errno($conenctaBD));
        header('location:index.php');
    }
    
    else {
        print 'no fuciona';
    }
?>