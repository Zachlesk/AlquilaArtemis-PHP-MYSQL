<?php

require_once("../../models/empleado.php");

$record = new Empleado();

if (isset($_GET["id"]) && isset($_GET["req"])) {

    if ($_GET["req"] == "delete") {
        $record -> setEmpleadoId($_GET["id"]);
        $record -> delete();

        echo "<script> alert('El empleado seleccionado ha sido borrado satisfactoriamente');document.location='../../../frontend/empleados/empleados.php'</script>";
    }
}


?>
