<?php
require_once '../DBClasses/autoload.php';
	$cat_id=$_GET['cat_id'];
	$products = ProductClass::getByCatId($cat_id);
	foreach ($products as $product) {
		$product->delete();
	}

  	$cats = CategoryClass::getByParentId($cat_id);
 	foreach ($cats as $cat) {
		$cat->delete();
	}

	$category = CategoryClass::getById($cat_id);
    $category->delete();

    if($category->delete()){
	 	header('location:managecategory.php');
	  }
?>
