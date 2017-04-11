<?php
session_start();
require_once 'nav.php';
if(isset($_SESSION['loggeduser']))
{
    $user = $_SESSION['loggeduser'];
}
else
{
    header('Location: ../user/login.php?error=your are not logged in');
}
require_once '../DBClasses/autoload.php';

   $categories = CategoryClass::getAllCategories();
     $products = ProductClass::getAllProducts();

     if(isset($_POST['submit'])){

    	$cat_name = $_POST['cat_name'];
		$img_path = $_POST['img_path'];
		$img_cat = $_POST['img_cat'];
		$description = $_POST['description'];

		if(!empty($_POST['cat_name'])&&
   		!empty($_POST['img_path'])&&
   		!empty($_POST['img_cat'])&&
   		!empty($_POST['description'])){
			$cat1 = new CategoryClass();
			$cat1->cat_name=$cat_name;
			$cat1->img_path=$img_path;
			$cat1->img_cat=$img_cat;
			$cat1->description = $description;
			if($cat1->insert()){
				header('Location: managecategory.php');
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Insert Category</title>
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
<div class="container">
<div class="col-md-9">
	<div class="mid-popular" id="product">
    <section>

      <h1 class="entry-title"><span>Insert Category</span> </h1>
      <hr>
		<form class="form-horizontal" method="post" action="insertCat.php"  >
			<div class="form-group">
           			<label for="cat_name" class="control-label col-sm-3">Category Name</label>
           			<div class="col-md-8 col-sm-9">
                		<div class="input-group">
                 			<span class="input-group-addon"><i class="glyphicon glyphicon-Plus"></i></span>
                  		<input type="text" class="form-control" name="cat_name" placeholder="category name" />
                		</div>
           			</div>
       			</div>

       			<div class="form-group">
       				<label class="control-label col-sm-3" for="img_path">Category Photo <br>
        				<small>(optional)</small></label>
        				<div class="col-md-8 col-sm-8">
          			<div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
            				<input type="file" name="img_path" id="file_nm" class="form-control upload" aria-describedby="file_upload">
         				 </div>
        				</div>
      			</div>

       			<div class="form-group">
       				<label class="control-label col-sm-3" for="img_cat">Description Photo <br>
        				<small>(optional)</small></label>
        				<div class="col-md-8 col-sm-8">
          			<div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
            				<input type="file" name="img_cat" id="file_nm" class="form-control upload" aria-describedby="file_upload">
         				 </div>
        				</div>
      			</div>

       			<div class="form-group">
           			<label for="description" class="control-label col-sm-3">Description </label>
           			<div class="col-md-8 col-sm-9">
                		<div class="input-group">
                 			<span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                  		<input type="text" class="form-control" name="description" placeholder="description" />
                		</div>
           			</div>
       			</div>

       			<div class="form-group">
         				<div class="col-xs-offset-6 col-xs-12">
            				<input name="submit" type="submit" value="Add" class="btn btn-primary">
          			</div>
        			</div>
        		</form>
	</div>
</div>
</div>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
