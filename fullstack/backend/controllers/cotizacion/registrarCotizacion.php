<?php

if(isset($_POST['guardar'])) {
    require_once("../../models/detalles.php");

    $config = new Detalles;

    $config-> setCliente($_POST['cliente']);
    $config-> setProductosAlquilados($_POST['productosAlquilados']);
    $config-> setFechaAlquilado($_POST['fechaAlquilado']);
    $config-> setHoraAlquiler($_POST['horaAlquiler']);
    $config-> setDuracionAlquiler($_POST['duracionAlquiler']);
    $config-> setPrecioDiaAlquiler($_POST['precioDiaAlquiler']);
    $config-> setTotalCotizacion($_POST['totalCotizacion']);

    $config -> insert();

    echo "<script> alert('La cotización ha sido registrada satisfactoriamente');document.location='../../../frontend/cotizacion/cotizacion.php' </script>";
};

?>