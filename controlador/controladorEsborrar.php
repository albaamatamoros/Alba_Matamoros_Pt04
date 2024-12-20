<?php
    //Alba Matamoros Morales
    session_start();
    //Array d'errors.
    $errors = [];
    //Comprovar l'exsistencia d'un usuari.
    $exsist = false;
    //Comprovat si tot a estat ok.
    $correcte = "";
    //Comprovar si el personatge es seu.
    $creat = false;
    require_once "../model/modelPersonatges.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = ($_POST["action"]);

        try {
            if ($accion == "Esborrar"){
                $nom = htmlspecialchars($_POST["nom"]);
                $usuariId = htmlspecialchars($_SESSION["loginId"]);

                //Control d'errors.
                if (empty($nom)) $errors[] = "➤ Has de proporcionar un personatge per modificar-lo.";
            
                //COMPROVACIÓ A MODEL, EXSISTEIX PERSONATGE + USUARI.
                if (empty($errors)){
                    $existe = selectComprovarNom($nom);
                    if ($existe == false){
                        $errors[] = "➤ No existeix cap personatge amb aquest Nom.";
                    } else {
                        $creat = selectComprovarUsuariId($nom, $usuariId);
                        if ($creat == false){
                            //Si no es propi no es pot modificar.
                            $errors[] = "➤ No pots esborrar un personatge que no es teu.";
                        } else { esborrar($nom); }
                        if (empty($errors)) { 
                            $correcte = "Article esborrat correctament!";
                            include "../vista/vistaEsborrar.php";
                        } else { include "../vista/vistaEsborrar.php"; }
                    } 
                    if (!empty($errors)) { include "../vista/vistaEsborrar.php"; }
                } else { include "../vista/vistaEsborrar.php"; }
            } else { 
                $errors[] = "No es pot completar aquesta acció.";
                include "../vista/vistaEsborrar.php"; }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>