<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("location:../controllers/ctrlCuentas.php");
    }

    include_once('../views/vistaRegistro.php')
?>