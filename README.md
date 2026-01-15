# ⚽ Panel de Gestión - LaLiga Hypermotion

![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![LaLiga](https://img.shields.io/badge/Theme-Hypermotion-00ffcc?style=for-the-badge&labelColor=111)

Aplicación web profesional para la gestión de equipos de la **Segunda División Española 2025/26**. Desarrollada con PHP nativo bajo arquitectura **MVC**, cuenta con un sistema de autenticación seguro y una interfaz visual moderna estilo "Dark Neon" inspirada en la marca oficial.

## 🌟 Características

* **🎨 Diseño Hypermotion:** Interfaz personalizada en modo oscuro con acentos Cyan Neón (`#00ffcc`).
* **🔒 Login Seguro:** Autenticación de administradores con contraseñas encriptadas (`Bcrypt`).
* **🏗️ Arquitectura MVC:** Código limpio separado en Modelos, Vistas y Controladores.
* **⚡ CRUD Completo:**
    * **C**reate: Alta de nuevos clubes.
    * **R**ead: Listado dinámico de equipos.
    * **U**pdate: Edición de datos con precarga.
    * **D**elete: Eliminación de registros.
* **🛡️ Seguridad:** Sanitización de datos y sentencias preparadas (PDO) contra Inyecciones SQL.
* **✅ Validación:** Doble capa de validación (Frontend con JS + Backend con PHP).

## 📸 Capturas de Pantalla

| Login | Dashboard |
|:---:|:---:|
| ![Login](./screenshots/login.png) | ![Dashboard](./screenshots/dashboard.png) |

| Crear Equipo | Editar Equipo |
|:---:|:---:|
| ![Crear](./screenshots/crear.png) | ![Editar](./screenshots/editar.png) |

## 🛠️ Instalación y Configuración

1.  **Clonar el repositorio:**

2.  **Base de Datos:**
    * Abre tu gestor SQL (phpMyAdmin).
    * Crea una base de datos llamada `gestion_liga`.
    * Importa el script SQL incluido en la documentación o crea las tablas `usuarios` y `equipos`.

3.  **Configuración:**
    * Edita `config/Database.php` con tus credenciales:
    ```php
    private $host = 'localhost'; // o '127.0.0.1'
    private $username = 'root';
    private $password = '';
    ```

4.  **Acceso:**
    * **URL:** (http://localhost/login-php-crud/)
    * **Usuario:** `alberto`
    * **Contraseña:** `Contra123*`

## 📂 Estructura del Proyecto

```text
/
├── assets/             # JavaScript (Validaciones)
├── config/             # Conexión a Base de Datos
├── controllers/        # Controladores (Auth, Equipo)
├── models/             # Modelos (Consultas SQL)
├── views/              # Vistas HTML/PHP
│   ├── auth/           # Login
│   └── equipos/        # CRUD (Listar, Crear, Editar)
├── index.php           # Enrutador principal
└── README.md           # Documentación
