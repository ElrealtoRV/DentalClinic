<?php
include("db.php"); // Include database connection file

// Check if the appointment ID is set in the URL
if(isset($_GET['id'])) {
    $appointmentId = $_GET['id'];

    // Fetch the appointment details
    $sql = "SELECT * FROM appointments WHERE id = $appointmentId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $appointment = $result->fetch_assoc();

        // Update the status in appointments table
        $updateSql = "UPDATE appointments SET status = 'Approved' WHERE id = $appointmentId";
        $conn->query($updateSql);

        // Insert into patients table
        $insertSql = "INSERT INTO patients (fullname, email, contact, services, doctor, datetime) VALUES ('" . $appointment['fullname'] . "', '" . $appointment['email'] . "', '" . $appointment['contact'] . "', '" . $appointment['services'] . "', '" . $appointment['doctor'] . "', '" . $appointment['datetime'] . "')";
        $conn->query($insertSql);
    }

    // Redirect to patients.php
    header("Location: onlineapp.php");
    exit();
} else {
    // Redirect to onlineapp.php if the ID is not set
    header("Location: onlineapp.php");
    exit();
}
?>
