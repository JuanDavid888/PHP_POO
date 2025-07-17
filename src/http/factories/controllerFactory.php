<?php
include_once "src/http/controllers/crudController.php";
include_once "src/http/controllers/productoController.php";
include_once "src/http/controllers/camperController.php";
include_once "src/repositories/camperRepositoryImpl.php";
// include_once "src/repositories/CamperRepositoryJsonImpl.php";
include_once "src/core/databasePDO.php";

class ControllerFactory {

    public static function create(string $path): CrudController
    {
        // CamperController es un Object
        // ProductController es un Object
        switch ($path) {
            case 'producto':
                return new ProductoController();
                break;

            case 'camper':
                $respository = new CamperRepositoryImpl(DatabasePDO::getConnection());
                
                return new CamperController($respository);
                break;

            default:
                http_response_code(404);
                echo json_encode(['error' => 'Recurso no encontrado', 'code' => 404, 'errorUrl' => 'https://http.cat/404']);
                exit;
        }
    }
}