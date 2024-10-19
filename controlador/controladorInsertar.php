<?php
    //Array d'errors.
    $errors = [];
    //Comprovar l'exsistencia d'un usuari.
    $exsist = false;
    //Comprovat si tot a estat ok.
    $correcte = "";
    require_once "../model/modelPersonatges.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = ($_POST["action"]);

        try {
            if ($accion == "Inserir"){
                $nom = $_POST["nom"];
                $text = $_POST["text"];

                //Control d'errors.
                if (empty($nom)) $errors[] = "El camp Nom està buit.";
                if (empty($text)) $errors[] = "El camp Text està buit.";

                //Fem controls de comprovacions abans d'inserir les dades.
                if (empty($errors)) {
                    $existe = selectComprovarNom($nom);
                    if ($existe == false){
                        inserir($nom, $text); 
                    } else { $errors[] = "Ja exsisteix un article amb aquest nom."; }
                    if (empty($errors)) { 
                        $correcte = "Article inserit correctament!";
                        unset($_POST["nom"]);
                        unset($_POST["text"]);
                        unset($_POST["id"]);
                    } else { include "../vista/vistaInserir.php"; }
                } else { include "../vista/vistaInserir.php"; }
            } else { 
                $errors[] = "No es pot completar aquesta acció.";
                include "../vista/vistaModificar.php"; }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>