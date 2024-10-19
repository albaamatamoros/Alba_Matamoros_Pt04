<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilPersonatges.css">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <link rel="stylesheet" href="../estils/estilErrors.css">
    <title>Modificar Personatge</title>
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

        <!-- MODIFICAR PERSONATGE -->
        <div class="button-container">
            <h1>MODIFICAR PERSONATGE</h1>

            <form action="../controlador/controladorModificar.php" method="POST">
                <label for="id">Id Personatge:</label>
                <input type="text" id="id" name="id"/>

                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom"/>
                    
                <label for="text">Descripció:</label>
                <input type="text" id="text" name="text"></input>

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
                
                <!-- MODIFICAR -->
                <div class="button-group">
                    <input type="submit" name="action" value="Modificar" class="btn"/>
                    <button onclick="location.href='vistaMenu.php'" type="button" class="btn">Tornar</button> 
                </div>
            </form>
        </div>
    </body>
</html>
