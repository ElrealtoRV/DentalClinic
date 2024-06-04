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

include('db.php'); // Include your database connection file

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Gender = $_POST['Gender'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $ContactNumber = $_POST['ContactNumber'];
    $Email = $_POST['Email'];
    $HireDate = $_POST['HireDate'];
    $Specialization = $_POST['Specialization'];
    $Address = $_POST['Address'];
    $Username = $_POST['Username'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to insert the doctor into the 'doctor' table
    $query = "INSERT INTO doctor (FirstName, LastName, Gender, DateOfBirth, ContactNumber, Email, HireDate, Specialization, Address, username, password)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssssss", $FirstName, $LastName, $Gender, $DateOfBirth, $ContactNumber, $Email, $HireDate, $Specialization, $Address, $Username, $Password);

    // Check if the insert is successful
    if ($stmt->execute()) {
        echo "Doctor created successfully.";
    } else {
        echo "Error creating doctor: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
}
?>
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
        .content {
            margin-left: 220px;
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dental Clinic</h2>
        <ul>
            <li><a href="dashboard.php" style="color: white; text-decoration: none;"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="Createuser.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Create User</a></li>
            <li><a href="ad_services.php" style="color: white; text-decoration: none;"><i class="fa fa-briefcase"></i> Services</a></li>
            <li><a href="ad_sales-reports.php" style="color: white; text-decoration: none;"><i class="fa fa-chart-line"></i> Sales-Reports</a></li>
            <li><a href="ad_onlineapp.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
            <li><a href="?logout=true" style="color: white; text-decoration: none;"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Create Doctor</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <th>FirstName</th>
                    <td><input type="text" name="FirstName" required></td>
                </tr>
                <tr>
                    <th>LastName</th>
                    <td><input type="text" name="LastName" required></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input type="text" name="Gender" required></td>
                </tr>
                <tr>
                    <th>DateOfBirth</th>
                    <td><input type="date" name="DateOfBirth" required></td>
                </tr>
                <tr>
                    <th>ContactNumber</th>
                    <td><input type="text" name="ContactNumber"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="Email" required></td>
                </tr>
                <tr>
                    <th>HireDate</th>
                    <td><input type="date" name="HireDate" required></td>
                </tr>
                <tr>
                    <th>Specialization</th>
                    <td><input type="text" name="Specialization"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" name="Address"></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><input type="text" name="Username" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="Password" required></td>
                </tr>
            </table>
            <input type="submit" value="Create Doctor">
        </form>
    </div>
</body>
</html>
