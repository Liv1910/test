<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:../login.php");
    exit; // Ensure to exit after header redirect
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Salad Atelier Int.</title>
    <link rel="icon" href="../images/title_logo.png" type="image/icon type">
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style>
        body::-webkit-scrollbar {
            display: none;
        }
        @media (min-width:768px) and (max-width:986px) {
            .panel.panel-default {
                width: 647px;
            }
            .navbar.navbar-default.top-navbar {
                width: 980px;
            }
            #page-wrapper {
                width: 720px;
            }
        }
        .highlight {
            background-color: #ffc2c2;
        }
    </style>
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
                <a class="navbar-brand" href="order.php"><img src="../images/header_logo.png" width="150"></a>
            </div>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="inventory.php"><i class="fa fa-archive"></i> Inventory</a>
                    </li>
                    <li>
                        <a href="order.php"><i class="fa fa-truck"></i> Orders</a>
                    </li>
                    <li>
                        <a href="customer.php"><i class="fa fa-users"></i> Customer Database </a>
                    </li>
                    <li>
                        <a href="analytics.php"><i class="fa fa-bar-chart-o"></i> Analytics</a>
                    </li>
                    <li>
                        <a class="active-menu" href="feedbacks.php"><i class="fa fa-comments"></i> Feedbacks</a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-user-circle"></i> Profile</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">FEEDBACKS</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Loyalty Number</th>
                                                <th>Rating</th>
                                                <th>Message</th>
                                                <th>Posted Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include('db.php');
                                            $filtervalues = $_SESSION["user"];
                                            $sql = "SELECT * FROM feedback ";
                                            $re = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($re)) {
                                                $name = $row['FullName'];
                                                $loyaltynumber = $row['LoyaltyNumber'];
                                                $rating = $row['Rating'];
                                                $message = $row['Message'];
                                                $submission = $row['Submission'];
                                                $id = $row['FeedbackID'];

                                                echo "<tr class='gradeC'>
                                                        <td>" . $name . "</td>
                                                        <td>" . $loyaltynumber . "</td>
                                                        <td>" . $rating . "/5</td>
                                                        <td>" . $message . "</td>
                                                        <td>" . $submission . "</td>
                                                    </tr>";
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
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- Modal -->
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

