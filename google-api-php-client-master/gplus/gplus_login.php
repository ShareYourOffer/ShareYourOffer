<?php

require_once 'src/Google/Service/Client.php';
require_once 'src/Google/Service/PlusDomains.php';

session_start();
$ApplicationName='syotoday';
$clientId='574006003521-sgb65f00btj6klh0340qks330i3bdvo3.apps.googleusercontent.com';
$clientSecret='LGqs7dilRK34t7IPryo0TFRZ';
$RedirectUri='http://localhost/gplus/index.php';

$client = new Google_Client();
$client->setApplicationName($ApplicationName);
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($RedirectUri);
$client->setScopes(array('https://www.googleapis.com/auth/plus.me',
                         'https://www.googleapis.com/auth/plus.circles.read'));
$plus = new Google_Service_PlusDomains($client);

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
}

if (isset($_GET['code'])) {    
    $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if (isset($_SESSION['access_token'])) {
  $client->setAccessToken($_SESSION['access_token']);
}

if ($client->getAccessToken()) {
    $me = $plus->circles->get('following-p6eac4c000b4a91aa');

  $optParams = array('maxResults' => 100);
  $activities = $plus->activities->listActivities('me', 'public',$optParams);

  // The access token may have been updated lazily.
  $_SESSION['access_token'] = $client->getAccessToken();
} else {
  $authUrl = $client->createAuthUrl();
}
?>
<div>
 <?php if(isset($me))
 { 
 
 $_SESSION['gplusdata']=$me;
  header("location: home.php");
 
 } ?>

<?php
  if(isset($authUrl)) {
    print "<a class='login' href='$authUrl'>Google Plus Login </a>";
  } else {
   print "<a class='logout' href='index.php?logout'>Logout</a>";
  }
?><br/>
</div>

