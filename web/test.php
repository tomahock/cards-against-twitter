<?php
/**
 * Created by PhpStorm.
 * User: tomahock
 * Date: 21/12/15
 * Time: 20:48
 */

require_once '../src/bootstrap.php';

use TwitterAPIExchange;
$db = new PDO(DSN);

$sql = $db->prepare('SELECT * FROM black ORDER BY used ASC');
$sql->execute();
$black = $sql->fetchAll();


$sql = $db->prepare('SELECT * FROM white ORDER BY used ASC');
$sql->execute();
$white = $sql->fetchAll();

echo '<pre>';

$i = 0;
do{
   echo $white[$i]['text'] . PHP_EOL;
   echo $black[$i]['text'] . PHP_EOL;
   $str = str_replace('_', $white[$i]['text'], $black[$i]['text'] );
   echo $str;

   if(strlen($str) > 140){
      $i++;
   }
} while( strlen($str) > 140);

$blackUsed = (int)$black[$i]['used'] + 1;
$whiteUsed = (int)$white[$i]['used'] + 1;

$sql = $db->prepare('UPDATE black set used=? WHERE id=?');
$sql->bindParam(1, $blackUsed);
$sql->bindParam(2, $black[$i]['id']);
$sql->execute();

$sql = $db->prepare('UPDATE white set used=? WHERE id=?');
$sql->bindParam(1, $whiteUsed);
$sql->bindParam(2, $white[$i]['id']);
$sql->execute();

echo 'FINAL: ' . $str;
//print_r($result);


$settings = array(
   'oauth_access_token' => "4561202261-OxbZM6mNX90W3cJ7krBGJhj9logEDABozMXEJmg",
   'oauth_access_token_secret' => "YqsWCu4X0C5JN1TJv4PFN64hpDrUj9AruXcdDyAsKUR4c",
   'consumer_key' => "PH0uzRpiINyBSeHFVu91yFkIX",
   'consumer_secret' => "iF2PdqiIGXxDHKLnGq0rSQt4By8glZ1292JofjnJZbf60wcGGx"
);

$url = 'https://api.twitter.com/1.1/statuses/update.json';
$requestMethod = 'POST';

$postfields = array(
   'status' => $str,
);

$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
   ->setPostfields($postfields)
   ->performRequest();

