<?php
include("sad/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    
    // Convert the services array to a string
    $services = isset($_POST["services"]) ? implode(", ", $_POST["services"]) : "";

    $datetime = $_POST["datetime"];
    
    // Check if user_id is set
    if (isset($_POST["user_id"])) {
        $user_id = $_POST["user_id"];
    } else {
        // Handle the case where user_id is not set
        echo "Error: user_id is not set.";
        exit;
    }
    
    // Fetch all available doctors
    $doctorQuery = "SELECT CONCAT(FirstName, ' ', LastName) AS name FROM doctor"; // Concatenates first and last names
    $doctorResult = $conn->query($doctorQuery);
    
    if ($doctorResult->num_rows > 0) {
        $doctors = [];
        
        while ($row = $doctorResult->fetch_assoc()) {
            $doctors[] = $row['name'];
        }
        
        // Randomly select a doctor
        $doctor = $doctors[array_rand($doctors)];
        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO appointments (fullname, email, contact, services, doctor, datetime, status, user_id) VALUES (?, ?, ?, ?, ?, ?, 'Pending', ?)");
        $stmt->bind_param("ssssssi", $fullname, $email, $contact, $services, $doctor, $datetime, $user_id);
        
        if ($stmt->execute()) {
            echo "Appointment submitted successfully!";
            header("location: viewappointment.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: No doctors available.";
    }
}

$conn->close();
?>
