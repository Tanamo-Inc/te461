       <?php $adminDetails=$ceng->getAdminDetails($_SESSION['cengadmin']); ?>

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #3a3a3a;">
            <img src="../../images/logo.png" style="width: 50px; height: 50px; background-color: #3a3a3a; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;" />
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">MENU</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span style="color: #fff; font-weight: bold;">TE 461</span></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" style="color: #fff; background-color: #3a3a3a;">

                <li class="dropdown" style="background-color: #3a3a3a;">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff;background-color: #3a3a3a;">
                        <i class="fa fa-envelope fa-fw bc" style="color: #fff;"></i>  <i class="fa fa-caret-down bc" style="color: #fff;"></i>
                    </a>
                    <?php 
                        $ceng->getMessages();
                    ?>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff;background-color: #3a3a3a;">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff;background-color: #3a3a3a;">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <?php 
                        $ceng->systemAlerts();
                    ?>
                                        <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff;background-color: #3a3a3a;">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="color: #fff;background-color: #3a3a3a;">
                        <li><a href="?profile" style="background-color: #fff;"><i class="fa fa-user fa-fw"></i> Edit Profile Account</a>
                        </li>
                         <li class="divider" style="background-color: #fff;"></li>
                        <li><a href="?chngpwd" style="background-color: #fff;"><i class="glyphicon glyphicon-lock"></i> Change Password</a>
                        </li>
                        <li class="divider" style="background-color: #fff;"></li>
                        <li><a href="?logout" style="background-color: #fff;"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="background-color: #3a3a3a;">
                <div class="row">
                    <center><img src="<?php 
                        if($adminDetails[4] == null || $adminDetails[4]==""){
                            echo "../images/dp.png";
                        }else{
                            echo "dp/".$adminDetails[4];
                        }
                    ?>" class="img-circle" style="width: 70px; height: 70px;" /></center>
                </div>

                <div class="row">
                <center><span style="color: #fff;">
                    <?php 
                       echo $adminDetails[1];
                    ?>
                </span></center>
                </div>
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="divider">
                        <br/>
                        </li>
                        <li>
                        <a href="?dashboard" style="color: #fff;background-color: #3a3a3a;"><i class="fa fa-dashboard fa-fw" style="color: #fff;"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="bc" style="color: #fff;background-color: #3a3a3a;"><i class="glyphicon glyphicon-th" style="color: #fff;"></i> TE 461<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" style="color: #fff;background-color: #3a3a3a;">
                                <li id="studentList"><a href="?studentList" style="color: #fff;background-color: #3a3a3a;"><span class="glyphicon glyphicon-education"></span> Students List</a></li>
                                <li><a href="?studentReports" style="color: #fff;background-color: #3a3a3a;"><span class="glyphicon glyphicon-book"></span> Assignment Submission</a></li>
                                <li><a href="?statistics" style="color: #fff;background-color: #3a3a3a;"><span class="glyphicon glyphicon-stats"></span> Statistics</a></li>
                            </ul>
                        </li>
                        <?php 
                            if($_SESSION['cengadmin']=='jayluxferro'){
                                echo "<li>
                                        <a href='?coordinators' style='color: #fff; background-color: #3a3a3a;'><span class='glyphicon glyphicon-user'></span> Coordinators</a>
                                    </li>";
                            }
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
