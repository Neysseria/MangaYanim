<?php


session_start();

    try{

        $bdd = new PDO("mysql:host=localhost; dbname=mangayanim","root", "");

    }catch(PDOException $e){

        echo $e->getMessage();
    }

   
    $id = $_GET["id"];
    
        $supprimer = $bdd->prepare("DELETE FROM articles WHERE idArticle = ?");
        $supprimer->execute([$id]);

        header("Location: articles.php?msg=l'article a bien été supprimé");

?>    