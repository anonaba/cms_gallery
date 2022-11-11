 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <?php 
                        // $user_found = User::find_user_by_id(1);
                        // echo $user_found->id;
                        //     echo '<pre>';
                        //  var_dump($user_found);
                        // echo '</pre>';
 
                        // $user = User::find_user_by_id(10);
                        // $user->username = "spidy";
                        // $user->save();
                        $photo = Photo::find_by_id(8);
                        echo $photo;

                        // if(isset($user->id)) {
                        //     $user->delete();
                        //     echo 'Deleted';
                        // } else {
                        //     echo "No such users";
                        // }
                            // $user = User::find_user_by_id(19);

                            // $user->username = "jay";
                            // $user->save();

                        // $users = User::find_all();
                        // foreach($users as $user ) {
                        //     echo $user->username.'<br>';
                        // }

                        // $user = User::find_by_id(2);
                        // echo $user->username.'<br>';
                        // foreach($users as $user) {
                        //     echo $user->username.'<br>';
                        // }

                        // $comma_separated =implode("`,`",array_keys($user->properties()));
                        // $comma_separated = "`".$comma_separated."`";
                        // echo $comma_separated;
                        // $user = User::find_user_by_id(20);
                        // $user = new User;
                        // $user->username = "eve";
                        // $user->password = "5657547";
                        // $user->first_name = "Eve";
                        // $user->last_name = "Day";
                        // echo $user->save();

                        //   $photos = Photo::find_all();
                        //     foreach($photos as $photo ) {
                        //     echo $photo->filename.'<br>';
                        // }

                        //  $photo = new Photo;
                        // $photo->title = "dove profile";
                        // $photo->description = "Donec tincidunt augue et ullamcorper mattis. Fusce nec mauris ut urna rhoncus tristique. Nam vel leo pulvinar, venenatis sapien at, eleifend nisi.";
                        // $photo->filename = "dove.jpg";
                        // $photo->type = "image";
                        // $photo->size = "446464";
                        // echo $photo->save();



                    

   ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->