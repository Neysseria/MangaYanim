
<?php

session_start();

  try{

      $bdd = new PDO("mysql:host=localhost; dbname=mangayanim; charset=utf8","root", "");

  }catch(PDOException $e){

      echo $e->getMessage();
  }

  if (isset($_POST["valider"])){
      $modifrole=htmlspecialchars($_POST["modifrole"]);

      if(!empty($modifrole)){
          $requete=$bdd->prepare("SELECT * FROM membres INNER JOIN role ON membres.idRole=role.idRole WHERE emailMembres=?");
          $requete->execute([$modifrole]);
          $roleinfo=$requete->rowCount();

        //   var_dump($roleinfo);

        if($roleinfo===1){
            $modif=$bdd->prepare("UPDATE membres SET idRole=2 WHERE emailMembres=?");
            $modif->execute([$modifrole]);
           
        header("Location:membres.php");

        }
      }
  }

  
  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
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
        
        
        <title>role</title>
    </head>
    <body>
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i><a href="tables.php">Table</a> </h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Role</h4>
                        <hr>

                    </div>

                </div>

            </div>

        </section>

    </section>

    <section class="admin">
        <h1>Role administrateur</h1>
        <form action="" method="POST">
            <input type="email" name="modifrole" placeholder="email">
            <input type="submit" name="valider" value="Valider">
        </form>

    </section>

    </body>
    </html>