<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilIniciarRegistrar.css">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <link rel="stylesheet" href="../estils/estilError.css">
    <title>Iniciar sessió</title>
</head>
<body>
    <nav>
        <!-- INICI y GESTIÓ D'ARTICLES -->
        <div class="left">
            <a href="../index.php">INICI</a>
        </div>

        <!-- PERFIL -->
        <div class="perfil">
            <a>PERFIL</a>
            <div class="dropdown-content">
                <a href="../vista/vistaLogin.php">Iniciar sessió</a>
                <a href="../vista/vistaRegistrarse.php">Registrar-se</a>
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
    </div>
</body>
</html>
