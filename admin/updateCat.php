<?php
require_once 'nav.php';
session_start();
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
// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";
     $cat_id = $_GET['cat_id'];
     $cat_data = CategoryClass::getById($cat_id);

    if(isset($_POST['submit'])){
    	$cat_name = $_POST['cat_name'];
		$img_path = $_POST['img_path'];
		$description = $_POST['description'];

		if(!empty($_POST['cat_name'])&&
	   	!empty($_POST['img_path'])&&
	   	!empty($_POST['description'])){
			//$catObj = new CategoryClass();
			$cat_data->cat_name=$cat_name;
			$cat_data->img_path=$img_path;
			$cat_data->description=$description;
			if($cat_data->update()){
				header('Location: managecategory.php');
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
      <h1 class="entry-title"><span>Update Category</span> </h1>
      <hr>
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="updateCat.php?cat_id=<?= $cat_id ?>" >
        <div class="form-group">
           <label for="cat_name" class="control-label col-sm-2">product Name </label>
           <div class="col-md-6 col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control" name="cat_name" id="name" placeholder="product Name" value="<?= $cat_data->cat_name ?>"/><span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-plus"></i></span>
                </div>
           </div>
       </div>
       <div class="form-group">
          <label for="img_path" class="control-label col-sm-2">Category Photo </label>
          <div class="col-md-6 col-sm-3">
               <div class="input-group">
                 <input type="text" class="form-control" name="img_path" placeholder="Image Path" value="<?= $cat_data->img_path ?>"/><span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
               </div>
          </div>
      </div>
      <div class="form-group">
         <label for="description" class="control-label col-sm-2">Description </label>
         <div class="col-md-6 col-sm-9">
                <textarea class="form-control" rows="5" name="description" id="comment"><?= $cat_data->description ?></textarea>

         </div>
     </div>
     <div class="form-group" style="margin-top:50px;">
       <div class="col-xs-offset-2 col-xs-12">
         <input type="submit" name="submit" value="update" class="btn btn-primary">
       </div>
     </div>
</form>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
