<?php


if(isset($_POST['registrarse'])) {
    require_once("../../models/registro.php");
    $registrar = new Registro();

    $registrar-> setEmpleadoId(1);
    $registrar-> setUsuario($_POST['usuario']);
    $registrar-> setEmail($_POST['email']);
    $registrar-> setPassword($_POST['password']);
   


    $registrar-> insertData();

    echo "<script> alert('Usuario registrado satisfactoriamente');document.location='../../../frontend/login/login.php'</script>";

    if($registrar->checkUser($_POST['email'])) {
        echo "<script> alert('Usuario ya existe');document.location='../../../frontend/login/login.php'</script>";
    }else {
        echo "<script> alert('Usuario registrado satisfactoriamente');document.location='../../../frontend/dashboard.php'</script>";
    }
}


?>