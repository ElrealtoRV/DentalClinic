<?php
include 'db.php';

$selectedPatient = "";

// Delete action handling
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['appointment_id'])) {
    $appointmentId = $_GET['appointment_id'];
    // Delete the appointment record from the database
    $deleteSql = "DELETE FROM staff_app WHERE id = '$appointmentId'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Appointment deleted successfully.";
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedPatient = $_POST["patient"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $services = $_POST["services"];
    $doctor = $_POST["doctor"];
    $datetime = $_POST["datetime"];

    // Fetch the full name of the selected patient
    $sql = "SELECT fullname FROM patients WHERE id = '$selectedPatient'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fullName = $row['fullname'];

        $sql = "INSERT INTO staff_app (patient_id, email, contact, services, doctor, datetime) VALUES ('$selectedPatient', '$email', '$contact', '$services', '$doctor', '$datetime')";
        if ($conn->query($sql) === TRUE) {
            echo "Appointment for patient '$fullName' successfully scheduled.";
            exit(); // Exit to prevent form resubmission
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Patient not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Staff Appointment</title>
    <style>
        /* Styles for the sidebar */
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
            border-bottom: 1px solid #333;
        }

        .sidebar ul li:hover {
            background: #16a085;
            cursor: pointer;
        }

        .sidebar ul li i {
            margin-right: 10px;
        }

        /* Styles for the content area */
        .content {
            margin-left: 220px; /* Adjust this value to leave space for the sidebar */
            padding: 20px;
        }

        /* Styles for the form container */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Styles for the form elements */
        label {
            font-weight: bold;
        }

        button[type="submit"] {
            background-color: #1abc9c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #16a085;
        }

        /* Styles for the appointment table */
        .appointment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .appointment-table th,
        .appointment-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .appointment-table th {
            background-color: #1abc9c;
            font-weight: bold;
            color: white;
        }

        .appointment-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .appointment-table tbody tr:hover {
            background-color: #e0e0e0;
        }

        /* Styles for the title */
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Styles for the delete link */
        .delete-link {
            color: #e74c3c;
            text-decoration: none;
            cursor: pointer;
        }

        .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dental Clinic</h2>
        <ul>
            <li><a href="patients.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Patients</a></li>
            <li><a href="staffappointment.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Appointment</a></li>
            <li><a href="services.php" style="color: white; text-decoration: none;"><i class="fa fa-briefcase"></i> Services</a></li>
            <li><a href="invoices.php" style="color: white; text-decoration: none;"><i class="fa fa-file-text"></i> Invoices</a></li>
            <li><a href="onlineapp.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
            <li><a href="logout.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Make an Appointment</h2>
        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="patient">Select Patient:</label>
                <select name="patient" id="patient">
                    <?php
                    // Use the database connection from db.php to fetch patients
                    $sql = "SELECT id, fullname, email, contact, services, doctor, datetime FROM patients";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Add patient fullname as the text for each option
                            echo '<option value="' . $row['id'] . '"
                                data-email="' . $row['email'] . '"
                                data-contact="' . $row['contact'] . '"
                                data-services="' . $row['services'] . '"
                                data-doctor="' . $row['doctor'] . '"
                                data-datetime="' . $row['datetime'] . '">' . $row['fullname'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No patients found</option>';
                    }
                    ?>
                </select>

                <!-- Display the patient details here -->
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" readonly>

                <label for="contact">Contact:</label>
                <input type="text" name="contact" id="contact" readonly>

                <label for="services">Services:</label>
                <input type="text" name="services" id="services" readonly>

                <label for="doctor">Doctor:</label>
                <input type="text" name="doctor" id="doctor" readonly>

                <label for="datetime">Datetime:</label>
                <input type="text" name="datetime" id="datetime" readonly>

                <button type="submit">Schedule Appointment</button>
            </form>
        </div>

        <!-- Title for the appointment list -->
        <div class="title">Appointments:</div>

        <!-- Display the names of patients from staff_app table in a table -->
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Appointment Date & Time</th>
                    <th>Action</th> <!-- Add a new column for delete action -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display the patient names, appointment date & time, and delete button
                $sql = "SELECT id, patient_id, datetime FROM staff_app";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $appointmentId = $row['id'];
                        $patientId = $row['patient_id'];
                        $datetime = $row['datetime'];

                        // Fetch the patient name based on patient_id
                        $patientNameQuery = "SELECT fullname FROM patients WHERE id = '$patientId'";
                        $patientNameResult = $conn->query($patientNameQuery);

                        if ($patientNameResult->num_rows > 0) {
                            $patientNameRow = $patientNameResult->fetch_assoc();
                            $patientFullName = $patientNameRow['fullname'];

                            // Display patient names, appointment date & time, and delete button in the table
                            echo '<tr>';
                            echo '<td style="color: #000000;">' . $patientFullName . '</td>';
                            echo '<td style="color: #000000;">' . $datetime . '</td>';
                            echo '<td><a class="delete-link" href="?action=delete&appointment_id=' . $appointmentId . '">Delete</a></td>';
                            echo '</tr>';
                        }
                    }
                } else {
                    echo '<tr><td colspan="3">No appointments found.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- JavaScript to update fields based on selected patient -->
        <script>
            document.getElementById("patient").addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                document.getElementById("email").value = selectedOption.getAttribute("data-email");
                document.getElementById("contact").value = selectedOption.getAttribute("data-contact");
                document.getElementById("services").value = selectedOption.getAttribute("data-services");
                document.getElementById("doctor").value = selectedOption.getAttribute("data-doctor");

                // Add this line to update the datetime input field
                document.getElementById("datetime").value = selectedOption.getAttribute("data-datetime");
            });
        </script>
    </div>
</body>
</html>
