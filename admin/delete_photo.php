
<?php include("includes/init.php"); ?>
<?php 
if(!$session->is_signed_in()) {redirect('login.php');}


// $id = $_POST['id'] ?? redirect('../photos.php');
$id = $_GET['id'] ?? redirect('photos.php');


$photo = Photo::find_by_id($id);

 if($photo) {
    $photo->delete_photo();
    redirect('photos.php');
} else {
    echo "No such users";
}