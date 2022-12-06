<?php 
include("includes/header.php");
if(!$session->is_signed_in()) {redirect('login.php');}
?>

<?php
    $user = new User;
    if(is_post_request()) {
        if($user) {
             $user->username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
             $user->first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
             $user->last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
             $user->password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

             // saving image to the database
            $user->set_file($_FILES['user_image']);
             
                if($user->save_profile_pic_and_data()) {
                    $message = "New user created succesfully";
                } else {
                    $message = join("<br>", $user->errors);
                }
            } 
 } else {
    $message = "";
 }




?>


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Top Nav -->
           <?php include 'includes/top_nav.php' ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include 'includes/side_nav.php' ?>
            <!-- /.navbar-collapse -->

        </nav>

        <div id="page-wrapper">

          <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Add User
                        </h1>
                        <?php 
                        // echo "<pre>";
                        // var_dump($user);
                        // echo "</pre>";
                        echo $message;
                        ?>
                          <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-6 col-md-offset-3">

                                 <div class="form-group">                              
                                    <input type="file" name="user_image">
                                 </div>
                           
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="caption">Last name</label>
                                    <input type="text" name="last_name" class="form-control">
                                </div>   
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Add User</button>
                                </div>                     
                            </div>
                    </form>
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>