<?php
include_once "persona.php";
include_once "asistencia.php";

class Camper extends Persona implements Asistencia
{
    // Atributos y modificadores de acceso
    // private string $nombre; // Solo la clase puede acceder a ella (dentro del objeto)
    // public int $edad;
    // protected string $documento;

    public int $skillIngles = 0; // Valores opcionales van al final
    public  int $skillProgramacion = 0;

    // Comentarios de funciones, va antes de ella
    /**
     * Logica para crear un Camper
     * @param string $nombre Define el nombre del Camper sin la logica de la validacion de 20 caracteres
     * @param int $edad Edad del camper, representado en valores enteros
     * @param string $documento Documento del camper
     * @param int $nivelIngles Parametro opcionar que muestra el nivel de ingles del Camper
     */
    public function __construct(int $id, string $nombre, int $edad, string $documento, string $tipoDocumento, int $skillIngles = 0, int $skillProgramacion = 0)
    {
        parent::__construct($id, $nombre, $edad, $documento, $tipoDocumento); // Siempre necesario...

        $this->skillIngles = $skillIngles;
        $this->skillProgramacion = $skillProgramacion;

    }

    // Interfaces
    public function MarcarIngreso(string $metodo): string {
        return "{$this->nombre} marco el ingreso con {$metodo} <br>";
    }

    public function MarcarSalida(string $metodo): string {
        return "{$this->nombre} marco salida con {$metodo} <br>";
    }

    // Acciones
    public function esMayor(): bool
    {
        return $this->getEdad() >= 18; // Referenciar, acceder al atributo = 'al atributo ->'
    }

    /**
     * Asignar el nombre del Camper, validando que cumpla con el minimo de 5 caracteres
     * @param string $nombre Define nuevo nombre
     */
    #[Override] // No es necesario
    public function setNombre(string $nombre): void
    {
        if (strlen($nombre) >= 5) {
            $this->nombre = $nombre;
        } else {
            echo 'Error al asignar el nombre al Camper';
        }
    }

    // #[Override] // Sobreescritura
    public function getNombre(): string
    {
        return parent::getNombre();
    }
    // Polimorfismo
    // Traer o manejar lo mismo, pero de forma diferente

    public function getInfoDocumento(): string
    {
        return "{$this->getTipoDocumento()} : {$this->getDocumento()}";
    }

    public function informacion(): array
    {
        return [
            // Valida nulls y coloca valor por defecto
            'nombre' => $this->nombre ?? 'NN',
            'edad' => $this->edad ?? 0,
            'documento' => $this->documento ?? 'NN',
            'tipoDcoumento' => $this->tipoDocumento
        ];
    }
}
