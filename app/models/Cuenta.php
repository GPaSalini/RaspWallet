<?php
class Cuenta{
    private $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function get_AccountList($id){
        try {
            $sql = "SELECT * FROM cuenta WHERE id_usr=$id ORDER BY account ASC;";
            $result = $this->bd->prepare($sql);
            $result->execute();
            if($result->rowCount()>0){
                $accounts = $result->fetchAll(PDO::FETCH_OBJ);
                return $accounts;
            }else{
                return false;
            }
        }catch(PDOexception $e){
            return false;
        }
    }

    public function get_Account($id){
        try {
            $sql = "SELECT * FROM cuenta WHERE id_usr=:id;";
            $result = $this->bd->prepare($sql);
            $result->bindParam(':id',$id);
            $result->execute();
            if($result->rowCount()==1){
                $account = $result->fetchAll(PDO::FETCH_OBJ);
                return $account;
            }else{
                return false;
            }
        }catch(PDOexception $e){
            return false;
        }
    }

    public function post_Account($id_usr,$id_acc,$description){
        try{
            $sql = "INSERT INTO cuenta(id_usr,id_acc,description) VALUES (:id_usr,:id_acc,:description);";
            $result = $this->bd->prepare($sql);
            $result->bindParam('id_usr',$id_usr);
            $result->bindParam('id_acc',$account);
            $result->bindParam('description',$description);
            $result->execute();
            return true;
        }catch(PDOexception $e){
            return false;
        }
    }

    public function put_Account($id,$id_acc,$description){
        try{
            $sql = "UPDATE cuenta SET account=:id_acc,description=:description WHERE id_usr=:id;";
            $result = $this->bd->prepare($sql);
            $result->bindParam('id',$id);
            $result->bindParam('id_acc',$id_acc);
            $result->bindParam('description',$description);
            $result->execute();
            return true;
        }catch(PDOexception $e){
            return false;
        }
    }
}
?>