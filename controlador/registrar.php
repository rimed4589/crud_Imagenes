<?php
    if(!empty($_POST["btnregistrar"])) {
        
        $imagen = $_FILES["imagen"]["tmp_name"];
        $nombreImagen = $_FILES["imagen"]["name"];
        $tipoImagen = strtolower(pathinfo($nombreImagen,PATHINFO_EXTENSION));
        $size =$_FILES["imagen"]["size"];
        $directorio = "archivos/";


        if ($tipoImagen=="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png") {
            
            $registro = $conexion->query("insert into img(foto) values('')");
            $idRegistro = $conexion->insert_id;
            
            $ruta = $directorio.$idRegistro.".".$tipoImagen;
            $actualizarImagen = $conexion->query("update img set foto='$ruta' where id_img = $idRegistro");
        
            //almacenando Imagen

            if(move_uploaded_file($imagen,$ruta)) {
                echo "<div class='alert alert-info' > Imagen Guardada Exitosamente</div>";
            }else {
                echo "<div class='alert alert-info-danger' > Error al Guardar la imagen</div>";
            }
        
        } else {
           echo "<div class= 'alert alert-info'>No se acepta ese formato</div>";
        }   ?>
        
    <script>
        history.replaceState(null,null,location.pathname)
    </script>
        
    
    <?php }

?>