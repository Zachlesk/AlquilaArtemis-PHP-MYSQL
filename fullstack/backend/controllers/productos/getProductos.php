<?php
require_once("../../models/producto.php");
$data = new Productos();
$all = $data->get_Personas();
echo json_encode($all);
?>