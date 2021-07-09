<?php 
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=mangayanim;charset=utf8', 'root', '');

}catch (PDOException $e){
    echo $e->getMessage();
}
?>

<?php 
    if(isset($_GET['categorieSerie']) && $_GET['categorieSerie']=== 'shonen'){
        $req= $bdd->query("SELECT * FROM series INNER JOIN categorie ON series.categorieSerie = categorie.idCategorie WHERE idCategorie= 1");
        $series = $req->fetchAll();
 
    }else if(isset($_GET['categorieSerie']) && $_GET['categorieSerie']=== 'shojo'){
        $req= $bdd->query("SELECT * FROM series INNER JOIN categorie ON series.categorieSerie = categorie.idCategorie WHERE idCategorie= 2");
        $series = $req->fetchAll();
    }
    else{
        $req= $bdd->query("SELECT * FROM series INNER JOIN categorie ON series.categorieSerie = categorie.idCategorie");
        $series = $req->fetchAll();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./splide/dist/css/splide.min.css">
    <link rel="stylesheet" href="./css/series.css">
    <title>MangaYanim</title>
</head>
<body>
    <!-- Header -->
    <?php include 'header.php' ?>
    <!-- Slider Séries -->
    <div class="main">
        <h1>Toutes nos séries</h1>
        
        <div class="categorie_button">
            <button class="category"><a href="series.php">All</a></button>
            <button class="category"><a href="series.php?categorieSerie=shonen">Shonen</a></button>
            <button class="category"><a href="series.php?categorieSerie=shojo">Shojo</a></button>
        </div>
        
        <div class="contenu_slide">
            <div class="slider">
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            
                                <?php foreach ($series as $serie): ?>
                        
                                <li class="splide__slide">
                                    <div class="image_titre">
                                        <a href="pageserie.php?id=<?= $serie['idSeries'] ?>"><img src="images/<?= $serie['imageSerie']?>" alt=""></a>
                                        <div class="contenu_anime">
                                            <div class="contenu_titre">
                                                <p><?= $serie['nomSerie']?></p>
                                            </div>
                                            <div class="resume">
                                                <?= $serie['resumeSerie'] ?>
                                            </div>
                                            <div class="info">
                                                <p>Durée : <span> <?= $serie['dureeSerie']?> </span></p>
                                                <p>Catégorie : <span><?= $serie['nomCategorie']?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>       
    </div>
    <!-- Footer -->
    <?php include 'footer.php' ?>


    <script>
        
        document.addEventListener( 'DOMContentLoaded', function () {
            
            new Splide( '.splide',{
                type   : 'loop',
                gap:10,
                perPage: 5,
                perMove: 1,
                breakpoints:{
		            1760: {
                        perPage: 4,
                    },
                    1440:{
                        perPage: 3,
                    },
                    1100:{
                        perPage: 2,
                    },
                    700:{
                        perPage: 1,
                    },
                }
            }).mount();
	    } );
    </script>
    <script src="./splide/dist/js/splide.min.js"></script>
</body>
</html>