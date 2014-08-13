<?php

require_once "Facebook/FacebookRequest.php";
require_once "Facebook/FacebookResponse.php";
require_once "Facebook/FacebookSession.php";
require_once "Facebook/FacebookSignedRequestFromInputHelper.php";
require_once "Facebook/FacebookJavaScriptLoginHelper.php";
require_once "Facebook/Entities/AccessToken.php";
require_once "Facebook/Entities/SignedRequest.php";
require_once "Facebook/FacebookSDKException.php";
require_once "Facebook/FacebookRequestException.php";
require_once "Facebook/FacebookAuthorizationException.php";
require_once "Facebook/HttpClients/FacebookCurl.php";
require_once "Facebook/HttpClients/FacebookHttpable.php";
require_once "Facebook/HttpClients/FacebookCurlHttpClient.php";
require_once "Facebook/GraphObject.php";
require_once "Facebook/GraphSessionInfo.php";

use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\Entities\AccessToken;
use Facebook\FacebookSDKException;

FacebookSession::setDefaultApplication($app_id, $app_secret);

/* Gets Facebook access token from session, if available. */
if (isset($_SESSION['FB_ACCESS_TOKEN']))
{
	$fb_session = new FacebookSession($_SESSION['FB_ACCESS_TOKEN']);
}

/* Else, try to login through JavaScript SDK cookies. */
if (!isset($fb_session))
{
	$fb_helper = new FacebookJavaScriptLoginHelper();

	try
	{
		$fb_session = $fb_helper->getSession();
		
		if ($fb_session)
		{
			$_SESSION['FB_ACCESS_TOKEN'] = $fb_session->getAccessToken()->__toString();
		}
	}
	catch(FacebookRequestException $ex)
	{
		// When Facebook returns an error
	}
	catch(\Exception $ex)
	{
		// When validation fails or other local issues
	}
}

/* Get info about logged user. */
if (isset($fb_session))
{
	try
	{
		$request = new FacebookRequest($fb_session, 'GET', '/me');
		$response = $request->execute();
		$fb_profile = $response->getGraphObject();
	}
	catch (FacebookSDKException $ex)
	{
		foreach ($_SESSION as $key => $value)
		{
			unset($_SESSION[$key]);
		}
		
		unset($fb_session);
	}
	
	/* Sempre sincroniza uma vez a cada login. */
	if (isset($_SESSION['synced']) || $_SESSION['synced'] != true)
	{
		system(sprintf("node %s", $myl_backsync));
		$_SESSION['synced'] = true;
	}
}

function fb_get_accounts()
{
	global $fb_session;
	$request = new FacebookRequest($fb_session, 'GET', '/me/accounts');
	$response = $request->execute();
	$fb_accounts = $response->getGraphObject();
	return $fb_accounts->getProperty('data');
}

?>
