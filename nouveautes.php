<?php 
try{

    $bdd = new PDO("mysql:host=localhost;dbname=mangayanim; charset=utf8", "root", "");

}catch(PDOException $e){

    echo $e->getMessage();
}

    $select = $bdd->prepare("SELECT * FROM articles");
    $select->execute();

    $resultat = $select->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MangaYanim</title>
    
    <link rel="stylesheet" href="./css/nouveautes.css">
</head>
<body>

<?php  include("header.php"); ?>
<div class="main">

    <h2>NOUVEAUTES</h2>

        <div class="contenu">
            <?php 
                $requete=$bdd->query('SELECT * FROM articles '); 
                //  fetchAll recuperer toutes les lignes de la table
                $articles = $requete->fetchAll();

                foreach($articles as $article):?>
                
                    <div class="article">
                        <h3><?=$article['titreArticle']?></h3>

                        <div class="contenuarticle">
                            <img src="./images/<?=$article['imageArticle']?>" alt="">
                            <p class="resume"><?=$article['contenuArticle']?></p>
                        </div>

                        <div class="duree">il y a 3 jours</div> 
                    </div>
            <?php endforeach ?>
        </div>
</div>
<script src="script.js/burger.js"></script>
</body>
</html>