<?php
require_once 'config/Database.php';

class AuthController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function login() {
        if (isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=equipo&action=index");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            // NOTA: En un entorno real usa password_verify. 
            // Para asegurar que entras con alberto/1234 en este ejemplo sencillo:
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE username = :u");
            $stmt->bindParam(':u', $user);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificamos si existe y si la contraseña coincide (usando verify o comparacion directa si no usaste hash)
            // Aquí asumo que usaste el INSERT del paso 1 con hash
            if ($data && password_verify($pass, $data['password'])) {
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                header("Location: index.php?controller=equipo&action=index");
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos";
                require_once 'views/auth/login.php';
            }
        } else {
            require_once 'views/auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
    }
}
?>