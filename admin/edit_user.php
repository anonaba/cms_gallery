<?php 
include("includes/header.php");
if(!$session->is_signed_in()) {redirect('login.php');}
?>

<?php
    
    $id = $_GET['id'] ?? redirect('users.php');

    $user = User::find_by_id($id);
    if(is_post_request()) {
        if($user) {
             $user->username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
             $user->first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
             $user->last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
             $user->password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

                 // saving image to the database
                // $user->set_file($_FILES['user_image']);
                if(empty($_FILES['user_image']['name'])) {
                    $user->save();
                    redirect('users.php'); 
                } else {
                    $user->set_file($_FILES['user_image']);
                    $user->save_profile_pic_and_data();
                    redirect('users.php'); 
                }

            } 
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
                           Edit User
                        </h1>

                        <div class="col-md-6">
                            <img class="img-responsive" src="<?= $user->user_profile_pic(); ?>" alt="">
                        </div>

                          <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">

                                 <div class="form-group">                              
                                    <input type="file" name="user_image">
                                 </div>
                           
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= $user->username;?>">
                                </div>
                
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="<?= $user->first_name;?>">
                                </div>
                                <div class="form-group">
                                    <label for="caption">Last name</label>
                                    <input type="text" name="last_name" class="form-control" value="<?= $user->last_name;?>">
                                </div>   
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?= $user->password;?>">
                                </div>
                                 <a class="btn btn-danger pull-left" href="delete_user.php?id=<?= $user->id ?>">Delete</a> 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Update User</button>
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