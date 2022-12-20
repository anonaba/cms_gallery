<?php 
ob_start(); // turn on output buffering

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "gallery");

// C:\xampp\htdocs\cms_gallery
// echo dirname(__FILE__) . '<br>';


// echo dirname(__DIR__) . '<br>';
// echo $_SERVER['SCRIPT_NAME'] . '<br>';
// echo $_SERVER['DOCUMENT_ROOT'] . '<br>';


// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';


// $gallery_end = strpos($_SERVER['SCRIPT_NAME'],"/");
// $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $gallery_end);


define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT']);
define('INCLUDES_PATH', SITE_ROOT."/admin/includes");







require_once('functions.php');

// -> All classes in directory
 // foreach(glob('classes/*.php') as $file) {
 //   if(file_exists($file)){
 //   	require_once($file);
 //   } else {
 //   	exit("The file name ${file} was not found");
 //   }
 // }


function my_auto_loader($classname) {
  $path = SITE_ROOT."/admin/classes/";
  $full_path = $path.$classname.".php";
  require_once($full_path);
}
spl_autoload_register("my_auto_loader");


$db = new Database;
// User::set_database($db);
DB_Object::set_database($db);

$session = new Session;




