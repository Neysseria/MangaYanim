<?php 

try{
    $bdd = new PDO('mysql:host=localhost;dbname=mangayanim;', 'root', '');

}catch (PDOException $e){
    echo $e->getMessage();
}
if(isset($_POST['inscription'])){

    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])){

        // Secure data
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        $confirmPassword = sha1($_POST['passwordConfirm']);

        $pseudolength = strlen($pseudo);

        if($pseudolength <= 255){

            $reqPseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudoMembres = ?");
            $reqPseudo->execute([$pseudo]);
            $pseudoExist = $reqPseudo->rowCount();

            if($pseudoExist === 0){

                if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                    $reqEmail = $bdd->prepare("SELECT * FROM membres WHERE emailMembres = ?");
                    $reqEmail->execute([$email]);
                    $emailExist = $reqEmail->rowCount();

                    if($emailExist === 0){

                        if($password === $confirmPassword){

                            $insertMembre = $bdd->prepare("INSERT INTO membres (pseudoMembres,emailMembres,mpdMembres, idRole) VALUES (?,?,?,?)");
                            $insertMembre->execute(array($pseudo,$email,$password,1));
                            
                            $erreur = "Votre compte a bien été crée !";

                        }else{
                            $erreur = "Les mots de passe ne correspondent pas.";
                        }

                    }else{
                        $erreur = "Cet email est déjà utilisé.";
                    }

                }else{
                    $erreur = "Votre email n'est pas valide.";
                }

            }else{
                $erreur = "Le pseudo est déjà utilisé.";
            }

        }else{
            $erreur = "Votre pseudo est trop grand.";
        }

    }else{
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>