<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estils/estilIndex.css">
    <title>Inici</title>
</head>
<body>
    <nav>
        <!-- Sección izquierda: INICI y GESTIÓ D'ARTICLES -->
        <div class="left">
            <button type="button" onclick="location.href='index.php'">INICI</button>
            <button type="button" onclick="location.href='vista/vistaMenu.php'">GESTIÓ D'ARTICLES</button>
        </div>

        <!-- Sección derecha: PERFIL (con menú desplegable) -->
        <div class="perfil">
            <button type="button">PERFIL</button>
            <div class="dropdown-content">
            <button type="button" onclick="location.href='vista/vistaLogin.php'">Iniciar sessió</button>
            <button type="button" onclick="location.href='vista/vistaRegistrarse.php'">Registrar-se</button>
            </div>
        </div>
    </nav>
</body>
</html>
