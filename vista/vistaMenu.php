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
                <a href='../index.php'">INICI</a>
                <a href='../vista/vistaMenu.php'">GESTIÓ DE PERSONATGES</a>
            </div>

            <!-- Sección derecha: PERFIL (con menú desplegable) -->
            <div class="perfil">
                <a>PERFIL</a>
                <div class="dropdown-content">
                    <a href='../vista/vistaLogin.php'">Iniciar sessió</a>
                    <a href='../vista/vistaRegistrarse.php'">Registrar-se</a>
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
