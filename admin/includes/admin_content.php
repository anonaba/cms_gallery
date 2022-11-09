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
                        // $user = User::find_user_by_id(14);

                        // if(isset($user->id)) {
                        //     $user->delete();
                        //     echo 'Deleted';
                        // } else {
                        //     echo "No such users";
                        // }
                            // $user = User::find_user_by_id(19);

                            // $user->username = "jay";
                            // $user->save();

                        $user = new User;
                        // echo '<pre>';
                        //  var_dump($user->properties());
                        // echo '</pre>';

                        // $comma_separated =implode("`,`",array_keys($user->properties()));
                        // $comma_separated = "`".$comma_separated."`";
                        // echo $comma_separated;
                        // $user = User::find_user_by_id(20);
                        
                        $user->username = "today";
                        $user->password = "345643";
                        $user->first_name = "Today";
                        $user->last_name = "Really";
 echo $user->create();
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