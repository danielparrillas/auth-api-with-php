<?php

declare(strict_types=1);
include_once(__DIR__ . '/config/index.php');

/**
 * Establecemos conexion con las bases de datos
 */
$database1 = new Database($db_config['host'], $db_config['name'], $db_config['user'], $db_config['password']);
$conn = $database1->conectar();
if (!$conn) {
  http_response_code(500);
  echo "Error al conectarse con la base de datos";
  exit;
}

/**
 * Definimos servicios y controladores
 */
$pacienteService = new PacienteService($conn);
$pacienteController = new PacienteController($pacienteService);
$autenticacionService = new AutenticacionService($conn);
$autenticacion = new AutenticacionController($autenticacionService);

/**
 * Incluimos el codigo para manejar las rutas
 */
include_once(__DIR__ . '/src/routers/index.php');



/**
 * TEST
 * Comenta para que no corran las pruebas
 * En produccion debe comentarse
 */
//include_once($test_path);
