<?php // include "functions.php"; 
$getsitequery = "SELECT * FROM `sitesettings`";
$runsquery = mysqli_query($connection, $getsitequery);
while($row = $runsquery->fetch_assoc()){
  $sitename = $row["sitename"];
  $siteurl = $row["siteurl"];
  $sitelogo = $row["sitelogo"];
  $sitefavicon = $row["sitefavicon"];
  $sitetagline = $row["sitetagline"];
  $allowindexing = $row["allowindexing"];
  $username = $row["username"];
  $firstname = $row["firstname"];
  $lastname = $row["lastname"];
  $bio = $row["bio"];
  $makeresponsive = $row["makeresponsive"];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?=$sitename?> | <?=$sitetagline?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>    <div class="wrap">
      <header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                <a href="#"><span class="fa fa-twitter"></span></a>
                <a href="#"><span class="fa fa-facebook"></span></a>
                <a href="#"><span class="fa fa-instagram"></span></a>
                <a href="#"><span class="fa fa-youtube-play"></span></a>
              </div>
              <div class="col-3 search-top">
                <form action="search.php" class="search-top-form">
                  <!-- <span class="icon fa fa-search"></span> -->
                  <input type="search" id="search" name="q" placeholder="Search for something" value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>">
                  <a href=""><span class="icon fa fa-search"></span></a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="<?=$siteurl?>"><?=$sitename?></a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">        
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
            <?php
              $menuquery = "SELECT * FROM sitemenu" ;
              $runmenuquery = mysqli_query($connection, $menuquery);
              while ($menu=mysqli_fetch_assoc($runmenuquery)) { 
                $no = count(fetchSubMenu($connection, $menu['id']));
                if (!$no) {
                  ?>
                  <li class="nav-item">
                  <a class="nav-link active" href="<?=$menu['action']?>"><?=$menu['name']?></a>
                </li><?php
                }else{
                ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active" href="<?=$menu['action']?>" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$menu['name']?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <?php
                    $submenu = fetchSubMenu($connection, $menu['id']);
                    foreach ($submenu as $sm) { ?>
                      <a class="dropdown-item" href="category.html"><?=$sm['name']?></a>
                    <?php }
                  ?>
                  </div>
                </li>
              <?php
            }
          }
            ?>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Business</a>
                </li> ->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Travel</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="category.html">Asia</a>
                    <a class="dropdown-item" href="category.html">Europe</a>
                    <a class="dropdown-item" href="category.html">Dubai</a>
                    <a class="dropdown-item" href="category.html">Africa</a>
                    <a class="dropdown-item" href="category.html">South America</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                    <a class="dropdown-item" href="category.html">Lifestyle</a>
                    <a class="dropdown-item" href="category.html">Food</a>
                    <a class="dropdown-item" href="category.html">Adventure</a>
                    <a class="dropdown-item" href="category.html">Travel</a>
                    <a class="dropdown-item" href="category.html">Business</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li> -->
              </ul>
              
            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->