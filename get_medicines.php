<?php
// Include your database connection script
include('sad/db.php');

// Query to retrieve medicine options from the supply table
$sql = "SELECT product_name, quantity FROM supply";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $medicines = array();
    while ($row = $result->fetch_assoc()) {
        $medicine = array(
            'product_name' => $row['product_name'],
            'quantity' => $row['quantity']
        );
        $medicines[] = $medicine;
    }
    // Return medicine options as JSON data
    header('Content-Type: application/json');
    echo json_encode($medicines);
} else {
    // If no medicines found, return an empty array
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>
