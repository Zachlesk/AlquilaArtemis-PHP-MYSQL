<?php

require_once("../../models/facturacion.php");

$record = new Facturacion();

if (isset($_GET["id"]) && isset($_GET["req"])) {

    if ($_GET["req"] == "delete") {
        $record -> setFacturacionId($_GET["id"]);
        $record -> delete();

        echo "<script> alert('La factura seleccionada ha sido borrada satisfactoriamente');document.location='../../../frontend/facturacion/facturacion.php'</script>";
    }
}


?>