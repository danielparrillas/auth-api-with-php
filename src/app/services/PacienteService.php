<?php

class PacienteService
{


  public function __construct(private PDO $db)
  {
  }

  public function getAll(): array
  {
    $sql = "SELECT * FROM pacientes";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $this->transformarData($row);
    }
    return $data;
  }

  public function create(PacienteNuevo $paciente)
  {
    $sql = "INSERT INTO pacientes 
            (DNI, Nombre, Direccion, CodigoPostal, Telefono, Genero, FechaNacimiento, Correo) 
            VALUES 
            (:dni, :nombre, :direccion, :codigo_postal, :telefono, :genero, :fecha_nacimiento, :correo)";

    $stmt = $this->db->prepare($sql);
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
    return $this->db->lastInsertId();
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
