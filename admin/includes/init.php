<?php 
ob_start(); // turn on output buffering

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "gallery_db");


// echo dirname(__FILE__) . '<br>';

// echo dirname(__DIR__) . '<br>';


require_once('functions.php');

// -> All classes in directory
 foreach(glob('classes/*.php') as $file) {
   if(file_exists($file)){
   	require_once($file);
   } else {
   	exit("The file name ${file} was not found");
   }
 }



$db = new Database;
// User::set_database($db);
DB_Object::set_database($db);

$session = new Session;
