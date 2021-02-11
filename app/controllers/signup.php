<?php
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Usuario.php");

    $bd = new BD();
    $usr = new Usuario($bd->conectar());

    $user = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);
    $Rpassword = filter_input(INPUT_POST,'Rpass',FILTER_SANITIZE_STRING);
    $question = filter_input(INPUT_POST,'question',FILTER_SANITIZE_NUMBER_INT);
    $answer = filter_input(INPUT_POST,'answer',FILTER_SANITIZE_STRING);

    if(strcmp($password,$Rpassword)==0){
        $respuesta = $usr->get_UserName($user);
        if(!$respuesta){
            $respuesta = $usr->post_User($user,$usr->get_encrypted($password),$question,$answer);
            if (!$respuesta){
                $mensaje = [
                    "estado"=>0,
                    "encrypted"=>$usr->get_encrypted($password),
                    "mensaje"=>"Se ha producido un error al intentar registrar el nuevo usuario"
                ];
                echo json_encode($mensaje);
            }else{
                $mensaje = [
                    "estado"=>1,
                    "mensaje"=>"Se ha registrado un nuevo usuario"
                ];
                echo json_encode($mensaje);
            }
        }else{    
            $mensaje = [
                "estado"=>0,
                "mensaje"=>"El nombre de usuario ya esta en uso"
            ];
            echo json_encode($mensaje);
        }    
    }else{    
        $mensaje = [
            "estado"=>0,
            "mensaje"=>"Las contraseñas no coinciden"
        ];
        echo json_encode($mensaje);
    }
?>