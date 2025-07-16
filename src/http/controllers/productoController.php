<?php
include_once "src/http/controllers/crudController.php";

// Controlador -> Mediador entre la interfaz y metodos
class ProductoController extends CrudController
{

    public static array $dispath = [
        "GET" => "get",
        "POST" => "create",
        "PUT" => "update",
        "DELETE" => "delete"
    ];

    public static function calcular() {
        // PoductoController::calcular
        // X - new ProductoController(Arg $uno, Arg $dos, Otro $otro);
    }
    
    public function get() {
        echo json_encode(['response' => 'Recurso producto get']);
    }

    public function create() {
        echo json_encode(['response' => 'Recurso producto create']);
    }

    public function update() {
        echo json_encode(['response' => 'Recurso producto update']);
    }

    public function delete() {
        echo json_encode(['response' => 'Recurso producto delete']);
    }
}
?>