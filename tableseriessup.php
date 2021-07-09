<?php


    try{

        $bdd = new PDO("mysql:host=localhost; dbname=mangayanim","root", "");

    }catch(PDOException $e){

        echo $e->getMessage();
    }

   
    $id = $_GET["id"];
    
        $supprimer = $bdd->prepare("DELETE FROM series WHERE idSeries = ?");
        $supprimer->execute([$id]);

        header("Location: tableseries.php");

?>    