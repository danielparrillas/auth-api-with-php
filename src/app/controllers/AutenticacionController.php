<?php

class AutenticacionController
{
  public function __construct(private AutenticacionService $service)
  {
  }
  public function login()
  {
    switch ($_SERVER["REQUEST_METHOD"]) {
      case "POST":
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['username']) || !isset($data['password'])) {
          //Codigo para entidad no autorizada
          http_response_code(401);
          echo json_encode([
            "error" => [
              "message" => "Credenciales no provisionados",
              "autenticado" => false,
            ]

          ]);
        } else {
          $credenciales = new Credencial($data["username"], $data["password"]);
          $autenticacion = $this->service->autenticar($credenciales);

          if ($autenticacion->valida) {
            echo json_encode([
              "token" => $autenticacion->token,
            ]);
          } else {
            http_response_code(401);
            echo json_encode(
              [
                "error" => [
                  "message" => $autenticacion->mensaje,
                ]
              ]
            );
          }
        }
        break;
      default:
        //Codigo para metodos no permitidos
        http_response_code(405);
        header("Allow: POST");
        break;
    }
  }

  public function crearToken()
  {
    return "8otMIOmjAeotpGzIlNPIi3KsnOQ--BQ/VAS!o47qdB=?k1SJLULsa?tiJgBCqT/xcMPU?iK/a21athW1sKAFFv8gbjauXQhHEDIq174c6GuKCiSOwG?vCY-NzDBHTp4sPM1OaCBvN=nxvgyLEPsNdlUBQqChzrADlZat9WWuwCJMR4tthXkxr0MgTnXIvm3?O=1o9Rqz1mZMZ!DDFIioCwKrC2Lku-E3MTGonlaR-NohH/8fl/VJ3eHKSKf-awPT
";
  }

  public function validateToken(string $token): bool
  {
    return true;
  }
}
