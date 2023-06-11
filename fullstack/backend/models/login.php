<?php

require_once(__DIR__ . "\..\config\pdo.php");


class Login extends Conectar {
    
    private $id;
    private $email;
    private $password;
    private $usuario;


    public function __construct($id=0, $email="", $password="", $usuario="") {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->usuario = $usuario;
        parent::__construct();
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }



    public function fetchAll() {
        try {
            $stm = $this->db -> prepare("SELECT * FROM users");
            $stm -> execute();
            return $stm -> fetchAll();

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function login() {
    
        try {
            $stm = $this->db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stm-> execute([$this->email, md5($this->password)]);
            $user = $stm->fetchAll();
            if (count($user) > 0) {
                session_start();
                $_SESSION['id'] = $user[0]['id'];
                $_SESSION['email'] = $user[0]['email'];
                $_SESSION['password'] = $user[0]['password'];
                $_SESSION['usuario'] = $user[0]['usuario'];
                return true;
            }else {
                false;
            }
        }
        catch (Exception $e) {
            return $e->getMessage();
    }


}
}


?>