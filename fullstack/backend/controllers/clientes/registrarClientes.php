<?php

require_once('../../models/clientes.php')
require_once('../../../frontend/clientes/clientes.php')

if(isset($_POST['guardar'])){

    $config = new Clientes;

    $config = setNombreConstructura($_POST['nombreConstructura']);
    $config = setEmpleadoEncargado($_POST['empleadoEncargado']);    
    $config = setFecha($_POST['fecha']);

    $config -> insert();

    echo "<script> alert('El cliente fue registrado satisfactoriamente');document.location='../../frontend/clientes/clientes.php'</script>";

}


?>