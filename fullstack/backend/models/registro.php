<?php

require_once(__DIR__ . "\..\config\pdo.php");
require_once("login.php");

class Registro extends Conectar {
    
    private $id;
    private $empleadoId;
    private $usuario;
    private $email;
    private $password;

    public function __construct($id=0, $empleadoId=0, $usuario="", $email="", $password="") {
        $this->id = $id;
        $this->empleadoId = $empleadoId;
        $this->usuario = $usuario;
        $this->email = $email;
        $this->password = $password;
        parent::__construct();
    }

   /*  Getters */

    public function getId() {
        return $this->id;
    }

    public function getEmpleadoId() {
        return $this->empleadoId;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

   /*  Setters */

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setEmpleadoId($empleadoId) {
        $this->empleadoId = $empleadoId;
    }
   
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }


    public function checkUser($email) {
        try {
            $stm = $this->db->prepare("SELECT * FROM users WHERE email = '$email'");
            $stm->execute();
            if($stm->fetchColumn()){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insertData () {
            try { 
                $stm = $this-> db -> prepare("INSERT INTO users (empleadoId,usuario,email,password) VALUES (?,?,?,?)");
                $stm -> execute ([$this->empleadoId, $this->usuario, $this->email, md5($this->password)]);
                $login = new Login;

                $login-> setEmail($_POST["email"]);
                $login-> setPassword($_POST["password"]);

                $success = $login->login();
    } catch (Exception $e) {
    return $e->getMessage();
    }
  
    }   

}



?>