<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Destroy the session data
    session_destroy();
    // Redirect the user to a login page or any other appropriate page
    header("Location: login.php");
    exit();
} else {
    // If the user is not logged in, you can display a message or redirect to the login page
    echo "You are not currently logged in.";
}
?>
