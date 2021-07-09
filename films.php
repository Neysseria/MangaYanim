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
    <link rel="stylesheet" href="./splide/dist/css/splide.min.css">
    <link rel="stylesheet" href="./css/series.css">
    <title>MangaYanim</title>
</head>
<body>
    <!-- Header -->
    <?php include 'header.php' ?>
    <!-- Slider Films -->
    <div class="main">
        <h1>Tous nos films</h1>
        <div class="contenu_slide">
            <div class="slider">
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php 
                                $req= $bdd->query("SELECT * FROM films");
                                $films = $req->fetchAll();

                                foreach ($films as $film): ?>
                        
                                <li class="splide__slide">
                                    <div class="image_titre">
                                        <a href="pagefilm.php?id=<?= $film['idFilm']; ?>"><img src="images/<?= $film['imageFilm']?>" alt=""></a>
                                        <div class="contenu_anime">
                                            <div class="contenu_titre">
                                                <p><?= $film['nomFilm']?></p>
                                            </div>
                                            <div class="resume">
                                                <?= $film['resumeFilm'] ?>
                                            </div>
                                            <div class="info">
                                                <p>Durée : <span> <?= $film['dureeFilm']?> </span></p>
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