<?php

declare(strict_types=1);
include_once(__DIR__ . '/config/index.php');

/**
 * Establecemos conexion con las bases de datos
 */
$database1 = new Database($db_config['host'], $db_config['name'], $db_config['user'], $db_config['password']);
$db = $database1->conectar();

/**
 * Definimos servicios y controladores
 */
$pacienteService = new PacienteService($db);
$pacienteController = new PacienteController($pacienteService);

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
