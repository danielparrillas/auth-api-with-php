<?php

class PacienteController
{
  public function __construct(private PacienteService $service)
  {
  }

  public function procesarSolicitud(string $method, string | null $id)
  {

    if ($id) $this->atenderSolicitudPorId($method, $id);
    else $this->atenderSolicitud($method);
  }

  private function atenderSolicitudPorId(string $method, string $id)
  {
    echo json_encode([
      'method' => $method,
      'id' => $id,
    ]);
  }
  private function atenderSolicitud(string $method)
  {
    switch ($method) {
      case 'GET':
        echo json_encode($this->service->getAll());
        break;

      default:
        # code...
        break;
    }
  }
}
