<?php

/**
 * En estes archivo se incluyen archivos
 * Algunos archivos que se incluyen, a su vez incluyen mas archivos, permitiendo asi que 
 * se incluya solo una vez cada archivo
 */

//1. Incluyendo modelos
include_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'index.php');

//2. Incluyendo servicios
include_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'services' . DIRECTORY_SEPARATOR . 'index.php');

//3. Incluyendo controladores
include_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'index.php');
