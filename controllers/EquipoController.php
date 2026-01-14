<?php
require_once 'config/Database.php';
require_once 'models/Equipo.php';

// Controlador que gestiona las operaciones CRUD de los equipos
class EquipoController {
    private $db;
    private $equipo;

    // Constructor: Se ejecuta automáticamente al llamar al controlador
    public function __construct() {
        // 1. Seguridad: Verifica si el usuario ha iniciado sesión.
        // Si no existe la variable de sesión 'user_id', lo manda al login.
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        
        // 2. Conexión: Inicializa la base de datos y el modelo Equipo
        $database = new Database();
        $this->db = $database->getConnection();
        $this->equipo = new Equipo($this->db);
    }

    // Acción INDEX: Muestra el listado de equipos (Dashboard principal)
    public function index() {
        // Llama al modelo para obtener todos los registros
        $stmt = $this->equipo->read();
        // Convierte los resultados de la BD en un array asociativo
        $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Carga la vista que contiene la tabla HTML
        include 'views/equipos/listar.php';
    }

    // Acción CREATE: Gestiona tanto mostrar el formulario como guardar los datos
    public function create() {
        // Si el usuario envió el formulario (Método POST)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoge los datos del formulario y los asigna al modelo
            $this->equipo->nombre = $_POST['nombre'];
            $this->equipo->ciudad = $_POST['ciudad'];
            $this->equipo->capacidad_estadio = intval($_POST['capacidad_estadio']);
            $this->equipo->fecha_fundacion = $_POST['fecha_fundacion'];

            // Intenta guardar en la base de datos
            if ($this->equipo->create()) {
                // Si tiene éxito, redirige al listado con un mensaje de éxito
                header("Location: index.php?controller=equipo&action=index&msg=created");
            }
        } else {
            // Si es una petición normal (GET), simplemente muestra el formulario vacío
            include 'views/equipos/crear.php';
        }
    }

    // Acción EDIT: Gestiona la edición de un equipo existente
    public function edit() {
        // Si el usuario envió los cambios (Método POST)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->equipo->id = $_POST['id'];
            $this->equipo->nombre = $_POST['nombre'];
            $this->equipo->ciudad = $_POST['ciudad'];
            $this->equipo->capacidad_estadio = intval($_POST['capacidad_estadio']);
            $this->equipo->fecha_fundacion = $_POST['fecha_fundacion'];

            // Actualiza el registro y redirige
            if ($this->equipo->update()) {
                header("Location: index.php?controller=equipo&action=index&msg=updated");
            }
        }
        // Si se quiere ver el formulario de edición (Método GET con ID)
        if (isset($_GET['id'])) {
            $this->equipo->id = $_GET['id'];
            $this->equipo->readOne(); // Busca los datos actuales del equipo en la BD
            $datos = $this->equipo;   // Pasa los datos a una variable para la vista
            include 'views/equipos/editar.php';
        }
    }

    // Acción DELETE: Elimina un equipo
    public function delete() {
        if (isset($_GET['id'])) {
            $this->equipo->id = $_GET['id'];
            $this->equipo->delete();
            header("Location: index.php?controller=equipo&action=index&msg=deleted");
        }
    }
}
?>