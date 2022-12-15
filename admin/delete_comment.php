<?php

include("includes/init.php");

if(!$session->is_signed_in()) redirect('login.php');


$id = $_POST['id'] ?? redirect('comments.php');

$comment = Comment::find_by_id($id);

if($comment) {
	$comment->delete();
	redirect('comments.php');
} else {
	redirect('comments.php');
}


