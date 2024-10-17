<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilPersonatges.css">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <title>Modificar Personatge</title>
</head>
    <body>
        <nav>
            <!-- INICI y GESTIÓ D'ARTICLES -->
            <div class="left">
                <button type="button" onclick="location.href='../index.php'">INICI</button>
                <button type="button" onclick="location.href='../vista/vistaMenu.php'">GESTIÓ D'ARTICLES</button>
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

                <!-- MOSTRAR ERRORES -->
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
                
                <!-- MODIFICAR -->
                <div class="button-group">
                    <input type="submit" name="action" value="Modificar" class="btn"/>
                    <button onclick="location.href='vistaMenu.php'" type="button" class="btn">Tornar</button> 
                </div>
            </form>
        </div>
    </body>
</html>
