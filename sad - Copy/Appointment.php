<?php
// Start session and check if the user is not logged in, redirect to login page
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

include("db.php"); // Include your database connection file

// Fetch services from the database
$serviceQuery = "SELECT name FROM services";
$serviceResult = mysqli_query($conn, $serviceQuery);
$servicesArray = mysqli_fetch_all($serviceResult, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $services = isset($_POST['services']) ? $_POST['services'] : [];
    $services_str = mysqli_real_escape_string($conn, implode(", ", $services));
    $doctor = mysqli_real_escape_string($conn, $_POST['doctor']);
    $datetime = mysqli_real_escape_string($conn, $_POST['datetime']);

    // Input validation
    if (empty($fullname) || empty($email) || empty($contact) || empty($services) || empty($doctor) || empty($datetime)) {
        echo "All fields are required.";
        exit();
    }

    $sql = "INSERT INTO appointments (fullname, email, contact, services, doctor, datetime) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $fullname, $email, $contact, $services_str, $doctor, $datetime);

    if ($stmt->execute()) {
        echo "Appointment submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            padding-top: 10px;
        }

        nav a {
            color: #ecf0f1;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        section {
            max-width: 600px;
            margin: 20px auto;
            background-color: rgb(60, 173, 211);
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            gap: 15px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .grid-container label {
            font-weight: bold;
            margin-bottom: 8px; /* Adjusted margin to move labels downward */
        }

        .grid-container input,
        .grid-container select,
        .grid-container div {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        #services {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        #services label {
            margin-left: 5px;
        }

        button {
            background-color: rgb(24, 220, 24);
            color: white;
            cursor: pointer;
            width: 30%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-left: 195px;
            margin-top: 30px;
        }

        button:hover {
            background-color: #333;
        }

        nav a:hover {
            color: #3498db;
        }
    </style>
</head>
<body>

<header>
        <h1>21 DENTAL CLINIC</h1>
        <nav>
        <a href="home.php">Home</a>
        <a href="appointment.php">Appointment</a>
        <a href="viewapp.php">View Appointment</a>
        <a href="Contactus.php">Contact Us</a>
        <a href="Clogout.php" >Logouts</a>
        </nav>
    </header>

    <section>
        <h2>Your Appointment Form</h2>
        <form action="submit_appointment.php" method="post">
        <div class="grid-container">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="contact">Contact Number:</label>
                <input type="tel" id="contact" name="contact" required>

                <label for="services">Select Services:</label>
                <div id="services">
                    <?php foreach ($servicesArray as $service): ?>
                        <input type="checkbox" id="<?= htmlspecialchars($service['name']) ?>" name="services[]" value="<?= htmlspecialchars($service['name']) ?>">
                        <label for="<?= htmlspecialchars($service['name']) ?>"><?= htmlspecialchars($service['name']) ?></label><br>
                    <?php endforeach; ?>
                </div>

                <label for="doctor">Select Doctor:</label>
                <select id="doctor" name="doctor">
                    <option value="Dr. Smith">Dr. Smith</option>
                    <option value="Dr. Johnson">Dr. Johnson</option>
                    <option value="Dr. Brown">Dr. Brown</option>
                </select>

                <label for="datetime">Select Date and Time:</label>
                <input type="datetime-local" id="datetime" name="datetime" required>
            </div>
            <button type="submit">Submit Appointment</button>
        </form>
    </section>

</body>
</html>
