<?php include("includes/header.php"); ?>
<?php
    $photos = Photo::find_all();
?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <div class="thumbnail row">
                    
                
                    <?php foreach($photos as $photo) : ?>
                        <div class="col-xs-6 col-md-3">
                            <a class="thumbnail" href="photo.php?id=<?= $photo->id; ?>">
                                <img src="admin/<?= $photo->picture_path(); ?>" alt="">
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4"> -->

            
                 <?php //include("includes/sidebar.php"); ?>



            <!-- </div> -->
        <!-- /.row -->
        <?php include("includes/footer.php"); ?>
