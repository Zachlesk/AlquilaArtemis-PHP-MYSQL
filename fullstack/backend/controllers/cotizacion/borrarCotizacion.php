<?php

require_once("../../models/detalles.php");

$record = new Detalles();

if (isset($_GET["id"]) && isset($_GET["req"])) {

    if ($_GET["req"] == "delete") {
        $record -> setDetalleId($_GET["id"]);
        $record -> delete();

        echo "<script> alert('La cotización seleccionada ha sido borrada satisfactoriamente');document.location='../../../frontend/cotizacion/cotizacion.php'</script>";
    }
}


?>
