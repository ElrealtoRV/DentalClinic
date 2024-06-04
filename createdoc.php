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

include('sad/db.php'); // Include your database connection file

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
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: #F8F8F8;
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
            transition: background-color 0.3s ease;
        }
        .sidebar ul li:hover {
            background: #16a085;
            cursor: pointer;
        }
        .sidebar ul li i {
            margin-right: 10px;
        }
        .form-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], input[type="date"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #1abc9c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #16a085;
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
        <div class="form-container">
                <div>
                    <label for="FirstName">First Name</label>
                    <input type="text" name="FirstName" id="FirstName" required>
                </div>
                <div>
                    <label for="LastName">Last Name</label>
                    <input type="text" name="LastName" id="LastName" required>
                </div>
                <div>
                    <label for="Gender">Gender</label>
                    <input type="text" name="Gender" id="Gender" required>
                </div>
                <div>
                    <label for="DateOfBirth">Date of Birth</label>
                    <input type="date" name="DateOfBirth" id="DateOfBirth" required>
                </div>
                <div>
                    <label for="ContactNumber">Contact Number</label>
                    <input type="text" name="ContactNumber" id="ContactNumber">
                </div>
                <div>
                    <label for="Email">Email</label>
                    <input type="email" name="Email" id="Email" required>
                </div>
                <div>
                    <label for="HireDate">Hire Date</label>
                    <input type="date" name="HireDate" id="HireDate" required>
                </div>
                <div>
                    <label for="Specialization">Specialization</label>
                    <input type="text" name="Specialization" id="Specialization">
                </div>
                <div>
                    <label for="Address">Address</label>
                    <input type="text" name="Address" id="Address">
                </div>
                <div>
                    <label for="Username">Username</label>
                    <input type="text" name="Username" id="Username" required>
                </div>
                <div>
                    <label for="Password">Password</label>
                    <input type="password" name="Password" id="Password" required>
                </div>
            <input type="submit" value="Create Doctor">
        </form>
    </div>
</body>
</html>
