<?php
/**
 * Created by PhpStorm.
 * User: tomahock
 * Date: 21/12/15
 * Time: 20:48
 */

require_once '../vendor/autoload.php';

$black = file_get_contents('../src/Assets/black.txt');
$white = file_get_contents('../src/Assets/white.txt');

$db = new PDO($_SERVER['DATABASE_URL']);

echo '<pre>';

print_r($db->exec('SELECT * FROM black'));