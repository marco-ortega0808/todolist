<?php

    require_once 'conn.php';

    $idTareas = $_GET['id_tarea'];
    
    if($idTareas){

        $conenctaBD->query("DELETE FROM tareas WHERE id_tarea = $idTareas");
        $conenctaBD->query("ALTER TABLE tareas AUTO_INCREMENT = 1");
        header('location:index.php');

    }
    else {
        print "no valid";
    }
?>