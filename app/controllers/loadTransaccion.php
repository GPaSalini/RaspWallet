<?php
    session_start();
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Transaccion.php");

    $bd = new BD();
    $tran = new Transaccion($bd->conectar());

    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);

    $resultado = $tran->get_Transaction($id);

    echo json_encode($resultado);
?>