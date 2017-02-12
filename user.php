<?php
require 'config.php';
require 'autoload.php';
class user
{
  private $user_id;
  private $user_name;
  private $first_name;
  private $last_name;
  private $pass;
  private $email;
  private $birth_of_date;
  private $gender;
  private $job;
  private $limitcredit;
  private $is_deleted;
  private $is_admin;
  private $register_at;
  private $updated_at;


  //start of constructor
  function __construct($user_name,$first_name,$last_name,$pass,$email,$birth_of_date,$gender,$job,$limitcredit,$is_deleted = 0,$is_admin = 0)
  {
    // $this->id = isset($this->id)?$this->id:$id;

    $this->user_name = isset($this->user_name)? $this->user_name:$user_name;
    $this->first_name = isset($this->first_name)? $this->first_name:$first_name;
    $this->last_name = isset($this->last_name)? $this->last_name:$last_name;
    $this->pass = isset($this->pass)? $this->pass:$pass;
    $this->email = isset($this->email)? $this->email:$email;
    $this->birth_of_date = isset($this->birth_of_date)? $this->birth_of_date:$birth_of_date;
    $this->gender = isset($this->gender)? $this->gender:$gender;
    $this->job = isset($this->job)? $this->job:$job;
    $this->limitcredit = isset($this->limitcredit)? $this->limitcredit:$limitcredit;
    $this->is_deleted = isset($this->is_deleted)? $this->is_deleted:$is_deleted;
    $this->is_admin = isset($this->is_admin)? $this->is_admin:$is_admin;
    // $this->register_at = isset($this->register_at)? $this->register_at:$register_at;
    // $this->updated_at = isset($this->updated_at)? $this->updated_at:$updated_at;
  }//end of constructor
  function __get($attr)
  {
    return $this->$attr;
  }

  function __set($attr,$value)
  {
    $this->$attr = $value;
  }
  // static function connection()
  // {
  //   $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
  //   if($conn->connect_errno)
  //   {
  //     echo("connection to DB faild<br>".$conn->connect_error);
  //     return false;
  //   }
  //   return $conn;//end open connection
  //   // $query = $query;
  //   // $stmt = $conn->prepare($query);
  //   // if(!$stmt)
  //   // {
  //   //   echo("faild preparing query ".$conn->error)."<br>";
  //   //   return false;
  //   // }
  //   // return $stmt;
  // }//end function connection
  //insert users
  function insert()
  {
    $success = true;
    $conn = connection::conn();
    $query = "insert into user (user_id,user_name,first_name,last_name,pass,email,birth_of_date,gender,job,limitcredit,is_deleted,is_admin)values(null,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    if(!$stmt)
    {
      echo("faild preparing query ".$conn->error)."<br>";
      $success = false;
    }
    $res = $stmt->bind_param('ssssssssiss',$this->user_name, $this->first_name, $this->last_name , $this->pass, $this->email, $this->birth_of_date, $this->gender, $this->job, $this->limitcredit, $this->is_deleted, $this->is_admin);
    if(!$res)
    {
      echo "binding Faild".$stmt->error;
      $success = false;
    }
    if(!$stmt->execute())
    {
      echo "execution faild ".$stmt->error."<br>";
      $success = false;
    }
    $stmt->close();
    $conn->close();
    return $success;
  }//end function insert

  //function get by id
  static function getById($id)
  {
    $conn = user::connection();
    $query = "select * from user where user_id = ?";
    $stmt = $conn->prepare($query);
    if(!$stmt)
    {
      echo("faild preparing query ".$conn->error)."<br>";
      return false;
    }
    // $stmt = user::connection("select * from user where id = ?");
    $res = $stmt->bind_param('i', $id);
    if(!$res)
    {
      echo "binding Faild".$stmt->error;
      return false;
    }
    if(!$stmt->execute())
    {
      echo "execution faild ".$stmt->error."<br>";
    return false;
    }
    $result = $stmt->get_result();
    $user = $result->fetch_object('user', array("user_id","user_name","first_name","last_name","pass","email","birth_of_date","gender","job","limitcredit","is_deleted","is_admin"));
    $stmt->close();
    $conn->close();
    return $user;
  }//end function getById

  //function getByUsername
  static function getByUsername($username)
  {
    //$success = true;
    $conn = user::connection();
    $query = "select * from user where user_name = ?";
    $stmt = $conn->prepare($query);
    if(!$stmt)
    {
      echo("faild preparing query ".$conn->error)."<br>";
      return false;
    }
    $res = $stmt->bind_param('s', $username);
    if(!$res)
    {
      echo "binding Faild".$stmt->error;
      return false;
    }
    if(!$stmt->execute())
    {
      echo "execution faild".$stmt->error."<br>";
    return false;
    }
    $result = $stmt->get_result();
    $user = $result->fetch_object('user', array("user_id","user_name","first_name","last_name","pass","email","birth_of_date","gender","job","limitcredit","is_deleted","is_admin"));
    $stmt->close();
    $conn->close();
    return $user;
  }//end function getByUsername

  //function getAll
  static function getAll()
  {
      //$success = true;
      $conn = user::connection();
      $query = "select * from user";
      $stmt = $conn->prepare($query);
      if(!$stmt)
      {
        echo("faild preparing query ".$conn->error)."<br>";
        return false;
      }
      if(!$stmt->execute())
      {
        echo "execution faild".$stmt->error."<br>";
        return false;
      }
      $result = $stmt->get_result();
      $users = [];
      $params = array("user_id","user_name","first_name","last_name","pass","email","birth_of_date","gender","job","limitcredit","is_deleted","is_admin");
      while ($user = $result->fetch_object('user',$params))
      {
        $users []= $user;
      }
      $stmt->close();
      $conn->close();
      return $users;
  }//end function getAll
  //function updated
  static function update($user)
  {
      $conn = user::connection();
      if($conn)
      {
          $query = "update user set user_id= ? , user_name= ? , first_name= ?, last_name= ?, pass= ? , email= ? ,birth_of_date= ? , gender= ?, job= ?, limitcredit= ? where user_id= ?";
          $stmt = $conn->prepare($query);
          if(!$stmt)
          {
            echo("faild preparing query ".$conn->error)."<br>";
            return false;
          }
          $res = $stmt->bind_param('issssssssii',$user['user_id'],$user['user_name'],$user['first_name'],$user['last_name'],$user['pass'],$user['email'],$user['birth_of_date'],$user['gender'],$user['job'],$user['limitcredit'], $user['oldid']);
          if(!$res)
          {
            echo "binding Faild".$stmt->error;
            return false;
          }
          // 3- execute statement
          $stmt->execute();
          if(!$stmt->execute())
          {
            echo "execution faild ".$stmt->error."<br>";
            return false;
          }
          // 4- check for fail or success
          if($stmt->affected_rows>0)
          {
          	header('location:list.php');
          }
          else
          {
          	echo "user not inserted";
          }
      }
  }//end function update
  //function delete
  static function delete($user)
  {
      $conn = user::connection();
      if($conn)
      {
          $query = "update user set is_deleted = 1   where user_id= ?";
          $stmt = $conn->prepare($query);
          $stmt->bind_param('i',$user->id);
          $stmt->execute();
          if($stmt->affected_rows>0)
          {
            echo "<a href='list.php'>view all users</a>";
          	header('location:reason_del.php');
          }
          else
          {
          	echo "user not deleted";
          }
      }
  }

}
$user = new user("shima","shima","shima","iti","shima@gmail.com","1993-12-7","female","student","2000");
$user->insert();
// $user = user::getById(3);
// user::delete(user::getById(3));
echo "<pre>";
var_dump($user);
echo "</pre>";
 ?>
