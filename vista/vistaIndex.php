<?php require_once './controlador/controladorPaginacio.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estils/estilBarra.css">
    <link rel="stylesheet" href="estils/estilMostrar.css">
    
    
    <title>Inici</title>
    <script>
        function confirmarEsborrar(idPersonatge) {
            let confirmacion = confirm("Segur que vols esborrar aquest personatge?");
            
            if (confirmacion) {
                window.location.href = './controlador/controladorEsborrarIndex.php?id_personatge=' + idPersonatge;
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

    <!-- MOSTRAR PERSONATGES -->
    <section>
        <?php if (!isset($_SESSION['loginId'])): ?>

            <!-- PERSONATGES GLOBALS -->
            <div class="titulo"> <h1 class="titulo-personatges">Llista de Personatges Global</h1> </div>
            <div class="personatges-container">
                <?php echo paginacioGlobal(isset($_GET["pagina"]) ? $_GET["pagina"] : PAGINA); ?>
            </div>

            <!-- PAGINACIÓ GLOBAL -->
            <section class="paginacio">
            <div class="pagination">
                <?php echo retornarLinksGlobal(isset($_GET["pagina"]) ? $_GET["pagina"] : PAGINA); ?>
            </div>
            </section>

        <?php else: ?>

            <!-- PERSONATGES USUARI -->
            <div class="titulo"> <h1 class="titulo-personatges">Llista de Personatges</h1> </div>
                <div class="personatges-container">
                    <?php echo paginacioPerUsuari(isset($_GET["pagina"]) ? $_GET["pagina"] : PAGINA); ?>
                </div>

            <!-- PAGINACIÓ PER USUARI -->
            <section class="paginacio">
            <div class="pagination">
                <?php echo retornarLinksPerUsuari(isset($_GET["pagina"]) ? $_GET["pagina"] : PAGINA); ?>
            </div>
            </section>

        <?php endif; ?>
    </section>
</body>
</html>
