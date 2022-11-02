<?php 
require_once 'config.php';
require_once 'database.php';
require_once 'user.php';



$db = new Database;
User::set_database($db);
