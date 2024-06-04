<?php
// add_patient.php
include 'sad/db.php'; // Adjust this to the path of your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $services = mysqli_real_escape_string($conn, $_POST['services']);
    $doctor = mysqli_real_escape_string($conn, $_POST['doctor']);
    $datetime = mysqli_real_escape_string($conn, $_POST['datetime']);

    // Prepare SQL query to insert data into the patients table
    $sql = "INSERT INTO patients (fullname, email, contact, services, doctor, datetime)
            VALUES ('$fullname', '$email', '$contact', '$services', '$doctor', '$datetime')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}

// Redirect back to the main page (or wherever you like)
header("Location: patients.php"); // Adjust the redirection location as needed
exit();
?>
