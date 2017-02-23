<?php
ob_start();
session_start();
require_once '../DBClasses/autoload.php';

$user = user::getByUsername($_POST['user_name']);
echo var_dump($user);
if($user)
{
  $_SESSION['loggeduser'] = $user;
  $myuser=$_SESSION['loggeduser'];
  $sh= new ShopCart();
  $total_quant=$sh->selectSumQuant($myuser->user_id,0);
  $_SESSION['total_quant'] = $total_quant;
  if($user->user_name == "admin")
  {

    header('Location: ../admin/admin.php');

  }
  else
  {
    header('Location: userprofile.php');

  }
}
else
{
  header('Location: login.php?error="Your details are wrong!!"');
}
?>
