<?php

namespace App\repositories;
use App\repositories\ProductoRepository;
use PDO;

// require_once "ProductoRepository.php";

class ProductoRepositoryImpl implements ProductoRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findById(int $id): ?object
    {
        $stmt = $this->db->prepare("SELECT id AS ID, nombre, precio FROM producto WHERE id = ?");
        $stmt->execute([$id]);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        return $response ? (object)$response : (object)["message" => "No se encontro el producto"];
    }

    public function getAll(): array
    {
        $stmt = $this->db->prepare("SELECT id AS ID, nombre, precio FROM producto ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): ?object
    {
        $stmt = $this->db->prepare("INSERT INTO campers(nombre, price) VALUES(?,?)");
        $stmt->execute([
            $data['nombre'],
            $data['price']
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
        $stmt = $this->db->prepare("UPDATE producto SET nombre=?, precio=? WHERE id=?");
        $stmt->execute([
            $data['nombre'],
            $data['precio'],
            $id
        ]);

        if ($stmt->rowCount() > 0) {
            $data['id'] = $id;
            return (object)$data;
        } else {
            return (object)["error" => "DTO -> Data Transfer Object..... Composer......"];
        }
    }

    public function delete(int $id): object
    {
        $stmt = $this->db->prepare("SELECT
            id AS ID,
            nombre,
            precio
            FROM producto WHERE id = ?");
        $stmt->execute([$id]);

        $last_delete = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$last_delete) {
            return (object)["message" => "No se encontro el producto"];
        }

        $stmt = $this->db->prepare("DELETE FROM producto WHERE id = ?");
        $stmt->execute([$id]);

        return (object)$last_delete;
    }
}
