<?php
// require  'autoload.php';
require_once 'config.php';

class CategoryClass{
	private $cat_id;
	private $cat_name;
	private $parent;
	private $img_path;
	private $img_cat;
	private $description;

	function __construct(){

	}

	//Start of Constructor
	// function __construct($cat_name,$img_path,$img_cat,$description,$parent=null){
	// 	// $this->cat_id=isset($this->cat_id)?$this->cat_id:$cat_id;
	// 	$this->cat_name=isset($this->cat_name)?$this->cat_name:$cat_name;
	// 	$this->img_path=isset($this->img_path)?$this->img_path:$img_path;
	// 	$this->img_cat=isset($this->img_cat)?$this->img_cat:$img_cat;
	// 	$this->description=isset($this->description)?$this->description:$description;
	// 	$this->parent=isset($this->parent)?$this->parent:$parent;
	// }  //End of Constructor

	//Setter Function
	function __set($attr , $val){
		$this->$attr = $val;
	}

	//getter Function
	function __get($attr){
		return $this->$attr;
	}

	function insert(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);


		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "insert into category (cat_name,img_path,img_cat,description,parent) values(?,?,?,?,?)";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("ssssi",$this->cat_name,$this->img_path,$this->img_cat,$this->description,$this->parent);
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

	static function getById($cat_id){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection
		

		$query = "select * from category where cat_id=?";
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
		}// End of insert method

		$result = $statement->get_result();
		$product = $result->fetch_object('CategoryClass',array('cat_id','cat_name','parent','img_path'.'img_cat','description'));
		$statement->close();
		return $product;

	}//End of getById function

	static function getByParentId($parent){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection
		

		$query = "select * from category where parent=?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		
		$result = $statement->bind_param("i",$parent);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert method

		$result = $statement->get_result();
		$categories = [];
		$params = array('cat_id','cat_name','img_path','img_cat','description','parent');
		while($category = $result->fetch_object('CategoryClass',$params)){
			$categories[] = $category;
		}

		$statement->close();
		$conn->close();
		return $categories;
	}//End of getByParentIdId function

	static function getByName($cat_name){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "select * from category where cat_name=?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("s",$cat_name);
		if(!$result){
			echo "binding failed : ".$statement->error;
			$success = false;
		}//End of prepqring statement

		if(!$statement->execute()){
			echo "execution failed : ".$statement->error;
			$success=false;
		}// End of insert method

		$result = $statement->get_result();
		$product = $result->fetch_object('CategoryClass',array('cat_id','cat_name','parent'));
		$statement->close();
		return $product;

	}//End of getByName function

	static function getAllCategories(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "select * from category";
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
		$categories = [];
		$params = array('cat_id','cat_name','img_path','img_cat','description','parent');
		while($category = $result->fetch_object('CategoryClass',$params)){
			$categories[] = $category;
		}

		$statement->close();
		$conn->close();
		return $categories;
	}//End of allCategories function

	function delete(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "delete from category where cat_id = ?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("i",$this->cat_id);
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

	function deleteByParentId(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "delete from category where parent= ?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("i",$this->parent);
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
	}//End of deleteByParentId function

	function update(){
		$success = true;
		$conn = new mysqli(DBHOST , DBUSER , DBPASS, DBNAME);

		if($conn->connect_errno){
			echo "error connection to DB ".$conn->connect_error."<br>";
			$success = false;
		} //End of open connection

		$query = "update category set cat_name = ?,img_path=?,img_cat=?,description=?,parent=? where cat_id=?";
		$statement = $conn->prepare($query);
		if(!$statement){
			echo "error preparing query : ".$conn->error."<br>";
			$success = false;
		}
		$result = $statement->bind_param("sssisi",$this->cat_name,$this->img_path,$this->img_cat,$this->cat_id,$this->description,$this->parent);
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


}


// $category = new CategoryClass();
// $category->cat_name="fardous";
// $category->img_path="images/pc.jpg";
// $category->img_cat="images/pc1.jpg";
// $category->description = "skjdadhkahfkj";
// if($category->insert()){
// 	echo $category->cat_name."Inserted Succssefully";
// }

// $category= CategoryClass::getById('1');
// var_dump($category);

// $category= CategoryClass::getByName('cars');
// var_dump($category);

// $category= CategoryClass::getByParentId(6);
// echo "<pre>";
// var_dump($category);
// echo "</pre>";

// $category = CategoryClass::getAllCategories();
// var_dump($category);

// $category = CategoryClass::getById(20);
// $category->delete();
// if($category->delete()){
// 	echo $category->cat_name."deleted Successfully";
//  }

// $category = CategoryClass::getById(6);
// $category->cat_id = '21';
// if($category->update()){
// 	echo "Succeed";
// }

?>
