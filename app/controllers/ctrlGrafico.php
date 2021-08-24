<?php
    session_start();
    if(isset($_SESSION['user'])){
        require_once("../views/vistaGrafico.php");
    } else {
        header("location: ./ctrlBienvenido.php");
    }
?>