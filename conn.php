<?php
    $conenctaBD = new mysqli("localhost","root", "marco9908", "bd_tareas");

   if(!$conenctaBD){
        echo "Fallo al conectar a MySQL: (" . $conenctaBD->connect_errno . ") " . $conenctaBD->connect_error;
    }
   
?>