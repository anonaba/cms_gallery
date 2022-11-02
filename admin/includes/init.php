<?php 


require_once 'config.php';

// -> All classes in directory
 foreach(glob('classes/*.php') as $file) {
   if(file_exists($file)){
   	require_once($file);
   } else {
   	exit("The file name ${file} was not found");
   }
 }



$db = new Database;
User::set_database($db);
