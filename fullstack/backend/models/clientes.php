<?php

require_once("../../backend/config/pdo.php");

class Clientes extends Conectar {

    private $clientesId;
    private $nombreConstructura;
    private $empleadoEncargado;
    private $fecha;
    

    public function __construct($clientesId= 0, $nombreConstructora= "", $empleadoEncargado="", $fecha=""){
        $this->clientesId = $clientesId;
        $this->nombreConstructora = $nombreConstructora;
        $this->empleadoEncargado = $empleadoEncargado;
        $this->fecha = $fecha;
        parent::__construct();
    }
    
    //Getters
    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function getNombreConstructura(){
        return $this->nombreEmpleado;
    }

    public function getEmpleadoEncargado(){
        return $this->empleadoEmpleado;
    }

    public function getFecha(){
        return $this->fecha;
    }

    //Setters
    public function setEmpleadoId($empleadoId){
        $this->empleadoId =$empleadoId;
    }

    public function setNombreConstructura($nombreConstructura){
        $this->nombreConstructura =$nombreConstructura;
    }

    public function setEmpleadoEncargado($empleadoEncargado){
        $this->empleadoEncargado =$empleadoEncargado;
    }

    public function setFecha($fecha){
        $this->fecha =$fecha;
    }

    public function insert() {
        try {
            $stm = $this-> db -> prepare("INSERT INTO constructoras_clientes(nombreConstructora,empleadoEncargado,fecha VALUES (?,?,?)");
            $stm->execute([$this->nombreConstructora, $this->empleadoEncargado, $this->fecha]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtain(){
        try {
            $stm = $this-> db-> prepare("SELECT * FROM constructoras_clientes");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> db-> prepare("DELETE FROM constructoras_clientes WHERE clientesId = ?");
            $stm-> execute([$this->clientesId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function select(){
        try {
            $stm = $this-> db -> prepare("SELECT * FROM constructoras_clientes WHERE clientesId = ?");
            $stm -> execute([$this->clientesId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> db -> prepare("UPDATE constructoras_clientes SET nombreContructora = ?, empleadoEncargado = ?, fecha = ?
            WHERE clientesId = ?");
            $stm -> execute([$this->nombreConstructora, $this->empleadoEncargado, $this->fecha, $this->clientesId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>