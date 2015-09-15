<?php
require_once 'google-sdk/apiClient.php';
require_once 'google-sdk/contrib/apiPlusService.php';

echo 'google plus';

session_start();

if(!isset($_SESSION['Details']))
{
//    $ApplicationName='syotoday';
    $clientId='574006003521-e7i2ujm6t7hvibkeid1dtmks36ccbmib.apps.googleusercontent.com';
    $clientSecret='QV-HzNBUdqNST-9m8rNo3VHZ';
    $RedirectUri='http://localhost:56501/GooglePlusResponse.php';

    $client = new apiClient();
    $client->setApplicationName($ApplicationName);
    $client->setClientId($clientId);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($RedirectUri);
    $client->setScopes(array('https://www.googleapis.com/auth/plus.me'
        ,'https://www.googleapis.com/auth/userinfo.email'
        ,'https://www.googleapis.com/auth/plus.login'));
    $plus = new apiPlusService($client);

    if (isset($_GET['code'])) {    
        $client->authenticate();
        $_SESSION['access_token'] = $client->getAccessToken();
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
    }

    if (isset($_SESSION['access_token'])) {
        $client->setAccessToken($_SESSION['access_token']);
    }

    if ($client->getAccessToken()) {
        $me = $plus->people->get('me');

        $_SESSION['Details']=array(
            $Name= $me['displayName'],
            $Token=$_SESSION['access_token'],
            $Type='GooglePlusLogin',
            $EmailId=$me['emails'][0]['value'],        
            $LogoutUrl='http://localhost:56501/GooglePlusResponse.php?XDEBUG_SESSION_START=BA5DFFA0&logout=1',
            $picture=$me['image']['url']
            );

        header('Location: ' . 'http://localhost:56501/index.php?XDEBUG_SESSION_START=BA5DFFA0', true);
    }
}

if($_GET["logout"]==1)
{
    unset($_SESSION['Details']);
    header('Location: ' . 'http://localhost:56501/index.php?XDEBUG_SESSION_START=BA5DFFA0', true);
}
?>