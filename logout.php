<?php
session_start();

// Logout logic
session_unset();  // Unset all session variables
session_destroy();  // Destroy the session
header('Location: home-page.php');  // Redirect to the home page
exit();