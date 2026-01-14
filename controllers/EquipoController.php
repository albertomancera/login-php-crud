<?php
require_once 'config/Database.php';
require_once 'models/Equipo.php';

class EquipoController {
    private $db;
    private $equipo;

    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $database = new Database();
        $this->db = $database->getConnection();
        $this->equipo = new Equipo($this->db);
    }

    public function index() {
        $stmt = $this->equipo->read();
        $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/equipos/listar.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->equipo->nombre = $_POST['nombre'];
            $this->equipo->ciudad = $_POST['ciudad'];
            $this->equipo->capacidad_estadio = intval($_POST['capacidad_estadio']);
            $this->equipo->fecha_fundacion = $_POST['fecha_fundacion'];

            if ($this->equipo->create()) {
                header("Location: index.php?controller=equipo&action=index&msg=created");
            }
        } else {
            include 'views/equipos/crear.php';
        }
    }

    public function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->equipo->id = $_POST['id'];
            $this->equipo->nombre = $_POST['nombre'];
            $this->equipo->ciudad = $_POST['ciudad'];
            $this->equipo->capacidad_estadio = intval($_POST['capacidad_estadio']);
            $this->equipo->fecha_fundacion = $_POST['fecha_fundacion'];

            if ($this->equipo->update()) {
                header("Location: index.php?controller=equipo&action=index&msg=updated");
            }
        }
        if (isset($_GET['id'])) {
            $this->equipo->id = $_GET['id'];
            $this->equipo->readOne();
            $datos = $this->equipo;
            include 'views/equipos/editar.php';
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->equipo->id = $_GET['id'];
            $this->equipo->delete();
            header("Location: index.php?controller=equipo&action=index&msg=deleted");
        }
    }
}
?>