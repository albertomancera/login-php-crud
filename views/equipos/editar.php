<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --liga-cyan: #00ffcc; --liga-dark: #121212; --liga-card: #1e1e1e; }
        body { background-color: var(--liga-dark); color: white; }
        .card { background-color: var(--liga-card); border: 1px solid #333; }
        .form-control { background-color: #2d2d2d; border: 1px solid #444; color: white; }
        .form-control:focus { background-color: #2d2d2d; color: white; border-color: var(--liga-cyan); box-shadow: 0 0 0 0.25rem rgba(0, 255, 204, 0.25); }
        .btn-cyan { background-color: var(--liga-cyan); color: black; font-weight: bold; border: none; }
        .btn-cyan:hover { background-color: white; color: black; box-shadow: 0 0 15px var(--liga-cyan); }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-transparent border-bottom border-secondary py-3">
                        <h4 class="mb-0 fw-bold fst-italic">EDITAR <span style="color: var(--liga-cyan)">CLUB</span></h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <form id="formEquipo" method="POST" action="index.php?controller=equipo&action=edit">
                            
                            <input type="hidden" name="id" value="<?= $datos->id ?>">

                            <div class="mb-4">
                                <label class="form-label text-secondary text-uppercase small fw-bold">Nombre del Equipo</label>
                                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" 
                                       value="<?= htmlspecialchars($datos->nombre) ?>" required>
                                <div class="invalid-feedback">Nombre inválido</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label text-secondary text-uppercase small fw-bold">Ciudad</label>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control" 
                                           value="<?= htmlspecialchars($datos->ciudad) ?>" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label text-secondary text-uppercase small fw-bold">Aforo Estadio</label>
                                    <input type="number" name="capacidad_estadio" id="capacidad_estadio" class="form-control" 
                                           value="<?= htmlspecialchars($datos->capacidad_estadio) ?>" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-secondary text-uppercase small fw-bold">Fecha de Fundación</label>
                                <input type="date" name="fecha_fundacion" id="fecha_fundacion" class="form-control" 
                                       value="<?= htmlspecialchars($datos->fecha_fundacion) ?>" required>
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn btn-cyan btn-lg text-uppercase">Actualizar Datos</button>
                                <a href="index.php?controller=equipo&action=index" class="btn btn-outline-secondary text-uppercase">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/validacion.js"></script>
</body>
</html>