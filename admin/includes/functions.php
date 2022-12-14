<?php 


function redirect($location) {
	header("Location: ${location}");
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}


function h($string="") {
  return htmlspecialchars($string, ENT_QUOTES);
}


function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}


