<?php
    $conexion = new mysqli("localhost", "root", "", "crud_images");
    
    if($conexion){
        
        
    } else {
        echo "No se realizo la conexion" . $conexion;
    }

?>
