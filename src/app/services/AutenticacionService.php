<?php

class AutenticacionService
{

  public function __construct(private Database $db)
  {
  }

  public function autenticar(Credencial $credencial): Autenticacion
  {
    try {
      $conn = $this->db->conectar();
      $sql = "SELECT UsuarioId, Estado FROM Usuarios WHERE Usuario = :user AND Password = :pass";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':user', $credencial->username, PDO::PARAM_STR);
      $stmt->bindParam(':pass', $credencial->password, PDO::PARAM_STR);
      $stmt->execute();
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      $conn = null;
      throw $e;
    }

    $conn = null;
    if ($data !== false) {
      if ($data["Estado"] === "Activo") return new Autenticacion(true, "", $this->generarToken($data["UsuarioId"]));

      return new Autenticacion(false, "usuario inactivo", "");
    } else {
      return new Autenticacion(false, "credenciales incorrectas", "");
    }
  }

  public function generarToken(int $usuarioId): string
  {
    try {
      $conn = $this->db->conectar();

      $val = true;
      $token = bin2hex(openssl_random_pseudo_bytes(16, $val));
      $date = date("Y-m-d H:i:s");

      $sql = "INSERT INTO usuarios_token (UsuarioId, Token, Estado, Fecha) VALUES (:user, :token, :estado, :fecha)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':user', $usuarioId, PDO::PARAM_INT);
      $stmt->bindParam(':token', $token, PDO::PARAM_STR);
      $stmt->bindParam(':estado', $date, PDO::PARAM_STR);
      $stmt->bindParam(':fecha', $date, PDO::PARAM_STR);
      $stmt->execute();
    } catch (Exception $e) {
      $conn = null;
      throw $e;
    }

    $conn = null;
    return $token;
  }
}
