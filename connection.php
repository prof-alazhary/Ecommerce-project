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
      return $conn;
    }
  }
 ?>
