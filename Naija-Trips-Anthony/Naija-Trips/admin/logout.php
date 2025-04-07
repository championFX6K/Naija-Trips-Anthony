<?php
session_start();
session_unset();  // Unset all of the session variables.
session_destroy();  // Destroy the session.

header("Location: admin_login.php");  // Redirect to the home page after logout.
exit();
?>
