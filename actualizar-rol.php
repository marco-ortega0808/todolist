<?php
    require 'conn.php';
    
    $id = $_POST['id'];
    $rol = $_POST['roles'];

    if (isset($_POST['submit'])) {
        if ($_POST['roles'] == "admin") {
            $rol = $_POST['roles'];
            $conenctaBD->query("UPDATE registro SET rol = '$rol' WHERE id_regitro = $id") or die(mysqli_errno($conenctaBD));
            header('location:lista-usuarios.php');
        }
      
    
        if ($_POST['roles'] == "profesor") {
            $rol = $_POST['roles'];
        $conenctaBD->query("UPDATE registro SET rol = '$rol' WHERE id_regitro = $id") or die(mysqli_errno($conenctaBD));
        header('location:lista-usuarios.php');
        }
    
    
    
        if ($_POST['roles'] == "alumno") {
            $rol = $_POST['roles'];
                $conenctaBD->query("UPDATE registro SET rol = '$rol' WHERE id_regitro = $id") or die(mysqli_errno($conenctaBD));
                header('location:lista-usuarios.php');
        }
    }   
    
    
    else {
        print 'no fuciona';
    }
?>