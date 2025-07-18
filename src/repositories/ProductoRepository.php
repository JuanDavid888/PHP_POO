<?php

interface ProductoRepository {
    public function findById(int $id): ?object; // ? => puede ser nulo o no
    public function getAll(): array;
    public function create(array $data): ?object;
    public function update(int $id, array $data): ?object;
}