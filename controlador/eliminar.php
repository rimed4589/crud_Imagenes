<?php 
//recibimos las variables 
if(!empty($_GET["id"]) and !empty($_GET["nombre"])) {
    $id = $_GET["id"];
    $nombre = $_GET["nombre"];

    //eliminar la imagen del servidor
    try {
        unlink($nombre);
    } catch (\Throwable $th) {
        //throw $th;
    }

    //eliminamos la imagen de la base de datos
    $eliminar = $conexion->query("delete from img where id_img=$id");

     //verifica si se elimino la imagen
    if ($eliminar==1) {
        echo "<div class='alert alert-success'>Correcto la imagen fue eliminada</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar</div>";
    } ?>

    <!-- evitar que no se re-envie  -->
    <script>
        history.replaceState(null,null,location.pathname)
    </script>
    
<?php
}





