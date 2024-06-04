<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<title>Dental Clinic Sidebar</title>
<style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background: #f0f0f0;
}
.sidebar {
    background-color: #2c3e50;
    color: white;
    width: 200px;
    height: 100vh;
    position: fixed;
    overflow: auto;
}
.sidebar h2 {
    padding: 20px;
    margin: 0;
    background: #1abc9c;
    text-align: center;
}
.sidebar ul {
    list-style-type: none;
    padding: 0;
}
.sidebar ul li {
    padding: 18px;
    border-bottom: 1px solid #333;
}
.sidebar ul li:hover {
    background: #16a085;
    cursor: pointer;
}
.sidebar ul li i {
    margin-right: 10px;
}
.content {
    margin-left: 220px;
    padding: 20px;
    background: #f0f0f0;
}

.button-container {
    margin-top: 20px;
    text-align: left;
    padding-left: 40px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    background-color: #3498db;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    font-size: 16px;
    width: 200px;
    height: 50px;
    padding-top: 40px;
}

.btn:hover {
    background-color: #2980b9;
    cursor: pointer;
}

/* Added styles for the icons */
.btn i {
    margin-right: 10px;
}
</style>
</head>
<body>

<div class="sidebar">
    <h2>Dental Clinic</h2>
    <ul>
        <li><a href="dashboard.php" style="color: white; text-decoration: none;"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="Createuser.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Create User</a></li>
        <li><a href="adminservices.php" style="color: white; text-decoration: none;"><i class="fa fa-briefcase"></i> Services</a></li>
        <li><a href="adminsalesreports.php" style="color: white; text-decoration: none;"><i class="fa fa-chart-line"></i> Sales-Reports</a></li>
        <li><a href="ad_onlineapp.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
        <li><a href="?logout=true" style="color: white; text-decoration: none;"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>
<div class="content">
    <h1>Create User Account</h1>
    <div class="button-container">
        <a href="createstaff.php" class="btn"><i class="fas fa-users"></i> Create Staff Account</a>
        <a href="createdoc.php" class="btn"><i class="fas fa-user-md"></i> Create Doctors Account</a>
        <a href="createadm.php" class="btn"><i class="fas fa-user-shield"></i> Create Admin Account</a>
    </div>
</div>

<?php
// Start or resume the session
session_start();

// Check if the "logout" parameter is set in the URL
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    // Destroy the session data (log the user out)
    session_destroy();

    // Redirect to doctorlog.php
    header("Location: doctorlog.php");
    exit();
}
?>

</body>
</html>
