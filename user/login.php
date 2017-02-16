<?php
 require_once '../DBClasses/CategoryClass.php';
 require_once '../DBClasses/ProductClass.php';
 $categories = CategoryClass::getAllCategories();
 $products = ProductClass::getAllProducts();
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
  				<a href="index.php"><img src="../images/logo.png" alt=""></a>
  			</div>
  		</div>
  	</div>
  	<div class="header-top">
  		<div class="container">
  		<div class="col-sm-5 col-md-offset-2  header-login">
  					<ul >
  						<li><a href="login.php">Login</a></li>
  						<li><a href="register.php">Register</a></li>
  						<li><a href="checkout.html">Checkout</a></li>
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
              <li><a class="color" href="index.php">Home</a></li>

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
  											<li><a href="product.php"><?= $product->product_name ?></a></li>
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
  											<li><a href="product.php"><?= $product->product_name ?></a></li>
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

  			<li><a class="color4" href="404.html">About</a></li>
  						<li><a class="color5" href="typo.html">Short Codes</a></li>
  						<li ><a class="color6" href="contact.html">Contact</a></li>

          </ul>
       </div><!-- /.navbar-collapse -->

  </nav>
  			</div>
  			<div class="col-sm-2 search-right">
  				<ul class="heart">
  				<li>
  				<a href="wishlist.html" >
  				<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
  				</a></li>
  				<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
  					</ul>
  					<div class="cart box_1">
  						<a href="checkout.html">
  						<h3> <div class="total">
  							<span class="simpleCart_total"></span></div>
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
 <!--banner-->
 <div class="banner-top">
 	<div class="container">
 		<h1>Login</h1>
 		<em></em>
 		<h2><a href="index.php">Home</a><label>/</label>Login</h2>
 	</div>
 </div>
<!--login-->
<div class="container">
  <div class="row-fluid">
    <div class="span9" style="margin-top:20px;">
      <div id="content">
        <div class="modal-dialog">
          <div class="loginmodal-container">
              <form role="form" action="loginprocess.php" method="post">
                <input type="text" class="form-control" id="name" name="user_name" placeholder="Username">
                <input type="password" class="form-control" id="pwd" name="pass" placeholder="Password">
                <input type="submit" id="login" name="login" class="login loginmodal-submit" value="Login">
              </form>
              <div class="login-help">
               New here? <a href="register.php"> Create an account</a> <br><a href="#" id = "forgetpass">Forgot Password</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--//login-->
		<!--content-->
		<!--//footer-->
	<div class="footer">
	<div class="footer-middle">
				<div class="container">
					<div class="col-md-3 footer-middle-in">
						<a href="index.html"><img src="../images/log.png" alt=""></a>
						<p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
					</div>

					<div class="col-md-3 footer-middle-in">
						<h6>Information</h6>
						<ul class=" in">
							<li><a href="404.html">About</a></li>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="contact.html">Site Map</a></li>
						</ul>
						<ul class="in in1">
							<li><a href="#">Order History</a></li>
							<li><a href="wishlist.html">Wish List</a></li>
							<li><a href="login.html">Login</a></li>
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
