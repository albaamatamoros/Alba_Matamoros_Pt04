<?php
    //Array d'errors.
    $errors = [];
    //Comprovar l'exsistencia d'un usuari.
    $exsist = false;
    //Comprovat si tot a estat ok.
    $correcte = "";
    require_once "../model/model.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = ($_POST["action"]);

        try {
            if ($accion == "Esborrar"){
                $id = $_POST["id"];
                $nom = $_POST["nom"];

                //Control d'errors.
                if (!preg_match('/^\d+$/', $id) && (!empty($id))) $errors[] = "El camp id ha de ser un numero.";
                if (empty($id) && (empty($nom))) $errors[] = "Ha d'haver-hi almenys un camp omplert per trobar el personatge.";
            
                if (empty($errors)){
                    //Fem control per poder acceptar esborrar per nom/id/o nom i id.
                    if (!empty($id) && !empty($nom)){
                        $existe = selectComprovarIdINom($id, $nom);
                        if ($existe == false){
                            $errors[] = "No existeix cap Personatge amb aquest Id i Nom.";
                        } else {
                            esborrar($id, $nom);
                        }
                    }
                    //nomes amb id.
                    elseif (!empty($id)){
                        $existe = selectComprovarId($id);
                        if ($existe == false){
                            $errors[] = "No existeix cap Personatge amb aquesta Id.";
                        } else {
                            esborrar($id, $nom);
                        }
                    } 
                    //nomes amb nom.
                    elseif (!empty($nom)) {
                        $existe = selectComprovarNom($nom);
                        if ($existe == false){
                            $errors[] = "No existeix cap Personatge amb aquest Nom.";
                        } else {
                            esborrar($id, $nom);
                        }
                    }
                    //Comrpova si ha hagut algun error a l'hora de buscar el personatge.
                    if (empty($errors)){ $correcte = "Personatge esborrat correctament!"; }
                    else { include "../vista/vistaEsborrar.php"; }
                } else { include "../vista/vistaEsborrar.php"; }
            } else { 
                $errors[] = "No es pot completar aquesta acció.";
                include "../vista/vistaModificar.php"; }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>