<?php

class Paciente
{
  public function __construct(public $id, public $dni, public $nombre, public $direccion, public $codigo_postal, public $telefono, public $genero, public $fecha_nacimiento, public $correo)
  {
  }


  // public static function crearPaciente(): Paciente
  // {
  //   $paciente = new Paciente();

  //   return $paciente;
  // }
}

class PacienteNuevo extends Paciente
{
  public function __construct(public $dni, public $nombre, public $direccion, public $codigo_postal, public $telefono, public $genero, public $fecha_nacimiento, public $correo)
  {
  }
}
