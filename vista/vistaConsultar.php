<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <link rel="stylesheet" href="../estils/estilMostrar.css">
    <?php require_once '../model/modelPersonatges.php'; ?>
    
    <title>Consultar personatges</title>
</head>
<body>
    <?php
        // Verificar si la sesión no está activa.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    ?>
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
                <a href="../controlador/controladorTancarSessio.php">Tancar sessió</a>
            </div>
        </div>
    </nav>

    <section>
        <!-- PERSONATGES GLOBALS -->
        <div class="titulo"> <h1 class="titulo-personatges">Llista de Personatges Global</h1> </div>
        <div class="personatges-container">
            <?php
            $personatges = consultar();

            if (!empty($personatges)): ?>
                <?php foreach ($personatges as $personatge): ?>
                    <div class="personatge-box">
                        <h2 class="personatge-nom"><?= htmlspecialchars($personatge['nom']) ?></h2>
                        <p class="personatge-cos"><?= htmlspecialchars($personatge['cos']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hi ha personatges disponibles.</p>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>