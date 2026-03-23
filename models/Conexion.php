<?php
class Conexion{
    public function conectar(){
        try{
            $conn = new PDO("mysql:localhost; dbname=soa","root","");
            return $conn;
        }catch(PDOExceptio $e){
            echo "Fallo", $e->getMessage();
            return null;
        }
    } 
}
?>