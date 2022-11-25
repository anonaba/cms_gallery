<?php include("includes/header.php"); ?>
<?php 
if(!$session->is_signed_in()) {redirect('login.php');}
$photos = Photo::find_all();
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
                           Photos
                            <small>Subheading</small>
                        </h1>
                       <div class="col-md-12">
                           <table class="table table-hover">
                               <thead>
                                   <tr>
                                      <th>Id</th>
                                       <th>Photos</th>
                                       <th>Title</th>
                                     
                                       <th>File Name</th>
                                       <th>Size</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    <?php foreach($photos as $photo): ?>  
                                        <tr>
                                            <td>
                                                <img src="<?= $photo->picture_path(); ?>" alt="<?= $photo->title; ?>">
                                                    <div class="pictures_link">
                                                       <!--  <form method="post" action="delete_photo.php" style="display: inline-block;">
                                                            <input type="hidden" name="id" value="<?php echo $photo->id ?>">
                                                            <button type="submit">Delete</button>
                                                        </form> -->
                                                        <a href="delete_photo.php?id=<?= $photo->id ?>">Delete</a>
                                                        <a href="edit_photo.php?id=<?= $photo->id ?>">Edit</a>
                                                        <a href="">View</a>
                                                    </div>
                                            </td>
                                            <td><?= $photo->id; ?></td>
                                            <td><?= $photo->filename; ?></td>
                                            <td><?= $photo->title; ?></td>             
                                            <td><?= $photo->size; ?></td>
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