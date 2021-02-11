<?php
    session_start();
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Cuenta.php");

    $bd = new BD();
    $acc = new Cuenta($bd->conectar()); 

    $id = filter_input(INPUT_POST,'mId',FILTER_SANITIZE_NUMBER_INT);
    $account = filter_input(INPUT_POST,'mCuenta',FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST,'mDesc',FILTER_SANITIZE_STRING);

    $respuesta = $acc->put_Account($id,$account,$description);

    if($respuesta){
        $mensaje = [
            "estado"=> 1,
            "mensaje"=> "Se ha registrado una nueva cuenta"
        ];
        echo json_encode($mensaje);
    }else{
        $mensaje = [
            "estado"=> 0,
            "mensaje"=> "Ha ocurrido un error al intentar modificar la cuenta"
        ];
        echo json_encode($mensaje);
    }
?>