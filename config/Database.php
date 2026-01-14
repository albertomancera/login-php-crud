<?php 
    // Definición de la clase Database que gestionará la conexión
    class Database{
        // Credenciales de acceso a la base de datos (privadas por seguridad)
        private $host = '127.0.0.1';
        private $db_name = 'gestion_liga'; // Nombre de tu base de datos
        private $username = 'root';        // Usuario por defecto de XAMPP
        private $password = '';            // Contraseña por defecto de XAMPP (vacía)
        public $conn ;                     // Variable pública que guardará el objeto de conexión

        // Método principal para realizar la conexión
        public function getConnection(){
            $this -> conn = null;
            try{
                // Intenta crear una nueva conexión PDO usando las credenciales definidas arriba
                // La cadena de conexión indica el tipo de BD (mysql), el host y el nombre de la BD
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                
                // Configura la codificación de caracteres a UTF-8 para aceptar tildes y ñ
                $this->conn->exec("set names utf8");
            } catch(PDOException $exception) {
                // Si hay un error (ej. servidor apagado o contraseña mal), lo captura y muestra el mensaje
                echo "Error de conexión: " . $exception->getMessage();
            }
            // Devuelve el objeto de conexión listo para usar (o null si falló)
            return $this->conn;
        }
    }


?>