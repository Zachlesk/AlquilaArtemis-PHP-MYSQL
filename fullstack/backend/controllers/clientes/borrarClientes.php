
<?php
require_once("../../models/clientes.php");

$record = new Clientes();

if (isset($_GET["id"]) && isset($_GET["req"])) {

    if ($_GET["req"] == "delete") {
        $record -> setClientesId($_GET["id"]);
        $record -> delete();

        echo "<script> alert('El cliente seleccionado ha sido borrado satisfactoriamente');document.location='../../../frontend/clientes/clientes.php'</script>";
    }
}

?>