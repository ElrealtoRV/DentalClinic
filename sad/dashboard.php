<?php
// Include your database connection file (db.php)
include('db.php');

// Function to get the total count of records in a table
function getTotalCount($table) {
    global $conn;
    $sql = "SELECT COUNT(*) as count FROM $table";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}

// Get total counts
$totalStaff = getTotalCount('staff');
$totalServices = getTotalCount('services');
$totalPatients = getTotalCount('patients');
$totalDoctors = getTotalCount('doctor');
$totalUsers = getTotalCount('user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        .totals-container {
            margin-left: 220px;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .total-card {
            background-color: #3498db;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            flex-basis: calc(33.33% - 20px);
        }
        .total-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .total-card:hover {
            transform: scale(1.05); /* Increase the size on hover */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Add a shadow on hover */
        }
    </style>
    <title>Dental Clinic Sidebar</title>
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

<!-- Display the total counts with an enhanced design -->
<div class="totals-container">
    <div class="total-card">
        <h3><i class="fas fa-users"></i> Total Staff</h3>
        <p><?php echo $totalStaff; ?></p>
    </div>
    <div class="total-card">
        <h3><i class="fas fa-briefcase"></i> Total Services</h3>
        <p><?php echo $totalServices; ?></p>
    </div>
    <div class="total-card">
        <h3><i class="fas fa-hospital-user"></i> Total Patients</h3>
        <p><?php echo $totalPatients; ?></p>
    </div>
    <div class="total-card">
        <h3><i class="fas fa-user-md"></i> Total Doctors</h3>
        <p><?php echo $totalDoctors; ?></p>
    </div>
    <div class="total-card">
        <h3><i class="fas fa-user"></i> Total Users</h3>
        <p><?php echo $totalUsers; ?></p>
    </div>
</div>

</body>
</html>
