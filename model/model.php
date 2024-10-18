<?php
    require_once "connexio.php";
    //------------
    //- USUARIOS -
    //------------
    //********************************************************
    //SELECT
    //Comprovar Usuari I Contrasenya exsistent.
    function comprovarUsuariIContrasenya($usuari, $contrasenya){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT * FROM usuaris WHERE usuari = :usuari AND contrasenya = :contrasenya');
            $statement->execute(
                array(
                ':usuari' => $usuari,
                ':contrasenya' => $contrasenya)
            );
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Comprovar Usuari I Email.
    function comprovarUsuariIEmail($usuari, $email){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT * FROM usuaris WHERE correu = :correu OR usuari = :usuari');
            $statement->execute(
                array(
                ':correu' => $email,
                ':usuari' => $usuari)
            );
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //********************************************************
    //INSERT

    //Insertar nou Usuari.
    function insertarNouUsuari($nom, $cognoms, $usuari, $email, $contrasenya){
        try {
            //Senteècia per inserir
            $connexio = connexio();
            $statement = $connexio->prepare('INSERT INTO usuaris (nom, cognoms, correu, usuari, contrasenya) VALUES (:nom, :cognoms, :correu, :usuari, :contrasenya)');
            $statement->execute( 
            array(
            ':nom' => $nom, 
            ':cognoms' => $cognoms,
            ':correu' => $email,
            ':usuari' => $usuari,
            ':contrasenya' => $contrasenya)
            );
        }catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //---------------
    //- PERSONATGES -
    //---------------

    //********************************************************

    //INSERT
    //Inserir nou personatge.
    function inserir($nom, $text){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('INSERT INTO personatges (nom, cos) VALUES (:nom, :cos)');
            $statement->execute( 
            array(
            ':nom' => $nom, 
            ':cos' => $text)
            );
        }catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //********************************************************
    //UPDATE

    //Modificar article
    function modificar(string $nom, string $text, int $id){
        try {
            //Fem un update que modifica totes les dades a les noves introduides.
            $connexio = connexio();
            $statement = $connexio->prepare('UPDATE personatges SET nom = :nom, cos = :cos WHERE id_personatge = :id_personatge');
            $statement->execute( 
            array(
            ':nom' => $nom, 
            ':cos' => $text,
            ':id_personatge' => $id)
            );
        }catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //********************************************************
    //DELETE

    //Esborrem personatge
    function esborrar($id, $nom){
        try {
            //Sentència per esborrar.
            $connexio = connexio();
            $statement = $connexio->prepare('DELETE FROM personatges WHERE id_personatge = :id_personatge OR nom = :nom');
            $statement->execute( 
            array(
            ':id_personatge' => $id,
            ':nom' => $nom)
            );
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //********************************************************
    //SELECT

    //Comprovacio per Nom.
    function selectComprovarNom($nom){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT nom FROM personatges WHERE nom = :nom');
            $statement->execute(array(':nom' => $nom));
            //Retornem dades o FALSE per saber si exsisteix o no.
            return $statement->fetch(); 
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Comprovacio per id.
    function selectComprovarId($id){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT id_personatge FROM personatges WHERE id_personatge = :id_personatge');
            $statement->execute(array(':id_personatge' => $id));            
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function selectComprovarIdINom($id, $nom){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT * FROM personatges WHERE id_personatge = :id_personatge AND nom = :nom');
            $statement->execute(
                array(
                ':id_personatge' => $id,
                ':nom' => $nom)
            );
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Comprovacio d'un article en concret per id per poder fer modificació de les seves dades.
    function selectPersonatgePerId($id) {
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT * FROM personatges WHERE id_personatge = :id_personatge');
            $statement->execute(array(':id_personatge' => $id));
            return $statement->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Mostrar tots els articles.
    function consultar(){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT * FROM personatges');
            $statement->execute();
            return $statement->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //INICIAR SESSIÓN
    function iniciSessio($usuari){
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT id_usuari, correu, usuari FROM usuaris WHERE usuari = :usuari');
            $statement->execute(
                array(
                    ':usuari' => $usuari)
            );
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>