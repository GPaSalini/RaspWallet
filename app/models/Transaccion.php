<?php
class Transaccion{
    private $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function get_TransactionList($id_usr){
        try {
            $sql = "SELECT * FROM transacciones WHERE id_usr=$id_usr ORDER BY datestamp ASC;";
            $result = $this->bd->query($sql);
            if($result->rowCount()>0){
                $transactions = $result->fetchAll(PDO::FETCH_OBJ);
                return $transactions;
            }else{
                return false;
            }
        }catch(PDOexception $e){
            return false;
        }
    }

    public function get_Transaction($id){
        try {
            $sql = "SELECT * FROM transaccion WHERE id_trs=$id;";
            $result = $this->bd->query($sql);
            if($result->rowCount()==1){
                $transaction = $result->fetchAll(PDO::FETCH_OBJ);
                return $transaction;
            }else{
                return false;
            }
        }catch(PDOexception $e){
            return false;
        }
    }

    public function post_Transaction($usr,$acc,$qn,$datestamp,$description){
        try{
            $sql = "INSERT INTO transaccion(id_usr,id_acc,quantity,datestamp,description) VALUES (:usr,:acc,:qn,:datestamp,:description);";
            $result = $this->bd->prepare($sql);
            $result->bindParam('usr',$usr);
            $result->bindParam('acc',$acc);
            $result->bindParam('qn',$qn);
            $result->bindParam('datestamp',$datestamp);
            $result->bindParam('description',$description);
            $result->execute();
            return true;
        }catch(PDOexception $e){
            echo($e);
            return false;
        }
    }

    public function put_Transaction($id,$acc,$qn,$datestamp,$description){
        try{
            $sql = "UPDATE transaccion SET id_acc=:acc,quantity=:qn,datestamp=:datestamp,description=:description WHERE id_trs=:id";
            $result = $this->bd->prepare($sql);
            $result->bindParam('id',$id);
            $result->bindParam('acc',$acc);
            $result->bindParam('qn',$qn);
            $result->bindParam('datestamp',$datestamp);
            $result->bindParam('description',$description);
            $result->execute();
            return true;
        }catch(PDOexception $e){
            return false;
        }
    }
}
?>