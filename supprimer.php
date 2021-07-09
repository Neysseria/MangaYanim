<?php
session_start();


    try{

        $bdd = new PDO("mysql:host=localhost; dbname=mangayanim","root", "");

    }catch(PDOException $e){

        echo $e->getMessage();
    }

   
    $id = $_GET["id"];
    
        $supprimer = $bdd->prepare("DELETE FROM membres INNER JOIN watchlist ON membres.idmembres= watchlist.idMembre WHERE idmembres = ?");
        $supprimer->execute([$id]);

        header("Location: membres.php");

?>    
