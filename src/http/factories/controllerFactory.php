<?php
include_once "src/http/controllers/crudController.php";
include_once "src/http/controllers/productoController.php";
include_once "src/http/controllers/camperController.php";

class ControllerFactory {

    public static function create(string $path): CrudController | null {
        // CamperController es un Object
        // ProductController es un Object
        switch ($path) {
            case 'producto':
                return new ProductoController();
                break;

            case 'camper':
                return new CamperController();
                break;

            default:
                http_response_code(404);
                echo json_encode(['error' => 'Recurso no encontrado', 'code' => 404, 'errorUrl' => 'https://http.cat/404']);
                exit;
        }
        return null;
    }
}