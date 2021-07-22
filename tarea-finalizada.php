<?php

    require_once 'conn.php';
    
    $idTareas = $_GET['id_tarea'];

    if($idTareas){
        $conenctaBD->query("UPDATE tareas SET estado = 'Finalizada' WHERE id_tarea = $idTareas") or die(mysqli_errno($conenctaBD));
        header('location:index.php');
    }
    else {
        print 'no fuciona';
    }
?>