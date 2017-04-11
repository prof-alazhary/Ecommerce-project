<?php
    require_once 'nav.php';
    require_once '../DBClasses/autoload.php';

     $categories = CategoryClass::getAllCategories();
     $products = ProductClass::getAllProducts();

     $cat_id = $_GET['cat_id'];

    if(isset($_POST['submit'])){
    	$product_name = $_POST['product_name'];
		$img_path = $_POST['img_path'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$superCat = $_POST['superCat'];

		if(!empty($_POST['product_name'])&&
	   !empty($_POST['img_path'])&&
	   !empty($_POST['description'])&&
	   !empty($_POST['description'])&&
	   !empty($_POST['superCat'])){
			$productObj = new ProductClass();
			$productObj->product_name=$product_name;
			$productObj->img_path=$img_path;
			$productObj->description=$description;
			$productObj->price = $price;
			$productObj->cat_id = $superCat;
			if($productObj->insert()){
				header('Location: managecategory.php');
			}
		}
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Insert Product</title>
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
        <h1 class="entry-title"><span>Insert Product</span> </h1>
        <hr>
					<form  class="form-horizontal" method="post" action="insertProd.php?cat_id=<?= $cat_id ?>">
            <div class="form-group">
                   			<label for="product_name" class="control-label col-sm-3">Product Name </label>
                   			<div class="col-md-6 col-sm-9">
                        		<div class="input-group">
                          		<input type="text" class="form-control" name="product_name" />
                              <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                            </div>
                   			</div>
               			</div>

               			<div class="form-group">
                   			<label for="img_path" class="control-label col-sm-3"> upload Image </label>
                   			<div class="col-md-6 col-sm-9">
                        		<div class="input-group">
                          		<input type="text" class="form-control" name="img_path" />
                              <span class="input-group-addon"><i class="glyphicon glyphicon-upload"></i></span>
                        		</div>
                   			</div>
               			</div>

               			<div class="form-group">
                   			<label for="description" class="control-label col-sm-3">Description </label>
                   			<div class="col-md-6 col-sm-9">
                              <textarea class="form-control" rows="5" name="description" id="comment"></textarea>
                   			</div>
               			</div>

               			<div class="form-group">
                   			<label for="price" class="control-label col-sm-3">Price </label>
                   			<div class="col-md-6 col-sm-9">
                        		<div class="input-group">
                          		<input type="text" class="form-control" name="price"/>
                              <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                        		</div>
                   			</div>
               			</div>
                    <div class="form-group">
                      <label for="superCat" class="control-label col-sm-3">category </label>

                      <div class="col-md-6 col-sm-9">
                        <select name="superCat" class="form-control">
    								<?php
    									foreach ($categories as $category) {
    										if($category->parent == $cat_id){
    											?>
    											<option value="<?= $category->cat_id ?>"><?= $category->cat_name ?></option>
    											<?php
    										}
    									}
    								?>
    							</select>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-xs-offset-4 col-xs-12">
                      <input name="submit" type="submit" value="Add" class="btn btn-primary">
                  </div>
                </div>
												</form>
		</div>
	</div>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
