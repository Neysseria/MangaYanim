
<?php 
    include 'inscription.php';
    include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/connexion.css">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php' ?>
    <div class="main">

        <div class="formulaire">
            <div class="gauche">
                <h1>S'inscrire</h1>
                <form action="" method="POST">
                    <input type="text" name="pseudo" placeholder="pseudo">
                    <input type="email" name="email" placeholder="email">
                    <input type="password" name="password" placeholder="password">
                    <input type="password" name="passwordConfirm" placeholder="confirm password">
                    <input type="submit" name="inscription" value="S'inscrire">
                </form>
                <?php 
                    if(isset($erreur)){
                        echo '<font color="red">'.$erreur.'</font>';
                    } 
                ?> 
            </div>
            <div class="mid"></div>
            <div class="droite">
                <h1>Se connecter</h1>
                <form action="" method="POST">
                    <input type="email" name="emailConnexion" placeholder="Entrez votre email">
                    <input type="password" name="passwordConnexion" placeholder="Entrez votre mot de passe">
                    <input type="submit" name="connexion" value="Se connecter">
                    <a href="recuperation.php">Mot de passe oublié</a>
                </form>
                <?php 
                    if(isset($erreurConnect)){
                        echo '<font color="red">'.$erreurConnect.'</font>';
                    }
                ?>
            </div>
        </div> 
         

    </div>
</body>
</html>