<?php
include_once "crudController.php";

class CamperController extends CrudController
{
    public static array $dispath = [
        "GET" => "get",
        "POST" => "create",
        "PUT" => "update"
    ];

    public static function calcular() {
        // PoductoController::calcular
        // X - new ProductoController(Arg $uno, Arg $dos, Otro $otro);
    }

    public function get() {
        echo json_encode(['response' => 'Recurso camper get desde el controller ']);
    }

    public function create() {
        echo json_encode(['response' => 'Recurso camper create']);
    }

    public function update() {
        echo json_encode(['response' => 'Recurso camper update']);
    }

    public function delete() {
        echo json_encode(['response' => 'Recurso camper delete']);
    }
}

?>