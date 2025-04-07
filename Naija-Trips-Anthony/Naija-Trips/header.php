<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Array of pages that should not be accessible when logged in
$restricted_pages = ['index.php', 'about.php', 'destination.php', 'contact.php', 'login.php', 'register.php'];

// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);

// Check if the current page is in the restricted pages array and if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && in_array($current_page, $restricted_pages)) {
    // Redirect to the dashboard or any other page for logged-in users
    header("Location: booking.php");
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
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/fontawesome/css/all.min.css">
    <!-- jquery-ui css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/jquery-ui/jquery-ui.min.css">
    <!-- modal video css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/modal-video/modal-video.min.css">
    <!-- light box css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/lightbox/dist/css/lightbox.min.css">
    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/slick/slick-theme.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Naija Trips</title>
</head>

<body class="home">
    <!-- <div id="siteLoader" class="site-loader">
        <div class="preloader-content">
            <img src="assets/images/loader1.gif" alt="">
        </div>
    </div> -->
    <div id="page" class="full-page">
        <header id="masthead" class="site-header header-primary">
            <!-- header html start -->
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="header-contact-info">
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                            <div class="header-search-icon">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-header">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="site-identity">
                        <h1 class="site-title">
                            <a href="index.php">
                                <img class="white-logo" src="assets/images/naija-trips.png" alt="logo">
                                <img class="black-logo" src="assets/images/naija-trips.png" alt="logo">
                            </a>
                        </h1>
                    </div>
                    <div class="main-navigation d-none d-lg-block">
                        <nav id="navigation" class="navigation">
                            <ul>
                                <?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                                    echo '<li class="menu-item"><a href="udashboard.php">Dashboard</a></li>';
                                    
                                    echo '<li class="menu-item"><a href="logout.php">Logout</a></li>';
                                } else {
                                    echo '<li class="menu-item"><a href="index.php">Home</a></li>';
                                    echo '<li class="menu-item"><a href="about.php">About</a></li>';
                                    echo '<li class="menu-item"><a href="destination.php">Destination</a></li>';
                                    echo '<li class="menu-item"><a href="contact.php">Contact Us</a></li>';
                                    echo '<li class="menu-item"><a href="login.php">Login</a></li>';
                                    echo '<li class="menu-item"><a href="register.php">Register</a></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-btn">
                        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                            <!-- User is logged in, hide the button -->
                            <!-- You can add a message or redirect here if needed -->
                            <p>Welcome, <?php echo $_SESSION['user_name']; ?></p>
                        <?php else: ?>
                            <!-- User is not logged in, show the button -->
                            <a href="redirect_to_login.php" class="button-primary" id="bookNowBtn">Book now</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-container"></div>
        </header>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
