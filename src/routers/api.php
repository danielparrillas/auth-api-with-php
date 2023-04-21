<?php

switch ($uri[2] ?? null) {
  case 'v1':
    switch ($uri[3] ?? null) {
      case "autenticacion":
        $autenticacion->login();
        break;
      case 'paciente':
        $id = $uri[4] ?? null;
        $pacienteController->procesarSolicitud($_SERVER["REQUEST_METHOD"], $id);
        break;
      case null:
        http_response_code(204);
        break;
      default:
        http_response_code(404);
        break;
    }

    break;
  case null:
    http_response_code(204);
    break;
  default:
    http_response_code(404);
    break;
}
