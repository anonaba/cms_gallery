<?php 
include("includes/header.php");
if(!$session->is_signed_in()) {redirect('login.php');}
?>

<?php 


if(is_post_request()) {
    $photo = new Photo;
  if( $photo ) {
     $photo->title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
     $photo->set_file($_FILES['file_upload']);
    // $image = trim(filter_input(INPUT_POST, 'file_upload', FILTER_SANITIZE_STRING));    
 
    if($photo->save()) {
        $message = "Photo uploaded succesfully";
    } else {
        $message = join("<br>", $photo->errors);

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
                           Upload
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-6">
                             <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file_upload" class="form-control-file">
                                </div>
                                <button type="submit">Submit</button>
                                <?= $message; ?>
                             </form>
                        </div>
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>