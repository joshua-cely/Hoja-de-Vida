<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <script src="js/script.js" defer></script>
</head>
<body class="form-page">
    <div class="form-container">
        <h2 class="form-title">Iniciar Sesión</h2>

        <form action="../controlador/procesar_login.php" method="POST" class="form-grid">
            <!-- Usuario -->
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required autofocus autocomplete="username">
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required autocomplete="current-password">
            </div>

            <!-- Botón -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primario">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>
