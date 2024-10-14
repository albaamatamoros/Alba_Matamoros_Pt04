<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilGlobal.css">
    <title>Registrar-se</title>
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
                <button type="button" onclick="location.href='../vista/vistaIniciar.php'">Iniciar sessió</button>
                <button type="button" onclick="location.href='../vista/registrarse.php'">Registrar-se</button>
            </div>
        </div>
    </nav>

    <div class="login-container">
        <h2>Registrar-se</h2>
        <form action="register.php" method="POST">
            <label for="usuari">Nom d'Usuari:</label>
            <input type="text" id="usuari" name="usuari">

            <label for="email">Correu Electrònic:</label>
            <input type="email" id="email" name="email">

            <label for="contrasenya">Contrasenya:</label>
            <input type="password" id="contrasenya" name="contrasenya">

            <label for="confirmar-contrasenya">Confirmar Contrasenya:</label>
            <input type="password" id="confirmar-contrasenya" name="confirmar-contrasenya">

            <input type="submit" value="Registrar-se">
        </form>

        <div class="form-footer">
            <p>Ja tens un compte? <a href="../vista/vistaIniciar.php">Inicia sessió</a></p>
        </div>
    </div>
</body>
</html>