<?php

class PacienteService
{


  public function __construct(private Database $db)
  {
  }

  public function getAll(): array
  {
    $conn = $this->db->conectar();

    $sql = "SELECT * FROM pacientes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $this->transformarData($row);
    }

    $conn = null;
    return $data;
  }

  public function create(PacienteNuevo $paciente)
  {
    $conn = $this->db->conectar();
    $sql = "INSERT INTO pacientes 
            (DNI, Nombre, Direccion, CodigoPostal, Telefono, Genero, FechaNacimiento, Correo) 
            VALUES 
            (:dni, :nombre, :direccion, :codigo_postal, :telefono, :genero, :fecha_nacimiento, :correo)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':dni', $paciente->dni);
    $stmt->bindParam(':nombre', $paciente->nombre);
    $stmt->bindParam(':direccion', $paciente->direccion);
    $stmt->bindParam(':codigo_postal', $paciente->codigo_postal);
    $stmt->bindParam(':telefono', $paciente->telefono);
    $stmt->bindParam(':genero', $paciente->genero);
    $stmt->bindParam(':fecha_nacimiento', $paciente->fecha_nacimiento);
    $stmt->bindParam(':correo', $paciente->correo);
    $stmt->execute();

    // Devolver el ID de la última inserción
    $userId = $conn->lastInsertId();

    $conn = null;
    return $userId;
  }

  public function transformarData($data): Paciente
  {
    return
      new Paciente(
        $data['PacienteId'],
        $data["DNI"],
        $data["Nombre"],
        $data["Direccion"],
        $data["CodigoPostal"],
        $data["Telefono"],
        $data["Genero"],
        $data["FechaNacimiento"],
        $data["Correo"]
      );
  }
}
