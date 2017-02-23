<?php
require_once '../DBClasses/autoload.php';
session_start();
$id = $_GET['id'];
var_dump($_GET);
$user = user::getById($id);
user::delete($user);
?>
