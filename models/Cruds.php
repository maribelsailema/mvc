<?php
include_once 'conexion.php';
class Cruds{
    public static function listarEst(){
        $objCon = new Conexion;
        $conexion = $objCon->conectar();
        if($conexion){
            $sql = "SELECT * FROM ESTUDIANTE";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($data);
        }else{
            echo json_encode ([]);
        }
    }

    public static function insertEst(){
        $objCon = new Conexion;
        $conexion = $objCon->conectar();
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        if($conexion){
            $sql = "INSERT INTO ESTUDIANTE VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$direccion')";
            $result = $conexion->prepare($sql);
            $result->execute();
            echo json_encode(['message' => 'Estudiante insertado correctamente']);
        }else{
            echo json_encode(['message' => 'Error al conectar a la base de datos']);
        }
    }

    public static function updateEst(){
        $objCon = new Conexion;
        $conexion = $objCon->conectar();
        $cedula = $_GET['cedula'];
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $telefono = $_GET['telefono'];
        $direccion = $_GET['direccion'];
        if($conexion){
            $sql = "UPDATE ESTUDIANTE SET nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion' WHERE cedula='$cedula'";
            $result = $conexion->prepare($sql);
            $result->execute();
            echo json_encode(['message' => 'Estudiante actualizado correctamente']);
        }else{
            echo json_encode(['message' => 'Error al conectar a la base de datos']);
        }
    }

    public static function deleteEst(){
        $objCon = new Conexion;
        $conexion = $objCon->conectar();
        $cedula = $_GET['cedula'];
        if($conexion){
            $sql = "DELETE FROM ESTUDIANTE WHERE cedula='$cedula'";
            $result = $conexion->prepare($sql);
            $result->execute();
            echo json_encode(['message' => 'Estudiante eliminado correctamente']);
        }else{
            echo json_encode(['message' => 'Error al conectar a la base de datos']);
        }
    }

    public static function buscarEst(){
        $objCon = new Conexion;
        $conexion = $objCon->conectar();
        $cedula = $_GET['cedula'];
        if($conexion){
            // Usar placeholders (?) para evitar inyecciones SQL
            $sql = "SELECT * FROM ESTUDIANTE WHERE cedula = ?";
            $result = $conexion->prepare($sql);
            $result->execute([$cedula]);
            $data = $result->fetchAll(PDO::FETCH_ASSOC); // Obtener los datos reales
            echo json_encode($data); // Devolver el array con el estudiante
        }else{
            echo json_encode(['message' => 'Error al conectar']);
        }
    }
}
?>