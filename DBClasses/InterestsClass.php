<?php
require_once 'autoload.php';


class InterestsClass{
	private $cat_id;
	private $user_id;
  	
  	//start of constructor
  	function __construct($cat_id,$user_id){
  		$this->cat_id = isset($this->cat_id)? $this->cat_id:$cat_id;
  		$this->user_id = isset($this->user_id)? $this->user_id:$user_id;
  	}

  	function __get($attr){
    	return $this->$attr;
  	}

  	function __set($attr,$value){
    	$this->$attr = $value;
  	}

  	function insert(){
    	$success = true;
    	$conn = connection::conn();
    	$query = "insert into interest (cat_id,user_id) values(?,?)";
    	$stmt = $conn->prepare($query);
    	if(!$stmt){
      		echo("faild preparing query ".$conn->error)."<br>";
      		$success = false;
    	}
    	$res = $stmt->bind_param('ii',$this->cat_id, $this->user_id);
    	if(!$res){
      		echo "binding Faild".$stmt->error;
      		$success = false;
    	}
    	if(!$stmt->execute()){
      		echo "execution faild ".$stmt->error."<br>";
      		$success = false;
    	}
    	$stmt->close();
    	$conn->close();
    	return $success;
  	}//end function insert
}

?>

