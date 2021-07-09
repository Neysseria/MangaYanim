<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>mangayanimadministrateur</title>
<style>
.align{
  display:flex;
  flex-direction:column;
}
a{
  color: white;
  padding: 15px;
}
li{
  padding:5px 0px;
}
</style>
<link rel="stylesheet" href="tables.css">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
 
  <link href="style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="table-responsive.css">
  <script src="lib/chart-master/Chart.js"></script>


</head>

<body>
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-th"></i>
                  <span>Tables</span>
                  </a>
                <ul class="sub">
                  <li><a href="membres.php">Membres</a></li>
                  <li><a href="articles.php">Articles</a></li>
                  <li><a href="tableseries.php">Séries</a></li>
                  <li><a href="tablefilms.php">Films</a></li>
                  <li><a href="role.php">Roles</a></li>
                </ul>
            </li>
            <div class="align">
                <a href="profil.php?id=<?= $_SESSION['id']?>"><span>Profil</span></a>
                <a href="deconnexion.php"><span>Déconnexion</span></a>
            </div>
        </div>
    </aside>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="lib/jquery.sparkline.js"></script>
    
    <!--script for this page-->
    <script src="lib/sparkline-chart.js"></script>

</body>

</html>