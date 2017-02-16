<?php
require_once '../DBClasses/autoload.php';
session_start();
$id = $_GET['id'];
// var_dump($_GET);
$user = user::getById($id);
user::be_admin($user);
if($user->is_admin)
header('Location: list.php?error=your are not logged in');

?>
