<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { 
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS'); 
    header('Access-Control-Allow-Headers: token, Content-Type'); 
    header('Access-Control-Max-Age: 1728000'); 
    header('Content-Length: 0'); 
    header('Content-Type: text/plain'); 
    die(); 
} 
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Socios.php");
    $socios = new Socios();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetSocios":
            $datos=$socios->get_socios();
            echo json_encode($datos);
        break;

        case "GetUnSocio":
            $datos=$socios->get_socio($body["id"]);
            echo json_encode($datos);
        break;

        case "InsertSocio":
            $datos=$socios->insert_socio($body["nombre"],$body["razon_social"],$body["direccion"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]);
            echo json_encode("Socio agregado");
        break;

        case "DeletetSocio":
            $datos=$socios->delete_socio($body["id"]);
            echo json_encode("Socio Eliminado");
        break;

        //UPDATE
        case "UpdateSocio":
            $datos=$socios->update_socio($body["id"],$body["nombre"],$body["razon_social"],$body["direccion"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]);
            echo json_encode("Socio Actualizado");
        break;
        
    }
?>