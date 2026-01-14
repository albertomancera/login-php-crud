<?php
class Equipo {
    private $conn;
    private $table = "equipos";

    // Solo las columnas que tienes en la imagen
    public $id;
    public $nombre;
    public $ciudad;
    public $capacidad_estadio;
    public $fecha_fundacion;

    public function __construct($db) { $this->conn = $db; }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nombre ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET nombre=:n, ciudad=:c, capacidad_estadio=:cap, fecha_fundacion=:f";
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->ciudad = htmlspecialchars(strip_tags($this->ciudad));
        $this->capacidad_estadio = htmlspecialchars(strip_tags($this->capacidad_estadio));
        $this->fecha_fundacion = htmlspecialchars(strip_tags($this->fecha_fundacion));

        // Bind
        $stmt->bindParam(":n", $this->nombre);
        $stmt->bindParam(":c", $this->ciudad);
        $stmt->bindParam(":cap", $this->capacidad_estadio);
        $stmt->bindParam(":f", $this->fecha_fundacion);

        return $stmt->execute();
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nombre = $row['nombre'];
            $this->ciudad = $row['ciudad'];
            $this->capacidad_estadio = $row['capacidad_estadio'];
            $this->fecha_fundacion = $row['fecha_fundacion'];
        }
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET nombre=:n, ciudad=:c, capacidad_estadio=:cap, fecha_fundacion=:f WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->ciudad = htmlspecialchars(strip_tags($this->ciudad));
        $this->capacidad_estadio = htmlspecialchars(strip_tags($this->capacidad_estadio));
        $this->fecha_fundacion = htmlspecialchars(strip_tags($this->fecha_fundacion));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":n", $this->nombre);
        $stmt->bindParam(":c", $this->ciudad);
        $stmt->bindParam(":cap", $this->capacidad_estadio);
        $stmt->bindParam(":f", $this->fecha_fundacion);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}
?>