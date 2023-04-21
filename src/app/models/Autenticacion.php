<?php

class Autenticacion
{
  public function __construct(public bool $valida, public string $mensaje, public string $token)
  {
  }
}
