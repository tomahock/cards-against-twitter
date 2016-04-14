<?php
/**
 * Created by PhpStorm.
 * User: tomahock
 * Date: 21/12/15
 * Time: 20:58.
 */
require_once __DIR__.'/../bootstrap.php';

$db = new PDO(DSN);

$sql = $db->prepare('SELECT * FROM black ORDER BY used ASC');
$sql->execute();
$black = $sql->fetchAll();

$sql = $db->prepare('SELECT * FROM white ORDER BY used ASC');
$sql->execute();
$white = $sql->fetchAll();

$i = 0;
do {
    $str = str_replace('_', $white[$i]['text'], $black[$i]['text']);
    if (strlen($str) > 140) {
        $i++;
    }
} while (strlen($str) > 140);

$blackUsed = (int) $black[$i]['used'] + 1;
$whiteUsed = (int) $white[$i]['used'] + 1;

$sql = $db->prepare('UPDATE black set used=? WHERE id=?');
$sql->bindParam(1, $blackUsed);
$sql->bindParam(2, $black[$i]['id']);
$sql->execute();

$sql = $db->prepare('UPDATE white set used=? WHERE id=?');
$sql->bindParam(1, $whiteUsed);
$sql->bindParam(2, $white[$i]['id']);
$sql->execute();

$settings = [
   'oauth_access_token'        => TWITTER_OAUTH_ACCESS_TOKEN,
   'oauth_access_token_secret' => TWITTER_OAUTH_ACCESS_TOKEN_SECRET,
   'consumer_key'              => TWITTER_OAUTH_CONSUMER_KEY,
   'consumer_secret'           => TWITTER_OAUTH_CONSUMER_SECRET,
];

$url = 'https://api.twitter.com/1.1/statuses/update.json';
$requestMethod = 'POST';

$postfields = [
   'status' => $str,
];

$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
   ->setPostfields($postfields)
   ->performRequest();
