<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mangayanim', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE idmembres = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>

<html>
    <head>
        <title>MangaYanim</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/Inscription1.css">
    </head>
    <body class="color">
        <?php include 'header.php'; ?>
        <div align="center" id="pose" class="fond">
            <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
            <br /><br />
            <?php
            if(!empty($userinfo['avatar']))
            {
             ?>
             <img src = "membres/avatars/<?php echo $userinfo['avatar']; ?>" width = "150" />
             <?php
            }
            ?>
            <br /><br />
            Pseudo = <?php echo $userinfo['pseudo']; ?>
            <br />
            <!--Mail = <?php //echo $userinfo['mail']; ?>-->
            <br />
            <?php
            if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
            ?>
            <br />
            <a id="mot2" href="EditionProfil.php">Editer mon profil</a>
            <a id="mot2" href="deconnexion.php">Se déconnecter</a>
            <?php
            }
            ?>
    </div>
</div>
<?php include 'footer.php'; ?>
    <script src="script.js/burger2.js"></script>
 </body>
</html>
<?php
}
?>