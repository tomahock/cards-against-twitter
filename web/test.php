<?php
/**
 * Created by PhpStorm.
 * User: tomahock
 * Date: 21/12/15
 * Time: 20:48
 */

require_once '../src/bootstrap.php';

$black = file_get_contents('../src/Assets/black.txt');
$white = file_get_contents('../src/Assets/white.txt');

$db = new PDO(DSN);

$sql = $db->prepare('SELECT * FROM black ORDER BY used DESC');
$sql->execute();
$black = $sql->fetchAll();


$sql = $db->prepare('SELECT * FROM white ORDER BY used DESC');
$sql->execute();
$black = $sql->fetchAll();

echo '<pre>';

$i = 0;
do{
   $str = str_replace('_', $white[$i]['text'], $black[$i]['text'] );
   echo $str;
   $i++;
} while( strlen($str) > 160);


echo 'FINAL: ' . $str;
//print_r($result);

