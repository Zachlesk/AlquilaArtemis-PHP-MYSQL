<?php


require_once(__DIR__ . "\..\config\pdo.php");

class Detalles extends Conectar {

    private $detalleId;
    private $cliente;
    private $productosAlquilados;
    private $fechaAlquilado;
    private $horaAlquiler;
    private $duracionAlquiler;
    private $precioDiaAlquiler;
    private $totalCotizacion;

    public function __construct($detalleId= 0, $cliente= 0, $productosAlquilados="", $fechaAlquilado="", $horaAlquiler = "", $duracionAlquiler= "", $precioDiaAlquiler = "", $totalCotizacion = "") {
        $this->detalleId = $detalleId;
        $this->cliente = $cliente;
        $this->productosAlquilados = $productosAlquilados;
        $this->fechaAlquilado = $fechaAlquilado;
        $this->horaAlquiler = $horaAlquiler;
        $this->duracionAlquiler = $duracionAlquiler;
        $this->precioDiaAlquiler = $precioDiaAlquiler;
        $this->totalCotizacion = $totalCotizacion;
        parent::__construct();
    }
    
    //Getters
    public function getDetalleId(){
        return $this->detalleId;
    }


    public function getCliente(){
        return $this->cliente;
    }

    public function getProductosAlquilados(){
        return $this->productosAlquilados;
    }

    public function getFechaAlquilado(){
        return $this->fechaAlquilado;
    }
    
    public function getHoraAlquiler(){
        return $this->horaAlquiler;
    }

    public function getDuracionAlquiler(){
        return $this->duracionAlquiler;
    }

    public function getPrecioDiaAlquiler(){
        return $this->precioDiaAlquiler;
    }

    public function getTotalCotizacion(){
        return $this->totalCotizacion;
    }

    //Setters
    public function setDetalleId($detalleId){
        $this->detalleId =$detalleId;
    }

    public function setCliente($cliente){
        $this->cliente =$cliente;
    }

    public function setProductosAlquilados($productosAlquilados){
        $this->productosAlquilados =$productosAlquilados;
    }

    public function setFechaAlquilado($fechaAlquilado){
        $this->fechaAlquilado =$fechaAlquilado;
    }

    public function setHoraAlquiler($horaAlquiler){
        $this->horaAlquiler = $horaAlquiler;
    }

    public function setDuracionAlquiler($duracionAlquiler){
        $this->duracionAlquiler = $duracionAlquiler;
    }

    public function setPrecioDiaAlquiler($precioDiaAlquiler){
        $this->precioDiaAlquiler = $precioDiaAlquiler;
    }

    public function setTotalCotizacion($totalCotizacion){
        $this->totalCotizacion = $totalCotizacion;
    }


    public function insert() {
        try {
            $stm = $this-> db -> prepare("INSERT INTO detalle_cotizacion(cliente,productosAlquilados,fechaAlquilado,horaAlquiler,duracionAlquiler,precioDiaAlquiler,totalCotizacion) VALUES (?,?,?,?,?,?,?)");
            $stm->execute([$this->cliente, $this->productosAlquilados, $this->fechaAlquilado, $this->horaAlquiler,  $this->duracionAlquiler,  $this->precioDiaAlquiler,  $this->totalCotizacion]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtain(){
        try {
            $stm = $this-> db -> prepare("SELECT * FROM detalle_cotizacion");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> db -> prepare("DELETE FROM detalle_cotizacion WHERE detalleId = ?");
            $stm-> execute([$this->detalleId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function select(){
        try {
            $stm = $this-> db -> prepare("SELECT * FROM detalle_cotizacion WHERE detalleId = ?");
            $stm -> execute([$this->detalleId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> db -> prepare("UPDATE detalle_cotizacion SET cliente= ?, productosAlquilados= ?, fechaAlquilado= ?, horaAlquiler = ?, duracionAlquiler= ?, precioDiaAlquiler= ? , totalCotizacion= ?  
            WHERE detalleId = ?");
            $stm -> execute([$this->cliente, $this->productosAlquilados, $this->fechaAlquilado, $this->horaAlquiler,  $this->duracionAlquiler,  $this->precioDiaAlquiler,  $this->totalCotizacion, $this->detalleId]);
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

    public function obtenerProductoId(){
        try {
            $stm = $this-> db -> prepare("SELECT productosId,nombreProducto FROM productos");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

    ?>