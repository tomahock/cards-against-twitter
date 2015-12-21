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

$db = new PDO( DSN );

$id = 1;

foreach(preg_split("/((\r?\n)|(\r\n?))/", $black) as $line){
   $sql = $db->prepare('INSERT INTO black(text) VALUE(?)');

   $sql->bindParam(1, $line);

   var_dump($sql->execute());
}

$id = 1;

foreach(preg_split("/((\r?\n)|(\r\n?))/", $white) as $line){
   $sql = $db->prepare('INSERT INTO black(text) VALUE(?)');

   $sql->bindParam(1, $line);

   $sql->execute();
}