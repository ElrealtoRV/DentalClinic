<?php
include 'sad/db.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission, insert data into the database, and perform any necessary validation
    // This code is a placeholder and should be replaced with your actual database insertion logic
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $gender = $_POST["Gender"];
    $dateOfBirth = $_POST["DateOfBirth"];
    $email = $_POST["Email"];
    $hireDate = $_POST["HireDate"];
    $salary = $_POST["Salary"];
    $address = $_POST["Address"];
    $username = $_POST["Username"];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO staff (FirstName, LastName, Gender, DateOfBirth, Email, HireDate, Salary, Address, Username, Password)
    VALUES ('$firstName', '$lastName', '$gender', '$dateOfBirth', '$email', '$hireDate', '$salary', '$address', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Create Staff Account</title>
    <style>
        /* Reset some default styles */
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
        /* Center the content */
        .content {
            margin-left: 220px;
            padding: 20px;
            background: #F8F8F8;
            text-align: center;
        }
        /* Style the form container */
        .form-container {
            width: 100%;
            max-width: 800px; /* Limit the form width */
            margin: 0 auto; /* Center the form horizontally */
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        /* Style form inputs */
        input[type="text"], input[type="date"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box; /* Ensure the input fields fill the available width */
        }
        /* Style form submit button */
        input[type="submit"] {
            background-color: #1ABC9C;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #16A085;
        }
        /* Style the table */
        table {
            margin: 20px auto; /* Center the table horizontally */
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #1ABC9C;
            color: white;
        }

        /* Responsive styles */
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
        <h1>Create Staff Account</h1>
        <div class="form-container">
            <form action="createstaff.php" method="POST">
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
                        <th>Email</th>
                        <td><input type="email" name="Email" required></td>
                    </tr>
                    <tr>
                        <th>HireDate</th>
                        <td><input type="date" name="HireDate" required></td>
                    </tr>
                    <tr>
                        <th>Salary</th>
                        <td><input type="text" name="Salary" required></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input type="text" name="Address" required></td>
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
                <input type="submit" value="Create Account">
            </form>
        </div>
    </div>
</body>
</html>
