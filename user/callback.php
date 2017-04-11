<?php
date_default_timezone_set("Africa/Cairo");
session_start();
require_once __DIR__.'/php-sdk/src/Facebook/autoload.php';

// configure your appliction with facebook app
$fb=new Facebook\Facebook([
    'app_id'=>"216896112116306",
    'app_secret'=>"99188f2e25795f6015e8de1eae71aa5a",
    'default_graph_version'=>'v2.8'
]);

// Generate Facebook Login URL
$helper=$fb->getRedirectLoginHelper();
// 2 hours only
$token=$helper->getAccessToken();

// Get Object from  OQuth2Client Class
$oauthclient=$fb->getOAuth2Client();
// 60 days
$longLivedToken=$oauthclient->getLongLivedAccessToken($token);
//echo $longLivedToken;

// store in database.
// store new access token in file
file_put_contents('file.txt',$longLivedToken);
header('Location:register.php?flag=0');

?>
