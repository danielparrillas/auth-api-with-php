<?php

class AutenticacionService
{

  public function __construct(private PDO $db)
  {
  }

  public function verificarUsuario(Credencial $credencial)
  {
    $sql = "SELECT * FROM Usuarios WHERE Usuario = :user AND Password = :pass";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':user', $credencial->username, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $credencial->password, PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data !== false) return true;
    else return false;
  }
}
