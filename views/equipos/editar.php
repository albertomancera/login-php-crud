<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow col-md-8 mx-auto">
            <div class="card-header bg-primary text-white"><h4>Editar Equipo</h4></div>
            <div class="card-body">
                <form id="formEquipo" method="POST" action="index.php?controller=equipo&action=edit">
                    <input type="hidden" name="id" value="<?= $datos->id ?>">

                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $datos->nombre ?>">
                        <div class="invalid-feedback">Error</div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label>Ciudad</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control" value="<?= $datos->ciudad ?>">
                            <div class="invalid-feedback">Error</div>
                        </div>
                        <div class="col mb-3">
                            <label>Capacidad Estadio</label>
                            <input type="number" name="capacidad_estadio" id="capacidad_estadio" class="form-control" value="<?= $datos->capacidad_estadio ?>">
                            <div class="invalid-feedback">Error</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Fecha Fundación</label>
                        <input type="date" name="fecha_fundacion" id="fecha_fundacion" class="form-control" value="<?= $datos->fecha_fundacion ?>">
                        <div class="invalid-feedback">Error</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="index.php?controller=equipo&action=index" class="btn btn-secondary">Volver</a>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/validacion.js"></script>
</body>
</html>