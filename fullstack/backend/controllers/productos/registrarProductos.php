<?php

if(isset($_POST['guardar'])){
    require_once("../../models/producto.php");
    
    $config = new Productos;

    $config -> setNombreProducto($_POST['nombreProducto']);
    $config -> setTipoProducto($_POST['tipoProducto']);    
    $config -> setDescripcionProducto($_POST['descripcionProducto']);
    $config -> setPrecioUnitario($_POST['precioUnitario']);
    $config -> setStock($_POST['stock']);

    $config -> insert();

  echo "<script> alert('El producto fue registrado satisfactoriamente');document.location='../../../frontend/productos/productos.php'</script>";

}



?>