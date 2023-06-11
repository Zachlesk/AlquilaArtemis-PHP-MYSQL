<?php


if(isset($_POST['guardar'])) {
    require_once("../../models/facturacion.php");

    $config = new Facturacion;

    $config-> setClienteId($_POST['clienteId']);
    $config-> setEmpleadoId($_POST['empleadoId']);
    $config-> setCotizacionId($_POST['cotizacionId']);
    $config-> setFechaFacturacion($_POST['fechaFacturacion']);

    $config -> insert();

    echo "<script> alert('La factura ha sido registrada satisfactoriamente');document.location='../../../frontend/facturacion/facturacion.php' </script>";
};

?>

