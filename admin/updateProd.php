<?php
require_once 'nav.php';
require_once '../DBClasses/autoload.php';

     $categories = CategoryClass::getAllCategories();
     $products = ProductClass::getAllProducts();

     $product_id = $_GET['product_id'];
     $prod_data = ProductClass::getById($product_id);

    if(isset($_POST['submit'])){
    	$product_name = $_POST['product_name'];
		$img_path = $_POST['img_path'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];

		if(!empty($_POST['product_name'])&&
	   	!empty($_POST['description'])&&
	   	!empty($_POST['price'])&&
	   	!empty($_POST['quantity'])){
			$prod_data->product_name=$product_name;
			$prod_data->img_path=$img_path;
			$prod_data->description=$description;
			$prod_data->price=$price;
			$prod_data->quantity=$quantity;
			if($prod_data->update()){
				header('Location: manageProd.php');
			}
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Update Category</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style4.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/af_style.css" rel="stylesheet" type="text/css" media="all" />
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
</head>
<body>
<div class="container" style="margin-top:40px;">
  <div class="row">
    <section>
      <h1 class="entry-title"><span>Update Product</span> </h1>
      <hr>
					<form class="form-horizontal" method="post" action="updateProd.php?product_id=<?= $product_id ?>"  >
						<div class="form-group">
                 			<label for="product_name" class="control-label col-sm-3">Product Name </label>
                 			<div class="col-md-6 col-sm-9">
                      		<div class="input-group">
                        		<input type="text" class="form-control" name="product_name" value="<?=$prod_data->product_name?>" />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                          </div>
                 			</div>
             			</div>

             			<div class="form-group">
                 			<label for="img_path" class="control-label col-sm-3"> upload Image </label>
                 			<div class="col-md-6 col-sm-9">
                      		<div class="input-group">
                        		<input type="text" class="form-control" name="img_path" value="<?=$prod_data->img_path?>"/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-upload"></i></span>
                      		</div>
                 			</div>
             			</div>

             			<div class="form-group">
                 			<label for="description" class="control-label col-sm-3">Description </label>
                 			<div class="col-md-6 col-sm-9">
                            <textarea class="form-control" rows="5" name="description" id="comment"><?=$prod_data->description?></textarea>
                 			</div>
             			</div>

             			<div class="form-group">
                 			<label for="price" class="control-label col-sm-3">Price </label>
                 			<div class="col-md-6 col-sm-9">
                      		<div class="input-group">
                        		<input type="text" class="form-control" name="price" value="<?=$prod_data->price ?>"/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                      		</div>
                 			</div>
             			</div>

             			<div class="form-group">
                 			<label for="quantity" class="control-label col-sm-3">Quantity </label>
                 			<div class="col-md-6 col-sm-9">
                      		<div class="input-group">
                        		<input type="text" class="form-control" name="quantity" value="<?=$prod_data->quantity?>"/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                      		</div>
                 			</div>
             			</div>

             			<div class="form-group">
               				<div class="col-xs-offset-6 col-xs-12">
                  				<input name="submit" type="submit" value="update" class="btn btn-primary">
                			</div>
              			</div>

					</form>
				</div>
			</div>
      <script src="../js/bootstrap.min.js"></script>
      </body>
      </html>
