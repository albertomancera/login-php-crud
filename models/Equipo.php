<?php
// Clase Modelo que representa la tabla 'equipos' en la base de datos
class Equipo {
    // Propiedades para la conexión y el nombre de la tabla
    private $conn;
    private $table = "equipos";

    // Propiedades públicas que mapean las columnas de la tabla
    public $id;
    public $nombre;
    public $ciudad;
    public $capacidad_estadio;
    public $fecha_fundacion;

    // Constructor: Recibe la conexión a la base de datos al instanciar la clase
    public function __construct($db) { $this->conn = $db; }

    // Método para LEER (Read) todos los equipos
    public function read() {
        // Consulta SQL para seleccionar todo ordenado alfabéticamente
        $query = "SELECT * FROM " . $this->table . " ORDER BY nombre ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt; // Devuelve el objeto statement con los resultados
    }

    // Método para CREAR un nuevo equipo
    public function create() {
        // Consulta SQL de inserción con marcadores de posición (:nombre)
        $query = "INSERT INTO " . $this->table . " SET nombre=:n, ciudad=:c, capacidad_estadio=:cap, fecha_fundacion=:f";
        $stmt = $this->conn->prepare($query);

        // Limpieza de datos (Sanitizar) para seguridad (elimina etiquetas HTML y caracteres especiales)
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->ciudad = htmlspecialchars(strip_tags($this->ciudad));
        $this->capacidad_estadio = htmlspecialchars(strip_tags($this->capacidad_estadio));
        $this->fecha_fundacion = htmlspecialchars(strip_tags($this->fecha_fundacion));

        // Vincular los valores a los marcadores de la consulta
        $stmt->bindParam(":n", $this->nombre);
        $stmt->bindParam(":c", $this->ciudad);
        $stmt->bindParam(":cap", $this->capacidad_estadio);
        $stmt->bindParam(":f", $this->fecha_fundacion);

        // Ejecutar la consulta
        return $stmt->execute();
    }

    // Método para LEER UN SOLO registro 
    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id); // Vincula el ID actual
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si encuentra el equipo, rellena las propiedades del objeto
        if ($row) {
            $this->nombre = $row['nombre'];
            $this->ciudad = $row['ciudad'];
            $this->capacidad_estadio = $row['capacidad_estadio'];
            $this->fecha_fundacion = $row['fecha_fundacion'];
        }
    }

    // Método para ACTUALIZAR  un equipo existente
    public function update() {
        $query = "UPDATE " . $this->table . " SET nombre=:n, ciudad=:c, capacidad_estadio=:cap, fecha_fundacion=:f WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos nuevamente
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->ciudad = htmlspecialchars(strip_tags($this->ciudad));
        $this->capacidad_estadio = htmlspecialchars(strip_tags($this->capacidad_estadio));
        $this->fecha_fundacion = htmlspecialchars(strip_tags($this->fecha_fundacion));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincular parámetros
        $stmt->bindParam(":n", $this->nombre);
        $stmt->bindParam(":c", $this->ciudad);
        $stmt->bindParam(":cap", $this->capacidad_estadio);
        $stmt->bindParam(":f", $this->fecha_fundacion);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Método para ELIMINAR  un equipo
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}
?>