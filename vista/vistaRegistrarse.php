<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilGlobal.css">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <title>Registrar-se</title>
</head>
<body>
    <!-- HEADER -->
    <nav>
        <!-- Sección izquierda: INICI y GESTIÓ D'ARTICLES -->
        <div class="left">
            <button type="button" onclick="location.href='../index.php'">INICI</button>
            <button type="button" onclick="location.href='../vista/vistaMenu.php'">GESTIÓ DE PERSONATGES</button>
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

            <?php if (!empty($errors)): ?>
                <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 15px; margin: 10px 0; border-radius: 5px; font-family: Arial, sans-serif; display: flex; align-items: center; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                    <span style="margin-right: 10px; font-size: 20px;">⚠️</span> <!-- Icono de advertencia -->
                    <div>
                        <?php foreach ($errors as $error): ?>
                            <p style="margin: 0; padding: 0; font-size: 14px;"><?php echo $error; ?></p>
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