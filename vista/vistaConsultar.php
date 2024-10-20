<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <link rel="stylesheet" href="../estils/estilMostrar.css">
    <?php require_once '../controlador/controladorPaginacioConsultarMenu.php'; ?>
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
                <a href="../vista/vistaCanviContra.php">Nova contrasenya</a>
                <a href="../controlador/controladorTancarSessio.php">Tancar sessió</a>
            </div>
        </div>
    </nav>

    <section>
        <!-- PERSONATGES GLOBALS -->
        <div class="titulo"> <h1 class="titulo-personatges">Llista de Personatges Global</h1> </div>
            <div class="personatges-container">
                <?php echo paginacioGlobalConsultar(isset($_GET["pagina"]) ? $_GET["pagina"] : PAGINA); ?>
            </div>

            <!-- PAGINACIÓ GLOBAL -->
            <section class="paginacio">
            <div class="pagination">
                <?php echo retornarLinksConsultar(isset($_GET["pagina"]) ? $_GET["pagina"] : PAGINA); ?>
            </div>
            </section>
    </section>
</body>
</html>