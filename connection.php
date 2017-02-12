<?php
class connection
{
  static function conn()
  {
    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    if($conn->connect_errno)
    {
      echo("connection to DB faild<br>".$conn->connect_error);
      return false;
    }
    return $conn;//end open connection
    // $query = $query;
    // $stmt = $conn->prepare($query);
    // if(!$stmt)
    // {
    //   echo("faild preparing query ".$conn->error)."<br>";
    //   return false;
    // }
    // return $stmt;
  }//end function connection
}
 ?>
