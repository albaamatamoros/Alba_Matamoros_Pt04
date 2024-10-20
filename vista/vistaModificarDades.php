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
    <?php
        // Verificar si la sesión no está activa.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    ?>
    <body>
        <nav>
            <!-- INICI y GESTIÓ D'ARTICLES -->
            <div class="left">
                <a href='../index.php'">INICI</a>
                <a href="../vista/vistaMenu.php">GESTIÓ DE PERSONATGES</a>
            </div>

            <!-- PERFIL -->
            <div class="perfil">
                <a> <?php 
                        $nomUsuari = $_SESSION["loginUsuari"]; 
                        echo $nomUsuari;
                    ?> 
                </a>
                <div class="dropdown-content">
                    <a href="../vista/vistaCanviContra.php">Nova contrasenya</a>
                    <a href="../controlador/controladorTancarSessio.php">Tancar sessió</a>
                </div>
            </div>
        </nav>

        <!-- MODIFICAR PERSONATGE -->
        <div class="button-container">
            <h1>MODIFICAR PERSONATGE</h1>

            <form action="../controlador/controladorModificarDades.php" method="POST">

                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom"/>
                    
                <label for="text">Descripció:</label>
                <input type="text" id="text" name="text"></input>

                <!-- MISSATGE D'ERROR Y DE CONFIRMACIÓ -->
                <?php if (!empty($errors)): ?>
                    <div class="alert error-container">
                        <span class="alert-icon error-icon">⚠️</span> <!-- Icono de advertencia -->
                        <div>
                            <?php foreach ($errors as $error): ?>
                                <p class="alert-text error-message"><?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php elseif (!empty($correcte)): ?>
                    <div class="alert success-container">
                        <span class="alert-icon success-icon">✔️</span> <!-- Icono de éxito -->
                        <div>
                            <p class="alert-text success-message"><?php echo $correcte; ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php 
                    if (isset($_GET["id_personatge"])) {
                        $personatgeId = $_GET["id_personatge"]; 
                    } else {
                        $errors[] = "No s'ha trobat l'ID del personatge.";
                    }
                ?>
                
                <input type="hidden" name="id" value="<?php echo isset($personatgeId) ? $personatgeId : ''; ?>"/>

                <!-- MODIFICAR -->
                <div class="button-group">
                    <input type="submit" name="action" value="Modificar" class="btn"/> <!-- Botón de modificación -->
                    <button onclick="location.href='../vista/vistaMenu.php'" type="button" class="btn">Tornar</button> 
                </div>
            </form>
        </div>
    </body>
</html>
