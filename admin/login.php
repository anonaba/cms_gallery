<?php
require_once 'includes/header.php';




if($session->is_signed_in()) {
	redirect('index.php');
}
 // echo '<pre>';
 // var_dump($_SERVER);
 // echo '</pre>';

 if(is_post_request()) {

 	$username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    // verify user
    $user_found = User::verify_user($username, $password);

    if($user_found) {
        $session->login($user_found);
        redirect('index.php');
    } else {
        $the_message = "Your password or username are incorrect";
    }

 } else {
    $the_message = "";
    $username = "";
    $password = "";
 }




?>

<div class="col-md-4 col-md-offset-3">
   <h4 class="bg-danger"><?php echo $the_message; ?></h4> 
    <form method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo h($username); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo h($password); ?>">
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>