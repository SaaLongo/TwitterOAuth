<?php
session_start();
//libreria OAuth
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', '4mEq9HTFWJIsVDAWnh0rOPPaj');
define('CONSUMER_SECRET', 'DhZlMbuMWYlSZZoM636CShzCC4JW5DyXLkVDkql84rCAamTwWJ');
define('OAUTH_CALLBACK', 'https://localhost/twitteroauth-master/');

if(!isset($SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$SESSION['oauth_token'] = $request_token['oauth_token'];
	$SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo $url;
}else{
	//quando l'access_token è valido
	$access_token = $SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user = $connection->get("account/verify_credentials");
	//echo $user->screen_name;
	//echo $user->status->text;
	echo "<pre>";
	print_r($user);
	echo "</pre>";
}
	
	

?>