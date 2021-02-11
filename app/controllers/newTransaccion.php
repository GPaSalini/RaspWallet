<?php
    session_start();
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Transaccion.php");

    $bd = new BD();
    $tran = new Transaccion($bd->conectar());

    $acc = filter_input(INPUT_POST,'nCuenta',FILTER_SANITIZE_NUMBER_INT);
    $qn = filter_input(INPUT_POST,'nQn',FILTER_SANITIZE_NUMBER_INT);
    $description = filter_input(INPUT_POST,'nDesc',FILTER_SANITIZE_STRING);
    $datestamp = $_POST['nDate'];

    $respuesta = $tran->post_Transaction($_SESSION['id'],$acc,$qn,$datestamp,$description);

    if($respuesta){
        $mensaje = [
            "estado"=>1,
            "mensaje"=>"Se ha registrado una nueva transaccion"
        ];
        echo json_encode($mensaje);
    }else{
        $mensaje = [
            "estado"=>0,
            "mensaje"=>"Ha ocurrido un error al intentar registrar la transaccion"
        ];
        echo json_encode($mensaje);
    }
?>