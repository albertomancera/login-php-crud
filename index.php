<?php
session_start();

require_once 'controllers/AuthController.php';
require_once 'controllers/EquipoController.php';

$controller_name = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

if ($controller_name === 'auth') {
    $controller = new AuthController();
    if ($action === 'login') $controller->login();
    elseif ($action === 'logout') $controller->logout();
    else $controller->login();
} elseif ($controller_name === 'equipo') {
    $controller = new EquipoController();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        $controller->index();
    }
} else {
    header("Location: index.php?controller=auth&action=login");
}
?>