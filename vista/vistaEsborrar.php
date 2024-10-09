<!DOCTYPE html>
<html lang="en">
<head>
<!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleForm2.css">
    <title>Esborrar Article</title>
</head>
    <body>
        <div class="button-container">
            <p>(Pots esborrar per Id/Nom o Id i Nom)</p>
            <h1>ESBORRAR ARTICLE</h1>

            <form id="esborrar_vista" action="./controlador.php" method="POST">

                <label for="article">ID ARTICLE:</label>
                <input type="text" id="article" name="article"/>

                <label for="nom">NOM:</label>
                <input type="text" id="nom" name="nom"/>

                <!-- Missatges d'error i de confirmació -->
                <?php 
                    if (!empty($errors)){
                        echo "<br>";
                        foreach ($errors as $error)
                        echo $error .= "<br>";
                    } elseif (!empty($correcte)){
                        echo $correcte; }
                ?>

                <div class="button-group">
                <input type="submit" name="action" value="Esborrar" class="btn"/>
                    <button onclick="location.href='./index.php'" type="button" class="btn">Tornar</button> 
                </div>
            </form>
        </div>
    </body>
</html>
