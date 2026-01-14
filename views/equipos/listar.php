<!DOCTYPE html>
<html lang="es">
<head>
    <title>Dashboard - Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --liga-cyan: #00ffcc;
            --liga-dark: #121212;
            --liga-card: #1e1e1e;
        }
        
        
        body {
            background-color: var(--liga-dark); 
            color: #f0f0f0; 
            font-family: 'Segoe UI', sans-serif; 
        }

        .navbar {
            background-color: #000; 
            border-bottom: 2px solid var(--liga-cyan); 
        }
        .brand-logo { font-weight: 900; font-style: italic; letter-spacing: 1px; color: white; }
        .brand-cyan { color: var(--liga-cyan); }

        .table-custom {
            --bs-table-bg: var(--liga-card); 
            --bs-table-color: #e0e0e0; 
            --bs-table-border-color: #333; 
        }
        .table-custom thead th {
            background-color: var(--liga-cyan) !important; 
            color: #000 !important; 
            font-weight: 800; 
            text-transform: uppercase; 
            font-size: 0.85rem; 
            border: none; 
            padding: 15px; 
        }

        .table-custom tbody td {
            vertical-align: middle; 
            padding: 15px; 
            border-bottom: 1px solid #333; 
        }
        .table-custom tbody tr:hover td {
            background-color: #2a2a2a; 
            color: var(--liga-cyan); 
        }
        .badge-cap {
            background-color: #000;
            border: 1px solid #444; 
            color: #fff; 
            padding: 5px 10px;
            font-weight: normal; 
        }
        .btn-add {
            background-color: var(--liga-cyan); 
            color: #000; 
            font-weight: bold; 
            border-radius: 50px; 
            padding: 8px 20px; 
            border: none; 
        }
        .btn-add:hover { background-color: #fff; box-shadow: 0 0 10px var(--liga-cyan); }

        .btn-icon {
            width: 32px; height: 32px; 
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 6px; 
            transition: all 0.2s;
            background: rgba(255,255,255,0.05); 
            border: none; 
        }
        .btn-edit { color: #0dcaf0; } 
        .btn-edit:hover { background: #0dcaf0; color: #000; }
        
        .btn-delete { color: #ff4d4d; } 
        .btn-delete:hover { background: #ff4d4d; color: #fff; }

    </style>
</head>
<body>
    <nav class="navbar navbar-dark py-3 mb-4">
        <div class="container">
            <span class="navbar-brand brand-logo">LALIGA <span class="brand-cyan">HYPERMOTION</span></span>
            <div class="d-flex align-items-center gap-3">
                
                <span class="small text-secondary d-none d-md-block">Admin: <span class="text-white"><?= $_SESSION['username'] ?></span></span>
                
                <a href="index.php?controller=auth&action=logout" class="btn btn-outline-light btn-sm rounded-pill px-3">Salir</a>
            </div>
        </div>
    </nav>

    <div class="container">
        
        <?php if (isset($_GET['msg'])): ?>
            <!-- Alerta de Bootstrap para notificar al usuario del resultado de una acción -->
            <div class="alert alert-success bg-success bg-opacity-25 text-white border-0 d-flex align-items-center mb-4">
                <i class="bi bi-check-circle-fill me-2 text-success"></i>
                <div>
                    <!-- Muestra un mensaje diferente según el valor de 'msg' -->
                    <?php 
                        if ($_GET['msg'] == 'created') echo 'Equipo registrado correctamente.';
                        if ($_GET['msg'] == 'updated') echo 'Datos del equipo actualizados.';
                        if ($_GET['msg'] == 'deleted') echo 'Equipo eliminado de la base de datos.';
                    ?>
                </div>
                
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold m-0">Equipos 25/26</h2>
            <!-- Enlace que lleva al formulario de creación de un nuevo equipo -->
            <a href="index.php?controller=equipo&action=create" class="btn btn-add">
                <i class="bi bi-plus-lg me-1"></i> Añadir Club
            </a>
        </div>

        <div class="card bg-transparent border-0">
            <div class="table-responsive rounded-3 overflow-hidden">
                
                <table class="table table-custom mb-0">
                    <thead>
                        <tr>
                            <th>Nombre del Club</th>
                            <th>Ciudad</th>
                            <th>Estadio (Cap.)</th>
                            <th>Fundación</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Bucle PHP: Itera sobre el array $equipos (que viene del controlador) -->
                        <?php foreach ($equipos as $eq): ?>
                        <tr>
                            <!-- Columna Nombre: Se usa htmlspecialchars para prevenir ataques XSS -->
                            <td class="fw-bold text-white"><?= htmlspecialchars($eq['nombre']) ?></td>
                            <!-- Columna Ciudad -->
                            <td><?= htmlspecialchars($eq['ciudad']) ?></td>
                            <td>
                                <!-- Columna Estadio: Se usa number_format para formatear el número con separadores de miles -->
                                <span class="badge-cap">
                                    <?= number_format($eq['capacidad_estadio'], 0, ',', '.') ?>
                                </span>
                            </td>
                            <td class="text-secondary">
                                <!-- Columna Fundación: Se formatea la fecha de AAAA-MM-DD a DD/MM/AAAA -->
                                <?= date("d/m/Y", strtotime($eq['fecha_fundacion'])) ?>
                            </td>
                            <td class="text-end">
                                <!-- Columna Acciones: Botón para editar -->
                                <a href="index.php?controller=equipo&action=edit&id=<?= $eq['id'] ?>" 
                                    class="btn-icon btn-edit me-1" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <!-- Botón para eliminar. Incluye un confirm de JavaScript para seguridad -->
                                <a href="index.php?controller=equipo&action=delete&id=<?= $eq['id'] ?>" 
                                    class="btn-icon btn-delete" 
                                    onclick="return confirm('¿Eliminar al <?= $eq['nombre'] ?>?')" title="Eliminar">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>