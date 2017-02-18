<?php
session_start();
require_once '../DBClasses/autoload.php';
ob_start();
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// ($user_name,$first_name,$last_name,$pass,$email,$birth_of_date,$gender,$job,$limitcredit)
$user = new user($_POST['user_name'],
                $_POST['first_name'],
                $_POST['last_name'],
                sha1($_POST['pass']),
                $_POST['email'],
                $_POST['birth_date'],
                $_POST['gender'],
                $_POST['job'],
                $_POST['limitcredit']);
$userInt = $_POST['superCat'];
// $success = $user->insert();
if($user->insert())
{
    $interests = new InterestsClass($_POST['superCat'],$user->user_id);
    // echo "user inserted successfully";
    if($user->username == 'admin')
    {
      header('Location: ../admin/admin.php');
      $_SESSION['loggeduser'] = $user;
    }
    else
    {
      header('Location: userprofile.php');
      $_SESSION['loggeduser'] = $user;
    }
}
else
{
	 echo "user not inserted";
}
?>
