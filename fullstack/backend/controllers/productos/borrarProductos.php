<?php
require_once("../../models/producto.php");

$record = new Productos();

if (isset($_GET["id"]) && isset($_GET["req"])) {

    if ($_GET["req"] == "delete") {
        $record -> setProductosId($_GET["id"]);
        $record -> delete();

        echo "<script> alert('El producto seleccionado ha sido borrado satisfactoriamente');document.location='../../../frontend/productos/productos.php'</script>";
    }
}

?>