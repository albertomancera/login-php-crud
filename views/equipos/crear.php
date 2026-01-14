<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow col-md-8 mx-auto">
            <div class="card-header bg-success text-white"><h4>Nuevo Equipo</h4></div>
            <div class="card-body">
                <form id="formEquipo" method="POST" action="index.php?controller=equipo&action=create">
                    
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                        <div class="invalid-feedback">Error</div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label>Ciudad</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control">
                            <div class="invalid-feedback">Error</div>
                        </div>
                        <div class="col mb-3">
                            <label>Capacidad Estadio</label>
                            <input type="number" name="capacidad_estadio" id="capacidad_estadio" class="form-control">
                            <div class="invalid-feedback">Error</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Fecha Fundación</label>
                        <input type="date" name="fecha_fundacion" id="fecha_fundacion" class="form-control">
                        <div class="invalid-feedback">Error</div>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="index.php?controller=equipo&action=index" class="btn btn-secondary">Volver</a>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/validacion.js"></script>
</body>
</html>