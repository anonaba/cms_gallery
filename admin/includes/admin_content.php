 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                               <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?= $session->count; ?></div>
                                                <div>New Views</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">              
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>

                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                               </div>                                
                            </div>
                                 <div class="col-lg-3 col-md-6">
                               <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-photo fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?= Photo::count_all(); ?></div>
                                                <div>Photos</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">Total Photos In Gallery</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>

                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                               </div>                                
                            </div>
                                 <div class="col-lg-3 col-md-6">
                               <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?= User::count_all(); ?></div>
                                                <div>Users</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">Total Users</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>

                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                               </div>                                
                            </div>
                                 <div class="col-lg-3 col-md-6">
                               <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-support fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?= Comment::count_all(); ?></div>
                                                <div>Comments</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">Total Comments</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                               </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->