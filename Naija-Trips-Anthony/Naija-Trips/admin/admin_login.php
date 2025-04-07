<?php
session_start();

// Check if the admin is already logged in
if (isset($_SESSION["admin_id"])) {
    header("Location: dashboard.php");
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
    <title>Admin Login</title>
</head>
<body>
    <div class="login-page" style="background-image: url(assets/images/white-bg.jpg);">
        <div class="login-from-wrap">
            <form class="login-from" method="post" action="admin_login_script.php">
                <h1 class="site-title">
                    <a href="#">
                        <img src="assets/images/naija-trips.png" alt="">
                    </a>
                </h1>

                <?php
                if (isset($_SESSION["error"])) {
                    echo '<div style="background-color: #f8d7da; padding: 10px; border: 1px solid #dc3545; color: #721c24; margin-bottom: 10px;">' . $_SESSION["error"] . '</div>';
                    unset($_SESSION["error"]);
                }
                ?>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="validate" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="validate" required>
                </div>
                <div class="form-group">
                    <button class="button-primary" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- *Scripts* -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/canvasjs.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/dashboard-custom.js"></script>
</body>
</html>
