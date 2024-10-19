<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilGlobal.css">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <link rel="stylesheet" href="../estils/estilErrors.css">
    <title>Registrar-se</title>
</head>
<body>
    <!-- HEADER -->
    <nav>
        <!-- Sección izquierda: INICI y GESTIÓ D'ARTICLES -->
        <div class="left">
            <a href='../index.php'">INICI</a>
        </div>

        <!-- Sección derecha: PERFIL (con menú desplegable) -->
        <div class="perfil">
            <a>PERFIL</a>
            <div class="dropdown-content">
                <a href='../vista/vistaLogin.php'">Iniciar sessió</a>
                <a href='../vista/vistaRegistrarse.php'">Registrar-se</a>
            </div>
        </div>
    </nav>
    <!-- BODY -->
    <div class="login-container">
        <h2>Registrar-se</h2>
        <form action="../controlador/controladorRegistrar.php" method="POST">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">

            <label for="cognoms">Cognoms:</label>
            <input type="text" id="cognoms" name="cognoms">

            <label for="usuari">Nom d'Usuari:</label>
            <input type="text" id="usuari" name="usuari">

            <label for="email">Correu Electrònic:</label>
            <input type="email" id="email" name="email">

            <label for="contrasenya">Contrasenya:</label>
            <input type="password" id="contrasenya" name="contrasenya">

            <label for="confirmar_contrasenya">Confirmar Contrasenya:</label>
            <input type="password" id="confirmar_contrasenya" name="confirmar_contrasenya">

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

            <input type="submit" name="action" value="Registrar-se">
        </form>

        <div class="form-footer">
            <p>Ja tens un compte? <a href="../vista/vistaLogin.php">Inicia sessió</a></p>
        </div>
    </div>
</body>
</html>