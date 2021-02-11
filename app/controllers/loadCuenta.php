<?php
    session_start();
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Cuenta.php");

    $bd = new BD();
    $acc = new Cuenta($bd->conectar());

    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);

    $resultado = $acc->get_Account($id);

    echo json_encode($resultado);
?>