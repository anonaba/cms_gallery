<?php include("includes/header.php"); ?>
<?php 
if(!$session->is_signed_in()) {redirect('login.php');}
$users = User::find_all();
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
                           users
                            <small>Subheading</small>
                        </h1>
                        <a href="add_user.php" class="btn btn-primary">Add User</a>
                       <div class="col-md-12">
                           <table class="table table-hover">
                               <thead>
                                   <tr>
                                      <th>Id</th>
                                       <th>Photo</th>
                                       <th>Username</th>                                     
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    <?php foreach($users as $user): ?>  
                                        <tr>
                                            <td><?= $user->id; ?></td>
                                            <td>
                                                <img class="admin-user-thumbnail" src="<?= $user->user_profile_pic(); ?>" alt="">
                                            </td>                                            
                                            <td>
                                                <?= $user->username; ?>
                                                <div class="actions_link">
                                                       <!--  <form method="post" action="delete_user.php" style="display: inline-block;">
                                                            <input type="hidden" name="id" value="<?php echo $user->id ?>">
                                                            <button type="submit">Delete</button>
                                                        </form> -->
                                                        <a href="delete_user.php?id=<?= $user->id ?>">Delete</a>
                                                        <a href="edit_user.php?id=<?= $user->id ?>">Edit</a>
                                                    </div>
                                                
                                            </td>
                                            <td><?= $user->first_name; ?></td>             
                                            <td><?= $user->last_name; ?></td>
                                        </tr>
                                   <?php endforeach; ?>                                 
                               </tbody>
                           </table>
                       </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>