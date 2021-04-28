<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>The Kitchen</title>
        <!-- Bootstrap Styles-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FontAwesome Styles-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Morris Chart Styles-->

        <!-- Custom Styles-->
        <link href="assets/css/custom-styles.css" rel="stylesheet" />
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- TABLE STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>
    <body>
        <div id="wrapper">

            <nav class="navbar navbar-default top-navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="usersettings.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </nav>
            <!--/. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">

                        <li>
                            <a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                        </li>
                        <li>
                            <a  href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                        </li>
                        <li>
                            <a class="active-menu" href="history.php"><i class="fa fa-desktop"></i> History</a>
                        </li>
                         <li>
                            <a  href="profit.php"><i class="fa fa-desktop"></i> Analytics</a>
                        </li>
                        <li>
                            <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">
                                History<small> panel</small>
                            </h1>
                        </div>
                    </div> 
                    
                    
                    <?php
                    require 'credentials.php';

                   
                    $query = "SELECT * FROM `data table`";
                    $res = mysqli_query($conn,$query);
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                   
                                                    <th>National</th>
                                                    <th>Places</th>
                                                    <th>Phone Number</th>
                                                    <th>Table Type</th>
                                                    <th>Purpose</th>
                                                    <th>Meal</th>
                                                    <th>Time</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Menu</th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                while ($row = mysqli_fetch_array($res)) {

                                                    $id = $row["id"];

                                                    if ($id % 2 == 1) {
                                                        echo"<tr class='gradeC'>
                                                    <td>" . $row["id"] . "</td>
                                                    <td>" . $row["Title"] . "</td>
                                                    <td>" . $row["FName"] . "</td>
                                                    <td>" . $row["LName"] . "</td>
                                                    <td>" . $row["National"] . "</td>
                                                    <td>" . $row["Country"] . "</td>
                                                    <td>" . $row["Phone"] . "</td>
                                                    <td>" . $row["Tbltyp"] . "</td>
                                                    <td>" . $row["Purpose"] . "</td>
                                                    <td>" . $row["Meal"] . "</td>
                                                    <td>" . $row["time"] . "</td>
                                                    <td>" . $row["date"] . "</td>
                                                    <td>" . $row["status"] . "</td>
                                                    <td>" . $row["Menu"] . "</td>
                                                    
                                                   
                                                </tr>";
                                                    } else {
                                                        echo"<tr class='gradeU'>
                                                    <td>" . $row["id"] . "</td>
                                                    <td>" . $row["Title"] . "</td>
                                                    <td>" . $row["FName"] . "</td>
                                                    <td>" . $row["LName"] . "</td>
                                                    <td>" . $row["National"] . "</td>
                                                    <td>" . $row["Country"] . "</td>
                                                    <td>" . $row["Phone"] . "</td>
                                                    <td>" . $row["Tbltyp"] . "</td>
                                                    <td>" . $row["Purpose"] . "</td>
                                                    <td>" . $row["Meal"] . "</td>
                                                    <td>" . $row["time"] . "</td>
                                                    <td>" . $row["date"] . "</td>
                                                    <td>" . $row["status"] . "</td>
                                                    <td>" . $row["Menu"] . "</td>
                                                    
                                                       
                                                </tr>";
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                    <!-- /. ROW  -->

                </div>

            </div>


        </div>
        <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
        <!-- /. WRAPPER  -->
        <!-- JS Scripts-->
        <!-- jQuery Js -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- Bootstrap Js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Metis Menu Js -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- DATA TABLE SCRIPTS -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- Custom Js -->
        <script src="assets/js/custom-scripts.js"></script>


    </body>
</html>
