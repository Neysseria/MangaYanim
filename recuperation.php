<?php
session_start();

try {
   $bdd = new PDO('mysql:host=localhost;dbname=mangayanim', 'root', '');
} catch (PDOException $e)
{
   print "erreur : " . $e->getMessage() . "<br/>";
}

if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
   if(!empty($_POST['recup_mail'])) {
      $recup_mail = htmlspecialchars($_POST['recup_mail']);
      if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {
         $mailexist = $bdd->prepare('SELECT idmembres,pseudoMembres FROM membres WHERE emailMembres = ?');
         $mailexist->execute(array($recup_mail));
         $mailexist_count = $mailexist->rowCount();
         if($mailexist_count == 1) {
            $pseudo = $mailexist->fetch();
            $pseudo = $pseudo['pseudo'];
            
            $_SESSION['recup_mail'] = $recup_mail;
            $recup_code = "";
            for($i=0; $i < 8; $i++) { 
               $recup_code .= mt_rand(0,9);
            }
            $mail_recup_exist = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();
            if($mail_recup_exist == 1) {
               $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
               $recup_insert->execute(array($recup_code,$recup_mail));
            } else {
               $recup_insert = $bdd->prepare('INSERT INTO recuperation(mail,code) VALUES (?, ?)');
               $recup_insert->execute(array($recup_mail,$recup_code));
            }
            $header="MIME-Version: 1.0\r\n";
         $header.='From:"[VOUS]"<votremail@mail.com>'."\n";
         $header.='Content-Type:text/html; charset="utf-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - Votresite</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     
                     <div align="center">Bonjour <b>'.$pseudo.'</b>,</div>
                     Voici votre code de récupération: <b>'.$recup_code.'</b>
                     A bientôt sur <a href="#">Votre site</a> !
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
         mail($recup_mail, "Récupération de mot de passe - Votresite", $message, $header);
            header("Location: http://localhost:8080/MangaYanim/recuperation.php?section=code");
         } else {
            $error = "Cette adresse mail n'est pas enregistrée";
         }
      } else {
         $error = "Adresse mail invalide";
      }
   } else {
      $error = "Veuillez entrer votre adresse mail";
   }
}
if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
   if(!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?');
      $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
      $verif_req = $verif_req->rowCount();
      if($verif_req == 1) {
         $up_req = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ?');
         $up_req->execute(array($_SESSION['recup_mail']));
         header('Location: http://localhost:8080/MangaYanim/recuperation.php?section=changemdp');
      } else {
         $error = "Code invalide";
      }
   } else {
      $error = "Veuillez entrer votre code de confirmation";
   }
}
if(isset($_POST['change_submit'])) {
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
      $verif_confirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE mail = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['confirme'];
      if($verif_confirme == 1) {
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
               $mdp = sha1($mdp);
               $ins_mdp = $bdd->prepare('UPDATE membres SET password = ? WHERE email = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));
              $del_req = $bdd->prepare('DELETE FROM recuperation WHERE mail = ?');
              $del_req->execute(array($_SESSION['recup_mail']));
               header('Location: http://localhost:8080/MangaYanim/recuperation.php?section=connexion.php');
            } else {
               $error = "Vos mots de passes ne correspondent pas";
            }
         } else {
            $error = "Veuillez remplir tous les champs";
         }
      } else {
         $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
      }
   } else {
      $error = "Veuillez remplir tous les champs";
   }
}
?>
<!DOCTYPE html>
    <html>
        <head>
                <meta charset="utf-8">
                <title>MangaYanim</title>
                <link rel="stylesheet" href="inscription.css">
                <link rel="stylesheet" href="footer.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        </head>
            <body class="color">
               <!--header: Titre, menu-->
<div class="header">
        <div class="titre">
            <img src="image.png">
        </div>
        <div class="nav">
                <div class="dropdown_show">
                    <a href="">Accueil</a>
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catalogue
                    </a>
                    <a href="">Nouveautés</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Série</a>
                        <a class="dropdown-item" href="#">Films</a>
                    </div>
                </div>
        </div>
    <div class="connexion">
        <a href="connexion.php">Connexion</a><span class="connexion">/</span>
        <a href="inscription.php">Inscription</a>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--menu-burger-->
<div class="menu_burger">
            <ul id="menu">
                <li><a class="mot" href="">Acceuil</a></li>
                <img id="img1" class="expand" src="outline_expand_more_black_24dp.png">
                <img id="btnClose" class="btnClose" src="outline_expand_less_black_24dp.png">
                <li><a class="mot" href="catalogue.php" >Catalogue</a></li>
                <!--dropdwon du menu burger-->
                <div id="drop" class="dropdown">
                    <li a class="item" href="#">Série</a></li>
                    <li a class="item" href="#">Films</a></li>
                </div>
                <li><a class="mot" href="nouveautés.php">Nouveautés</a></li>
                <li><a class="mot" href="connexion.php">Connexion/Inscription</a></li>
                <div class="liens">
                    <a href="https://www.facebook.com"><img class="social" src="Icones/facebook.png" alt="facebook"></a>
                    <a href="https://twitter.com"><img class="social" src="Icones/twitter.png" alt="twitter"></a>
                    <a href="https://www.instagram.com/"><img class="social" src="Icones/instagram.png" alt="instagram"></a>
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
         <div align="center" class="fond3">
            <h2 class="titre2">Récupération de mot de passe</h2><br /><br />
               <?php if(isset($_GET['section']) && $_GET['section'] == 'code') { ?>
               Un code de vérification vous a été envoyé par mail: <?= $_SESSION['recup_mail'] ?>
               <br/>
                  <form method="post">
                     <input type="text" placeholder="Code de vérification"  id="password" name="verif_code"/><br/><br/>
                     <input type="submit" id="submit3" value="Valider" name="verif_submit"/>
                  </form>
               <?php } elseif(isset($_GET['section']) && $_GET['section'] == "changemdp") { ?>
               Nouveau mot de passe pour <?= $_SESSION['recup_mail'] ?>
                  <form method="post">
                     <input type="password" placeholder="Nouveau mot de passe" id="password" name="change_mdp"/><br/><br/>
                     <input type="password" placeholder="Confirmation du mot de passe" id="password" name="change_mdpc"/><br/>
                     <input type="submit" id="submit3" value="Valider" name="change_submit"/>
                  </form>
               <?php } else { ?>
                  <form method="post">
                     <input type="email" placeholder="Votre adresse mail" id="password" name="recup_mail"/>
                     <input type="submit" id="submit3" value="Valider" name="recup_submit"/>
                  </form>
               </div>
               <?php } ?>
               <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; } ?>
               
                  <div class="footer">
                     <p><a href="#">Mentions légales | Politique de confidentialité | Conditions d'utilisation</a></p>
                     <p><a href="#">Nous contacter</a></p>
                     <p><a href="#">copyright, mangaYanim...</a></p>
                  </div>
               <script src="script.js/burger.js"></script>
   </body>
</html>

