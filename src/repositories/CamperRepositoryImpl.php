<?php

namespace App\repositories;
use App\repositories\CamperRepository;
use PDO;

// require_once "CamperRepository.php";

class CamperRepositoryImpl implements CamperRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // GET
    // Devolver en formato
    // ID,
    // nombre,
    // edad,
    // documento
    // tipoDocumento
    // nivelIngles <2 BAJO, <4 MEDIO, >4 ALTO / 0-6
    // nivelProgramacion: <2 JR, <=3 JR M, >3 JR A / 0-5

    // PUT > documento = ?
    // nombre,
    // edad,
    // documento,
    // tipo_documento,
    // nivelIngles,
    //nivelProgramacion,

    // DELETE > documento
    // ID,
    // nombre,
    // edad,
    // documento,
    // tipo_documento,
    // nivelIngles,
    // nivelProgramacion,

    public function findById(int $id): ?object
    {
        $stmt = $this->db->prepare("SELECT id, nombre, edad, documento, tipo_documento, nivel_ingles, nivel_programacion FROM campers WHERE id = ?");
        $stmt->execute([$id]);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        return $response ? (object)$response : (object)["message" => "No se encontro el camper"];
    }

    public function getAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM campers ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): ?object
    {
        $stmt = $this->db->prepare("INSERT INTO campers(nombre,edad,documento,tipo_documento,nivel_ingles,nivel_programacion) VALUES(?,?,?,?,?,?)");
        $stmt->execute([
            $data['nombre'],
            $data['edad'],
            $data['documento'],
            $data['tipo_documento'],
            $data['skill_ingles'],
            $data['skill_programacion'],
        ]);
        if ($this->db->lastInsertId() > 0) {
            $data['id'] = $this->db->lastInsertId();
            return (object)$data;
        } else {
            return (object)["error" => "Error al insertar la data"];
        }
        
    }

    public function update(int $id, array $data): object
    {
        $stmt = $this->db->prepare("UPDATE campers SET nombre=?, edad=?, documento=?, tipo_documento=?, nivel_ingles=?, nivel_programacion=? WHERE id=?");
        $stmt->execute([
            $data['nombre'],
            $data['edad'],
            $data['documento'],
            $data['tipo_documento'],
            $data['skill_ingles'],
            $data['skill_programacion'],
            $id
        ]);

        if ($stmt->rowCount() > 0) {
            $data['id'] = $id;
            return (object)$data;
        } else {
            return (object)["error" => "DTO -> Data Transfer Object..... Composer......"];
        }
    }
}
