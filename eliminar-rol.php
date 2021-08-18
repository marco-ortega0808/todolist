<?php
    require_once 'conn.php';

    $idRol = $_GET['id'];
    if($idRol){

        $conenctaBD->query("DELETE FROM roles WHERE id = $idRol");
        $conenctaBD->query("ALTER TABLE roles AUTO_INCREMENT = 1");
        header('location:roles.php');
    }
    else {
        header('location:roles.php');
    }
?>