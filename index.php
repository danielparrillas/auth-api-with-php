<?php

declare(strict_types=1);
include_once(__DIR__ . '/config/index.php');

/**
 * Establecemos conexion con las bases de datos
 */
$database = new Database($db_config['host'], $db_config['name'], $db_config['user'], $db_config['password']);


/**
 * Definimos servicios y controladores
 */
$pacienteService = new PacienteService($database);
$pacienteController = new PacienteController($pacienteService);
$autenticacionService = new AutenticacionService($database);
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
