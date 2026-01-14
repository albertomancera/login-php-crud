<?php
require_once 'config/Database.php';

// Controlador encargado de la autenticación (Login/Logout)
class AuthController {
    private $db;

    // Constructor: Se ejecuta al instanciar el controlador
    public function __construct() {
        // Instancia la clase Database y obtiene la conexión
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Método para manejar el inicio de sesión
    public function login() {
        // 1. Si el usuario ya tiene sesión iniciada, lo redirige al dashboard directamente
        if (isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=equipo&action=index");
            exit();
        }

        // 2. Verifica si la petición es POST (el usuario envió el formulario)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoge los datos del formulario
            $user = $_POST['username'];
            $pass = $_POST['password'];

            // 3. Prepara la consulta SQL para buscar al usuario por su nombre
            // Se usa sentencias preparadas (:u) para evitar inyecciones SQL
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE username = :u");
            $stmt->bindParam(':u', $user);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // 4. Verifica si el usuario existe ($data) y si la contraseña coincide con el hash
            if ($data && password_verify($pass, $data['password'])) {
                // Credenciales correctas: Guarda datos en la sesión
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                
                // Redirige al listado de equipos
                header("Location: index.php?controller=equipo&action=index");
                exit();
            } else {
                // Credenciales incorrectas: Define mensaje de error y vuelve a mostrar el login
                $error = "Usuario o contraseña incorrectos";
                require_once 'views/auth/login.php';
            }
        } else {
            // Si es una petición GET (entrar a la página), muestra el formulario de login
            require_once 'views/auth/login.php';
        }
    }

    // Método para cerrar sesión
    public function logout() {
        // Destruye todas las variables de sesión y redirige al login
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
    }
}
?>