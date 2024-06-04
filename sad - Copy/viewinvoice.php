<?php
include('db.php'); // Include your database connection script

// Check if the invoice ID is provided in the URL
if (isset($_GET['invoice_id']) && is_numeric($_GET['invoice_id'])) {
    $invoice_id = $_GET['invoice_id'];

    // SQL query to retrieve invoice details including date, name, services, and prices
    $sql = "SELECT i.`date`, p.`fullname`, s.`service_name`, s.`price` 
            FROM `invoices` AS i
            JOIN `patients` AS p ON i.`patient_id` = p.`id`
            JOIN `invoice_services` AS isv ON i.`id` = isv.`invoice_id`
            JOIN `services` AS s ON isv.`service_id` = s.`id`
            WHERE i.`id` = $invoice_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $invoiceData = [];
        while ($row = $result->fetch_assoc()) {
            $invoiceData[] = [
                'date' => $row['date'],
                'fullname' => $row['fullname'],
                'service_name' => $row['service_name'],
                'price' => $row['price'],
            ];
        }
    } else {
        // Invoice not found
        $errorMessage = "Invoice not found.";
    }
} else {
    // Invalid or missing invoice ID
    $errorMessage = "Invalid or missing invoice ID.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>View Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f0f0;
        }

        .content {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
<div class="content">
    <h2>Invoice Details</h2>
    <?php
    if (isset($errorMessage)) {
        echo "<p><strong>Error:</strong> $errorMessage</p>";
    } else {
        echo "<table>";
        echo "<tr><th>Date</th><th>Name</th><th>Service</th><th>Price</th></tr>";
        foreach ($invoiceData as $data) {
            echo "<tr>";
            echo "<td>" . $data['date'] . "</td>";
            echo "<td>" . $data['fullname'] . "</td>";
            echo "<td>" . $data['service_name'] . "</td>";
            echo "<td>$" . $data['price'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
    <a href="completedinvoices.php">Back to Completed Invoices</a>
</div>
</body>
</html>
