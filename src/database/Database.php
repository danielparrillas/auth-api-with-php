<?php

class Database
{
  public function __construct(
    private string $host,
    private string $name,
    private string $user,
    private string $password
  ) {
  }

  public function conectar(): PDO | false
  {
    $dsn = "mysql:host=$this->host;dbname=$this->name;charset=utf8";
    try {
      $conn = new PDO($dsn, $this->user, $this->password);
      return $conn;
    } catch (Exception $e) {
      return false;
    }
  }
}
