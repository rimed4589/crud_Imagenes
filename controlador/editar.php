<?php 
    if(!empty($_POST["btneditar"])) {
        $id = $_POST["id"];
        $name = $_POST["nombre"];
        
        //datos de la imgen
        $imagen = $_FILES["imagen"]["tmp_name"];
        $nombreImagen = $_FILES["imagen"]["name"];
        $tipoImagen = strtolower(pathinfo($nombreImagen,PATHINFO_EXTENSION));
        $directorio = "archivos/";

        //validar si se subio la imagen
        if (is_file($imagen)) {

            if ($tipoImagen =="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png") {
               
                //eliminamos la imagen anterior
                try {
                    unlink($nommbre);
                } catch (\Throwable $th) {
                    //throw $th;
                }

                //guardar la nueva imagen
                $ruta = $directorio . $id . "." . $tipoImagen;
                if (move_uploaded_file($imagen,$ruta)) {
                    
                    $editar = $conexion->query("update img set foto='$ruta' where id_img=$id");
                    if ($editar==1) {
                        echo "<div class= 'alert alert-success'>Correcto la imagen se ha subido con exito</div>";
                    } else {
                        echo "<div class= 'alert alert-danger'>Error al editar la imagen</div>";
                    }
                    
                } else {
                    echo "<div class= 'alert alert-info'>Error al subir la imagen al servidor</div>";
                }
                

            } else {
                echo "<div class= 'alert alert-info'>Solo se aceptan formatos jpg/jpeg/png </div>";
            }
            

        } else {
            echo "<div class= 'alert alert-info'>Debes Seleccionar una Imagen</div>";
        } ?>

    <script>
        history.replaceState(null,null,location.pathname);
    </script>



    
<?php }