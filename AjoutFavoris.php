<?php 
session_start();
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=mangayanim;charset=utf8', 'root', '');

    }catch (PDOException $e){
        echo $e->getMessage();
    }
    
    if(isset($_GET['id']) && !empty($_GET['id'])){

        $idSerie = $_GET['id'];
    
        $idMembre = $_SESSION['id'];
        var_dump($idMembre);

        $insert = $bdd->prepare("INSERT INTO watchlist (idMembre,idSerie) VALUES (?,?)");
        $insert->execute([$idMembre,$idSerie]);
        header('Location:series.php');
    }
?>