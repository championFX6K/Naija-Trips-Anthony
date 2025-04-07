<?php
session_start();

// Check if the admin is already logged in
if (isset($_SESSION["user_id"])) {
    header("Location: booking.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
   
<!-- Mirrored from demo.bosathemes.com/html/travele/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Jun 2024 11:13:57 GMT -->
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
      <link rel="stylesheet" type="text/css" href="admin/style.css">
      <title>Travele | Travel & Tour HTML5 template </title>
</head>
<body>
    
    <div class="login-page" style="background-image: url(admin/assets/images/white-bg.jpg);">
        <div class="login-from-wrap">
        <br><br><br><br><br><br><br><br><br>
            <form class="login-from" method="post" action="register-script.php">
                <h1 class="site-title">
                    <a href="#">
                        <img src="admin/assets/images/naija-trips.png" alt="">
                    </a>
                </h1>
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
            <br>
                <div class="form-group">
                    <label for="first_name1"> Name</label>
                    <input type="text" name="uname" class="validate">
                </div>
                <div class="form-group">
                    <label for="last_name">Email</label>
                    <input id="last_name" name="email" type="email" required >
                </div>
                <div class="form-group">
                    <label for="last_name">Phone Number</label>
                    <input id="last_name" name="phone" type="text" class="validate">
                </div>
                <div class="form-group">
                    <label for="last_name">Password</label>
                    <input id="last_name" name="password" type="password" class="validate">
                </div>
                <div class="form-group">
                    <button class="button-primary" type="submit" name="register" >Register</button>
                </div>
            </form>
            <a href="login.php" class="for-pass">Already have Account?</a>
        </div>
    </div>

    <!-- *Scripts* -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../../cdn.jsdelivr.net/npm/popper.js%401.16.0/dist/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/canvasjs.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/dashboard-custom.js"></script>
<!-- <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'89bdb5532b13971b',t:'MTcxOTc0NTgxMC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../cdn-cgi/challenge-platform/h/g/scripts/jsd/d2a97f6b6ec9/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"89bdb5532b13971b","version":"2024.4.1","r":1,"token":"2aaac9563824454ba89abdea91540009","b":1}' crossorigin="anonymous"></script> -->
</body>

<!-- Mirrored from demo.bosathemes.com/html/travele/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Jun 2024 11:13:59 GMT -->
</html>