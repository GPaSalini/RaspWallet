<?php
    session_start();
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Transaccion.php");

    $T0 = filter_input(INPUT_POST,'t0',FILTER_DEFAULT);
    $T1 = filter_input(INPUT_POST,'t1',FILTER_DEFAULT);
    $err = false;

    function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    if (!validateDate($T0) || !validateDate($T1)){
        $err = true;
    }
    else if ($T0>=$T1){
        $err = true;
    }

    $bd = new BD();
    $tra = new Transaccion($bd->conectar());
    if (!$err) {
        $date0 = DateTime::createFromFormat('Y-m-d',$T0);
        $date1 = DateTime::createFromFormat('Y-m-d',$T1);
        $transacciones = $tra->get_TransactionArray($_SESSION['id'],$date0->format('Y-m-d'),$date1->format('Y-m-d'));

        $labels = array();
        $xVals = array();
        foreach ($transacciones as $row){
            $subTime = substr($row->datestamp,0,10);
            $key = array_search($subTime, $labels);
            if (false !== $key){
                //si ya esta le suma el valor
                $sum = $xVals[$key];
                $sum = $sum + $row->quantity;
                $xVals[$key] = $sum;
            } else {
                //si no esta lo agrega
                array_push($labels,$subTime);
                array_push($xVals,$row->quantity);
            }
        }
    }

    if ($err) {
        $mensaje = [
            "estado"=>0,
            "mensaje"=>"Rango de fechas incorrecto"
        ];
        echo json_encode($mensaje);  
    } else {
        if($transacciones){
            $mensaje = [
                "estado"=>1,
                "mensaje"=>"Informacion del grafico dibujada correctamente",
                "labels"=>$labels,
                "xVals"=>$xVals
            ];
            echo json_encode($mensaje);
        }else{
            $mensaje = [
                "estado"=>0,
                "mensaje"=>"Ha ocurrido un error al crear el grafico"
            ];
            echo json_encode($mensaje);
        }
    }
?>