<?php
// Repositorio
// Ayuda al desacoplamiento (evita que los datos sean demasiado dependientes)

interface CamperRepository {
    public function findById(int $id): ?object; // object o null, ? => puede ser nulo

    public function getAll(): array;

    public function create(array $data): ?object;

    public function update(): object;

}