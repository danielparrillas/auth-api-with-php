<?php

/**
 * Redireccionamiento con el router
 */

// Hacemos que la cabecera de respuesta indique que eniamos un JSON

$request_uri = $_SERVER["REQUEST_URI"];
//Limpiando el uri (Si el ultimo caracter es una "/" se elimina)
if ($request_uri[strlen($request_uri) - 1] == '/') $request_uri = substr($request_uri, -1);


if ($subdomain) {
  //var_dump($subdomains);
  $uri = explode($subdomain, $_SERVER["REQUEST_URI"]);
  $uri = explode("/", $uri[1]);
} else {
  $uri = explode("/", $_SERVER["REQUEST_URI"]);
}

//var_dump($uri);

switch ($uri[1]) {
  case 'api':
    header("Content-type: application/; charset=UTF-8");
    include "api.php";
    break;
  case 'docs':
    header("Content-Type: text/html; charset=utf-8");
    echo "docs";
    break;
  case 'admin':
    header("Content-Type: text/html; charset=utf-8");
    echo "admin";
    break;

  default:
    header("Content-Type: text/html; charset=utf-8");
    //http_response_code(404);
    exit;
}
