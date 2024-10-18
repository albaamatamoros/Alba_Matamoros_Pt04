<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estils/estilIndex.css">
    <link rel="stylesheet" href="estils/estilBarra.css">
    <link rel="stylesheet" href="estilPersonatgesMostrats.css">
    <?php require_once './model/model.php'; ?>
    <title>Inici</title>
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
            <button type="button">PERFIL</button>
            <div class="dropdown-content">
                <?php if (!isset($_SESSION['loginId'])): ?>
                    <a href="./vistaLogin.php">Iniciar sessió</a>
                    <a href="./vistaRegistrarse.php">Registrar-se</a>
                <?php else: ?>
                    <a href="./vistaPerfil.php">El meu perfil</a>
                    <a href="../controlador/controladorTancarSessio.php">Tancar sessió</a>
                <?php endif; ?>
            </div>
        </div>
        
    </nav>
    <section>
    <!-- PERSONATGES -->
    <h1 style="text-align: center; margin-bottom: 50px;">Llista de Personatges</h1>
        <div class="personatges-container" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 20px; max-width: 1200px; margin: 0 auto;">
            <?php
                $personatges = consultar();

                if (!empty($personatges)) {
                    foreach ($personatges as $personatge) {
                        echo '<div class="personatge-box" style="background-color: #fff; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; width: 250px; height: 150px; text-align: center; flex: 0 0 auto; margin: 10px;">';
                        echo '<h2 style="font-size: 20px; color: #333; margin-bottom: 10px;">' . htmlspecialchars($personatge['nom']) . '</h2>';
                        echo '<p style="font-size: 16px; color: #666; margin-bottom: 10px;">' . htmlspecialchars($personatge['cos']) . '</p>';
                        
                        // Botones de eliminar y modificar
                        echo '<div style="display: flex; justify-content: space-between;">';
                        echo '<button style="background-color: #e74c3c; color: white; border: none; border-radius: 4px; padding: 5px 10px; cursor: pointer;" onclick="esborrar(' . $personatge['id_personatge'] . ')">Eliminar</button>';
                        echo '<button style="background-color: #3498db; color: white; border: none; border-radius: 4px; padding: 5px 10px; cursor: pointer;" onclick="vistaModificar.php(' . $personatge['id_personatge'] . ')">Modificar</button>';
                        echo '</div>';
                        
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay personajes disponibles.</p>';
                }
            ?>
        </div>

    </section>
</body>
</html>
