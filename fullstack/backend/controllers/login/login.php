<?php

session_start();

if(isset($_POST['loguearse'])){
    require_once("../../models/login.php");
    $credenciales = new Login();
    $credenciales -> setEmail($_POST['email']);
    $credenciales -> setPassword($_POST['password']);
    $credenciales -> setUsuario($_POST['usuario']);

    $login = $credenciales -> login();

    if($login) {
        header('Location: ../../../frontend/dashboard.php');

    } else{
        echo "<script> alert('Password/Email invalidos');document.location='../../../frontend/login/login.php';</script>";
    }
}

?>