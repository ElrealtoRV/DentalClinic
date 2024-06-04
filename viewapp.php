<?php
session_start(); // Start the session

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Base styling */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header styling */
        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 10px 0;
            text-align: center;
        }

        /* Navigation styling */
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

        nav a:hover {
            color: #3498db;
        }

        /* Section styling */
        section {
           
        }

        /* Table styling */
        table {
            width: 95%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 24px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        /* Zebra striping for rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Responsive design */
        @media screen and (max-width: 600px) {
            nav {
                flex-direction: column;
            }

            nav a {
                margin-bottom: 10px;
            }
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
        <a href="Clogout.php" >Logout</a>

    </nav>
</header>

<section>
    <h2></h2>
    <table>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Service</th>
            <th>Doctor</th>
            <th>Date and Time</th>
            <th>Status</th>
        </tr>
        <?php
// Include the database connection
include("sad/db.php");

// Retrieve the user_id from the session
$user_id = $_SESSION['id'];

// Modify the SQL query to filter appointments by user_id
$sql = "SELECT * FROM appointments WHERE user_id = 0";
$result = $conn->query($sql);

// Rest of your code to display appointments remains the same
// ...


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["fullname"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["contact"]) . "</td>
                <td>" . htmlspecialchars($row["services"]) . "</td>
                <td>" . htmlspecialchars($row["doctor"]) . "</td>
                <td>" . htmlspecialchars($row["datetime"]) . "</td>
                <td>" . htmlspecialchars($row["status"]) .
                    ($row["status"] === 'Declined' ? " <a href='#' onclick='alert(\"" . addslashes($row["decline_message"]) . "\")'> (i) </a>" : "") .
                "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No appointments found</td></tr>";
}
$conn->close();
?>  
    </table>
</section>

</body>
</html>