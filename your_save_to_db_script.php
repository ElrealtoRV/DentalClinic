<?php
// Include your database connection code (e.g., db.php)
include 'sad/db.php';

// Retrieve data from the form
$patientId = $_POST['patient'];
$selectedServices = $_POST['services']; // This will be an array if multiple services are selected

// Function to calculate the total amount based on selected services
function calculateTotalAmount($services, $conn) {
    $total = 0;
    foreach ($services as $serviceId) {
        $sql = "SELECT price FROM services WHERE id = '$serviceId'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $servicePrice = $row['price'];
            $total += $servicePrice;
        }
    }
    return $total;
}

// Calculate the total amount
$totalAmount = calculateTotalAmount($selectedServices, $conn);

// You'll also need to generate the current date and due date based on your requirements
$currentDate = date('Y-m-d');
$dueDate = date('Y-m-d', strtotime('+30 days')); // Assuming a 30-day due date, adjust as needed

// Insert the data into the "invoices" table
$sql = "INSERT INTO invoices (patient_id, date, due_date, total_amount, status, service) VALUES ('$patientId', '$currentDate', '$dueDate', '$totalAmount', 'Pending', '" . implode(",", $selectedServices) . "')";

if (mysqli_query($conn, $sql)) {
    echo "Invoice created successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

// You can also redirect the user back to the form or another page after successful insertion
 header('Location: invoices.php');
?>
