<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Alba Matamoros Morales -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estils/estilMenuPersonatges.css">
        <link rel="stylesheet" href="../estils/estilBarra.css">
        <title>Gestió de Personatges</title>
    </head>
    <body>
        <?php session_start(); ?>
        <nav>
            <!-- INICI y GESTIÓ D'ARTICLES -->
            <div class="left">
                <a href='../index.php'">INICI</a>
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

        <div class="button-container">
        <!-- Botons Inserir/modificar/esborrar i consultar -->
            <a href='vistaInserir.php'" class="btn return-btn">Inserir</a>
            <a href='vistaEsborrar.php'" class="btn return-btn">Esborrar</a> 
            <a href='vistaModificar.php'" class="btn return-btn">Modificar</a>
            <!-- Sin hacer -->
            <a href="" class="btn return-btn">Consultar</a> 
        </div>

    </body>
</html>
