<?php include("includes/header.php"); ?>
<?php 
if(!$session->is_signed_in()) {redirect('login.php');}
$comments = Comment::find_all();
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
                                       <th>Author</th>                                     
                                       <th>Comment</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    <?php foreach($comments as $comment): ?>  
                                        <tr>
                                            <td><?= $comment->id; ?></td>                                                                                      
                                            <td>
                                                <?= $comment->author; ?>
                                                <div class="actions_link">
                                                        <form method="post" action="delete_comment.php" style="display: inline-block;">
                                                            <input type="hidden" name="id" value="<?php echo $comment->id ?>">
                                                            <button type="submit">Delete</button>
                                                        </form>
                                                        <!-- <a href="delete_comment.php?id=<?= $comment->id ?>">Delete</a> -->
                                                    </div>
                                                
                                            </td>
                                            <td><?= $comment->body; ?></td>
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