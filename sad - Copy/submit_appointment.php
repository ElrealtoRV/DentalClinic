<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    
    // Convert the services array to a string
    $services = isset($_POST["services"]) ? implode(", ", $_POST["services"]) : "";

    $doctor = $_POST["doctor"];
    $datetime = $_POST["datetime"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO appointments (fullname, email, contact, services, doctor, datetime, status) VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
    $stmt->bind_param("ssssss", $fullname, $email, $contact, $services, $doctor, $datetime);

    if ($stmt->execute()) {
        echo "Appointment submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
