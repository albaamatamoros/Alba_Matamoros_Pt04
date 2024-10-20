<?php
    //Alba Matamoros Morales
    session_start();
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
                $usuariId = $_SESSION["loginId"];

                //Control d'errors.
                if (empty($nom)) $errors[] = "El camp Nom està buit.";
                if (empty($text)) $errors[] = "El camp Text està buit.";

                //Fem controls de comprovacions abans d'inserir les dades.
                if (empty($errors)) {
                    $existe = selectComprovarNom($nom);
                    if ($existe == false){
                        inserir($nom, $text, $usuariId); 
                    } else { $errors[] = "Ja exsisteix un personatge amb aquest nom."; }
                    if (empty($errors)) { 
                        $correcte = "Personatge inserit correctament!";
                        unset($_POST["nom"]);
                        unset($_POST["text"]);
                        include "../vista/vistaInserir.php";
                    } else { include "../vista/vistaInserir.php"; }
                } else { include "../vista/vistaInserir.php"; }
            } else { 
                $errors[] = "No es pot completar aquesta acció.";
                include "../vista/vistaInserir.php"; }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>