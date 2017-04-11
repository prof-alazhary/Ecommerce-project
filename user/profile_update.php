<?php
require_once '../DBClasses/autoload.php';
session_start();
$categories = CategoryClass::getAllCategories();
$products = ProductClass::getAllProducts();
if(isset($_SESSION['loggeduser']))
{
    $user = $_SESSION['loggeduser'];
    // var_dump($user);
}
else
{
    header('Location: login.php?error=your are not logged in');
}
if(isset($_POST['submit'])){
  //  var_dump($_POST);
  user::update($_POST,$user->user_id);

}
?>
<!DOCTYPE html>
<html>
<head>
<title><?=$user->user_name?></title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--theme-style-->
<link href="../css/style4.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/af_style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<script src="../js/jquery.min.js"></script>
<!--- start-rate---->
<script src="../js/jstarbox.js"></script>
<script src="../js/myScript.js"></script>
 <link rel="stylesheet" href="../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
   <script type="text/javascript">
     jQuery(function() {
     jQuery('.starbox').each(function() {
       var starbox = jQuery(this);
         starbox.starbox({
         average: starbox.attr('data-start-value'),
         changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
         ghosting: starbox.hasClass('ghosting'),
         autoUpdateAverage: starbox.hasClass('autoupdate'),
         buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
         stars: starbox.attr('data-star-count') || 5
         }).bind('starbox-value-changed', function(event, value) {
         if(starbox.hasClass('random')) {
         var val = Math.random();
         starbox.next().text(' '+val);
         return val;
         }
       })
     });
   });
   </script>
<!---//End-rate---->
</head>
<body>
  <?php
      if(isset($_GET['error']))
      {
        echo "<p class='error'>".$_GET['error']."</p>";
      }
  ?>
<!--header-->
<div class="header">
<div class="container">
   <div class="head">
     <div class=" logo">
       <a href="../index.php"><img src="../images/logo.png" alt=""></a>
     </div>
   </div>
 </div>
 <div class="header-top">
   <div class="container">
   <div class="col-sm-5 col-md-offset-2  header-login">
         <ul >
           <?php

           if(isset($_SESSION['loggeduser']))
           {

            echo "<li><i class='glyphicon glyphicon-user' style='color:#c0c0c0'></i><a href='#'>".$user->user_name."</a></li>";
            echo "<li><a href='logout.php'>Logout</a></li>";
          }else {
            echo "<li><a href='user/login.php'>Login</a></li>";
            echo "<li><a href='user/register.php'>Register</a></li>";
          }
           ?>
           <li><a href="../checkout.php">Checkout</a></li>
         </ul>
       </div>

     <div class="col-sm-5 header-social">
         <ul >
           <li><a href="#"><i></i></a></li>
           <li><a href="#"><i class="ic1"></i></a></li>
           <li><a href="#"><i class="ic2"></i></a></li>
           <li><a href="#"><i class="ic3"></i></a></li>
           <li><a href="#"><i class="ic4"></i></a></li>
         </ul>

     </div>
       <div class="clearfix"> </div>
   </div>
   </div>

   <div class="container">
     <div class="head-top">
    <div class="col-sm-8 col-md-offset-2 h_menu4">
       <nav class="navbar nav_bottom" role="navigation">

 <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header nav_2">
      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

   </div>
   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
        <ul class="nav navbar-nav nav_1">
            <li><a class="color" href="../index.php">Home</a></li>

           <?php
           foreach ($categories as $category) {
           ?>
           <li class="dropdown mega-dropdown active">
             <?php
             if($category->parent===null){
             ?>
         <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $category->cat_name ?><span class="caret"></span></a>
         <?php
         }
         ?>
       <div class="dropdown-menu ">
                   <div class="menu-top">
           <div class="col1">
             <div class="h_nav">
               <?php
               foreach ($categories as $cat) {
                 if ($category->cat_id == $cat->parent) {
                 ?>
               <h4><?= $cat->cat_name ?></h4>
                 <ul>
                   <?php
                   foreach ($products as $product) {
                       if ($cat->cat_id == $product->cat_id) {
                       ?>
                     <li><a href="../product.php"><?= $product->product_name ?></a></li>
                     <?php
                     }
                   }
                   ?>
                 </ul>
                 <h4>Other Products</h4>
                 <?php
                 }
               }
               foreach ($products as $product) {
                 if($category->cat_id == $product->cat_id){
                   ?>
                   <ul>
                     <li><a href="../product.php"><?= $product->product_name ?></a></li>
                   </ul>
                   <?php
                 }
               }
               ?>
             </div>
           </div>

           <div class="col1 col5">
           <img src="../<?= $category->img_path ?>" class="img-responsive" alt="">
           </div>
           <div class="clearfix"></div>
         </div>
       </div>
     </li>
     <?php
           }
           ?>

     <li><a class="color4" href="../404.php">About</a></li>
           <li><a class="color5" href="../typo.php">Short Codes</a></li>
           <li ><a class="color6" href="../contact.php">Contact</a></li>

        </ul>
     </div><!-- /.navbar-collapse -->

</nav>
     </div>
     <div class="col-sm-2 search-right">
       <ul class="heart">
       <li>
       <a href="../wishlist.php" >
       <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
       </a></li>
       <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
         </ul>
         <div class="cart box_1">
           <a href="../checkout.php">
           <h3> <div class="total">
             <span class="ShopCart_total">0</span></div>
             <div class="counter-product" style="float: right;">  <span id="counter-cart" class="badge">0</span> </div>
             <img src="../images/cart.png" alt=""/></h3>
           </a>
           <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

         </div>
         <div class="clearfix"> </div>

           <!----->

           <!---pop-up-box---->
     <link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
     <script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
     <!---//pop-up-box---->
     <div id="small-dialog" class="mfp-hide">
       <div class="search-top">
         <div class="login-search">
           <input type="submit" value="">
           <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
         </div>
         <p>Shopin</p>
       </div>
     </div>
    <script>
     $(document).ready(function() {
     $('.popup-with-zoom-anim').magnificPopup({
     type: 'inline',
     fixedContentPos: false,
     fixedBgPos: true,
     overflowY: 'auto',
     closeBtnInside: true,
     preloader: false,
     midClick: true,
     removalDelay: 300,
     mainClass: 'my-mfp-zoom-in'
     });

     });
   </script>
           <!----->
     </div>
     <div class="clearfix"></div>
   </div>
 </div>
</div>
<div class="banner-top">
 <div class="container">
   <h1><?=$user->user_name?></h1>
   <em></em>
   <h2><a href="../index.php">Home</a><label>/</label><?="Welcom ".$user->user_name?></h2>
 </div>
</div>
  <div class="container">
  	<div class="row">
      <div class="col-md-8">
        <section>
          <hr>
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
             <label for="first_name" class="control-label col-sm-3">First Name <span class="text-danger">*</span></label>
             <div class="col-md-8 col-sm-9">
                  <div class="input-group">
                    <input type="text" class="form-control" name="first_name" id="name" placeholder="First Name" value="<?= $user->first_name?>"/>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  </div>
             </div>
         </div>
         <div class="form-group">
            <label for="last_name" class="control-label col-sm-3">Last Name <span class="text-danger">*</span></label>
            <div class="col-md-8 col-sm-9">
                 <div class="input-group">
                   <input type="text" class="form-control" name="last_name" id="name" placeholder="Last Name"value="<?= $user->last_name?>" />
                   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 </div>
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
              <div class="input-group">
              <input type="email" class="form-control" name="email" id="emailid" placeholder="Enter your Email" value="<?= $user->email?>">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            </div>
        </div>
      </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Set Password <span class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-8">
              <div class="input-group">
                <input type="password" class="form-control" name="pass" id="password" placeholder="Choose password (5-15 chars)" >
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">User Name <span class="text-danger">*</span></label>
            <div class="col-md-8 col-sm-9">
              <div class="input-group">
                <input type="text" class="form-control" name="user_name" id="name" placeholder="User Name" value="<?= $user->user_name?>"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Date of Birth <span class="text-danger">*</span></label>
            <div class="col-md-8 col-sm-9">
              <div class="input-group">
                <input type="date" class="form-control" name="birth_date"  placeholder="Enter your Birth Date" value="<?= $user->birth_of_date?>">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Gender <span class="text-danger">*</span></label>
            <div class="col-md-8 col-sm-9">
              <label>
              <input name="gender" type="radio" value="Male" <?php if($user->gender == "Male") echo 'checked="checked"';?>>Male </label>
                 
              <label>
              <input name="gender" type="radio" value="Female" <?php if($user->gender == "Female") echo 'checked="checked"';?>>Female </label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Job <span class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-8">
            	<div class="input-group">
              <input type="text" class="form-control" name="job" id="contactnum" placeholder="Enter your job" value="<?= $user->job?>">
              <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Limit Credit <span class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-8">
            	<div class="input-group">
              <input type="text" class="form-control" name="limitcredit" id="contactnum" placeholder="Enter your limit credit" value="<?= $user->limitcredit?>">
              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Profile Photo <br>
            <small>(optional)</small></label>
            <div class="col-md-5 col-sm-8">
              <!-- <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span> -->
                <input type="file" name="file_nm" id="file_nm" >
                <!-- <class="form-control upload" aria-describedby="file_upload"> -->
              <!-- </div> -->
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-offset-6 col-xs-12">
              <input type="submit" name="submit" value="update" class="btn btn-primary">
            </div>
            <!-- //var_dump($user);//$user->update($_POST) -->
          </div>
        </form>
      </div>
  </div>
  </div>
</body>
</html>
