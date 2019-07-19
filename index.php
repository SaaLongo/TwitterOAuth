<?php

$consumerKey =  "4mEq9HTFWJIsVDAWnh0rOPPaj";
$consumerSecret = "DhZlMbuMWYlSZZoM636CShzCC4JW5DyXLkVDkql84rCAamTwWJ";
$accessToken = "3227549738-zcDNPN4tHKxUxZK7L3dzhkNOK3yyNG7tNBANj7a";
$accessTokenSecret = "HBYf2iWujRKUOg3PBt6GlhW8nejvaAOA24MKN2EFDz3yi";

//libreria OAuth
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

//creazione connessione e API requests
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$content = $connection->get("account/verify_credentials");

//creazione di un tweet "hello world"
$status = $connection->post("statuses/update", ["status" => "adoro il cibo"]);

//recupero degli ultimi 5 tweets
$tweets = $connection->get("statuses/home_timeline", ["count" => 5, "eclude_replies" => true]);

//stampa dei tweets
echo "<pre>";
print_r($tweets);
echo "</pre>";


?>