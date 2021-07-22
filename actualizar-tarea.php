<?php

    require_once 'conn.php';
    
    $idTareas = $_GET['id_tarea'];
    $estado = $_GET['estado'];
    print var_dump($idTareas);    
    print var_dump($estado);

    if($estado="Nueva"){
        $conenctaBD->query("UPDATE tareas SET estado = 'Realizando' WHERE id_tarea = $idTareas") or die(mysqli_errno($conenctaBD));
        header('location:index.php');
    }
    elseif($estado="Realizando"){
        $conenctaBD->query("UPDATE tareas SET estado = 'Finalizada' WHERE id_tarea = $idTareas") or die(mysqli_errno($conenctaBD));
        header('location:index.php');
    }
    else {
        print 'no fuciona';
    }
?>