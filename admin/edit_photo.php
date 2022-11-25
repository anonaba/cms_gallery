<?php 
include("includes/header.php");
if(!$session->is_signed_in()) {redirect('login.php');}
?>

<?php

$id = $_GET['id'] ?? null;

 if(empty($id)) {
    redirect("photos.php");
 } else {
    $photo = Photo::find_by_id($id);
    if(is_post_request()) {
        if($photo) {
             $photo->title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
             $photo->caption = trim(filter_input(INPUT_POST, 'caption', FILTER_SANITIZE_STRING));
             $photo->alternate_text = trim(filter_input(INPUT_POST, 'alternate_text', FILTER_SANITIZE_STRING));
             $photo->description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

             $photo->save();
            }
 
//     $photo = new Photo;
//     $photo->title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
//     $photo->set_file($_FILES['file_upload']);
//     // $image = trim(filter_input(INPUT_POST, 'file_upload', FILTER_SANITIZE_STRING));




//     if($photo->save()) {
//         $message = "Photo uploaded succesfully";
//     } else {
//         $message = join("<br>", $photo->errors);
//     }
// } else {
//     $message = "";
// }

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
                           Edit Photo
                        </h1>
                         <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-8">
                           
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" value="<?= $photo->title; ?>">
                                </div>
                                <div class="form-group">
                                 <a class="thumbnail" href="#"><img src="<?= $photo->picture_path(); ?>" alt=""></a>
                                </div>
                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input type="text" name="caption" class="form-control" value="<?= $photo->caption; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="caption">Alternate Text</label>
                                    <input type="text" name="alternate_text" class="form-control" value="<?= $photo->alternate_text; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="caption">Description</label>
                                        <textarea class="form-control" name="description" id="mytextarea" cols="30" rows="10"><?= $photo->description; ?></textarea>

                                </div>                        
                        </div>
                        <div class="col-md-4">
                            <div class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span> </h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                            <span class="glyphicon glyphicon-calendar"></span> Uploaded on:
                                        </p>
                                        <p class="text">
                                            Photo Id:<span class="data photo_id_box">34</span>
                                        </p>
                                        <p class="text">
                                            Filename :<span class="data">image.jpg</span>
                                        </p>
                                        <p class="text">
                                            File Type:<span class="data">jpg</span>
                                        </p>
                                         <p class="text">
                                            File Size:<span class="data">325353</span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a href="delete_photo.php?id=<?= $photo->id; ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
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