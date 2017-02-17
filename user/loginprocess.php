<?php
session_start();
require_once '../DBClasses/autoload.php';
ob_start();
$user = user::getByUsername($_POST['user_name']);
if($user)
{
  if($user->user_name == "admin")
  {
    header('Location: ../admin/admin.php');
    $_SESSION['loggeduser'] = $user;
  }
  else
  {
    header('Location: ../index.php');
    $_SESSION['loggeduser'] = $user;
  }
}
else
{
  header('Location: login.php?error="Your details are wrong!!"');
}

?>
