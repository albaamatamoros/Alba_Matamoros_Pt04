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
                $nom = $_POST["nom"];
                $usuariId = $_SESSION["loginId"];

                //Control d'errors.
                if (empty($nom)) $errors[] = "Ha d'haver-hi almenys un camp omplert per trobar el personatge.";
            
                if (empty($errors)){
                    $existe = selectComprovarNom($nom);
                    if ($existe == false){
                        $errors[] = "No existeix cap Personatge amb aquest Nom.";
                    } else {
                        $creat = selectComprovarUsuariId($nom, $usuariId);
                        if ($creat == false){
                            $errors[] = "No pots esborrar un personatge que no es teu.";
                        } else { esborrar($nom); }
                        if (empty($errors)) { 
                            $correcte = "Article inserit correctament!";
                            include "../vista/vistaEsborrar.php";
                        } else { include "../vista/vistaEsborrar.php"; }
                    }
                } else { include "../vista/vistaEsborrar.php"; }
            } else { 
                $errors[] = "No es pot completar aquesta acció.";
                include "../vista/vistaEsborrar.php"; }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>