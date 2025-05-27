<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
<body class="form-page">
    <div class="form-container">
        <h2 class="form-title">Agregar Nuevo Usuario</h2>
        <form action="../controlador/procesar_usuario.php" method="POST" class="form-grid">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" required>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="rol" required>
                    <option value="admin">Admin</option>
                    <option value="usuario">Usuario</option>
                    <option value="invitado">Invitado</option>
                </select>
            </div>

            <div class="form-actions">
                <input type="submit" value="Guardar Usuario" class="btn btn-primario">
                <a href="../vista/dashboard.php" class="btn btn-secundario">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
