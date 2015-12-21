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


foreach(preg_split("/((\r?\n)|(\r\n?))/", $black) as $line){
   print_r($line);
   $dbh = new PDO('pgsql:user=exampleuser dbname=exampledb password=examplepass');

}