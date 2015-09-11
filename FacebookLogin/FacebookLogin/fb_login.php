<?php
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1784238105136538',
  'app_secret' => '9700a0e6a09f6042c12c8831742fe3f3',
  'default_graph_version' => 'v2.4',
  ]);

session_start();

$helper = $fb->getRedirectLoginHelper();
$permissions = [
    'email'
    ,'public_profile'
    ,'user_friends'
    ,'read_custom_friendlists'
    ,'user_hometown'
    ,'user_location'
    ,'user_birthday'
    ,'user_relationships'
    ,'user_education_history'
    ,'user_relationship_details'
    ]; 




//me?fields=id,name,email,picture,address,gender,hometown,location,birthday,age_range,locale,updated_time,link,family
//me?fields=friendlists{name,owner,members{name,profile_type}}
//me?fields=friendlists{name,members}
//me/taggable_friends?limit=1000
//me?fields=education 
$loginUrl = $helper->getLoginUrl('http://localhost:56729/home.php?XDEBUG_SESSION_START=6CA7C10D', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>