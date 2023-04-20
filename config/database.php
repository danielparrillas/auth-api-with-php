<?php

/**
 * Configuracion de las bases de datos
 * Se obtienen los datos de la configuracion de conexion con db de la constante CONFIGURACION
 */
include_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'Database.php');

$db_config = CONFIGURACION["databases"]['default'];
