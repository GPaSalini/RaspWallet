<?php
    session_start();
    if(isset($_SESSION['user'])){
        require_once("../models/BD.php");
        require_once("../models/Cuenta.php");
        require_once("../models/Transaccion.php");
        
        $bd = new BD();
        $acc = new Cuenta($bd->conectar());
        $accounts = $acc->get_AccountList($_SESSION['id']);
        $tran = new Transaccion($bd->conectar());
        $transactions = $tran->get_TransactionList($_SESSION['id']);

        require_once("../views/vistaTransacciones.php");
    }else{
        header("location: ./ctrlBienvenido.php");
    }
?>