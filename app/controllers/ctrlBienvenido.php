<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("location:../controllers/ctrlCuentas.php");
    } else {
        include_once('../views/vistaInicio.php');
    }
?>