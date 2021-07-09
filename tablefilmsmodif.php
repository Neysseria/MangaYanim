<?php

    try{

        $bdd = new PDO("mysql:host=localhost; dbname=mangayanim","root", "");

    }catch(PDOException $e){

        echo $e->getMessage();
    }

    
    
    if(isset($_POST['submit'])){

        $nom = $_POST["nom"];
        $resume = $_POST["resume"];
        $duree= $_POST["duree"];
        $id = $_GET["id"];
       


        if(!empty($nom) &&!empty($resume) &&!empty($duree)  ){

            $modifier = $bdd->prepare("UPDATE films SET nomFilm = ?, resumeFilm = ?, dureeFilm = ?  WHERE idFilm = ?");
            $modifier->execute([$nom,$resume,$duree,$id]);

             header("Location: tablefilms.php");

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
        <input type="text" placeholder="modifier nom film" name="nom">
        <input type="text" placeholder="modifier  resume film" name="resume">
        <input type="text" placeholder="modifier duree film" name="duree">
        <!-- <input type="text" placeholder="modifier role membre" name="role" value="> -->
        <input type="submit" name="submit">
    </form>

</body>
</html>