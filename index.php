<?php require ("ct-includes/functions.php");?>
<?php require ("ct-config.php"); ?>
<?php include_once ("ct-includes/ct-sitedata.php"); ?>
<?php include_once ("ct-includes/ct-plugins.php"); ?>
              <?php
if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}
$getpost_per_page = 12;
$result = ($page - 1) * $getpost_per_page;
?>
  <body>
    <?php include_once ("ct-includes/ct-header.php"); ?>
    <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel owl-theme home-slider">
                <?php
                  $getpost_per_slide = 3;
                  $getslidequery = "SELECT * FROM `siteposts` ORDER BY ID DESC LIMIT $result, $getpost_per_slide";
                  $slidequery = mysqli_query($connection, $getslidequery);
                  while ($getpostforslide = $slidequery->fetch_assoc())
                  {$date = $getpostforslide['date'];

                  ?>  
                <div>
                  <a href="blog.php?id=<?=$getpost['id'] ?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?=$getpostforslide['fiurl'] ?>'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5"><?=fetchCategory($connection, $getpostforslide['category_id'])?></span>
                      <div class="post-meta">
                        
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"><?=" By " . $firstname?></span>&bullet;
                        <span class="mr-2"><?php echo date('d M, y',strtotime($date)); ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        
                      </div>
                      <h3><?=$getpostforslide['title']?></h3>
                      <p style="overflow: hidden;white-space: nowrap; text-overflow: ellipsis;"><?=$getpostforslide['content']?></p>
                    </div>
                  </a>
                </div><?php } ?>
              </div>
              
            </div>
          </div>
          
        </div>
      </section>
      <!-- END section -->
      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>

          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                <?php
$getpostquery = "SELECT * FROM `siteposts` ORDER BY ID DESC LIMIT $result, $getpost_per_page";
$runquery = mysqli_query($connection, $getpostquery);
while ($getpost = $runquery->fetch_assoc())
{$date = $getpost['date'];

?> 
                    <div class="col-md-6">
                  <a href="blog.php?id=<?=$getpost['id'] ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="<?=$getpost['fiurl'] ?>" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><?="By " . $firstname?></span>&bullet;
                        <span class="mr-2"><?php echo date('d M, y',strtotime($date)); ?></span>
                      </div>
                      <h2><?=$getpost['title'] ?></h2>
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
              <?php
$pq = "SELECT * FROM siteposts";
$pqresult = mysqli_query($connection, $pq);
$tposts = mysqli_num_rows($pqresult);
$tppage = ceil($tposts / $getpost_per_page);

?>
              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      <?php
if ($page > 1)
{
    $switch = "";
}
else
{
    $switch = "hidden";
} ?>
                      <li class="page-item active" <?=$switch ?>><a class="page-link" href="?page=<?=$page - 1 ?>">&lt;</a></li>
                      <?php
for ($tpage = 1;$tpage <= $tppage;$tpage++)
{
?>
                        <li class="page-item"><a class="page-link" href="?page=<?=$tpage
?>"><?=$tpage
?></a></li>
                     <?php
} ?>
                     <?php
if ($page <= $tppage)
{
    $nswitch = "";
}
else
{
    $nswitch = "hidden";
}
?>
                      <li class="page-item" <?=$nswitch ?>><a class="page-link" href="?page=<?=$page + 1 ?>">&gt;</a></li>
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
