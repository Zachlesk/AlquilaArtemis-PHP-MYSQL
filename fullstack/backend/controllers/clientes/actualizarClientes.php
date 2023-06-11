<?php

require_once("../../models/clientes.php");

    $data = new Clientes();
    $id = $_GET["id"]; 
    // $idempleado = $_GET["empleadoEncargado"];

    // $data-> setEmpleadoEncargado($idempleado);
    $idempleados = $data->obtenerEmpleadoId();

    $data-> setClientesId($id);
    $record = $data-> select();
    $val = $record[0];

    if(isset($_POST["editar"])) {

        $data->setNombreConstructora($_POST["nombreConstructora"]);
        $data->setEmpleadoEncargado($_POST["empleadoEncargado"]);
        $data->setFecha($_POST["fecha"]);

        $data -> update();

        echo "<script> alert('El cliente seleccionado ha sido actualizado satisfactoriamente');document.location='../../../frontend/clientes/clientes.php'</script>";
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Actualización de empleados </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../../../frontend/dashboard.css">

</head>

<body>
  <div class="contenedor">
	
    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;"> Actualización de Clientes </h3>
        <img src="../../../frontend/images/icon.jpg" alt="" class="imagenPerfil">
        <h3 > Zachlesk </h3>
        <a href="https://github.com/Zachlesk" target="_blank"> <h6 style="font-size: 14px"> <i class="bi bi-github"> </i> GitHub </h6> </a>
      </div>
      <div class="menus">
      <a href="../dashboard.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;"> Home </h3>
        </a>
        <a href="../empleados/empleados.php" style="display: flex;gap:1px;">
        <i class="bi bi-person-vcard-fill"></i>
          <h3 style="margin: 0px; font-weight: 800;"> Empleados </h3>
        </a>
        <a href="../clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;"> Clientes </h3>
        </a>

        <a href="../cotizacion/cotizacion.php" style="display: flex;gap:1px;">
            <i class="bi bi-receipt-cutoff"></i>
          <h3 style="margin: 0px;"> Cotización </h3>
        </a>

        <a href="../facturacion.php" style="display: flex;gap:1px;">
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
        <h2 class="m-2">Cliente a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombreConstuctora" class="form-label"> Nombre Constuctora</label>
                <input 
                  type="text"
                  id="nombreConstructora"
                  name="nombreConstructora"
                  class="form-control"  
                  value = "<?php echo $val['nombreConstructora'];?>"
                  /> 
                    
              </div>

              <div class="mb-1 col-12">
                <label for="empleadoEncargado" class="form-label"> Empleado Encargado </label>
                <select class="form-select" aria-label="Default select example" id="empleadoEncargado" name="empleadoEncargado" required>
                <option value = "<?php echo $val['nombreConstructora'];?>"> </option>
                  <?php
                    foreach($idempleados as $key => $valor){
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
                  type="text"
                  id="fecha"
                  name="fecha"
                  class="form-control"
                  value = "<?php echo $val['fecha'];?>"
                  
                  
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles" style="background-color:#572364; display:flex; align-items:center;">
      <img src="../images/logoWhite.png" alt="" width="350"> 
</div>

    
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>



</body>
</html>


