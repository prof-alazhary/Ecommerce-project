<?php
require_once '../DBClasses/autoload.php';
session_start();
$categories = CategoryClass::getAllCategories();
$products = ProductClass::getAllProducts();
if(isset($_SESSION['loggeduser']))
{
    $user = $_SESSION['loggeduser'];

}else
{
  header('Location: login.php?error=your are not logged in');

}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <title></title>
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
 											<li><a href="../product.php?"><?= $product->product_name ?></a></li>
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
 	<!--banner--->
 <div class="banner-top">
 	<div class="container">
 		<h1><?=$user->user_name?></h1>
 		<em></em>
 		<h2><a href="../index.php">Home</a><label>/</label><?="Welcom ".$user->user_name?></h2>
 	</div>
 </div>
    <div class="container" style="margin-top:5%;">
      <!-- <div class="featured-blocks"> -->
    <div class="col-xs-offset-3 col-xs-12">
    	<div class="row-fluid">
            <div class="col-md-3" >
    		          <img style="border-radius:20px;" src="" >
            </div>
            <div class="col-md-6">
                <h4 style="font-size:30px"><?=$user->first_name." ".$user->last_name?></h4>
                <h6 style="font-size:20px"><?=$user->email?></h6>
                <h6 style="font-size:2px"><?=$user->birth_of_date?></h6>
                <h6 style="font-size:20px"><?=$user->job?></h6>
                <h6 style="font-size:20px"><?=$user->gender?></h6>
          </div>
        </div>
          <div class="row-fluid">
          <div class="form-group" >
            <div class="col-xs-offset-2 col-xs-8" style="margin-top:5%">
              <a href="profile_update.php"><button class="btn btn-1 btn-primary">UPDATE your Profile</button></a>
              <button id="btnHist" class="btn btn-1 btn-primary">History of Orders</button></a>
            </div>

          </div>
      </div>
      <table id="mytable" class="table-heading simpleCart_shelfItem">
      <tbody>
		  <tr>
			<th>Item</th>
			<th>Price</th>
			<th >Quantity </th>
			<th>Total Price</th>
		  </tr>
        <?php
          $shop_cart=new ShopCart();
          $arr=$shop_cart->SelectShopCartByUserId($user->user_id,1);
          if($arr[0]!=NULL)
          {
            for ($i=0; $i<count($arr); $i++)
            {
              echo "<tr id='".($arr[$i])->product_id."' class='cart-header'>
              <td class='ring-in'><a href='single.php".($arr[$i])->product_id."' class='at-in'><img src='../images/ch.jpg' class='img-responsive' alt=''></a>
          			<div class='sed'>
          				<h5><a href='single.php?".($arr[$i])->product_id."'>".($arr[$i])->product_name."</a></h5>
          				<p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
          			</div>
          			<div class='clearfix'> </div>
                <td>".($arr[$i])->product_price."</td>
                <td>".($arr[$i])->quantity."</td>
                <td>".(($arr[$i])->quantity)*(($arr[$i])->product_price)."</td>
                                                      </tr>";
            }
          }
         ?>
       </tbody>
	</table>
    </div>
  </div>
  <div style="margin-bottom:15%"></div>
  <!--//footer-->
<div class="footer">
<div class="footer-middle">
      <div class="container">
        <div class="col-md-3 footer-middle-in">
          <a href="../index.php"><img src="../images/log.png" alt=""></a>
          <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
        </div>

        <div class="col-md-3 footer-middle-in">
          <h6>Information</h6>
          <ul class=" in">
            <li><a href="../404.php">About</a></li>
            <li><a href="../contact.php">Contact Us</a></li>
            <li><a href="#">Returns</a></li>
            <li><a href="../contact.php">Site Map</a></li>
          </ul>
          <ul class="in in1">
            <li><a href="#">Order History</a></li>
            <li><a href="../wishlist.php">Wish List</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-3 footer-middle-in">
          <h6>Tags</h6>
          <ul class="tag-in">
            <li><a href="#">Lorem</a></li>
            <li><a href="#">Sed</a></li>
            <li><a href="#">Ipsum</a></li>
            <li><a href="#">Contrary</a></li>
            <li><a href="#">Chunk</a></li>
            <li><a href="#">Amet</a></li>
            <li><a href="#">Omnis</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-middle-in">
          <h6>Newsletter</h6>
          <span>Sign up for News Letter</span>
            <form>
              <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
              <input type="submit" value="Subscribe">
            </form>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <!--//footer-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="../js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
