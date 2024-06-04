<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>View Invoice</title>
    <style>
        <!-- Your CSS styles for view_invoice.php -->
    </style>
</head>
<body>
<?php include('db.php'); // Include your database connection script ?>

<div class="content">
    <h2>View Invoice</h2>
    <?php
    if (isset($_GET['id'])) {
        $invoice_id = $_GET['id'];

        // SQL query to retrieve the invoice details based on the ID
        $sql = "SELECT i.`id`, i.`date`, p.`fullname`, i.`total_amount`, i.`service`, i.`description`
                FROM `invoices` AS i
                JOIN `patients` AS p ON i.`patient_id` = p.`id`
                WHERE i.`id` = $invoice_id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Date:</strong> " . $row['date'] . "</p>";
            echo "<p><strong>Patient:</strong> " . $row['fullname'] . "</p>";
            echo "<p><strong>Total Amount:</strong> $" . $row['total_amount'] . "</p>";
            echo "<p><strong>Service:</strong> " . $row['service'] . "</p>";
            echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
        } else {
            echo "Invoice not found.";
        }
    } else {
        echo "Invoice ID not provided.";
    }
    ?>
</div>
</body>
</html>
