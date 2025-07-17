<?php
require_once "src/route.php";
// require_once "src/models/camper.php";
// require_once "src/models/persona.php";
// require_once "src/models/invitado.php";
// require_once "src/models/empleado.php";
// require_once "src/models/asistencia.php";

// Objeto
// $julian = new Camper('Julian', 36, '1234');

// Todo sobre Julian
// var_dump($julian->informacion()); // Error por falta de parametros

// $julian->edad = 24;

// echo $julian->edad; // 24

// $julian->asginarNombre('Julian el constante joven de otra altura');
// echo '<br>';

// echo $julian->getDocumento();

// var_dump($julian->informacion());
// echo '<br>';

// function ingresarAZonaFranca(Persona $persona): void
// {
//     // $mayorEdad = $persona->esMayor() ? 'True' : 'False';
//     // echo "<strong>Ingresa la persona:</strong> {$persona->getNombre()} <br> <strong>MayorEdad:</strong> {$mayorEdad} <br> <br>";
//     echo "Ingresa la persona: {$persona->getNombre()} {$persona->esMayor()} <br> <br>";
// }

// function tomarAsistencia(Asistencia $funcionario) {
//     echo '<hr>';
//     echo $funcionario->MarcarIngreso("PIN");
//     echo '<hr>';
//     echo $funcionario->MarcarSalida("Carnet");
//     echo '<hr>';
//     echo '<br>';
// }

// // No deberia poderse crear una instancia en la clase base, para evitar duplicidad o problemas
// // $persona = new Persona(7, 'Santiago Cruz', 56, '987654321', 'CC');

// $invitado = new Invitado(10, 'Leo Messi', 32, '1010', 'CC', 'Leo', 'Cristiano');

// $empleado = new Empleado(7, 'Cristiano Ronaldo', 40, '9779', 'CC', 'Administrador', 2000);

// // $empleado = new Empleado(7, 'Cristiano Ronaldo', 40, '9779', 'CC', 'Administrador', 2000);
// // $empleado1 = new Empleado(9, 'Adrian Ronaldo', 40, '9779', 'CC', 'Administrador', 2000);
// $camper = new Camper(14, 'James Rodriguez', 22, '4321', 'CC');


// // ingresarAZonaFranca($persona);
// ingresarAZonaFranca($invitado);
// ingresarAZonaFranca($empleado);
// ingresarAZonaFranca($camper);

// tomarAsistencia($camper);
// tomarAsistencia($empleado1);

// exit;



//$method = $_SERVER['REQUEST_METHOD'];

$route = new Route(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD']
);

$route->handle();

// // echo json_encode(['data' => $method]);

// // localhost:8081/?filter=datos
// $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
// // echo json_encode($uri);

// // Obtener / {path} / {otherPath} / ..{}
// // 0 -> products
// // 1 -> 1
// $recurso = $uri[0];
// $id = $uri[1] ?? null;

// header('Content-Type: application/json');

// http://localhost:8081{/....} -> Endpoints
// if($recurso !== 'products') {
//     http_response_code(404);
//     echo json_encode(['error' => 'Recurso no encontrado', 'code' => 404, 'errorUrl' => 'https://http.cat/status/404']);
//     exit;
// }

// switch ($method) {
//     case 'GET':
//         // Relizar SELECT
//         $stmt = $pdo->prepare("SELECT id, name, price FROM products");
//         $stmt->execute();
//         $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         echo json_encode($response);
//         break;

//     case 'POST':
//         // Relizar INSERT
//         $data = json_decode(file_get_contents('php://input'), true);
//         $stmt = $pdo->prepare("INSERT INTO products(name, price) VALUES(?, ?)");
//         $stmt->execute([
//             $data['name'], $data['price']
//         ]);
//         http_response_code(201);
//         $data['id'] = $pdo->lastInsertId();
//         echo json_encode($data);
//         break;

//     case 'PUT':
//         // Realizar UPDATE
//         if(!$id) {
//             http_response_code(400);
//             echo json_encode(['error' => 'ID no encontrado', 'code' => 400, 'errorUrl' => 'https://http.cat/status/400']);
//             exit;
//         }

//         $data = json_decode(file_get_contents('php://input'), true);
//         $stmt = $pdo->prepare("UPDATE products SET id=?, name=?, price=? WHERE id=?");
//         $stmt->execute([
//             $data['id'],
//             $data['name'],
//             $data['price'],
//             $id
//         ]);
//         echo json_encode($data);
//         break;

//     case 'DELETE':
//         //Realizar DROP
//         if(!$id) {
//             http_response_code(400);
//             echo json_encode(['error' => 'ID no encontrado', 'code' => 400, 'errorUrl' => 'https://http.cat/status/400']);
//             exit;
//         }
//         // recuperar datos, guardar en variable, eliminar, si esta bien, mostrar
//         $stmt = $pdo->prepare("SELECT id, name, price FROM products WHERE id=?");
//         $stmt->execute([
//             $id
//         ]);
//         $last_delete = $stmt->fetch(PDO::FETCH_ASSOC);


//         $data = json_decode(file_get_contents('php://input'), true);
//         $stmt = $pdo->prepare('DELETE FROM products WHERE id=?');
//         $stmt->execute([
//             $id
//         ]);

//         echo json_encode($last_delete);
//         break;

//     default:
//         echo 'Esa opción no existe';
//         break;
// }
