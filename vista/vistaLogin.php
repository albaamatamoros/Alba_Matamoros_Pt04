<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilGlobal.css">
    <title>Iniciar sessió</title>
</head>
<body>
    <nav>
        <!-- Sección izquierda: INICI y GESTIÓ D'ARTICLES -->
        <div class="left">
            <button type="button" onclick="location.href='../index.php'">INICI</button>
            <button type="button" onclick="location.href='../vista/vistaMenu.php'">GESTIÓ D'ARTICLES</button>
        </div>

        <!-- Sección derecha: PERFIL (con menú desplegable) -->
        <div class="perfil">
            <button type="button">PERFIL</button>
            <div class="dropdown-content">
                <button type="button" onclick="location.href='../vista/vistaLogin.php'">Iniciar sessió</button>
                <button type="button" onclick="location.href='../vista/vistaRegistrarse.php'">Registrar-se</button>
            </div>
        </div>
    </nav>
    <div class="login-container">
        <h2>Iniciar sessió</h2>
        <form action="../controlador/controladorLogin.php" method="POST">
            <label for="usuari">Nom d'Usuari:</label>
            <input type="text" id="usuari" name="usuari">

            <label for="contrasenya">Contrasenya:</label>
            <input type="password" id="contrasenya" name="contrasenya">

            <input type="submit" action="IniciarSessio" value="Iniciar sessió">
        </form>

        <div class="form-footer">
            <p>No tens compte? <a href="../vista/vistaRegistrarse.php">Registrat</a></p>
        </div>
    </div>
</body>
</html>
