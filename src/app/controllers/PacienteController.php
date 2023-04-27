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
    $data = json_decode(file_get_contents("php://input"), true);
    $token = "hola";
    //

    switch ($method) {
      case 'GET':
        if (isset(getallheaders()["token"])) {
          echo json_encode(["server" => $token, "token" => getallheaders()["token"]]);
        }
        // $this->service->atenderSolicitudPorIdGet($id);
        break;
      case 'POST':
        // $this->service->atenderSolicitudPorIdPost($id);
        break;
      case 'PUT':
        // $this->service->atenderSolicitudPorIdPut($id);
        break;
      case 'DELETE':
        // $this->service->atenderSolicitudPorIdDelete($id);
        break;
      default:
        //Codigo para metodos no permitidos
        http_response_code(405);
        header("Allow: GET, POST");
        break;
    }
  }
  private function atenderSolicitud(string $method)
  {
    switch ($method) {
      case 'GET':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['pagina'])) {
          //Codigo para entidad no autorizada
          http_response_code(401);
          echo json_encode([
            "error" => [
              "message" => "Numero de pagino no provisionado",
            ]
          ]);
          break;
        }
        $pagina = $data['pagina'];
        if (!is_int($pagina)) {
          http_response_code(401);
          echo json_encode([
            "error" => [
              "message" => "El valor de la pagina debe ser un numero entero positivo",
            ]
          ]);
          break;
        }
        if ($pagina < 1) {
          http_response_code(401);
          echo json_encode([
            "error" => [
              "message" => "El valor de la pagina debe ser un numero igual o mayor a 1",
            ]
          ]);
          break;
        }

        echo json_encode($this->service->getAll($pagina));
        break;

      default:
        //Codigo para metodos no permitidos
        http_response_code(405);
        header("Allow: GET, POST");
        break;
    }
  }
}
