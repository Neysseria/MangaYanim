<?php 
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=mangayanim;', 'root', '');

}catch (PDOException $e){
    echo $e->getMessage();
}

if(isset($_POST['connexion'])){

    $mailConnect = htmlspecialchars($_POST['emailConnexion']);
    $mdpConnect = sha1($_POST['passwordConnexion']);

    if(!empty($mailConnect) && !empty($mdpConnect)){
        
        $reqUser = $bdd->prepare("SELECT * from membres WHERE emailMembres = ? AND mpdMembres = ?");
        $reqUser->execute([$mailConnect,$mdpConnect]);
        $userExist = $reqUser->rowCount();
        
        if($userExist === 1){
            $userInfo = $reqUser->fetch();
            var_dump($userInfo);
            $_SESSION['id']= $userInfo['idmembres'];
            var_dump($_SESSION['id']);
            $_SESSION['pseudo']= $userInfo['pseudoMembres'];
            $_SESSION['mail']= $userInfo['emailMembres'];
            header("Location:profil.php?id=".$_SESSION['id']);
        }else{
            $erreurConnect = "Mauvais email ou mot de passe";
        }

    }else{
        $erreurConnect = "Veuillez remplir tous les champs.";
    }
}

?>