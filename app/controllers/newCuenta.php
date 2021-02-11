<?php
    session_start();
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Cuenta.php");

    $bd = new BD();
    $acc = new Cuenta($bd->conectar()); 

    $account = filter_input(INPUT_POST,'nCuenta',FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST,'nDesc',FILTER_SANITIZE_STRING);

    $respuesta = $acc->post_Account($_SESSION['id'],$account,$description);

    if($respuesta){
        $mensaje = [
            "estado"=>1,
            "mensaje"=>"Se ha registrado una nueva cuenta"
        ];
        echo json_encode($mensaje);
    }else{
        $mensaje = [
            "estado"=>0,
            "mensaje"=>"Ha ocurrido un error al intentar registrar la cuenta"
        ];
        echo json_encode($mensaje);
    }
?>