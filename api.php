<?php
include_once "crud.php";

$opc= $_SERVER['REQUEST_METHOD'];
switch ($opc) {
    case 'GET':
       if (isset($_GET['nombre']) && $_GET['nombre'] != "") {
        crud::buscar();
       } else {
        crud::listar();
       }
       
        break;
    case 'POST':
       crud::insertar();
        break;
    case 'DELETE':
       crud::eliminar();
        break;
    case 'PUT':
       crud::actualizar();
        break;
    
    default:
        
        break;
}
?>