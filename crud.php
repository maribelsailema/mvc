<?php
include_once "conexion.php";

class crud {

public static function listar(){

$objcon = new conexion();
$conexion = $objcon->conectar();

$sql = "select * from productos";
$res = $conexion->prepare($sql);
$res->execute();

$data = $res->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

}



public static function insertar(){

$objcon = new conexion();
$conexion = $objcon->conectar();

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$sqlBuscar = "select * from productos where nombre like '%$nombre%'";
$bus = $conexion->prepare($sqlBuscar);
$bus->execute();

if ($bus->rowCount() == 0) {

$sqlInsertar = "
insert into productos(nombre,cantidad,precio)
values('$nombre','$cantidad','$precio')
";

$ins = $conexion->prepare($sqlInsertar);
$ins->execute();

} else {

$sqlUpdate = "
update productos
set cantidad=cantidad+'$cantidad'
where nombre='$nombre'
";

$up = $conexion->prepare($sqlUpdate);
$up->execute();

}

echo json_encode("ok");

}



public static function eliminar(){

$objcon = new conexion();
$conexion = $objcon->conectar();

$nombre = $_GET['nombre'];

$sql = "delete from productos where nombre='$nombre'";
$res = $conexion->prepare($sql);
$res->execute();

echo json_encode("ok");

}



public static function actualizar(){

$objcon = new conexion();
$conexion = $objcon->conectar();

$nombre = $_GET['nombre'];
$cantidad = $_GET['cantidad'];
$precio = $_GET['precio'];

$sql = "
update productos
set cantidad='$cantidad',
precio='$precio'
where nombre='$nombre'
";

$res = $conexion->prepare($sql);
$res->execute();

echo json_encode("ok");

}



public static function buscar(){

$objcon = new conexion();
$conexion = $objcon->conectar();

$nombre = $_GET['nombre'];

$sql = "select * from productos where nombre='$nombre'";
$res = $conexion->prepare($sql);
$res->execute();

$data = $res->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

}

}
?>