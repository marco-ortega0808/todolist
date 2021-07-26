<?php

    require_once 'conn.php';
    
    if (isset($_POST['agregaRegistro'])) {
        if ($_POST['nombre'] && $_POST['correo'] && $_POST['contrasena']) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $conenctaBD->query("INSERT INTO registro (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')");
            header('location:registro.php');
        }
        else {
            print "no se registro";
            
            header('location:agrega-registro.php');
        }
    }
    else {
        print("Error");
    }
?>