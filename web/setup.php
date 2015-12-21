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

$db = new PDO( DSN );

$id = 1;

foreach(preg_split("/((\r?\n)|(\r\n?))/", $black) as $line){
   $db->prepare('INSERT INTO black(id, text, used) VALUE(?,?,?)');

   $db->exec(array(
      $id,
      $line,
      0
   ));

   $id++;
}

$id = 1;

foreach(preg_split("/((\r?\n)|(\r\n?))/", $white) as $line){
   $db->prepare('INSERT INTO black(id, text, used) VALUE(?,?,?)');

   $db->exec(array(
      $id,
      $line,
      0
   ));

   $id++;
}