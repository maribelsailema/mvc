<?php
// referencia a Cruds
include_once '../MODELS/Cruds.php';
/*
if ($_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $vars);
    $_POST = array_merge($_POST, $vars);
}
*/
$opc = $_SERVER['REQUEST_METHOD'];
switch($opc){
    case 'GET':
        if (isset($_GET['cedula']) && $_GET['cedula'] != '') {
            Cruds::buscarEst();
        } else {
            Cruds::listarEst();
        }
        break;
    case 'POST':
        Cruds::insertEst();
        break;
    case 'PUT':
        Cruds::updateEst();
        break;
    case 'DELETE':
        Cruds::deleteEst();
        break;
}
?>