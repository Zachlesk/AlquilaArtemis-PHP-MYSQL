<?php

require_once("../../backend/config/pdo.php");

class Productos extends Conectar{

    public function get_productos(){
    try {
        $conectar = parent::conexion();
        $stm = $conectar->prepare("SELECT * FROM productos");
        $stm-> execute();
        return $stm->fetchAll(PDO::FETCH_ASSO);

    } catch (Exception $e) {
        return $e->getMessage();
    }
        
    }

}

?>