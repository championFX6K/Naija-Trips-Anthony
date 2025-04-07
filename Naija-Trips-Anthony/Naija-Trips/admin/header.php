<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    $_SESSION['error'] = "You must log in first to view this page.";
    header("Location: admin_login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Naija Trips</title>
</head>
<body>
    <!-- start Container Wrapper -->
    <div id="container-wrapper">
        <!-- Dashboard -->
        <div id="dashboard" class="dashboard-container">
            <div class="dashboard-header sticky-header">
                <div class="content-left logo-section pull-left">
                    <h1><a href="#"><img src="assets/images/rsz_naija-trips.png" alt=""></a></h1>
                </div>
                <div class="header-content-right pull-right">
                    <div class="search-field">
                        <form>
                            <div class="form-group">
                                <!-- <input type="text" class="form-control" id="search" placeholder="Search Now">
                                <a href="#"><span class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></span></a> -->
                            </div>
                        </form>
                    </div>
                    <br>
                    <?php
                    if (isset($_SESSION["success"])) {
                        echo '<div style="background-color: #c3e6cb; padding: 10px; border: 1px solid #28a745; color: #155724; margin-bottom: 10px;">' . $_SESSION["success"] . '</div>';
                        unset($_SESSION["success"]);
                    }

                    if (isset($_SESSION["error"])) {
                        echo '<div style="background-color: #f8d7da; padding: 10px; border: 1px solid #dc3545; color: #721c24; margin-bottom: 10px;">' . $_SESSION["error"] . '</div>';
                        unset($_SESSION["error"]);
                    }
                    ?>
                    <br><br>
                </div>
            </div>
            <div class="dashboard-navigation">
                <!-- Responsive Navigation Trigger -->
                <div id="dashboard-Navigation" class="slick-nav"></div>
                <div id="navigation" class="navigation-container">
                    <ul>
                        <li class="active-menu"><a href="dashboard.php"><i class="far fa-chart-bar"></i> Dashboard</a></li>
                        <li><a><i class="fas fa-user"></i>Users</a>
                            <ul>
                                <li>
                                    <a href="user.php">Registered Users</a>
                                </li>
                                <li>
                                    <a href="new-admin.php">Add Admin</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="add-destination.php"><i class="fas fa-umbrella-beach"></i>Add Destination</a></li>
                        <li><a href="addTourGuide.php"><i class="fas fa-umbrella-beach"></i>Add Tour Guide</a></li>
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
