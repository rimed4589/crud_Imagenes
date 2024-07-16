<?php
    $conexion = new mysqli("localhost", "root", "", "crud_images");
    
    if($conexion){
        echo "Conexion a DB exitosa" . '<button type="button" class="btn btn-success rounded">DB</button>';
         
        
        
    } else {
        echo "No se realizo la conexion" . $conexion;
    }

?>
