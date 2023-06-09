<?php

require_once("../../backend/config/pdo.php");

class Empleado extends Conectar {

    private $empleadoId;
    private $nombreEmpleado;
    private $celularEmpleado;
    private $cargo;
    

    public function __construct($empleadoId= 0, $nombreEmpleado= "", $celularEmpleado="", $cargo=""){
        $this->empleadoId = $empleadoId;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->celularEmpleado = $celularEmpleado;
        $this->cargo = $cargo;
        parent::__construct();
    }
    
    //Getters
    public function getEmpleadoId(){
        return $this->empleadoId;
    }


    public function getNombreEmpleado(){
        return $this->nombreEmpleado;
    }

    public function getCelularEmpleado(){
        return $this->celularEmpleado;
    }

    public function getCargo(){
        return $this->cargo;
    }

    //Setters
    public function setEmpleadoId($empleadoId){
        $this->empleadoId =$empleadoId;
    }

    public function setNombreEmpleado($nombreEmpleado){
        $this->nombreEmpleado =$nombreEmpleado;
    }

    public function setCelularEmpleado($celularEmpleado){
        $this->celularEmpleado =$celularEmpleado;
    }

    public function setCargo($cargo){
        $this->cargo =$cargo;
    }

    public function insert() {
        try {
            $stm = $this-> db -> prepare("INSERT INTO empleados(empleadoId,nombreEmpleado,celularEmpleado,cargo VALUES (?,?,?,?)");
            $stm->execute([$this->nombreEmpleado, $this->celularEmpleado, $this->cargo, $this->cargo]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtain(){
        try {
            $stm = $this-> db -> prepare("SELECT * FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> db -> prepare("DELETE FROM empleados WHERE empleadoId = ?");
            $stm-> execute([$this->empleadoId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function select(){
        try {
            $stm = $this-> db -> prepare("SELECT * FROM empleados WHERE empleadoId = ?");
            $stm -> execute([$this->empleadoId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> db -> prepare("UPDATE empleados SET nombreEmpleado= ?, celularEmpleado= ?, cargo= ?
            WHERE empleadoId = ?");
            $stm -> execute([$this->nombreEmpleado, $this->celularEmpleado, $this->cargo, $this->empleadoId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}


?>