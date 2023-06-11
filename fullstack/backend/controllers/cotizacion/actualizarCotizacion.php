<?php

require_once("../../models/detalles.php");

    $data = new Detalles();
    $id = $_GET["id"]; 


    $idcliente = $data->obtenerClienteId();
    $idproducto = $data->obtenerProductoId();
    $data-> setEmpleadoId($id);
    $record = $data->select();
    $val = $record[0];

    if(isset($_POST["editar"])) {

        $data-> setCliente($_POST['cliente']);
        $data-> setProductosAlquilados($_POST['productosAlquilados']);
        $data-> setFechaAlquilado($_POST['fechaAlquilado']);
        $data-> setHoraAlquiler($_POST['horaAlquiler']);
        $data-> setDuracionAlquiler($_POST['duracionAlquiler']);
        $data-> setPrecioDiaAlquiler($_POST['precioDiaAlquiler']);
        $data-> setTotalCotizacion($_POST['totalCotizacion']);

        $data -> update();

        echo "<script> alert('La cotización seleccionada ha sido actualizada satisfactoriamente');document.location='../../../frontend/cotizacion/cotizacion.php'</script>";
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Actualización de cotizaciones </title>
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
        <h3 style="margin-bottom: 2rem;"> Actualización de Empleados </h3>
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
        <h2 class="m-2">Cotización a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
      <div class="mb-1 col-12">
                <label for="cliente" class="form-label"> Cliente </label>
                <select class="form-select" aria-label="Default select example" id="cliente" name="cliente" required>
                  <option selected> Seleccione el cliente encargado </option>
                  <?php
                    foreach($idcliente as $key => $valor){
                    ?> 
                  <option value="<?= $valor["clientesId"]?>"><?= $valor["nombreConstructora"]?></option>
                  <?php
                    }
                  ?>
                </select>
              <div class="mb-1 col-12">
                <label for="productosAlquilados" class="form-label"> Producto Alquilado </label>
                <select class="form-select" aria-label="Default select example" id="productosAlquilados" name="productosAlquilados" required>
                  <option selected> Seleccione el producto seleccionado </option>
                  <?php
                    foreach($idproducto as $key => $valor){
                    ?> 
                  <option value="<?= $valor["productosId"]?>"><?= $valor["nombreProducto"]?></option>
                  <?php
                    }
                  ?>
                </select>

              <div class="mb-1 col-12">
                <label for="fechaAlquilado" class="form-label"> Fecha de alquilación </label>
                <input 
                  type="date"
                  id="fechaAlquilado"
                  name="fechaAlquilado"
                  class="form-control" 
                  value = "<?php echo $val['fechaAlquilado'];?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="horaAlquiler" class="form-label"> Hora de alquiler </label>
                <input 
                  type="text"
                  id="horaAlquiler"
                  name="horaAlquiler"
                  class="form-control"
                  value = "<?php echo $val['horaAlquiler'];?>"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="duracionAlquiler" class="form-label"> Duración por días del alquiler </label>
                <input 
                  type="text"
                  id="duracionAlquiler"
                  name="duracionAlquiler"
                  class="form-control" 
                  value = "<?php echo $val['duracionAlquiler'];?>" 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="precioDiaAlquiler" class="form-label"> Precio por día del alquiler </label>
                <input 
                  type="text"
                  id="precioDiaAlquiler"
                  name="precioDiaAlquiler"
                  class="form-control"  
                  value = "<?php echo $val['precioDiaAlquiler'];?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="totalCotizacion" class="form-label"> Total de la cotización </label>
                <input 
                  type="text"
                  id="totalCotizacion"
                  name="totalCotizacion"
                  class="form-control"  
                  value = "<?php echo $val['totalCotizacion'];?>"
                />
              </div>


              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
     
    </div>

    
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>



</body>
</html>