<?php
// Start session and check if the user is not logged in, redirect to login page
session_start();


include("sad/db.php"); // Include your database connection file

// Query to retrieve pending appointments
$sql = "SELECT * FROM appointments WHERE status = 'Pending'";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


<title>Dental Clinic Doctor</title>
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
    border-bottom:wpx solid #333;
  }
  .sidebar ul li:hover {
    background: #16a085;
    cursor: pointer;
  }
  .sidebar ul li i {
    margin-right: 10px;
  }
  .content {
            margin-left: 200px; /* Adjusted to accommodate the sidebar */
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
</style>
</head>
<body>
<div class="sidebar">
    <h2>Dental Clinic Doctor</h2>
  
    <ul>
        <li><a href="docpatient.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i>Your Patient</a></li>
        <li><a href="Supplies.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Supplies</a></li>
        <li><a href="addprescription.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Add Prescription</a></li>
        <li><a href="doconlineapp.php" style="color: 16a085; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
        <li><a href="logout.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Logout</a></li>
    </ul>
</div>

<div class="content">
<h2 style="margin-left:500px; color: green;">Pending Appointments</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Service</th>
            <th>Doctor</th>
            <th>Date and Time</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["contact"] . "</td>";
        echo "<td>" . $row["services"] . "</td>";
        echo "<td>" . $row["doctor"] . "</td>";
        echo "<td>" . $row["datetime"] . "</td>";
        echo "<td><a href='ol-to-patient.php?id=" . $row["id"] . "'>Approve</a> | <a href='decline_appointment.php?id=" . $row["id"] . "'>Decline</a></td>";
        echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No pending appointments</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>