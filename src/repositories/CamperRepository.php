<?php
// Repositorio
// Ayuda al desacoplamiento (evita que los datos sean demasiado dependientes)

namespace App\repositories;

interface CamperRepository {
    public function findById(int $id): ?object; // ? => puede ser nulo o no
    public function getAll(): array;
    public function create(array $data): ?object;
    public function update(int $id, array $data): ?object;
}