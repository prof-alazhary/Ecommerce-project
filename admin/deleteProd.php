<?php
require_once '../DBClasses/autoload.php';
	$product_id=$_GET['product_id'];
	$product = ProductClass::getById($product_id);
	$product->delete();

    if($product->delete()){
	 	header('location:manageProd.php');
	}
?>
