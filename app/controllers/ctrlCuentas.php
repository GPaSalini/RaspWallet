<?php
    session_start();
    if(isset($_SESSION['user'])){
        require_once("../models/BD.php");
        require_once("../models/Cuenta.php");
        
        $bd = new BD();
        $acc = new Cuenta($bd->conectar());
        $accounts = $acc->get_AccountList($_SESSION['id']);

        require_once("../views/vistaCuentas.php");
    }else{
        header("location:../views/index.php");
    } 
?>