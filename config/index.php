<?php

/**
 * Obtencion de los datos del archivo de configuracion
 * Para guardarla en la constante CONFIGURACION
 */
$config_path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config.json';
$config_file = file_get_contents($config_path);
$config_data = json_decode($config_file, true);
define("CONFIGURACION", $config_data);


//Direccion de los scripts para hacer pruebas
$test_path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'test' . DIRECTORY_SEPARATOR . 'index.php';

/**
 * aqui se verifica si la api esta en un subdominio
 * falso si no lo esta
 * el nombre del subdominio si lo esta dentro
 */
$subdomain = CONFIGURACION["subdomain"] !== "" ? CONFIGURACION["subdomain"] : false;

/**
 * Se incluyen los demas archivos de configuracion
 */
include_once('database.php');
include_once('error.php');
include_once('includes.php');
