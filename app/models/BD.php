<?php
class BD{
    private $user="postgres";
    private $password="PASSWORD_HERE";
    private $bd_name="postgres";
    private $port="5432";
    private $server="localhost";

    public function conectar(){
        try {
            $pgsqlConnect = "pgsql:host=$this->server;port=$this->port;dbname=$this->bd_name";
            $bdConnect = new PDO($pgsqlConnect,$this->user,$this->password);
            $bdConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $bdConnect;
        } catch (Exception $e) {
            echo "Ocurrio un error con la base de datos: " . $e->getMessage();
            return false;
        }
    }
}
?>

