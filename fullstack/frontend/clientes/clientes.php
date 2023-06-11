<?php

  require_once("../../backend/models/clientes.php");

  $data = new Clientes();

  $all = $data -> obtain();

  $idempleado = $data->obtenerEmpleadoId();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../dashboard.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;"> AlquilaArtemis </h3>
        <img src="../images/icon.jpg" alt="" class="imagenPerfil">
        <h3> Zachlesk </h3>
         <a href="https://github.com/Zachlesk" target="_blank"> <h6 style="font-size: 14px"> <i class="bi bi-github"> </i> GitHub </h6> </a>

      </div>
      <div class="menus">
      <a href="../dashboard.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;"> Home </h3>
        </a>
        <a href="../empleados/empleados.php" style="display: flex;gap:1px;">
        <i class="bi bi-person-vcard-fill"></i>
          <h3 style="margin: 0px;"> Empleados </h3>
        </a>
        <a href="../clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px; font-weight: 800;"> Clientes </h3>
        </a>
        

        <a href="../cotizacion/cotizacion.php" style="display: flex;gap:1px;">
            <i class="bi bi-receipt-cutoff"></i>
          <h3 style="margin: 0px;"> Cotización </h3>
        </a>

        <a href="../facturacion/facturacion.php" style="display: flex;gap:1px;">
            <i class="bi bi-receipt-cutoff"></i>
          <h3 style="margin: 0px;"> Facturación </h3>
        </a>
        <a href="../productos/productos.php" style="display: flex;gap:1px;">
        <i class="bi bi-bag-fill"></i>
          <h3 style="margin: 0px;"> Productos </h3>
        </a>


      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2> Clientes </h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarClientes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOMBRE CONSTUCTORA</th>
              <th scope="col">EMPLEADO ENCARGADO</th>
              <th scope="col">FECHA</th>
              <th scope="col">DETALLE</th>
              
            </tr>
          </thead>
          <tbody class="" id="tabla">


         
            <?php
              foreach($all as $key => $val){
               
              
            ?>
            <tr>
              <td><?php echo $val['clientesId']?>  </td>
              <td><?php echo $val['nombreConstructora']?>  </td>
              <td><?php echo $val['empleadoEncargado']?>  </td>
              <td><?php echo $val['fecha']?>  </td>
              <td>
                <a class="btn btn-danger" href="../../backend/controllers/clientes/borrarClientes.php?id=<?=$val['clientesId'] ?>&&req=delete"> Borrar </a>
                <a class="btn btn-warning" href="../../backend/controllers/clientes/actualizarClientes.php?id=<?=$val['clientesId'] ?>"> Editar </a>
              </td>
            </tr>

            <?php }?>

          </tbody>
        
        </table>

      </div>


    </div>




    <div class="modal fade" id="registrarClientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="../../backend/controllers/clientes/registrarClientes.php" method="post">

            <div class="mb-1 col-12">
                <label for="nombreConstructora" class="form-label"> Nombre Constructora </label>
                <input 
                  type="text"
                  id="nombreConstructora"
                  name="nombreConstructora"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="empleadoEncargado" class="form-label"> Empleado Encargado </label>
                <select class="form-select" aria-label="Default select example" id="empleadoEncargado" name="empleadoEncargado" required>
                  <option selected> Seleccione el id del empleado encargado </option>
                  <?php
                    foreach($idempleado as $key => $valor){
                    ?> 
                  <option value="<?= $valor["empleadoId"]?>"><?= $valor["nombreEmpleado"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="fecha" class="form-label"> Fecha </label>
                <input 
                  type="date"
                  id="fecha"
                  name="fecha"
                  class="form-control"  
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="Guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>