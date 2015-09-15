<?php


require_once __DIR__ . '/facebook-sdk-v5/autoload.php';


session_start();
    
if(!isset($_SESSION['Details']))
{
    $fb = new Facebook\Facebook([
      'app_id' => '1784238105136538',
      'app_secret' => '9700a0e6a09f6042c12c8831742fe3f3',
      'default_graph_version' => 'v2.4',
      ]);

    $helper = $fb->getRedirectLoginHelper();
    try {
        $accessToken = $helper->getAccessToken();
        $fb->setDefaultAccessToken($accessToken);
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
        $response = $fb->get('/me?fields=name,id,email,picture{url}');
        $userNode = $response->getGraphObject();
        $picture=$response->getDecodedBody();

        $_SESSION['Details']=array(
        $Name=$userNode->getField('name'),
        $Token=$accessToken,
        $Type='FacebookLogin',
        $EmailId=$userNode->getField('email'),        
        $LogoutUrl='http://localhost:56501/FacebookResponse.php?XDEBUG_SESSION_START=BA5DFFA0&logout=1',
        $picture=$picture['picture']['data']['url']
        );

        header('Location: ' . 'http://localhost:56501/index.php?XDEBUG_SESSION_START=BA5DFFA0', true);
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
}

if($_GET["logout"]==1)
{
    unset($_SESSION['Details']);
    header('Location: ' . 'http://localhost:56501/index.php?XDEBUG_SESSION_START=BA5DFFA0', true);
}


?>