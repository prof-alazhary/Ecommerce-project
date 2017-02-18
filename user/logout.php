<?php
require_once '../DBClasses/autoload.php';
ob_start();
session_start();
unset($_SESSION['loggeduser']);
header('Location: ../index.php');
?>
