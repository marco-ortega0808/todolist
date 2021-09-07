<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if($usuario == null || $usuario = ''){
        header('location:inicio-sesion.php');
        die();
    }
?>