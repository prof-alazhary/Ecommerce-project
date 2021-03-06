<?php
require_once 'nav.php';
require_once 'config.php';

class ProductClass{
	private $product_id;
	private $cat_id;
	private $product_name;
	private $img_path;
	private $description;
	private $price;
	private $quantity;

	function __construct(){

	}

	// //Start of Constructor
	// function __construct($product_id,$cat_id,$product_name,$img_path,$description,$price
	// 	){
	// 	$this->product_id =isset($this->product_id )?$this->product_id:$product_id ;
	// 	$this->cat_id=isset($this->cat_id)?$this->cat_id:$cat_id;
	// 	$this->product_name=isset($this->product_name)?$this->product_name:$product_name;
	// 	$this->img_path=isset($this->img_path)?$this->img_path:$img_path;
	// 	$this->description=isset($this->description)?$this->description:$description;
	// 	$this->price=isset($this->price)?$this->price:$price;
	// 	//$this->quantity=isset($this->quantity)?$this->quantity:$quantity;
	// 	//$this->updated_at=isset($this->updated_at)?$this->updated_at:$updated_at;
	//  }  //End of Constructor

	//Setter Function
	function __set($attr , $val){
		$this->$attr = $val;
	}

	//getter Function
	function __get($attr){
		return $this->$attr;
	}

	//database functions:

	function insert(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "insert into product (product_id,cat_id,product_name,img_path,description,price,quantity) values(?,?,?,?,?,?,?)";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("iisssdi",$this->product_id,$this->cat_id,$this->product_name,$this->img_path,$this->description,$this->price,$this->quantity);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert method

		$statement->close();
		$conn->close();
		return $success;

	}//End of Insert function


	static function getById($product_id){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection


		$query = "select * from product where product_id=?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("i",$product_id);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}

		$result = $statement->get_result();
		$product = $result->fetch_object('ProductClass',array('product_id','cat_id','product_name','img_path','description','price','quantity'));
		$statement->close();
		return $product;

	}//End of getById function

	static function getByCatId($cat_id){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection


		$query = "select * from product where cat_id=?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}

		$result = $statement->bind_param("i",$cat_id);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}

		$result = $statement->get_result();
		$products = [];
		$params = array('product_id','cat_id','product_name','img_path','description','price','quantity');
		while($product = $result->fetch_object('ProductClass',$params)){
			$products[] = $product;
		}

		$statement->close();
		$conn->close();
		return $products;

	}//End of getCategoryId function

	static function getByPrice($price){
		$success = true;

		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "select * from product where price=?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("d",$price);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert method

		$result = $statement->get_result();
		$product = $result->fetch_object('ProductClass',array('product_id','cat_id','product_name','img_path','description','price','quantity'));
		$statement->close();
		return $product;

	}//End of getByPrice function


	static function getByName($product_name){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "select * from product where product_name=?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("s",$product_name);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert methodpublic

		$result = $statement->get_result();
		$product = $result->fetch_object('ProductClass',array('product_id','cat_id','product_name','img_path','description','price','quantity'));
		$statement->close();
		return $product;

	}//End of getByName function

	static function getAllProducts(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "select * from product";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert method

		$result = $statement->get_result();
		$products = [];
		$params = array('product_id','cat_id','product_name','img_path','description','price','quantity');
		while($product = $result->fetch_object('ProductClass',$params)){
			$products[] = $product;
		}

		$statement->close();
		$conn->close();
		return $products;
	}//End of allProducts function

	static function getUserInterests($user_id){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "select * from product where cat_id = (select cat_id from interest where user_id=2)";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert method

		$result = $statement->get_result();
		$products = [];
		$params = array('product_id','cat_id','product_name','img_path','price');
		while($product = $result->fetch_object('ProductClass',$params)){
			$products[] = $product;
		}

		$statement->close();
		$conn->close();
		return $products;
	}//End of intersets products function

	function delete(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "delete from product where product_id = ?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("i",$this->product_id);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert method

		$statement->close();
		$conn->close();
		return $success;
	}//End of delete function

	function update(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "update product set cat_id=?,product_name=?,img_path=?,description=?,price=?,quantity=? where product_id=?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("isssdii",$this->cat_id,$this->product_name,$this->img_path,$this->description,$this->price,$this->quantity,$this->product_id);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert method

		$statement->close();
		$conn->close();
		return $success;
	}//End of update function


}// End of ProductClass Class

//insert into product (product_id,cat_id,product_name,img_path,description,price,quantity
// $product = new ProductClass();
// $product->product_id='150';
// $product->cat_id='3';
// $product->product_name='gigi';
// $product->img_path='gigi';
// $product->description='jkkjhk';
// $product->price='150';
// $product->quantity='150';
// if($product->insert()){
// 	echo $product->name."Inserted Succssefully";
//  }

// $product = ProductClass::getById(1);
// var_dump($product);

// $product = ProductClass::getUserInterests(1);
// echo"<pre>";
// var_dump($product);
// echo"</pre>";

// $product = ProductClass::getByCatId(1);
// echo "<pre>";
// var_dump($product);
// echo "</pre>";
// foreach ($product as $pro) {
// 	echo $pro->product_name;
// }

// $product = ProductClass::getByName('verna');
// var_dump($product);

// $product = ProductClass::getByPrice("3000");
// var_dump($product);

// $product = ProductClass::getAllProducts();
// var_dump($product)

// $product = ProductClass::getById(2);
// $product->delete();
// if($product->delete()){
// 	echo $product->name."deleted Successfully";
//  }

// $product = ProductClass::getById(1);
// $product->product_name = 'ggg';
// if($product->update()){
// 	echo "Succeed";
// }

?>
