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
        <nav>
            <!-- Sección izquierda: INICI y GESTIÓ D'ARTICLES -->
            <div class="left">
                <button type="button" onclick="location.href='../index.php'">INICI</button>
                <button type="button" onclick="location.href='../vista/vistaMenu.php'">GESTIÓ DE PERSONATGES</button>
            </div>

            <!-- Sección derecha: PERFIL (con menú desplegable) -->
            <div class="perfil">
                <button type="button">PERFIL</button>
                <div class="dropdown-content">
                    <button type="button" onclick="location.href='../vista/vistaLogin.php'">Iniciar sessió</button>
                    <button type="button" onclick="location.href='../vista/vistaRegistrarse.php'">Registrar-se</button>
                </div>
            </div>
        </nav>
        <div class="button-container">
        <!-- Botons Inserir/modificar/esborrar i consultar -->
            <button onclick="location.href='vistaInserir.php'" type="button" class="btn return-btn">Inserir</button>
            <button onclick="location.href='vistaEsborrar.php'" type="button" class="btn return-btn">Esborrar</button> 
            <button onclick="location.href='vistaModificar.php'" type="button" class="btn return-btn">Modificar</button>
            <!-- Sin hacer -->
            <button onclick="location.href=''" type="button" class="btn return-btn">Consultar</button> 
        </div>
    </body>
</html>
