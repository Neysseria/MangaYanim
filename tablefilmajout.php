<?php


    try{

        $bdd = new PDO("mysql:host=localhost;dbname=mangayanim", "root", "");

    }catch(PDOException $e){

        echo $e->getMessage();
    }
    

   
    if(isset($_POST["submit"])){

        if(!empty($_POST["nom"]) && !empty($_POST["resume"]) && !empty($_POST["duree"])){
            // $titre= $_POST["titre"];
            $insert = $bdd->prepare("INSERT INTO films(nomFilm, resumeFilm, dureeFilm) VALUES(?, ?, ?)");
    
            $insert->execute([ $_POST["nom"], $_POST["resume"], $_POST["duree"] ]);

            header("Location: tablefilms.php");
    
            $erreur ="<p class='good'> le film a bien été ajouté ! </p>";
    
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
    
    <h2>Ajouter un film</h2>

        <form action="" method="POST">
            <input type="text" placeholder="ajouter nom film" name="nom">
            <textarea name="resume" cols="30" rows="10">ajouter le resume</textarea>
            <!-- <input type="text" placeholder="ajouter le resume serie" name="resume"> -->
            <input type="text" placeholder="ajouter la duree" name="duree">
            <input type="submit" name="submit">
        </form> 

    <?php
        if(isset($erreur)){
            echo $erreur;
        }

               
    ?>

