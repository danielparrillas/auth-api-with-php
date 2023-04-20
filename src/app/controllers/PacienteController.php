<?php

class PacienteController
{
  public function __construct(private PacienteService $service)
  {
  }

  public function procesarSolicitud(string $method, string | null $id)
  {
    echo json_encode([
      'method' => $method,
      'id' => $id,
    ]);
  }
}
