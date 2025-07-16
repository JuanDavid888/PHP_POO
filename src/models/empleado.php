<?php
include_once("persona.php");
include_once("asistencia.php");

class Empleado extends Persona implements Asistencia
{
    private string $cargo;
    private int $sueldo;

    public function __construct(
        int $id,
        string $nombre,
        int $edad,
        string $documento,
        string $tipo,
        string $cargo,
        int $sueldo
    ) {
        parent::__construct($id, $nombre, $edad, $documento, $tipo);
        $this->cargo = $cargo;
        $this->sueldo = $sueldo;
    }

    // Interfaces

    public function MarcarIngreso(string $metodo): string {
        return "{$this->nombre} marco el ingreso con {$metodo} <br>";
    }

    public function MarcarSalida(string $metodo): string {
        return "{$this->nombre} marco salida con {$metodo} <br>";
    }

    // Acciones
    public function esMayor(): bool {
        return $this->getEdad() >= 18;
    }

    public function getcargo(): string {
        return $this->cargo;
    }

    public function getsueldo(): int {
        return $this->sueldo;
    }
}
?>