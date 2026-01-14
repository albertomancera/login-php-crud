<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login - LaLiga Hypermotion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --liga-cyan: #00ffcc; 
            --liga-dark: #111111;
            --liga-card: #1a1a1a;
        }
        
        body {
            background-color: var(--liga-dark);
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }

        .login-card {
            background-color: var(--liga-card);
            border: 1px solid #333;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 255, 204, 0.1); 
            max-width: 400px;
            width: 100%;
        }
        .brand-title {
            font-size: 1.8rem;
            font-weight: 900;
            font-style: italic;
            text-align: center;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        .text-cyan { color: var(--liga-cyan); }

        .form-control {
            background-color: #2b2b2b;
            border: 1px solid #444;
            color: #fff;
            padding: 12px;
            font-size: 0.95rem;
        }
        .form-control:focus {
            background-color: #333;
            border-color: var(--liga-cyan);
            color: #fff;
            box-shadow: 0 0 8px rgba(0, 255, 204, 0.3);
        }
        .form-control::placeholder { color: #888; }
        .btn-login {
            background-color: var(--liga-cyan);
            color: #000;
            font-weight: 800;
            text-transform: uppercase;
            padding: 12px;
            border: none;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background-color: #fff;
            box-shadow: 0 0 15px var(--liga-cyan);
            transform: translateY(-1px);
        }

        .label-custom {
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 5px;
            display: block;
        }
    </style>
</head>
<body>

    <div class="login-card p-4 p-md-5">
        <div class="mb-4 text-center">
            <div class="brand-title">LALIGA <br><span class="text-cyan">HYPERMOTION</span></div>
            <p class="text-secondary small">Panel de Administración</p>
        </div>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger bg-danger bg-opacity-10 border-danger text-danger text-center py-2 mb-4">
                <small> <?php echo $error; ?></small>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?controller=auth&action=login">
            <div class="mb-3">
                <label class="label-custom">Usuario</label>
                <input type="text" name="username" class="form-control rounded-3" placeholder="Ingresa tu usuario" required>
            </div>

            <div class="mb-4">
                <label class="label-custom">Contraseña</label>
                <input type="password" name="password" class="form-control rounded-3" placeholder="••••••••" required>
            </div>

            <button class="btn btn-login rounded-3">Iniciar Sesión</button>
        </form>

        <div class="text-center mt-4">
            <small class="text-secondary opacity-50">Hecho por Alberto Mancera Plaza</small>
        </div>
    </div>

</body>
</html>