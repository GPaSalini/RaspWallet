<?php
class Usuario{
    private $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function get_UsersList(){
        try {
            $sql = "SELECT * FROM usuario ORDER BY id_usr ASC;";
            $result = $this->bd->prepare($sql);
            $result->execute();
            if($result->rowCount()>0){
                $users = $result->fetchAll(PDO::FETCH_OBJ);
                return $users;
            }else{
                return false;
            }
        }catch(PDOexception $e){
            return false;
        }
    }

    public function get_User($id){
        try {
            $sql = "SELECT * FROM usuario WHERE id_usr=:id;";
            $result = $this->bd->prepare($sql);
            $result->bindParam(':id',$id);
            $result->execute();
            if($result->rowCount()==1){
                $user = $result->fetchAll(PDO::FETCH_OBJ);
                return $user;
            }else{
                return false;
            }
        }catch(PDOexception $e){
            return false;
        }
    }

    public function get_UserName($username){
        try {
            $sql = "SELECT * FROM usuario WHERE username=:username;";
            $result = $this->bd->prepare($sql);
            $result->bindParam(':username',$username);
            $result->execute();
            if($result->rowCount()==1){
                $user = $result->fetchAll(PDO::FETCH_OBJ);
                return $user;
            }else{
                return false;
            }
        }catch(PDOexception $e){
            return false;
        }
    }

    public function post_User($username,$password,$question,$answer){
        try{
            $sql = "INSERT INTO usuario(username,password,question,answer) VALUES (:username,:password,:question,:answer);";
            $result = $this->bd->prepare($sql);
            $result->bindParam(':username',$username);
            $result->bindParam(':password',$password);
            $result->bindParam(':question',$question);
            $result->bindParam(':answer',$answer);
            $result->execute();
            return true;
        }catch(PDOexception $e){
            return false;
        }
    }

    public function put_User($id,$password){
        try{
            $sql = "UPDATE usuario SET password=$password WHERE id_usr=:id;";
            $result = $this->bd->prepare($sql);
            $result->bindParam(':id',$id);
            $result->execute();
            return true;
        }catch(PDOexception $e){
            return false;
        }
    }

    public function get_UserConnect($pass,$hash){
        if(password_verify($pass,$hash)){
            return true;
        }else{
            return false;
        }
    }

    public function get_encrypted($string){
        $result = password_hash($string,PASSWORD_DEFAULT);
        return $result;
    }
}
?>