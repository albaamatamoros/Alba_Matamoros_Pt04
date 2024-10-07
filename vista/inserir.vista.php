<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alba Matamoros Morales -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleForm2.css">
    <title>Inserir Article</title>
</head>
<script>
</script>
    <body>
        <div class="button-container">
            <h1>INSERIR UN ARTICLE</h1>
            
            <form action="./controlador.php" method="POST">
                <label for="nom">NOM:</label>
                <input type="text" id="nom" name="nom" value="<?php echo isset ($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '' ; ?>"/>
                    
                <label for="text">TEXT:</label>
                <input type="text" id="text" name="text" value="<?php echo isset ($_POST['text']) ? htmlspecialchars($_POST['text']) : '' ; ?>" ></input>

                <!-- Mostra misstages d'error o correctes -->
                <?php 
                    if (!empty($errors)){
                        echo "<br>";
                        foreach ($errors as $error)
                        echo $error .= "<br>";
                    } elseif (!empty($correcte)){
                        echo $correcte; }
                    $errors = [];
                    $correcte = "";
                ?>
                <div class="button-group">
                    <input type="submit" name="action" value="Inserir" class="btn"/>
                    <button onclick="location.href='./index.php'" type="button" class="btn">Tornar</button> 
                </div>
            </form>
        </div>        
    </body>
</html>
