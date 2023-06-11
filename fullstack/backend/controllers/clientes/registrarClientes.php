<?php

if(isset($_POST['guardar'])){
    require_once("../../models/clientes.php");
    
    $config = new Clientes;

    $config -> setNombreConstructora($_POST['nombreConstructora']);
    $config -> setEmpleadoEncargado($_POST['empleadoEncargado']);    
    $config -> setFecha($_POST['fecha']);

    $config -> insert();

    echo "<script> alert('El cliente fue registrado satisfactoriamente');document.location='../../../frontend/clientes/clientes.php'</script>";

}


?>