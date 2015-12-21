<?php
/**
 * Created by PhpStorm.
 * User: tomahock
 * Date: 21/12/15
 * Time: 20:52
 */

require_once '../vendor/autoload.php';

define('DATABASE_NAME', $_SERVER['DATABASE_NAME']);
define('DATABASE_USER', $_SERVER['DATABASE_USER']);
define('DATABASE_PW', $_SERVER['DATABASE_PW']);
define('DATABASE_HOST', $_SERVER['DATABASE_HOST']);
define('DATABASE_PORT', $_SERVER['DATABASE_PORT']);

$dsn = "pgsql:"
   . "host=". DATABASE_HOST .";"
   . "dbname=". DATABASE_NAME .";"
   . "user=". DATABASE_USER .";"
   . "port=". DATABASE_PORT .";"
   . "sslmode=require;"
   . "password=" . DATABASE_PW;

define('DSN' , $dsn);

var_dump(DSN);