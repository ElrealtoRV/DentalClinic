<?php
require 'sad/db.php';
require 'main.php';
session_start();

if (isset($_SESSION['id'])) {
    // Redirect if the user is already logged in
    switch ($_SESSION['role']) {
        case 'admin':
            header("location: dashboard.php");
            break;
        case 'staff':
            header("location: staff.php");
            break;
        case 'doctor':
            header("location: docdash.php");
            break;
        default:
            header("location: dashboard.php");
    }
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = new Login();

    // Attempt admin login
    if ($login->loginByRole($username, $password, 'admin')) {
        header("location: dashboard.php");
        exit();
    }

    // Attempt staff login
    if ($login->loginByRole($username, $password, 'staff')) {
        $_SESSION['role'] = 'staff';
        $_SESSION['StaffID'] = $login->getStaffIdByUsername($username);
        header("location: staff.php");
        exit();
    }

    // Attempt doctor login
    $doctorLoginResult = $login->doctorlog($username, $password);
    if ($doctorLoginResult === true) {
        // Successful login
        $_SESSION['role'] = 'doctor';
        $_SESSION['DoctorID'] = $login->getDoctorIdByUsername($username);
        header("location: docdash.php");
        exit();
    } else {
        // Display the error message
        echo $doctorLoginResult;
    }
}
?>

<!-- Rest of your HTML remains unchanged -->





<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        .registration-container {
            background-color: #fff;
            width: 300px;
            padding: 20px;
            border-top-left-radius: 50% 70px;
            border-top-right-radius: 50% 70px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            margin-top: 100px;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #1abc9c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #16a085;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>LOGIN</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <button class="btn" type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
