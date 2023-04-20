<?php

//Provando conexcion con la tabla paciente
$test_paciente = new PacienteService($db);

var_dump($test_paciente->getAll());

//$new_paciente = new PacienteNuevo("12345678", "Brando Daniel Parrillas Sanchez", "Bosques de SJkfo", "12C1", "12345678", "M", "2001-11-13", "brandonps.dev@gmail.com");

//var_dump($test_paciente->create($new_paciente));
