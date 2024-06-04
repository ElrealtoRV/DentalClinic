<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Dental Clinic User Management</title>
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
        .content {
            margin-left: 220px;
            padding: 20px;
            background: #F8F8F8;
        }
        .button-container {
            margin-top: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            display: inline-block;
            padding: 20px 40px;
            margin: 10px;
            background-color: #1ABC9C;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 18px;
            width: 300px;
            height: 80px;
            padding-top: 20px;
        }
        .btn:hover {
            background-color: #16A085;
            cursor: pointer;
        }
        .btn i {
            margin-right: 10px;
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
    <?php
        include 'sidebar.php';
    ?>

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