<?php
    //Alba Matamoros Morales

    require_once "connexio.php";

    //---------------
    //-- PAGINACIÓ --
    //---------------

    //Consultem articles
    function consultarPaginacio($pagina, $personatgesPerPag) {
        $offset = ($pagina - 1) * $personatgesPerPag; 
    
        try {
            $connexio = connexio();
            $statement = $connexio->prepare('SELECT * FROM personatges LIMIT :limit OFFSET :offset');
            $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
            $statement->bindValue(':limit', $personatgesPerPag, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function consultarPerUsuariPaginacio($usuariId, $pagina, $personatgesPerPag) {
        $offset = ($pagina - 1) * $personatgesPerPag; // Calcular el offset
    
        try {
            $connexio = connexio();
            // Ajustar la consulta para incluir el limit y offset directamente
            $statement = $connexio->prepare('SELECT * FROM personatges WHERE usuari_id = :usuari_id LIMIT :limit OFFSET :offset');
            
            // Vincula el parámetro :id_usuari
            $statement->bindValue(':usuari_id', $usuariId, PDO::PARAM_INT);
    
            // Vincula el límite y el offset como parámetros enteros
            $statement->bindValue(':limit', $personatgesPerPag, PDO::PARAM_INT);
            $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
    
            $statement->execute();
            return $statement->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Count de personatges per la paginació.
    function countPersonatges(){
        try {
            $connexio = connexio();
            $contarArticles = $connexio->prepare('SELECT COUNT(*) as total FROM personatges');
            $contarArticles->execute();
            $result = $contarArticles->fetch();
            //Tornem només el número total d'articles per usuari.
            return $result['total'];
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    //Count de personatges per la paginació per usuari.
    function countPersonatgesPerUsuari($usuariId){
        try {
            $connexio = connexio();
            $contarArticles = $connexio->prepare('SELECT COUNT(*) as total FROM personatges WHERE usuari_id = :usuari_id');
            $contarArticles->bindValue(':usuari_id', $usuariId, PDO::PARAM_INT);
            $contarArticles->execute();
            $result = $contarArticles->fetch();
            //Tornem només el número total d'articles.
            return $result['total'];
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }
?>