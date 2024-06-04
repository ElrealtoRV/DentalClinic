<?php
include('db.php'); // Include your database connection script

if (isset($_GET['invoiceId'])) {
    $invoiceId = $_GET['invoiceId'];

    // SQL query to retrieve invoice details based on invoice ID
    $sql = "SELECT i.`date`, s.`service`, i.`total_amount`, i.`patient_id`
            FROM `invoices` AS i
            JOIN `services` AS s ON i.`service_id` = s.`id`
            WHERE i.`id` = $invoiceId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $invoiceDetails = array(
            'date' => $row['date'],
            'service' => $row['service'],
            'total_amount' => $row['total_amount'],
            'patient_id' => $row['patient_id']
        );

        // Convert invoice details to JSON format for AJAX response
        echo json_encode($invoiceDetails);
    } else {
        // Invoice not found
        echo json_encode(array('error' => 'Invoice not found'));
    }
} else {
    // Invalid request
    echo json_encode(array('error' => 'Invalid request'));
}
?>
