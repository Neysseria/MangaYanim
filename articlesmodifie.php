<?php

session_start();

    try{

        $bdd = new PDO("mysql:host=localhost; dbname=mangayanim","root", "");

    }catch(PDOException $e){

        echo $e->getMessage();
    }

    
    
    if(isset($_POST['submit'])){

        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $image = $_POST["image"];
        $id = $_GET["id"];
       


        if(!empty($titre) &&!empty($contenu) &&!empty($image)  ){

            $modifier = $bdd->prepare("UPDATE articles SET titreArticle = ?, contenuArticle = ?, imageArticle = ?  WHERE idArticle = ?");
            $modifier->execute([$titre,$contenu,$image,$id]);

             header("Location: articles.php?msg=l'article a bien été modifié");

        }else{
            $erreur = "veuillez remplir les champs !";
        }


    }
    
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
</head>
<body>
    <?php 
        if(isset($erreur)){
            echo "<p style='color:red'>". $erreur . '</p>';
        }
    
    ?>

    <form action="" method="POST">
        <input type="text" placeholder="modifier titre article" name="titre">
        <input type="text" placeholder="modifier contenu article" name="contenu">
        <input type="text" placeholder="modifier image article" name="image">
        <!-- <input type="text" placeholder="modifier role membre" name="role" value="> -->
        <input type="submit" name="submit">
    </form>

</body>
</html>