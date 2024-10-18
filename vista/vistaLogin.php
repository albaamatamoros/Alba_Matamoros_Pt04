<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilGlobal.css">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <link rel="stylesheet" href="../estils/prova.css">
    <title>Iniciar sessió</title>
</head>
<body>
    <nav>
        <!-- INICI y GESTIÓ D'ARTICLES -->
        <div class="left">
            <button type="button" onclick="location.href='../index.php'">INICI</button>
            <button type="button" onclick="location.href='../vista/vistaMenu.php'">GESTIÓ DE PERSONATGES</button>
        </div>

        <!-- PERFIL -->
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

            <input type="submit" name="action" value="Iniciar sessió">
        </form>

        <!-- CONTROL D'ERRORS -->
        <?php if (!empty($errors)): ?>
            <div class="error-container">
                <span class="error-icon">⚠️</span> <!-- Icono de advertencia -->
                <div>
                    <?php foreach ($errors as $error): ?>
                        <p class="error-message"><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="form-footer">
            <p>No tens compte? <a href="../vista/vistaRegistrarse.php">Registrat</a></p>
        </div>

                        <?php echo $_SESSION["id_usuari"]; ?>

    </div>
</body>
</html>
