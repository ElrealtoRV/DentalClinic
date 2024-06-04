<?php
// Include your database connection code (e.g., db.php)
include 'sad/db.php';

// Retrieve the invoice_id from the query parameter
$invoiceId = $_GET['invoice_id'];

// Query to retrieve invoice data from your database based on $invoiceId
$sql = "SELECT i.*, p.fullname AS patient_name
        FROM invoices i
        INNER JOIN patients p ON i.patient_id = p.id
        WHERE i.id = $invoiceId";

$result = mysqli_query($conn, $sql);

// Check if the invoice exists
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Start building the printable receipt
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">';
    echo '<title>21 Dental Clinic Receipt</title>';
    echo '<style>';
    echo '   body {';
    echo '       font-family: "Arial", sans-serif;';
    echo '       margin: 0;';
    echo '       padding: 0;';
    echo '       background: #f0f0f0;';
    echo '   }';
    echo '   .receipt {';
    echo '       background-color: #fff;';
    echo '       border: 1px solid #ddd;';
    echo '       padding: 20px;';
    echo '       max-width: 400px;';
    echo '       margin: 0 auto;';
    echo '       border-radius: 5px;';
    echo '       box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);';
    echo '   }';
    echo '   .receipt h1 {';
    echo '       font-size: 24px;';
    echo '       margin-bottom: 20px;';
    echo '       text-align: center;';
    echo '   }';
    echo '   .receipt-details {';
    echo '       margin-bottom: 20px;';
    echo '   }';
    echo '   .receipt-details p {';
    echo '       margin: 0;';
    echo '       padding: 5px;';
    echo '       border-bottom: 1px solid #ddd;';
    echo '   }';
    echo '   .service-list {';
    echo '       margin-bottom: 20px;';
    echo '   }';
    echo '   .service-item {';
    echo '       display: flex;';
    echo '       justify-content: space-between;';
    echo '   }';
    echo '   .service-name {';
    echo '       flex: 1;';
    echo '   }';
    echo '   .service-price {';
    echo '       flex-basis: 100px;';
    echo '   }';
    echo '   .total-amount {';
    echo '       text-align: right;';
    echo '       font-weight: bold;';
    echo '   }';
    echo '   .thank-you {';
    echo '       text-align: center;';
    echo '       font-style: italic;';
    echo '       color: #555;';
    echo '   }';
    echo '   .print-button {';
    echo '       display: block;';
    echo '       margin: 20px auto;';
    echo '       background-color: #007BFF;';
    echo '       color: #fff;';
    echo '       padding: 10px 20px;';
    echo '       border: none;';
    echo '       border-radius: 5px;';
    echo '       cursor: pointer;';
    echo '       font-weight: bold;';
    echo '   }';
    echo '   .print-button:hover {';
    echo '       background-color: #0056b3;';
    echo '   }';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    echo '<div class="receipt">';
    echo '   <h1>21 Dental Clinic Receipt</h1>';
    echo '   <div class="receipt-details">';
    echo '       <p><strong>Invoice ID:</strong> ' . $row['id'] . '</p>';
    echo '       <p><strong>Patient Name:</strong> ' . $row['patient_name'] . '</p>';
    echo '       <p><strong>Date:</strong> ' . $row['date'] . '</p>';
    echo '       <p><strong>Due Date:</strong> ' . $row['due_date'] . '</p>';
    echo '       <p><strong>Total Amount:</strong> ' . $row['total_amount'] . '</p>';
    echo '       <p><strong>Status:</strong> ' . $row['status'] . '</p>';
    echo '   </div>';
    
    // Fetch and display service details
    $serviceIds = explode(",", $row['service']);
$totalAmount = 0;

echo '   <div class="service-list">';
foreach ($serviceIds as $serviceId) {
    $sqlService = "SELECT name, price FROM services WHERE id = $serviceId";
    $resultService = mysqli_query($conn, $sqlService);
    if ($resultService && mysqli_num_rows($resultService) > 0) {
        $serviceData = mysqli_fetch_assoc($resultService);
        $serviceName = $serviceData['name'];
        $servicePrice = $serviceData['price'];
        $totalAmount += $servicePrice;
        echo '       <div class="service-item">';
        echo '           <div class="service-name">' . $serviceName . '</div>';
        echo '           <div class="service-price">' . $servicePrice . ' Peso</div>';
        echo '       </div>';
    }
}
echo '   </div>';

// Display the prescription
echo '   <div class="prescription-section">';
echo '       <h2>Prescription:</h2>';
echo '       <p>' . nl2br($row['prescription']) . '</p>'; // Use nl2br to preserve line breaks
echo '   </div>';

// Display the total amount paid
echo '   <div class="total-amount">';
echo '       Total Amount Paid: ' . $totalAmount . ' Peso';
echo '   </div>';

echo '   <p class="thank-you">Thank you for choosing 21 Dental Clinic!</p>';

    // Print button to trigger the print dialog
    echo '   <button class="print-button" onclick="window.print()">Print Receipt</button>';
    
    echo '</div>';
    echo '</body>';
    echo '</html>';
    
} else {
    echo "Invoice not found.";
}

// Close the database connection
mysqli_close($conn);
?>
