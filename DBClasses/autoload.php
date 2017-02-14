<?php
define('SR',dirname(__FILE__));
define('PS',PATH_SEPARATOR);
define('DS',DIRECTORY_SEPARATOR);
$include_path=SR.DS."database".PS.SR.DS."logic";

function myloader($classname)
{
  require_once $classname.".php";
}

spl_autoload_register('myloader');

$oldpath =  get_include_path();
$newpath = $oldpath.PS.$include_path;
set_include_path($newpath);
// echo get_include_path();

// $user = new user;
//
// echo "predefined constants<br>";
// echo "path separator".PATH_SEPARATOR."<br>";
// echo "directory separator".DIRECTORY_SEPARATOR."<br>";
 ?>
