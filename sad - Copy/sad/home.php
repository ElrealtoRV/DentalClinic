<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
     body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header styling */
        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 10px 0;
            text-align: center;
        }

        /* Navigation styling */
        nav {
            display: flex;
            justify-content: center;
            padding-top: 10px;
        }

        nav a {
            color: #ecf0f1;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #3498db;
        }
  </style>

  
</head>
<body>

  <header>
  <h1>21 DENTAL CLINIC</h1>
    <nav>
        <a href="home.php">Home</a>
        <a href="appointment.php">Appointment</a>
        <a href="viewapp.php">View Appointment</a>
        <a href="Contactus.php">Contact Us</a>
        <a href="Clogout.php" >Logouts</a>

        </nav>
  </header>

</body>
</html>
