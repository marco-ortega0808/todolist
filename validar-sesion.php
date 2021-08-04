<?php
    session_start();
    require 'conn.php';
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $hash = md5($contrasena);
    
    $consulta = mysqli_query ($conenctaBD, "SELECT *  FROM registro WHERE correo = '$email' AND contrasena = '$hash'",);
    $row = mysqli_fetch_row($consulta);

    if($row>0) {
        $_SESSION['usuario'] = $email;
        header('location:index.php');

    
    } else {
        header('location:iniciar-sesion.php');
    }
     
?>