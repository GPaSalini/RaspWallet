<?php
    session_start();
    if(isset($_SESSION['user'])){
        require_once("../models/BD.php");
        require_once("../models/Cuenta.php");
        
        $bd = new BD();
        $acc = new Cuenta($bd->conectar());
        $accounts = $acc->get_AccountList($_SESSION['id']);

        $var_menu = 2;
        require_once("../views/vistaCuentas.php");
    }else{
        header("location: ./ctrlBienvenido.php");
    } 
?>