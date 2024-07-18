<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Crud de Images</title>
</head>
<body>
  <h1 class="text-center text-secondary font-weight-bold p-4">CRUD DE IMAGENES </h1>

  <?php
    require "modelo/conexion.php";
    require "controlador/registrar.php";
    require "controlador/editar.php";
    $sql = $conexion->query("select * from img");

  ?>

     

  <!-- Modal Registro -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Registro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" enctype="multipart/form-data" method="POST">
              <input type="file" class="form-control mb-2" name="imagen">
              <input type="submit" value="Registrar" name="btnregistrar" class="form-control btn btn-success">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="p-3 table-responsive">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Registrar
    </button>
    <table class="table table-hover table-stripped">
      <thead class="bg-dark text-white">
          <tr>
          <th scope="col">ID</th>
          <th scope="col">Foto</th>
          <th scope="col"></th>
          </tr>
      </thead>
      <tbody>
        <?php
          while($datos = $sql->fetch_object()) { ?>
            <tr>
                <th scope="row"><?php echo $datos->id_img; ?></th>
                <td>
                    <img width="80" src="<?= $datos->foto ?>" alt="">
                </td>
                <td>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModalEditar<?= $datos->id_img ?>"  class="btn btn-warning">Editar</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
          
            <!-- Modal Editar-->
            <div class="modal fade" id="exampleModalEditar<?= $datos->id_img ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Imagen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                      <input type="hidden" value="<?= $datos->id_img ?>" name="id">
                      <input type="hidden" value="<?= $datos->foto ?>" name="nombre">
                      <input type="file" class="form-control mb-2" name="imagen">
                      <input type="submit" value="Modificar" name="btneditar" class="form-control btn btn-success">
                    </form>
                  </div>
                </div>
              </div>
            </div>                             
              
              
              
        
          <?php }

        ?>
                
            
      </tbody>

    </table>

  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>