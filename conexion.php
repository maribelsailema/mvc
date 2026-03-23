<?php
class conexion {
    public function conectar(){
        try{
        $conexion = new PDO("mysql:host=localhost;dbname=soa","root","");

        }catch(PDOException $e){
    die("no se conecto".$e -> getMessage());
        }
        return $conexion;
    }
}
?>