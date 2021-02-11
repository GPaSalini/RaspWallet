<?php
    header('Content-Type: application/json');
    require_once("../models/BD.php");
    require_once("../models/Usuario.php");

    $bd = new BD();
    $usr = new Usuario($bd->conectar());

    $user = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);

    $resultado = $usr->get_UserName($user);

    if(!$resultado){
        $mensaje = [
            "estado"=>0,
            "mensaje"=>"Usuario no existe"
        ];
        echo json_encode($mensaje);
    } else{    
        if($usr->get_UserConnect($password,$resultado[0]->password)){
            session_start();
            $_SESSION['user'] = $resultado[0]->username;
            $_SESSION['id'] = $resultado[0]->id_usr;
            //header("location:../controllers/ctrlCuentas.php");//redireccionar a home? o perfil
            $mensaje = [
                "estado"=>1,
                "mensaje"=>"Ingresando..."
            ];
            echo json_encode($mensaje);
        }else{
            $mensaje = [
                "estado"=>0,
                "mensaje"=>"Credenciales incorrectas"
            ];
            echo json_encode($mensaje);
        }
    }
?>