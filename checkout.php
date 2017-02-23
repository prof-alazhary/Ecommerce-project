<?php
include_once 'header.php';
 ?>
<?php
require_once 'DBClasses/autoload.php';
if(isset($_SESSION['loggeduser']))
{
    // $total_quant=$_SESSION['total_quant'];
    // if ($total_quant==NULL) {
    //   $total_quant=0;
    // }
    // echo "<script type='text/javascript'>alert(".$total_quant.")</script>";
}
else
{
    header('Location: user/login.php?error=your are not logged in');
}

 ?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Checkout</h1>
		<em></em>
		<h2><a href="index.php">Home</a><label>/</label>Checkout</h2>
	</div>
</div>
<!--login-->
<div class="check-out">
<div class="container">
<script type="text/javascript">
  jQuery(function () {
    jQuery('#mytable').css({
        display : 'block'
    });
  })
</script>
	<div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="table-responsive">
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
          $arr=$shop_cart->SelectShopCartByUserId($user->user_id,0);
          if($arr[0]!=NULL)
          {
          for ($i=0; $i<count($arr); $i++)
          {
            echo "<tr id='".($arr[$i])->product_id."' user='".$user->user_id."' class='cart-header'>
            <td class='ring-in'><a href='single.php".($arr[$i])->product_id."' class='at-in'><img src='images/ch.jpg' class='img-responsive' alt=''></a>
              <div class='sed'>
                <h5><a href='single.php?".($arr[$i])->product_id."'>".($arr[$i])->product_name."</a></h5>
                <p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
              </div>
              <div class='clearfix'> </div>
              <div class='close1'> </div></td>
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
	<div class="produced">
	<a href="single.php" id="Produced_To_Buy" class="hvr-skew-backward">Produced To Buy</a>
	 </div>
</div>
</div>

<!--//login-->
<!--brand-->
		<div class="container">
			<div class="brand">
				<div class="col-md-3 brand-grid">
					<img src="images/ic.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic1.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic2.png" class="img-responsive" alt="">
				</div>
				<div class="col-md-3 brand-grid">
					<img src="images/ic3.png" class="img-responsive" alt="">
				</div>
				<div class="clearfix"></div>
			</div>
			</div>
			<!--//brand-->
	<!--//content-->
	<!--//footer-->
	<div class="footer">
	<div class="footer-middle">
				<div class="container">
					<div class="col-md-3 footer-middle-in">
						<a href="index.php"><img src="images/log.png" alt=""></a>
						<p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
					</div>

					<div class="col-md-3 footer-middle-in">
						<h6>Information</h6>
						<ul class=" in">
							<li><a href="404.php">About</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="contact.php">Site Map</a></li>
						</ul>
						<ul class="in in1">
							<li><a href="#">Order History</a></li>
							<li><a href="wishlist.php">Wish List</a></li>
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
			<div class="footer-bottom">
				<div class="container">
					<ul class="footer-bottom-top">
						<li><a href="#"><img src="images/f1.png" class="img-responsive" alt=""></a></li>
						<li><a href="#"><img src="images/f2.png" class="img-responsive" alt=""></a></li>
						<li><a href="#"><img src="images/f3.png" class="img-responsive" alt=""></a></li>
					</ul>
					<p class="footer-class">&copy; 2016 Shopin. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--//footer-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<script src="js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
