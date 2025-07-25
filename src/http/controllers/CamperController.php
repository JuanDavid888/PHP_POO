<?php

namespace App\http\controllers;
use App\http\controllers\CrudController;
use App\repositories\CamperRepository;  

// include_once "CrudController.php";
// include_once "src/repositories/CamperRepository.php";

class CamperController extends CrudController
{
    private CamperRepository $repository;

    public function __construct(CamperRepository $repository)
    {
        $this->repository = $repository;
    }

    public static array $dispatch = [
        "GET" => "get",
        "POST" => "create",
        "PUT" => "update",
        "DELETE" => "delete"
    ];

    public function get(array $args): void
    {
        // localhost:8081/camper => getAll
        // localhost:8081/camper/123/reporte/enero?filter=edad => finById
        // $args = [123, 'edad => 18'] (filter)
        // "params" => [123,reporte,enero],
        // "data" => [],
        // "query" = [filter => edad] 

        if (isset($args['params'][0])) {
            $response = $this->repository->findById((int)$args['params'][0]);
        } else {
            $response = $this->repository->getAll();
        }

        if (!$response) {
            echo json_encode(['message' => 'No se encontraron datos']);
            return;
        }

        echo json_encode($response);
    }

    public function create(array $args): void
    {
        if (!isset($args["data"])) {
            http_response_code(400);
            echo json_encode(['error' => 'Bad request', 'code' => 400, 'errorUrl' => 'https://http.cat/400']);
            return;
        }
        $response = $this->repository->create($args["data"]);
        if (!$response) {
            http_response_code(409);
            echo json_encode(['error' => 'Paso algo en la creacion....', 'code' => 409, 'errorUrl' => 'https://http.cat/409']);
            return;
        }
        echo json_encode($response);
    }

    public function update(array $args): void
    {
        $doc = (int)$args["params"][0];

        if (!isset($doc)) {
            http_response_code(404);
            echo json_encode(['error' => 'ezta cono tv corasom bazio..... ', 'code' => 404, 'errorUrl' => 'https://http.cat/404']);
            return;
        }

        $response = $this->repository->update($doc, $args["data"]);

        if (!isset($response)) {
            http_response_code(400);
            echo json_encode(['error' => 'Bad request', 'code' => 400, 'errorUrl' => 'https://http.cat/400']);
            return;
        }

        echo json_encode($response);
    }

    public function delete(array $args): void
    {
        $doc = (int)$args["params"][0];

        if (!isset($doc)) {
            http_response_code(404);
            echo json_encode(['error' => 'No hay datos encontrados', 'code' => 404, 'errorUrl' => 'https://http.cat/404']);
            return;
        }

        $response = $this->repository->delete($doc);

        if (!isset($response)) {
            http_response_code(400);
            echo json_encode(['error' => 'Bad request', 'code' => 400, 'errorUrl' => 'https://http.cat/400']);
            return;
        }

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
