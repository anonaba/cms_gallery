 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <?php 
                        // $user_found = User::find_all_user_by_id(5);
                        // echo $user_found->id;
                        //     echo '<pre>';
                        //  var_dump($user);
                        // echo '</pre>';

                        // $user = User::find_user_by_id(4);
                        // $user->last_name = "Donovan";
                        // $user->update();

                        $user = User::find_user_by_id(6);

                        if($user) {
                            $user->delete();
                            echo 'Deleted';
                        } else {
                            echo "No such users";
                        }
                        


                        // $user = new User;
                        // $user->username = "mahabaratbu";
                        // $user->password = "546343";
                        // $user->first_name = "Dexter";
                        // $user->last_name = "Mahabaratbu";
                        // $user->create();

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