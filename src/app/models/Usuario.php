<?php

class Usuario
{
  public function __construct(public int $id, public string $username, public string $password, public bool $active)
  {
  }
}
