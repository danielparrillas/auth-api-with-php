<?php
class Credencial
{
  public function __construct(public string $username, public string $password)
  {
    $this->password = md5($password); //Encripamos la contraseña
  }
}
