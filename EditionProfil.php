<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mangayanim', 'root', '');

if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE idmembres = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudoMembres'])
    {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $bdd->prepare("UPDATE membres SET pseudomembres = ? WHERE idmembres = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
    {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE membres SET emailMembres = ? WHERE idMembres = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
    {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);

        if($mdp1 == $mdp2)
        {
            $insertmdp = $bdd->prepare("UPDATE membres SET mpdMembres = ? WHERE idmembres = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);
            
        }
        else
        {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
        
        
    }
    
    if(isset($_POST['newpseudo']) AND $_POST['newpseudo'] == $user['pseudo'])
    {
        header('Location: profil.php?id='.$_SESSION['id']);
    }

?>
<html>
    <head>
        <title>TUTO PHP</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Inscription.css">
    </head>
    <body class="color" >
        <div align="center">
            <h2 class="titre">Edition de mon profil</h2>
            
            <form method="POST" action="">
            <table>
                <tr>
                    <td align="left" >
                        <label id="mot" for="pseudo">Pseudo :</label>
                    </td>
                    <td align="right" >
                        <input type="text" name="newpseudo" id="password" placeholder="Pseudo" Value="<?php echo $user['pseudoMembres']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <label id="mot" for="mail">Mail :</label>
                    </td>
                    <td align="right">
                        <input type="text" name="newmail" id="password" placeholder="Mail" Value="<?php echo $user['emailMembres']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <label id="mot" for="mdp">Mot de passe :</label>
                    </td>
                    <td align="right" >
                        <input type="text" name="password" id="password" placeholder="Mot de passe" />
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <label id="mot" for="config">Confirmation - mot de passe :</label>
                    </td>
                    <td align="right" >
                        <input type="text" name="password" id="password" placeholder="Confirmation mot de passe" />
                    </td>
                </tr>
               </table>
                        <input type="submit" id="submit2" value="Mettre à jour mon profil !" />
                   
                </form>
                <?php if(isset($msg)) { echo $msg; }?>
            </div>
        </div>
   </body>
   
</html>
<?php
}
else
{
    header("Location: connexion.php");
}
?>