<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4 p-3">
        <span class="navbar-brand">Panel Admin 2ª División</span>
        <a href="index.php?controller=auth&action=logout" class="btn btn-danger btn-sm">Salir</a>
    </nav>
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h2>Listado de Equipos</h2>
            <a href="index.php?controller=equipo&action=create" class="btn btn-success"><i class="bi bi-plus"></i> Nuevo</a>
        </div>
        <table class="table table-striped shadow bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Capacidad</th>
                    <th>Fundación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $eq): ?>
                <tr>
                    <td><?= htmlspecialchars($eq['nombre']) ?></td>
                    <td><?= htmlspecialchars($eq['ciudad']) ?></td>
                    <td><?= number_format($eq['capacidad_estadio'],0,',','.') ?></td>
                    <td><?= date("d-m-Y", strtotime($eq['fecha_fundacion'])) ?></td>
                    <td>
                        <a href="index.php?controller=equipo&action=edit&id=<?= $eq['id'] ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        <a href="index.php?controller=equipo&action=delete&id=<?= $eq['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Borrar?')"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>