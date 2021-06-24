<?php require ("ct-config.php"); ?>
<?php include_once ("ct-includes/ct-sitedata.php"); ?>
<?php include_once ("ct-includes/ct-plugins.php"); ?>
<?php include_once ("ct-includes/functions.php"); ?>
              <?php
if (isset($_GET['page']))
{
    $current_page = $_GET['page'];
}
else
{
    $current_page = 1;
}

$post_per_page = 12;
$result = ($current_page - 1) * $post_per_page;
if(isset($_POST["submit"]))  
 {  
      if(!empty($_POST["q"]))  
      {  
           $query = str_replace(" ", "+", $_POST["q"]);  
           header("location:search.php?q=".$query);  
      }  
 } 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>iDense Blogs</title>
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
  </head>
  <body>
    <?php include_once ("ct-includes/ct-header.php"); ?><br><br>
      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
                <?php
if (isset($_GET['q'])) {
  $searchquery=$_GET['q'];
  $squery = "SELECT * FROM siteposts WHERE title LIKE '%$searchquery%' ";
}else{
    echo "Please Enter An Search Term To Continue!";
}

$pq = "SELECT * FROM siteposts WHERE title LIKE '%$searchquery%' ";
$pqresult = mysqli_query($connection, $pq);
$tposts = mysqli_num_rows($pqresult);
$tppage = ceil($tposts / $post_per_page);
if (isset($_GET['q'])) {
        $searchquery = $_GET['q'];
        $postquery = "SELECT * FROM siteposts WHERE title LIKE '%$searchquery%' ORDER BY id DESC LIMIT $result, $post_per_page";
        ?><h2 class="mb-4">Found <?=$tposts?> Results for "<?=$searchquery?>"</h2><?php
      }else{
        // $postquery = "SELECT * FROM `siteposts` ORDER BY ID DESC LIMIT $result, $post_per_page";
      ?>
              <h2 class="mb-4">Latest Posts</h2><?php } ?>
            </div>
          </div>

          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                <?php
// $postquery = "SELECT * FROM `siteposts` ORDER BY ID DESC LIMIT $result, $post_per_page";
$runquery = mysqli_query($connection, $postquery);
while ($posts = $runquery->fetch_assoc())
{

?> 
                    <div class="col-md-6">
                  <a href="blog.php?id=<?=$posts['id'] ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="<?=$posts['fiurl'] ?>" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><?=$posts['author'] ?></span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                      </div>
                      <h2><?=$posts['title'] ?></h2>
                    </div>
                  </a>
                </div>

                    <?php
}
?>
<!--                 <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="images/img_5.jpg" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>How to Find the Video Games of Your Youth</h2>
                    </div>
                  </a>
                </div> -->
<!--                 <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="images/img_6.jpg" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>How to Find the Video Games of Your Youth</h2>
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="images/img_7.jpg" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>How to Find the Video Games of Your Youth</h2>
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="images/img_8.jpg" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>How to Find the Video Games of Your Youth</h2>
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="images/img_9.jpg" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>How to Find the Video Games of Your Youth</h2>
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="images/img_10.jpg" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>How to Find the Video Games of Your Youth</h2>
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="images/img_11.jpg" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>How to Find the Video Games of Your Youth</h2>
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="images/img_12.jpg" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                        <span class="mr-2">March 15, 2018 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>How to Find the Video Games of Your Youth</h2>
                    </div>
                  </a>
                </div> -->
              </div>
              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      <?php
if ($current_page < $tppage)
{
    $switch = "";
}
else
{
    $switch = "hidden";
} ?>
                      <li class="page-item active" <?=$switch ?>><a class="page-link" href="?<?php if (isset($_GET['q'])){echo "q=$searchquery&";}?>page=<?=$current_page - 1 ?>">&lt;</a></li>
                      <?php
for ($tpage = 1;$tpage <= $tppage;$tpage++)
{
?>
                        <li class="page-item"><a class="page-link" href="?<?php if (isset($_GET['q'])){echo "q=$searchquery&";}?>page=<?=$tpage
?>"><?=$tpage
?></a></li>
                     <?php
} ?>
                     <?php
if ($current_page <= $tppage)
{
    $nswitch = "";
}
else
{
    $nswitch = "hidden";
}
// echo $current_page;
// echo $tpage;
// echo $tppage;
?>
                      <li class="page-item" <?=$nswitch ?>><a class="page-link" href="?<?php if (isset($_GET['q'])){echo "q=$searchquery&";}?>page=<?=$current_page + 1 ?>">&gt;</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
            <!-- END main-content -->
              <?php include_once ("ct-includes/ct-sidebar.php"); ?>
          </div>
        </div>
      </section>
    </div>
            <?php include_once ("ct-includes/ct-footer.php"); ?>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    
    <script src="js/main.js"></script>
  </body>
</html>
