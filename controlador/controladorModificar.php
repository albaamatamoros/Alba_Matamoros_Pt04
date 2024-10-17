<?php
    //Array d'errors.
    $errors = [];
    //Comprovar l'exsistencia d'un usuari.
    $exsist = false;
    //Comprovat si tot a estat ok.
    $correcte = "";
    //Guardem les dades del personatge en concret.
    $PersonatgeBD;
    require_once "../model/model.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = ($_POST["action"]);

        try {
            if ($accion == "Iniciar sessió"){
                $nom = $_POST["nom"];
                $text = $_POST["text"];
                $id = $_POST["id"];

                //Control d'errors.
                if (empty($id)) $errors[] = "El camp Id no pot estàr buit.";
                if (empty($nom) && empty($text)) $errors[] = "Si vols modificar alguna cosa, has de modificar com a mínim Nom o Descripció.";

                if (empty($errors)) {
                    //Guardem el resultat del select, si no trova res retornara FALSE.
                    $existe = selectComprovarId($id);
                    if ($existe === false){
                        $errors[] = "No existeix cap personatge amb aquest Id.";
                    } else {
                        $PersonatgeBD = selectPersonatgePerId($id);

                        if (empty($nom)) $nom = $PersonatgeBD["nom"];
                        if (empty($text)) $text = $PersonatgeBD["cos"];
                    }
                    //Comprovem si s'ha generat algun error en el proces, sino s'envia un missatge dient que esta tot correcte. 
                    if (empty($errors)){
                        modificar($nom, $text, $id);
                        $correcte = "Personatge modificat correctament!";
                    } else { include "../vista/vistaModificar.php"; }
                } else { include "../vista/vistaModificar.php"; }  
            } else { 
                $errors[] = "No es pot completar aquesta acció.";
                include "../vista/vistaModificar.php"; }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>