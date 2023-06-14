<?php

require_once(__DIR__ . "/../config/pdo.php");

class Facturacion extends Conectar {

    private $facturacionId;
    private $clienteId;
    private $empleadoId;
    private $cotizacionId;
    private $fechaFacturacion;

    public function __construct($facturacionId= 0, $clienteId= 0, $empleadoId=0, $cotizacionId=0, $fechaFacturacion=""){
        $this->facturacionId = $facturacionId;
        $this->clienteId = $clienteId;
        $this->empleadoId = $empleadoId;
        $this->cotizacionId = $cotizacionId;
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

    public function getCotizacionId(){
        return $this->cotizacionId;
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

    public function setCotizacionId($cotizacionId){
        $this->cotizacionId = $cotizacionId;
    }

    public function setFechaFacturacion($fechaFacturacion){
        $this->fechaFacturacion = $fechaFacturacion;
    }


    public function insert() {
        try {
            $stm = $this-> db -> prepare("INSERT INTO facturacion(clienteId,empleadoId,cotizacionId,fechaFacturacion) VALUES (?,?,?,?)");
            $stm->execute([$this->clienteId, $this->empleadoId, $this->cotizacionId, $this->fechaFacturacion]);
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
            $stm = $this-> db -> prepare("UPDATE facturacion SET clienteId= ?, empleadoId= ?, cotizacionId= ?, fechaFacturacion = ?
            WHERE facturacionId = ?");
            $stm -> execute([$this->clienteId, $this->empleadoId, $this->cotizacionId, $this->fechaFacturacion, $this->facturacionId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtenerClienteId(){
        try {
            $stm = $this-> db -> prepare("SELECT clientesId,nombreConstructora FROM constructoras_clientes");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtenerEmpleadoId(){
        try {
            $stm = $this-> db -> prepare("SELECT empleadoId,nombreEmpleado FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function obtenerCotizacionId(){
        try {
            $stm = $this-> db -> prepare("SELECT detalleId FROM detalle_cotizacion");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}



?>