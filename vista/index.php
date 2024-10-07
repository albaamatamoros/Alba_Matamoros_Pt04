<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Alba Matamoros Morales -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilIndex.css">
        <title>Inici</title>
    </head>
        <style>
            /* Oculta el checkbox */
            #toggle-opciones {
                display: none;
            }

            /* Oculta las opciones por defecto */
            #opciones {
                display: none;
            }

            /* Muestra las opciones cuando el checkbox está marcado */
            #toggle-opciones:checked + label + #opciones {
                display: block;
            }
        </style>
    <body>
        <div>
            <button type="button" onclick="location.href='./index.php'">INICI</button>
            <button type="button" onclick="location.href='./menu.vista.php'">GESTIÓ D'ARTICLES</button>
            <input type="checkbox" id="toggle-opciones">
            <label for="toggle-opciones">
                <button type="button">PERFIL</button>
            </label>

            <!-- Opciones adicionales que se muestran cuando el checkbox está marcado -->
            <div id="opciones">
                <button type="button" onclick="location.href='./iniciar_sesion.php'">Iniciar sesión</button>
                <button type="button" onclick="location.href='./registrarse.php'">Registrarse</button>
            </div>
        </div>
    </body>
</html>