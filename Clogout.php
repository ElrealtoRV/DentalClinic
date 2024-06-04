<?php
session_start(); // Start the session
session_destroy(); // Start the session

// Unset all of the session variables
$_SESSION = array();



// Redirect to the home page or any other page after logout
header("Location: index.php");
exit();
?>
it();
?>
