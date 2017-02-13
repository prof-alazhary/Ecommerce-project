<?php
    require_once 'database/CategoryClass.php'; 
    $categories = CategoryClass::getAllCategories();

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
       
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/custom-styles.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/font-awesome-ie7.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style type="text/css">
            .span9{
                -webkit-column-count:3;
            }
            .row-fluid1{
                width: 250px;
            }
            .user-info{
                height: 600px;
            }
            
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
            <div class="header-wrapper">
                <div class="site-header">
                    <div class="container">
                        <div class="site-name">
                            <h1>E-commerce site</h1>
                        </div>
                    </div>
                    <div class="container">
                        <div class="menu">
                            <div class="navbar">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <i class="fw-icon-th-list"></i>
                                </a>
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li class="active"><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Login</a></li>
                                    </ul>
                                </div><!--/.nav-collapse -->
                            </div>
                            <div class="mini-menu">
            <label>
          <select class="selectnav">
            <option value="#" selected="">Home</option>
            <option value="#">About</option>
            <option value="#">→ Another action</option>
            <option value="#">→ Something else here</option>
            <option value="#">→ Another action</option>
            <option value="#">→ Something else here</option>
            <option value="#">Services</option>
            <option value="#">Work</option>
            <option value="#">Contact</option>
          </select>
          </label>
          </div>
                        </div>
                    </div>
                    
                </div>
                <div class="container">
                <div class="banner">
                    <div class="carousel slide" id="myCarousel">
                                    <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="item">
                                <img src="img/1.jpeg" alt="">
                                <div class="carousel-caption">
                                    <h1>E-commerce</h1>
                                    <h2>Online Shopping </h2>
                                  <a href="#" class="btn">go</a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="img/1.jpeg" alt="">
                                <div class="carousel-caption">
                                  <h1>E-commerce</h1>
                                    <h2>Online Shopping </h2>
                                  <a href="#" class="btn">go</a>
                                </div>
                            </div>
                            <div class="item active">
                                <img src="img/1.jpeg" alt="">
                                <div class="carousel-caption">
                                  <h1>E-commerce</h1>
                                    <h2>Online Shopping </h2>
                                  <a href="#" class="btn">go</a>
                                </div>
                            </div>
                        </div>
                        <a data-slide="prev" href="#myCarousel" class="carousel-control left"><i class="fw-icon-chevron-left"></i></a>
                        <a data-slide="next" href="#myCarousel" class="carousel-control right"><i class="fw-icon-chevron-right"></i></a>
                    </div>
                </div>
                </div>
            </div>
            <div class="container">
                <div class="featured-blocks">
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="block v-divider border">
                                <i class="fw-icon-headphones"></i>
                                <h1>online shopping</h1>
                                <p class="last">easy to find what you want</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block v-divider border">
                                <i class="fw-icon-refresh"></i>
                                <h1>High quality</h1>
                                <p class="last">Add products to your store</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block v-divider border">
                                <i class="fw-icon-time"></i>
                                <h1>Trusted website</h1>
                                <p class="last">accept orders</p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="block no-border">
                                <i class="fw-icon-comments-alt"></i>
                                <h1>Trusted website</h1>
                                <p class="last">manage website content</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                    <div class="row-fluid">
                        <div class="span9">
                            <div class="row-fluid">
                                <div class="span4">
                                    <?php 
                                        foreach ($categories as $category) {
                                    ?>
                                            <div class="row-fluid1">
                                                <div class="span12">
                                                    <div class="general-posts">

                                                     <div class="user-info">
                                                            <h1><?= $category->cat_name ?></h1>
                                                            <img src="<?= $category->img_path ?>" alt="" class="image-spacing">
                                                            <p class="no-space"><?= $category->description ?> </p>
                                                        </div>
                                                        <div class="read-more">
                                                            <a href="#">read more <i class="fw-icon-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>      
                                    <?php
                                        }
                                    ?>
                                    <!--<div class="row-fluid">
                                        <div class="span12">
                                            <div class="general-posts">

                                                <div class="user-info">
                                                    <h1>Praesent dapibus lipsumneque id cursus faucio doloribus tortor neque tiinousegetas augue</h1>
                                                    <img src="img/img1.png" alt="" class="image-spacing">
                                                    <p class="no-space">Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate. </p>
                                                 </div>
                                                 <div class="read-more">
                                                    <a href="#">read more <i class="fw-icon-arrow-right"></i></a>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="general-posts">
                                                <div class="user-info">
                                                    <h1>cursus faucio</h1>
                                                    <img src="img/img2.png" alt="" class="image-spacing">
                                                    <p class="last">Phasellus ultrices nulla </p>
                                                </div>
                                                <div class="read-more">
                                                    <a href="#">read more <i class="fw-icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="general-posts">
                                                <div class="user-info">
                                                    <h1>Integer vitae libero ac risus egestas risus egestas placerat</h1>
                                                    <img src="img/img3.png" alt="" class="image-spacing">
                                                    <p class="last">Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel ipsum dolor.</p>
                                                </div>
                                                <div class="read-more">
                                                    <a href="#">read more <i class="fw-icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="general-posts">
                                                <div class="user-info">
                                                    <h1>Aliquam tincidunt mauris eu risus  mauris eu risus</h1>
                                                    <p class="last">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat onec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>
                                                </div>
                                                <div class="read-more">
                                                    <a href="#">read more <i class="fw-icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="general-posts">
                                                <div class="user-info">
                                                    <h1>Integer vitae libero risus egestas placerat risus </h1>
                                                    <img src="img/img4.png" alt="" class="image-spacing">
                                                    <p class="last">Sed adipiscing ornare risus. Morbi est est, blandit sit amet</p>
                                                </div>
                                                <div class="read-more">
                                                    <a href="#">read more <i class="fw-icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="general-posts">
                                                <div class="user-info">
                                                    <h1>Integer vitae libero ac risus egestas modo felis quis</h1>
                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <img src="img/img5.png" alt="" class="image-spacing">
                                                        </div>
                                                        <div class="span6">
                                                            <img src="img/img6.png" alt="" class="image-spacing">
                                                        </div>
                                                    </div>
                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                            <img src="img/img7.png" alt="" class="image-spacing">
                                                        </div>
                                                        <div class="span6">
                                                            <img src="img/img8.png" alt="" class="image-spacing">
                                                        </div>
                                                    </div>
                                                    <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet,</p>
                                                    <p class="last">Pulvinar risus, vitae facilis onec nec justo eget felis facilisis fermentum.</p>
                                                </div>
                                                <div class="read-more">
                                                    <a href="#">read more <i class="fw-icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="general-posts">
                                                <div class="user-info">
                                                    <h1>Lorem ipsum dolor</h1>
                                                    <img src="img/img9.png" alt="" class="image-spacing">
                                                    <p class="last">Pellentesque odio nisi, euismod in, pharetra a, ultricies in.</p>
                                                </div>
                                                <div class="read-more">
                                                    <a href="#">read more <i class="fw-icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>    
                        </div>
                        

                        <div class="span3">
                            <div class="sidebar">
                                <h1>search</h1>
                                <div class="input-append">
  <input class="span12" id="appendedInput" type="text">
  <span class="add-on"><i class="fw-icon-search"></i></span>
</div>
                                
                                
                            </div>
                            <div class="sidebar">
                                <h1>lorem ipsum</h1>
                                <ul>
                                    <li><a href="#">Aliquam tincidunt mauris viv</a></li>
                                    <li><a href="#">Vestibulum auctor dapibus</a></li>
                                    <li><a href="#">Nunc dignissim risus idot</a></li>
                                    <li><a href="#">Cras ornare tristique elinit</a></li>
                                    <li><a href="#">Vivamus vestibulum nulla nec</a></li>
                                    <li class="no-border"><a href="#">Praesent placerat risus quis</a></li>
                                </ul>
                            </div>
                            <div class="sidebar no-space">
                                <h1>Maoreet facilis</h1>
                                <div class="sidebar-posts">
                                    <i class="fw-icon-bell-alt"></i>
                                    <h1>Vivamus </h1>
                                    <p>Nulla nec praesent placerat risus..</p>
                                </div>
                                <div class="sidebar-posts">
                                    <i class="fw-icon-beer"></i>
                                    <h1>John</h1>
                                    <p>Nulla nec praesent placerat risus..</p>
                                </div>
                                <div class="sidebar-posts no-border">
                                    <i class="fw-icon-quote-right"></i>
                                    <h1>Amenda</h1>
                                    <p>Nulla nec praesent placerat risus..</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="footer-wrapper">
                <div class="container">
                    <div class="footer-links">
                        <div class="row-fluid">
                            <div class="span3">
                                <div class="copy-rights">
                                    <span>Copyright (c) 2013</span><br>All rights reserved. 
                               </div>
                            </div>
                            <div class="span3">
                                <div class="copy-rights">
                                    <span>Designed by: </span><br><a href="http://www.alltemplateneeds.com">www.alltemplateneeds.com </a>
                               </div>
                            </div>
                            <div class="span3">
                                <div class="copy-rights">
                                    <span>Images From:  </span><br>
                                    <a href="http://www.wallcoo.net">wallcoo.net </a>| <a href="http://www.wallpaperswide.com">wallpaperswide.com</a> 
                               </div>
                            </div>
                            <div class="span3">
                                <div class="copy-rights">
                                    <span>Contact  </span><br>
                                    <a href="#">info@companyname.com</a> 
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer">
                        <div class="row-fluid">
                        <div class="social span3">
                            <ul>
                                <li><a href="#"><i class="fw-icon-facebook-sign"></i></a></li>
                                <li><a href="#"><i class="fw-icon-twitter-sign"></i></a></li>
                                <li><a href="#"><i class="fw-icon-linkedin-sign"></i></a></li>
                                <li><a href="#"><i class="fw-icon-pinterest-sign"></i></a></li>
                                <li><a href="#"><i class="fw-icon-phone-sign"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer-menu span9">
                            <ul>
                                <li><a href="#">Home :: </a></li>
                                <li><a href="#"> About :: </a></li>
                                <li><a href="#"> Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

       <script src="js/jquery-1.9.1.js"></script> 
<script src="js/bootstrap.js"></script>
<script>
$('#myCarousel').carousel({
    interval: 1800
});
</script>
    </body>
</html>
