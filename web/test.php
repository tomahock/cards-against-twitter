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

$sql = $db->prepare('SELECT * FROM black');
$sql->execute();
$result = $sql->fetchAll();


echo '<pre>';

print_r($result);