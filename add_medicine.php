<?php
include('sad/db.php'); // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $invoiceId = $_POST['invoice_id'];
    $productName = $_POST['product_name'];

    // Insert the selected product into the 'prescription' table
    $sql = "INSERT INTO `prescription` (`patient_id`, `product_id`) VALUES ((SELECT `patient_id` FROM `invoices` WHERE `id` = $invoiceId), (SELECT `ProductID` FROM `supply` WHERE `Products` = '$productName'))";
    
    if ($conn->query($sql) === TRUE) {
        echo "Medicine added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
