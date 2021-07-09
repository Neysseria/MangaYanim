<?php



    try{

        $bdd = new PDO("mysql:host=localhost;dbname=mangayanim", "root", "");

    }catch(PDOException $e){

        echo $e->getMessage();
    }
    

   
    if(isset($_POST["submit"])){

        if(!empty($_POST["titre"]) && !empty($_POST["contenu"]) && !empty($_POST["image"])){
            // $titre= $_POST["titre"];
            $insert = $bdd->prepare("INSERT INTO articles(titreArticle, contenuArticle, imageArticle) VALUES(?, ?, ?)");
    
            $insert->execute([ $_POST["titre"], $_POST["contenu"], $_POST["image"] ]);

            header("Location: articles.php");
    
            $erreur ="<p class='good'> l'article a bien été ajouté ! </p>";
    
        }else{
            $erreur = "<p class='error'> Veuillez remplir les champs ! </p>";
        }
    
    }

    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
</head>
<body>
    
    <h2>Ajouter un article</h2>

        <form action="" method="POST">
            <input type="text" placeholder="ajouter titre de l'article" name="titre">
            <input type="text" placeholder="ajouter le contenu de l'article" name="contenu">
            <input type="text" placeholder="ajouter une image" name="image">
            <input type="submit" name="submit">
        </form> 

    <?php
        if(isset($erreur)){
            echo $erreur;
        }

               
    ?>

