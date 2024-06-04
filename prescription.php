<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f0f0;
        }

        .content {
            padding: 20px;
        }

        h2 {
            color: #3498db;
        }

        p {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>
<body>
<div class="content">
    <h2>Prescription Details</h2>
    <?php
    // Check if an invoice_id is provided in the URL
    if (isset($_GET['invoice_id'])) {
        // Retrieve the prescription details based on the provided invoice_id
        $invoice_id = $_GET['invoice_id'];
        // You should replace the following lines with your actual database query to fetch prescription details
        $prescription_data = array(
            'patient_name' => 'John Doe',
            'doctor_name' => 'Dr. Smith',
            'prescription_date' => '2024-01-19',
            'product_ids' => array(1, 2, 3), // Example product IDs associated with the prescription
            'instructions' => 'Take Medicine 1 in the morning, Medicine 2 in the afternoon, and Medicine 3 at night.',
        );

        // Display the prescription details
        echo "<p><strong>Patient Name:</strong> " . $prescription_data['patient_name'] . "</p>";
        echo "<p><strong>Doctor Name:</strong> " . $prescription_data['doctor_name'] . "</p>";
        echo "<p><strong>Prescription Date:</strong> " . $prescription_data['prescription_date'] . "</p>";
        
        // Fetch and display the medicines from the 'Products' table
        echo "<p><strong>Medicines:</strong> ";
        foreach ($prescription_data['product_ids'] as $product_id) {
            // You should replace the following line with your actual database query to fetch product names
            $product_name = getProductFromDatabase($product_id); // Replace with your database query
            echo $product_name . ", ";
        }
        echo "</p>";
        
        echo "<p><strong>Instructions:</strong> " . $prescription_data['instructions'] . "</p>";
    } else {
        echo "<p>No prescription details found.</p>";
    }

    // Function to fetch product name from the database based on product_id
    function getProductFromDatabase($product_id) {
        // Replace this function with your actual database query logic to fetch product name
        // Example: SELECT product_name FROM products WHERE id = $product_id
        return "Medicine " . $product_id; // Replace with your query result
    }
    ?>
    <p><a href="completed_invoices.php">Back to Completed Invoices</a></p>
</div>
</body>
</html>
