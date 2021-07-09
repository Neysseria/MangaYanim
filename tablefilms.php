<?php



  try{

      $bdd = new PDO("mysql:host=localhost; dbname=mangayanim; charset=utf8","root", "");

  }catch(PDOException $e){

      echo $e->getMessage();
  }

  if(isset($_POST["submit"])){

    if(!empty($_POST["nom"]) && !empty($_POST["resume"]) && !empty($_POST["duree"])){

        $insert = $bdd->prepare("INSERT INTO films(nomFilm, resumeFilm, dureeFilm) VALUES(?, ?, ?)");

        $insert->execute([ $_POST["nom"], $_POST["resume"], $_POST["duree"] ]);

        $erreur ="<p class='good'> la série a bien été ajouté ! </p>";

    }else{
        $erreur = "<p class='error'> Veuillez remplir les champs ! </p>";
    }

  }


  $select = $bdd->prepare("SELECT * FROM films");
  $select->execute();

  $resultat = $select->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>séries</title>

<link rel="stylesheet" href="style.css">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="tables.css" rel="stylesheet">
  <link href="style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="table-responsive.css">
  <script src="lib/chart-master/Chart.js"></script>


</head>
<section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i><a href="tables.php">Table</a> </h3>
      <div class="row">
        <div class="col-md-12">
          <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Film</h4>
            <hr>
           
                <?php
                    if(isset($erreur)){
                        echo $erreur;
                    }

                   
                ?>
            <button class="ajout"><a href='tablefilmajout.php'> + Ajouter une film</a></button> 
            
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Résumé</th>
                  <th>Durée</th>
                  <th></th>
                  <th> Modifier</th>
                  <th> Supprimer </th>
                </tr>
              </thead>
              <tbody>
                
                
                <?php 
                    $recup=$bdd->query("SELECT * FROM films");
                    $films=$recup->fetchAll();
                    foreach($films as $film):
                ?>
                    <tr>
                        <td><?= $film["idFilm"]?></td>
                        <td><?= $film["nomFilm"]?></td>
                        <td class="tdcontenu"><?= $film["resumeFilm"]?></td>
                        <td><?= $film["dureeFilm"]?></td>
                        <td></td>
                        <td class="changement"><a href="tablefilmsmodif.php?id=<?= $film["idFilm"]?>"> modifier</a></td>
                        <td class="changement"><a href="tablefilmssup.php?id=<?= $film["idFilm"]?>">supprimer</a></td> 

                    </tr>
<!-- var_dump($serie); -->
                <?php endforeach?>



              </tbody>
            </table>
          </div>
        </div>
        
       </div> 

    </section>
</section>   