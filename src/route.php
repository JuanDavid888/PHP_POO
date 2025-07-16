<?php
include_once "src/http/controllers/productoController.php";
include_once "src/http/controllers/camperController.php";
include_once "src/http/controllers/crudController.php";
include_once "src/http/factories/controllerFactory.php";

class Route
{
    private string $metodo;
    private string $recurso;
    private array $parametros;

    public function __construct(
        string $requestUri,
        string $method,
    ) {
        $uri = explode('/', trim($requestUri, '/'));

        $this->metodo = strtoupper($method);

        $this->recurso = strtolower($uri[0]); // /Usuario/1...

        // Asignar los indices desde el 1 hasta el n.
        $this->parametros = isset($uri[1]) ? array_slice($uri, 1) : []; // /Usuario -> [/1/products]
    }

    public function handle()
    {
        header('Content-Type: application/json');

        //Clase que controle todos los metodos que necesitamos para producto(table en base de datos)
        //GET, POST, PUT ... -> decide que vamos hacer

        // $dispath = [
        //     "GET" => "get",
        //     "POST" => "create",
        //     "PUT" => "update",
        //     "DELETE" => "delete"
        // ];

        // switch ($this->recurso) {
        //     case 'producto':
        //         $controller = new ProductoController();
        //         break;

        //     case 'camper':
        //         $controller = new CamperController();
        //         break;

        //     case 'invitado':
        //         echo json_encode(['response' => 'Recurso invitado ' . $this->metodo]);
        //         break;

        //     case 'empleado':
        //         echo json_encode(['response' => 'Recurso empleado ' . $this->metodo]);
        //         break;

        //     default:
        //         http_response_code(404);
        //         echo json_encode(['error' => 'Recurso no encontrado', 'code' => 404, 'errorUrl' => 'https://http.cat/404']);
        //         exit;
        // }

        $controller = ControllerFactory::create($this->recurso);

        if (!array_key_exists($this->metodo, $controller::$dispath)) {
            http_response_code(405);
            echo json_encode(['error' => 'Metodo no permitido', 'code' => 405, 'errorUrl' => 'https://http.cat/405']);
            exit;
        }

        // Si el metodo es de la clave GET -> get, PUT -> update, ...
        $funcion = $controller::$dispath[$this->metodo];

        if(!method_exists($controller, $funcion)) {
            http_response_code(501);
            echo json_encode(['error' => 'Metodo no implementado', 'code' => 501, 'errorUrl' => 'https://http.cat/501']);
            exit;
        }

        $controller->$funcion();

        // switch ($this->metodo) {
        //     case 'GET':
        //         $controller->get();
        //         break;

        //     case 'POST':
        //         $controller->create();
        //         break;

        //     case 'PUT':
        //         $controller->update();
        //         break;

        //     case 'DELETR':
        //         $controller->delete();
        //         break;

        //     default:
        //         http_response_code(405);
        //         echo json_encode(['error' => 'Metodo no permitido', 'code' => 405, 'errorUrl' => 'https://http.cat/405']);
        //         exit;
        // }
    }
}
