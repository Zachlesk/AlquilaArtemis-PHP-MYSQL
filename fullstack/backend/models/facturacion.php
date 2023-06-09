<?php


require_once("../../backend/config/pdo.php");

class Empleado extends Conectar {

    private $facturacionId;
    private $clienteId;
    private $empleadoId;
    private $cotizacion;
    private $fechaFacturacion;

    public function __construct($facturacionId= 0, $clienteId= 0, $empleadoId=0, $cotizacion=0, $fechaFacturacion=""){
        $this->facturacionId = $facturacionId;
        $this->clienteId = $clienteId;
        $this->empleadoId = $empleadoId;
        $this->cotizacion = $cotizacion;
        $this->fechaFacturacion = $fechaFacturacion;
        parent::__construct();
    }
    
    //Getters
    public function getFacturacionId(){
        return $this->facturacionId;
    }


    public function getClienteId(){
        return $this->clienteId;
    }

    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function getCotizacion(){
        return $this->cotizacion;
    }

    public function getFechaFacturacion(){
        return $this->fechaFacturacion;
    }


    //Setters
    public function setFacturacionId($facturacionId){
        $this->facturacionId =$facturacionId;
    }

    public function setClienteId($clienteId){
        $this->clienteId = $clienteId;
    }

    public function setEmpleadoId($empleadoId){
        $this->empleadoId =$empleadoId;
    }

    public function setCotizacion($cotizacion){
        $this->cotizacion = $cotizacion;
    }

    public function setFechaFacturacion($fechaFacturacion){
        $this->fechaFacturacion = $fechaFacturacion;
    }


    public function insert() {
        try {
            $stm = $this-> db -> prepare("INSERT INTO facturacion(facturacionId,clienteId,empleadoId,cotizacion,fechaFacturacion VALUES (?,?,?,?,?)");
            $stm->execute([$this->clienteId, $this->empleadoId, $this->cotizacion, $this->fechaFacturacion]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtain(){
        try {
            $stm = $this-> db -> prepare("SELECT * FROM facturacion");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> db -> prepare("DELETE FROM facturacion WHERE facturacionId = ?");
            $stm-> execute([$this->facturacionId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function select(){
        try {
            $stm = $this-> db -> prepare("SELECT * FROM facturacion WHERE facturacionId = ?");
            $stm -> execute([$this->facturacionId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> db -> prepare("UPDATE facturacion SET clienteId= ?, empleadoId= ?, cotizacion= ?, fechaFacturacion = ?
            WHERE facturacionId = ?");
            $stm -> execute([$this->clienteId, $this->empleadoId, $this->cotizacion, $this->fechaFacturacion, $this->fechaFacturacion]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>