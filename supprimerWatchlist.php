<?php 

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mangayanim', 'root', '');

$idSerie = $_GET['id'];
var_dump($idSerie);

$delete = $bdd->prepare('DELETE FROM watchlist WHERE idSerie = ?');
$delete->execute([$idSerie]);

header("Location: profil.php?id=" . $_SESSION['id']);
?>