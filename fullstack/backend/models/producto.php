<?php

require_once(__DIR__ . "\..\config\pdo.php");

class Productos extends Conectar {

    private $productosId;
    private $nombreProducto;
    private $tipoProducto;
    private $descripcionProducto;
    private $precioUnitario;
    private $stock;
    

    public function __construct($productosId= 0, $nombreProducto= "", $tipoProducto="", $descripcionProducto="", $precioUnitario="", $stock=""){
        $this->productosId = $productosId;
        $this->nombreProducto = $nombreProducto;
        $this->tipoProducto = $tipoProducto;
        $this->descripcionProducto = $descripcionProducto;
        $this->precioUnitario = $precioUnitario;
        $this->stock = $stock;
        parent::__construct();
    }
    
    //Getters
    public function getProductosId(){
        return $this->productosId;
    }

    public function getNombreProducto(){
        return $this->nombreProducto;
    }

    public function getTipoProducto(){
        return $this->tipoProducto;
    }

    public function getDescripcionProducto(){
        return $this->descripcionProducto;
    }
    
    public function getPrecioUnitario(){
        return $this->precioUnitario;
    }

    public function getStock(){
        return $this->stock;
    }

    //Setters
    public function setProductosId($productosId){
        $this->productosId =$productosId;
    }

    public function setNombreProducto($nombreProducto){
        $this->nombreProducto =$nombreProducto;
    }

    public function setTipoProducto($tipoProducto){
        $this->tipoProducto = $tipoProducto;
    }

    public function setDescripcionProducto($descripcionProducto){
        $this->descripcionProducto =$descripcionProducto;
    }

    public function setPrecioUnitario($precioUnitario){
        $this->precioUnitario = $precioUnitario;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }


    public function insert() {
        try {
            $stm = $this-> db -> prepare("INSERT INTO productos(nombreProducto,tipoProducto,descripcionProducto,precioUnitario,stock) VALUES (?,?,?,?,?)");
            $stm->execute([$this->nombreProducto, $this->tipoProducto, $this->descripcionProducto, $this->precioUnitario, $this->stock]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtain(){
        try {
            $stm = $this-> db-> prepare("SELECT * FROM productos");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> db-> prepare("DELETE FROM productos WHERE productosId = ?");
            $stm-> execute([$this->productosId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function select(){
        try {
            $stm = $this-> db -> prepare("SELECT * FROM productos WHERE productosId = ?");
            $stm -> execute([$this->productosId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> db -> prepare("UPDATE productos SET nombreProducto = ?, tipoProducto = ?, descripcionProducto = ?, precioUnitario = ?, stock = ?
            WHERE productosId = ?");
            $stm -> execute([$this->nombreProducto, $this->tipoProducto, $this->descripcionProducto, $this->precioUnitario, $this->stock]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>

