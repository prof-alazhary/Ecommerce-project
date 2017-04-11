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


// get access token from file
$access_token = file_get_contents("file.txt");
// permission user_posts


$fb->setDefaultAccessToken($access_token);
/*
// store on session.

// public_profile permission
$response=$fb->get('/me?fields=id,name,picture');
$user=$response->getGraphUser();
echo $user['name'];
$pic=json_decode($user['picture'])->url;
//print_r($pic);
echo "<img src='{$pic}'/>";*/


// need user_posts permission ..
$response=$fb->get("/me/feed?field=id,message&limit=20");
$posts=$response->getGraphEdge();
//print_r($posts);


$options=[
    'message'=>'In Open Source Mansoura, task1 :) ',
    'link'=>'https://www.youtube.com/watch?v=v7oaSFHlhGM',
    'tags'=>"1477757332,100001626662831"
];
// need publish_actions permission
$response=$fb->post("/me/feed",$options);
$new_post=$response->getGraphNode();
echo $new_post['id'];

/*
$options=[
    'message'=>'In Open Source Mansoura',
    'source'=>$fb->fileToUpload("1.png")
];
// need publish_actions permission
$response=$fb->post("/me/photos",$options);
$new_post=$response->getGraphNode();
echo $new_post['id'];*/

 ?>
