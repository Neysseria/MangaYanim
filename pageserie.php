<?php 
    session_start();
    
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=mangayanim;charset=utf8', 'root', '');
    
    }catch (PDOException $e){
        echo $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pagefilm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <title>MangaYanim</title>
</head>
<body>
    <?php 
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];

            $recup = $bdd->prepare("SELECT * FROM series INNER JOIN categorie ON series.categorieSerie = categorie.idCategorie WHERE idSeries = ?");
            $recup->execute(array($id));

            if($recup->rowCount()>0){
                $infoSerie = $recup->fetch();
                
                $titre = $infoSerie['nomSerie'];
                $resume = $infoSerie['resumeSerie'];
                $image = $infoSerie['imageSerie'];
                $duree = $infoSerie['dureeSerie'];
                $categorie = $infoSerie['nomCategorie'];
            }
        }
    ?>
    <div class="main">
        <div class="arrow_back">
            <a href="series.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#CFDC8A" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a> 
        </div>
        <div class="infos_films">
            <img src="./images/<?= $image?>" alt="">
            <div class="infos_contenu">
                <div class="titre">
                    <h1><?= $titre?></h1>
                </div>
                <div class="resume">
                    <p><?= $resume?></p>
                    <p>Durée : <?= $duree?></p>
                    <p>Catégorie : <?= $categorie?></p>
                </div>
                <div class="boutons">
                    <button><a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                        </svg>
                        Continuer</a></button>
                    <button><a href="Ajoutfavoris.php?id=<?= $id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FF4F79" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                        Favoris</a></button>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>