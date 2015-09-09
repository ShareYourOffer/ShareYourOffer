<?php 
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1784238105136538',
  'app_secret' => '9700a0e6a09f6042c12c8831742fe3f3',
  'default_graph_version' => 'v2.4',
  ]);

session_start();

$helper = $fb->getRedirectLoginHelper();
try {
    $accessToken = $helper->getAccessToken();
    $fb->setDefaultAccessToken($accessToken);
    print 'Access Token:'.$accessToken;
}
catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
}
catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}


try {
    $response = $fb->get('/me');
    $userNode = $response->getGraphUser();
}
catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
}
catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

echo 'Logged in as ' . $userNode->getField('id');

try {
    $response = $fb->get('/'.$userNode->getField('id').'/friendlists');
    $graphObject = $response->();
}
catch(Facebook\Exceptions\FacebookSDKException $e) {
    // . . .
    exit;
}




$plainOldArray = $response->getDecodedBody();

print $plainOldArray;   

if (isset($accessToken)) {
    // Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;

    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']
}
?>