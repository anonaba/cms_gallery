 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <?php 
                        $users = User::find_all_users();

                        // foreach($users as $user) {
                        //     echo $user->username . '<br>';
                        // }
                        //      echo '<pre>';
                        //  var_dump($users);
                        // echo '</pre>';



                        // while ($row =  mysqli_fetch_assoc($result_set)) {
                        //     echo $row['username']. '<br>';
                        // }

                       
                       
                        // echo '<pre>';
                        //  var_dump($result_set);
                        // echo '</pre>';

                        $found_user = User::find_all_user_by_id(4);
                        echo '<pre>';
                         var_dump($found_user);
                        echo '</pre>';

                        echo $found_user->username;

                        // foreach($found_user as $user) {
                        //     echo $user->username . '<br>';
                        // }
                       

                        //     echo '<pre>';
                        //  var_dump($user);
                        // echo '</pre>';

                       

                        // echo $user->username;

                        // echo $user->username;
                       // echo '<pre>';
                       //   var_dump($result_set);
                       //  echo '</pre>';

        //                 $user = new User;

        //                 $user->id = $found_user['id'];
        // $user->username = $found_user['username'];
        // $user->password = $found_user['password'];
        // $user->first_name = $found_user['first_name'];
        // $user->last_name = $found_user['last_name'];
        // echo $user->username;


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