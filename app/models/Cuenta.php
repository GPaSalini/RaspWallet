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
            $sql = "SELECT * FROM cuenta WHERE id_acc=:id;";
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

    public function post_Account($id_usr,$account,$description){
        try{
            $sql = "INSERT INTO cuenta(id_usr,account,description) VALUES (:id_usr,:account,:description);";
            $result = $this->bd->prepare($sql);
            $result->bindParam('id_usr',$id_usr);
            $result->bindParam('account',$account);
            $result->bindParam('description',$description);
            $result->execute();
            return true;
        }catch(PDOexception $e){
            return false;
        }
    }

    public function put_Account($id,$account,$description){
        try{
            $sql = "UPDATE cuenta SET account=:account,description=:description WHERE id_acc=:id;";
            $result = $this->bd->prepare($sql);
            $result->bindParam('id',$id);
            $result->bindParam('account',$account);
            $result->bindParam('description',$description);
            $result->execute();
            return true;
        }catch(PDOexception $e){
            return false;
        }
    }
}
?>