<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./estils/login.css">
</head>
<body>
    <nav>
        <!-- Sección izquierda: INICI y GESTIÓ D'ARTICLES -->
        <div class="left">
            <button type="button" onclick="location.href='./index.php'">INICI</button>
            <button type="button" onclick="location.href='./vista/menu.vista.php'">GESTIÓ D'ARTICLES</button>
        </div>

        <!-- Sección derecha: PERFIL (con menú desplegable) -->
        <div class="perfil">
            <button type="button">PERFIL</button>
            <div class="dropdown-content">
                <button type="button" onclick="location.href='./iniciar.vista.php'">Iniciar sesión</button>
                <button type="button" onclick="location.href='./registrarse.vista.php'">Registrarse</button>
            </div>
        </div>
    </nav>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Iniciar Sesión">
        </form>

        <div class="form-footer">
            <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
        </div>
    </div>
</body>
</html>
