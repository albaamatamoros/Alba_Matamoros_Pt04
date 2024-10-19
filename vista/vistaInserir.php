<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilPersonatges.css">
    <link rel="stylesheet" href="../estils/estilBarra.css">
    <link rel="stylesheet" href="../estils/estilError.css">
    <title>Inserir Personatge</title>
</head>
<script>
</script>
    <body>
        <nav>
            <!-- INICI y GESTIÓ D'ARTICLES -->
            <div class="left">
                <button type="button" onclick="location.href='../index.php'">INICI</button>
                <button type="button" onclick="location.href='../vista/vistaMenu.php'">GESTIÓ DE PERSONATGES</button>
            </div>

            <!-- PERFIL -->
            <div class="perfil">
                <button type="button">PERFIL</button>
                <div class="dropdown-content">
                    <button type="button" onclick="location.href='../vista/vistaLogin.php'">Iniciar sessió</button>
                    <button type="button" onclick="location.href='../vista/vistaRegistrarse.php'">Registrar-se</button>
                </div>
            </div>
        </nav>

        <!-- INSERIR ARTICLE -->
        <div class="button-container">
            <h1>INSERIR UN ARTICLE</h1>
            
            <form action="../controlador/controladorInsertar.php" method="POST">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="<?php echo isset ($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '' ; ?>"/>
                    
                <label for="text">Descripció:</label>
                <input type="text" id="text" name="text" value="<?php echo isset ($_POST['text']) ? htmlspecialchars($_POST['text']) : '' ; ?>" ></input>

                <!-- MENSAJE DE ERROR Y DE CORRECTO -->
                <?php if (!empty($errors)): ?>
                    <div class="alert error">
                        <span class="alert-icon">⚠️</span> <!-- Icono de advertencia -->
                        <div>
                            <?php foreach ($errors as $error): ?>
                                <p class="alert-text"><?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php elseif (!empty($correcte)): ?>
                    <div class="alert success">
                        <span class="alert-icon">✔️</span> <!-- Icono de éxito -->
                        <div>
                            <p class="alert-text"><?php echo $correcte; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                    $errors = [];
                    $correcte = "";
                ?>

                <!-- INSERIR -->
                <div class="button-group">
                    <input type="submit" name="action" value="Inserir" class="btn"/>
                    <button onclick="location.href='vistaMenu.php'" type="button" class="btn">Tornar</button> 
                </div>
            </form>
        </div>        
    </body>
</html>
