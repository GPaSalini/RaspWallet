<?php
    session_start();
    if(isset($_SESSION['user'])){
        require_once("../models/BD.php");
        require_once("../models/Transaccion.php");
        
        $bd = new BD();
        $tra = new Transaccion($bd->conectar());
        $dateCurr = DateTime::createFromFormat('Y-m-d',date("Y-m-d"));
        $date1 = DateTime::createFromFormat('Y-m-d',date("Y-m-d"));
        $date1 = $date1->modify(' -1 month');
        $dateCurr = $dateCurr->format('Y-m-d');
        $date1 = $date1->format('Y-m-d');
        $transacciones = $tra->get_TransactionArray($_SESSION['id'],$date1,$dateCurr);

        $labels = array();
        $xVals = array();
        $incomeT = 0;
        $outcomeT = 0;
        foreach ($transacciones as $row){
            $subTime = substr($row->datestamp,0,10);
            $key = array_search($subTime, $labels);
            if ($row->quantity >0){
                $incomeT = $incomeT + $row->quantity;
            } else {
                $outcomeT = $outcomeT + $row->quantity;
            }
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

        $var_menu = 4;
        require_once("../views/vistaGrafico.php");
    } else {
        header("location: ./ctrlBienvenido.php");
    }
?>