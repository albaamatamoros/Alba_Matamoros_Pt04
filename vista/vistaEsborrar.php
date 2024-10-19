<!DOCTYPE html>
<html lang="en">
<head>
<!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilPersonatges.css">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <link rel="stylesheet" href="../estils/estilErrors.css">
    <title>Esborrar Article</title>
</head>
    <body>
        <nav>
            <!-- INICI y GESTIÓ D'ARTICLES -->
            <div class="left">
                <button type="button" onclick="location.href='../index.php'">INICI</button>
                <button type="button" onclick="location.href='../vista/vistaMenu.php'">GESTIÓ DE PERSONATGES</button>
            </div>

            <!-- PERFIL-->
            <div class="perfil">
                <button type="button">PERFIL</button>
                <div class="dropdown-content">
                    <button type="button" onclick="location.href='../vista/vistaLogin.php'">Iniciar sessió</button>
                    <button type="button" onclick="location.href='../vista/vistaRegistrarse.php'">Registrar-se</button>
                </div>
            </div>
        </nav>
        <!-- ESBORRAR PERSONATGE -->
        <div class="button-container">
            <p>(Pots esborrar per Id/Nom o Id i Nom)</p>
            <h1>ESBORRAR PERSONATGE</h1>

            <form action="../controlador/controladorEsborrar.php" method="POST">

                <label for="id">Id personatge:</label>
                <input type="text" id="id" name="id"/>

                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom"/>

                <!-- Missatges d'error i de confirmació -->
                <?php if (!empty($errors)): ?>
                    <div class="alert error">
                        <span class="alert-icon">⚠️</span> <!-- Icono de advertencia -->
                        <div>
                            <?php foreach ($errors as $error): ?>
                                <p class="alert-text"><?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php elseif (!empty($correcte)): ?>
                    <div class="alert success">
                        <span class="alert-icon">✔️</span> <!-- Icono de éxito -->
                        <div>
                            <p class="alert-text"><?php echo $correcte; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                    $errors = [];
                    $correcte = "";
                ?>

                <!-- ESBORRAR -->
                <div class="button-group">
                <input type="submit" name="action" value="Esborrar" class="btn"/>
                    <button onclick="location.href='../vista/vistaMenu.php'" type="button" class="btn">Tornar</button> 
                </div>
            </form>
        </div>
    </body>
</html>
