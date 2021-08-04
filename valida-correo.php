<?php
    require 'conn.php';

    $email = $_POST['correo'];
    
    $consulta = mysqli_query ($conenctaBD, "SELECT *  FROM registro WHERE correo = '$email'",);
    $row = mysqli_fetch_row($consulta);

    if($row>0) {
        print var_dump($row);
        header('location:restablecer.php?emaill='.$email);
    }
    else {
        header('location:recupera-contrasena.php');
        }
?>