<?php
include_once "CrudController.php";
include_once "src/repositories/CamperRepository.php";

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
        $reponse = $this->repository->create($args["data"]);
        if (!$reponse) {
            http_response_code(409);
            echo json_encode(['error' => 'Paso algo en la creacion....', 'code' => 409, 'errorUrl' => 'https://http.cat/409']);
            return;
        }
        echo json_encode($reponse);
    }

    public function update(array $args): void
    {
        echo json_encode(['response' => 'Recurso camper update jejejeje']);
    }
}