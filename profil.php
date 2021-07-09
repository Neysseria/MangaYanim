<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mangayanim', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres INNER JOIN role ON membres.idRole = role.idRole WHERE idmembres = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>
<html>
    <head>
        <title>TUTO PHP</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Inscription.css">
        <style>
            .contenu_profil{
                display:flex;
            }
            .profil{
                background: #CFDC8A;
                width: 15%;
                height: 93.8vh;
                display: flex;
                flex-direction:column;
                align-items:center;
                justify-content:center;
            }
            .editprofil{
                display:flex;
                flex-direction:column;
                align-items:center;
                justify-content:center;
            }
            .editprofil a{
                text-decoration:none;
                color: black;
                margin-top: 15px;
                font-size: 20px;
            }
            .editprofil a:hover{
                color: #A13D63;
            }
            .watchlist{
                width: 85%;
                display:flex;
                flex-direction:column;
                align-items:center;
                padding:50px 0px;
            }
            .center_carte{
                display:flex;
                align-items:center;
                justify-content:center;
                flex-wrap:wrap;
            }
            .contenu_watchlist{
                display:flex;
                align-items:center;
                justify-content:center;
                background: #CFDC8A;
                padding: 25px 0px;
                margin: 35px 0px;
                position:relative;
                box-shadow: 3px 3px 3px grey;
                margin:15px;
            }
            .contenu_watchlist .carte svg{
                position:absolute;
                right:0;
                top: 2;
            }
            .image img{
                width: 250px;
                height:140px;
            }
            .titre_button{
                display:flex;
                align-items:center;
                justify-content:center;
                flex-direction:column;
                padding-top:15px;
            }
            .titre_button button{
                border:none;
                border-radius: 20px;
                background:white;
            }
            .titre_button button a{
                color: #FF4F79;
                text-decoration:none;
            }
            .titre_button button a{
                color: #FF4F79;
            }
        </style>
    </head>
    <body class="color">
    <?php include 'header.php' ?>
        <div class="contenu_profil">
            <div class="profil">
                <h2>Profil de <?php echo $userinfo['pseudoMembres']; ?></h2>
                <br /><br />
                <?php
                if(isset($_SESSION['id']) AND $userinfo['idmembres'] == $_SESSION['id'])
                {
                ?>
                <div class="editprofil">
                    <a href="EditionProfil.php">Editer mon profil</a>
                    <?php 
                        if(isset($userinfo['nomRole']) && $userinfo['nomRole'] === 'admin'){
                            echo '<a href="tables.php">Espace admin</a>';
                        }
                    ?>
                    
                    <a href="deconnexion.php">Se déconnecter</a>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="watchlist">
            <h1>Watchlist</h1>
                <div class="center_carte">
                    <?php 
                        $recup = $bdd->prepare('SELECT * FROM series as s, watchlist as w WHERE w.idMembre=? and w.idSerie = s.idSeries');
                        $recup->execute([$_SESSION['id']]);
                        $infoWatchlist = $recup->fetchAll();
                        
                        foreach($infoWatchlist as $infoW):
      
                    ?>
                        <div class="contenu_watchlist">
                            <div class="carte">
                                <a href="supprimerWatchlist.php?id=<?= $infoW['idSeries']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                    </svg>
                                </a>
                                <div class="info_carte">
                                    <div class="image"><img src="./images/<?= $infoW['imageSerie']?>" alt=""></div>
                                    <div class="titre_button">
                                        <p><?= $infoW['nomSerie']?></p>
                                        <button><a href="pageserie.php?id=<?= $infoW['idSeries']?>">Voir la série</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
   </body>
</html>
<?php
}
?>