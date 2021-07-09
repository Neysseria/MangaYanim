<?php

session_start();

    try{

        $bdd = new PDO("mysql:host=localhost; dbname=mangayanim","root", "");

    }catch(PDOException $e){

        echo $e->getMessage();
    }


    
    

    if(isset($_POST['submit'])){

        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        $email = $_POST["email"];
        $id = $_GET["id"];
       
// var_dump($pseudo);
// var_dump($mdp);
// var_dump($email);
// var_dump($id);

        if(!empty($pseudo) &&!empty($mdp) &&!empty($email)  ){

            $modifier = $bdd->prepare("UPDATE membres SET pseudoMembres = ?, mdpMembres = ?, emailMembres = ?  WHERE idmembres = ?");
            $modifier->execute([$pseudo,$mdp,$email,$id]);

             header("Location: membres.php");

        }else{
            $erreur = "veuillez remplir les champs !";
        }


    }
    
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
</head>
<body>
    <?php 
        if(isset($erreur)){
            echo "<p style='color:red'>". $erreur . '</p>';
        }
    
    ?>
    <div class="modif">
        <form action="" method="POST">
            <input type="text" placeholder="modifier pseudo Membre" name="pseudo">
            <input type="text" placeholder="modifier mdp Membre " name="mdp">
            <input type="email" placeholder="modifier Email membre" name="email">
            <input type="text" placeholder="modifier role membre" name="role" >
            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>