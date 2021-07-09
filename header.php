
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MangaYanim</title>
    <link rel="stylesheet" href="./css/Menu.css">
    <link rel="stylesheet" href="footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<style>
    .connexion{
        display:flex;
        align-items:center;
        justify-content: space-between;
        width: 280px;
    }
</style>
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
        <?php 
            if(isset($_SESSION['id'])){
                echo "<a href='profil.php?id=" .$_SESSION['id']."'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-person-fill' viewBox='0 0 16 16'>
                <path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                </svg></a>";
            }        
        ?>
        <a href="co_inscript.php">Connexion/Inscription</a>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--menu-burger-->
<div class="menu_burger">
            <ul id="menu">
                <li><a class="mot" href="acceuil.php">Acceuil</a></li>
                <img id="img1" class="expand" src="outline_expand_more_black_24dp.png">
                <img id="btnClose" class="btnClose" src="outline_expand_less_black_24dp.png">
                <li><a class="mot" href="#" >Catalogue</a></li>
                <!--dropdwon du menu burger-->
                <div id="drop" class="dropdown">
                    <li a class="item" href="series.php">Série</a></li>
                    <li a class="item" href="films.php">Films</a></li>
                    <img class="social" src="./images/facebook.png" alt="facebook">
                    <img class="social" src="./images/twitter.png" alt="twitter">
                    <img class="social" src="./images/instagram.png" alt="instagram">
                </div>
                <li><a class="mot" href="nouveautés.php">Nouveautés</a></li>
                <li><a class="mot" href="connexion.php">Connexion/Inscription</a></li>
                
            </ul>
            <!--icones hamburger-->
            <div class="hamburger">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </div>
</div>
<!--______________________________________________________________________________________________-->
<!--Mets ton code là:-->


<!--Fin de ton code.-->
    <script src="./js/burger.js"></script>
</body>
</html>