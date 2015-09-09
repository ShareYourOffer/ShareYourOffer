<?php
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1784238105136538',
  'app_secret' => '9700a0e6a09f6042c12c8831742fe3f3',
  'default_graph_version' => 'v2.4',
  ]);

session_start();

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'read_custom_friendlists']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost:56729/home.php?XDEBUG_SESSION_START=6CA7C10D', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>