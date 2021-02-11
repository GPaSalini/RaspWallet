<?php
    session_start();
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Transaccion.php");

    $bd = new BD();
    $tran = new Transaccion($bd->conectar()); 

    $id = filter_input(INPUT_POST,'mId',FILTER_SANITIZE_NUMBER_INT);
    $acc = filter_input(INPUT_POST,'mCuenta',FILTER_SANITIZE_NUMBER_INT);
    $qn = filter_input(INPUT_POST,'mQn',FILTER_SANITIZE_NUMBER_INT);
    $description = filter_input(INPUT_POST,'mDesc',FILTER_SANITIZE_STRING);
    $datestamp = $_POST['mDate'];

    $respuesta = $tran->put_Account($id,$acc,$qn,$datestamp,$description);

    if($respuesta){
        $mensaje = [
            "estado"=> 1,
            "mensaje"=> "Se ha modificado la transaccion"
        ];
        echo json_encode($mensaje);
    }else{
        $mensaje = [
            "estado"=> 0,
            "mensaje"=> "Ha ocurrido un error al intentar modificar la transaccion"
        ];
        echo json_encode($mensaje);
    }
?>