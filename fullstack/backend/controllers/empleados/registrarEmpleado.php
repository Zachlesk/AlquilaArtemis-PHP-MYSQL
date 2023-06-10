<?php


if(isset($_POST['guardar'])) {
    require_once("../../models/empleado.php");

    $config = new Empleado;

    $config-> setNombreEmpleado($_POST['nombreEmpleado']);
    $config-> setCelularEmpleado($_POST['celularEmpleado']);
    $config-> setCargo($_POST['cargo']);

    $config -> insert();

    echo "<script> alert('El empleado ha sido registrado satisfactoriamente');document.location='../../../frontend/empleados/empleados.php' </script>";
};

?>