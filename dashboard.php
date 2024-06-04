<?php
// Include your database connection file (db.php)
include('sad/db.php');

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: #F8F8F8;
        }
        .sidebar {
            background-color: #2C3E50;
            color: white;
            width: 200px;
            height: 100vh;
            position: fixed;
            overflow: auto;
        }
        .sidebar h2 {
            padding: 20px;
            margin: 0;
            background: #1ABC9C;
            text-align: center;
            font-weight: 700;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 18px;
            border-bottom: 1px solid #333;
            transition: background-color 0.3s ease;
        }
        .sidebar ul li:hover {
            background: #16A085;
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
            justify-content: center;
            gap: 20px;
        }
        .total-card {
            background-color: #1ABC9C;
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 200px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            flex: 0 0 auto;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 400px;
        }
        .total-card h3 {
            font-size: 24px;
            margin-bottom: 30px;
        }
        .total-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .totals-container {
                margin-left: 0;
            }
        }
    </style>
    <title>Dental Clinic Dashboard</title>
</head>
<body>

<?php
include 'sidebar.php';
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