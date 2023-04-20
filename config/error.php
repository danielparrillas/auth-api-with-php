<?php

/**
 * En este archivo de se configura el manejo de mensaje de errores
 * Se formatean de modo que muestren en formato JSON
 * Es muy util ya que esto permitira que los errores se envien al cliente api en formato JSON
 */
include_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'utils' . DIRECTORY_SEPARATOR . 'ManejadorDeErrores.php');

//Definimos el manejador de errores
set_error_handler("ManejadorDeErrores::handleError");
// Definimos que el controlador de error sera la clase ErrorHandler
set_exception_handler("ManejadorDeErrores::handleException");
