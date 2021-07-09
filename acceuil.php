
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MangaYanim</title>
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>
<body class="color">
<!--header: Titre, menu-->
<div class="header">
        <div class="titre">
            <img src="./images/logo.png">
        </div>
        <div class="nav">
                <div class="dropdown_show">
                    <a href="acceuil.php">Accueil</a>
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catalogue
                    </a>
                    <a href="nouveautes.php">Nouveautés</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="series.php">Série</a>
                        <a class="dropdown-item" href="films.php">Films</a>
                    </div>
                </div>
        </div>
    <div class="connexion">
        <a href="co_inscript.php">Connexion/Inscription</a>
        <!-- <a href="inscription.php">Inscription</a> -->
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--menu-burger-->
<div class="menu_burger">
            <ul id="menu">
                <li><a class="mot" href="acceuil.php">Accueil</a></li>
                <img id="img1" class="expand" src="outline_expand_more_black_24dp.png">
                <img id="btnClose" class="btnClose" src="outline_expand_less_black_24dp.png">
                <li><a class="mot" href="#" >Catalogue</a></li>
                <!--dropdwon du menu burger-->
                <div id="drop" class="dropdown">
                    <li a class="item" href="series.php">Série</a></li>
                    <li a class="item" href="films.php">Films</a></li>
                </div>
                <li><a class="mot" href="nouveautes.php">Nouveautés</a></li>
                <li><a class="mot" href="connexion.php">Connexion</a></li>
                <li><a class="mot" href="inscription.php">Inscription</a></li>
                <div class="liens">
                    <a href="https://www.facebook.com"><img class="social" src="./images/facebook.png" alt="facebook"></a>
                    <a href="https://twitter.com"><img class="social" src="./images/twitter.png" alt="twitter"></a>
                    <a href="https://www.instagram.com/"><img class="social" src="./images/instagram.png" alt="instagram"></a>
                </div>
             </ul>
            
            <!--icones hamburger-->
            <div class="hamburger">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </div>
</div>
<!--______________________________________________________________________________________________-->
<!--slideshow avec effet disparition
<div class="Sbody">
    <div class="Stitre">
        <h1>LES ANIMES LES PLUS POPULAIRES<h1>
    </div>
        <div class="bord">
            <ul class="slideshow">
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
            </ul>
        </div>
</div>
________________________________________________________________________________________________________-->
<!--Mets ton code là:-->
<!--slideshow 2 avec boutons-->
<!--Carousel Watchlist
___________________________________________________________________________________________________________________________________-->
<section>
<div class="container">
    <div class="Stitre">
        <h1>LES ANIMES LES PLUS POPULAIRES<h1>
    </div>
        <div class="carousel">
            <input type="radio" name="slides" checked="checked" id="slide-1">
            <input type="radio" name="slides" id="slide-2">
            <input type="radio" name="slides" id="slide-3">
            <input type="radio" name="slides" id="slide-4">
            <input type="radio" name="slides" id="slide-5">
            <input type="radio" name="slides" id="slide-6">
            <ul class="carousel__slides">
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="./images/mha.jpg" alt="">
                        </div>
                        <figcaption>
                            My Hero Academia
                            <span class="credit">Saison: 4</span>
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="./images/onepiece.jpg" alt="">
                        </div>
                        <figcaption>
                            One Piece
                            <span class="credit">Saison: 22</span>                            
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="./images/naruto.jpg" alt="">
                        </div>
                        <figcaption>
                            Naruto
                            <span class="credit">Saison: 4</span>                            
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="./images/kaguya.jpg" alt="">
                        </div>
                        <figcaption>
                            Kaguya-sama love is war
                            <span class="credit">Saison: 3</span>                            
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="./images/DanMachi.jpg" alt="">
                        </div>
                        <figcaption>
                            Dan Machi
                            <span class="credit">Saison: 3</span>                            
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="./images/clannad.png" alt="">
                        </div>
                        <figcaption>
                            One Punch Man
                            <span class="credit">Saison: 2</span>                            
                        </figcaption>
                    </figure>
                </li>
            </ul>    
            <ul class="carousel__thumbnails">
                <li>
                    <label for="slide-1"><img src="./images/mha.jpg" alt=""></label>
                </li>
                <li>
                    <label for="slide-2"><img src="./images/onepiece.jpg" alt=""></label>
                </li>
                <li>
                    <label for="slide-3"><img src="./images/naruto.jpg" alt=""></label>
                </li>
                <li>
                    <label for="slide-4"><img src="./images/kaguya.jpg" alt=""></label>
                </li>
                <li>
                    <label for="slide-5"><img src="./images/DanMachi.jpg" alt=""></label>
                </li>
                <li>
                    <label for="slide-6"><img src="./images/clannad.png" alt=""></label>
                </li>
            </ul>
        </div>
    </div>
</section>
    <!--_____________________________________________________________________________________________________________________
    fin carousel watchlist-->








<!--Fin de ton code.-->
    <div class="footer">
        <p><a href="#">Mentions légales | Politique de confidentialité | Conditions d'utilisation</a></p>
        <p><a href="#">Nous contacter</a></p>
        <p><a href="#">copyright, mangaYanim...</a></p>
    </div>
    <script src="./js/burger.js"></script>
</body>
</html>