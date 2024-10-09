<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleForm2.css">
    <title>Modificar Article</title>
</head>
    <body>
        <div class="button-container">
            <h1>MODIFICAR ARTICLE</h1>

            <form action="./controlador.php" method="POST">
                <label for="name">ID ARTICLE:</label>
                <input type="text" id="article" name="article"/>

                <label for="nom">NOM:</label>
                <input type="text" id="nom" name="nom"/>
                    
                <label for="text">TEXT:</label>
                <input type="text" id="text" name="text"></input>

                <?php 
                if (!empty($errors)){
                    echo "<br>";
                    foreach ($errors as $error)
                    echo $error .= "<br>";
                } elseif (!empty($correcte)){
                    echo $correcte; }
                ?>
                    
                <div class="button-group">
                    <input type="submit" name="action" value="Modificar" class="btn"/>
                    <button onclick="location.href='./index.php'" type="button" class="btn">Tornar</button> 
                </div>
            </form>
        </div>
    </body>
</html>
