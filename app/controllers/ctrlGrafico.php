<?php
    session_start();
    if(isset($_SESSION['user'])){
        require_once("../models/BD.php");
        require_once("../models/Transaccion.php");
        
        $bd = new BD();
        $tra = new Transaccion($bd->conectar());
        $transacciones = $tra->get_TransactionArray(30);

        $labels = array();
        $xVals = array();
        foreach ($transacciones as $row){
            $key = array_search($row->datestamp, $labels);
            if (false !== $key){
                //si ya esta le suma el valor
                $sum = $xVals[$key];
                $sum = $sum + $row->quantity;
                $xVals[$key] = $sum;
            } else {
                //si no esta lo agrega
                array_push($labels,$row->datestamp);
                array_push($xVals,$row->quantity);
            }
        }

        require_once("../views/vistaGrafico.php");
    } else {
        header("location: ./ctrlBienvenido.php");
    }
?>