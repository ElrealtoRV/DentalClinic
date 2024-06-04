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
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Prepare and execute the SQL query to insert the administrator into the 'admin' table
        $query = "INSERT INTO admin (first_name, last_name, email, username, password)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $username, $password);

        // Check if the insert is successful
        if ($stmt->execute()) {
            echo "Administrator created successfully.";
        } else {
            echo "Error creating administrator: " . $stmt->error;
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
        input[type="text"], input[type="email"], input[type="password"] {
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
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
            }
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
        <h2>Create Administrator</h2>
        <form method="POST" action="">
            <div class="form-container">
                <div>
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" required>
                </div>
                <div>
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <input type="submit" value="Create Administrator">
            </div>
        </form>
    </div>
</body>
</html>