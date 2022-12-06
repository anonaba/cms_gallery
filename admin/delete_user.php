
<?php include("includes/init.php"); ?>
<?php 
if(!$session->is_signed_in()) {redirect('login.php');}


// $id = $_POST['id'] ?? redirect('../photos.php');
$id = $_GET['id'] ?? redirect('users.php');


$user = User::find_by_id($id);


 if($user) {
    $user->delete();
    redirect('users.php');
} else {
    echo "No such users";
}