<?php
require_once '../DBClasses/autoload.php';
session_start();
if(isset($_SESSION['loggeduser']))
{
    $user = $_SESSION['loggeduser'];
    // var_dump($user);
}
else
{
    header('Location: ../user/login.php?error=your are not logged in');
}
require_once 'nav.php'
 ?>
