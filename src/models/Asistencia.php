<?php
interface Asistencia
{
    public function MarcarIngreso(string $metodo);
    public function MarcarSalida(string $metodo);
}
?>