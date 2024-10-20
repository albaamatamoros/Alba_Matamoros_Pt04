<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estils/estilBarra.css">
    <link rel="stylesheet" href="estils/estilMostrar.css">
    <?php require_once './model/modelPersonatges.php'; ?>
    <title>Inici</title>
    <script>
        function confirmarEliminacion(idPersonatge) {
            let confirmacion = confirm("Segur que vols esborrar aquest personatge?");
            
            if (confirmacion) {
                window.location.href = '../controlador/controladorEsborrarIndex.php?id_personatge=' + idPersonatge;
            }
        }
    </script>
</head>
<body>

    <nav>
        <!-- INICI y GESTIÓ D'ARTICLES -->
        <div class="left">
        <a href="index.php">INICI</a>
            <?php if(isset($_SESSION["loginId"])) {
                echo ' <a href="vista/vistaMenu.php">GESTIÓ DE PERSONATGES</a> ';
            } ?>
        </div>

        <!-- PERFIL -->
        <div class="perfil">
            <?php if (!isset($_SESSION['loginId'])): ?>
                <a>PERFIL</a>
                <div class="dropdown-content">
                    <a href="vista/vistaLogin.php">Iniciar sessió</a>
                    <a href="vista/vistaRegistrarse.php">Registrar-se</a>
            <?php else: ?>
                <a> <?php 
                        $nomUsuari = $_SESSION["loginUsuari"]; 
                        echo $nomUsuari;
                    ?> 
                </a>
                <div class="dropdown-content">
                    <!-- <a href="./vistaPerfil.php">El meu perfil</a> -->
                    <a href="./controlador/controladorTancarSessio.php">Tancar sessió</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <section>
        <?php if (!isset($_SESSION['loginId'])): ?>
            <!-- PERSONATGES GLOBALS -->
            <h1 class="titulo-personatges">Llista de Personatges Global</h1>
            <div class="personatges-container">
                <?php
                    $personatges = consultar();

                    if (!empty($personatges)) {
                        foreach ($personatges as $personatge) {
                            echo '<div class="personatge-box">';
                            echo '<h2 class="personatge-nom">' . htmlspecialchars($personatge['nom']) . '</h2>';
                            echo '<p class="personatge-cos">' . htmlspecialchars($personatge['cos']) . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No hi ha personatges disponibles.</p>';
                    }
                ?>
            </div>
        <?php else: ?>
            <!-- PERSONATGES USUARI -->
            <h1 class="titulo-personatges">Llista de Personatges</h1>
                <div class="personatges-container">
                    <?php
                        $usuariId = $_SESSION['loginId'];
                        $personatges = consultarPerUsuari($usuariId);
                        if (!empty($personatges)) {
                            foreach ($personatges as $personatge) {
                                echo '<div class="personatge-box">';
                                echo '<h2 class="personatge-nom">' . htmlspecialchars($personatge['nom']) . '</h2>';
                                echo '<p class="personatge-cos">' . htmlspecialchars($personatge['cos']) . '</p>';

                                // ESBORRAR I MODIFICAR
                                echo '<div class="personatge-botons">';
                                echo '<a class="eliminar-btn" href="#" onclick="confirmarEliminacion(' . $personatge['id_personatge'] . ')">🗑️</a>';
                                echo '<a class="modificar-btn" href="vistaModificar.php(' . $personatge['id_personatge'] . ')">✏️</a>';
                                echo '</div>';      

                                echo '</div>';              
                            }
                        } else {
                            echo '<p>No hi ha personatges disponibles.</p>';
                        }
                    ?>
                </div>
        <?php endif; ?>
    </section>
</body>
</html>
