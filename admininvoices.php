<?php
// Include your database connection code (e.g., db.php)
include 'sad/db.php';

// Check if the form was submitted for payment
if (isset($_POST['payment'])) {
    $invoiceId = $_POST['invoice_id'];

    // Update the invoice status to "completed" in the database
    $updateStatusQuery = "UPDATE invoices SET status = 'completed' WHERE id = $invoiceId";
    mysqli_query($conn, $updateStatusQuery);

    // Redirect back to the same page to refresh the dropdown
    header("Location: admininvoices.php");
    exit(); // Make sure to exit after the header redirection
}

// Check if the form was submitted for deletion
if (isset($_POST['delete'])) {
    $invoiceId = $_POST['invoice_id'];

    // Delete the invoice record from the database
    $deleteQuery = "DELETE FROM invoices WHERE id = $invoiceId";
    mysqli_query($conn, $deleteQuery);

    // Redirect back to the same page to refresh the table
    header("Location:  admininvoices.php");
    exit(); // Make sure to exit after the header redirection
}

if (isset($_POST['create_invoice'])) {
    $patientId = $_POST['patient'];
    $selectedServices = $_POST['services']; // Retrieve selected services as an array

    // You can loop through the selected services and insert them into the database
    foreach ($selectedServices as $serviceId) {
        // Insert each service into the invoices table
        $insertQuery = "INSERT INTO invoices (patient_id, service, status) VALUES ($patientId, $serviceId, 'pending')";
        mysqli_query($conn, $insertQuery);
    }

    // Redirect back to the same page to refresh the table
    header("Location:  admininvoices.php");
    exit(); // Make sure to exit after the header redirection
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Dental Clinic Sidebar</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f0f0;
        }

        .sidebar {
            background-color: #2c3e50;
            color: white;
            width: 200px;
            height: 100vh;
            position: fixed;
            overflow: auto;
        }

        .sidebar h2 {
            padding: 20px;
            margin: 0;
            background: #1abc9c;
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 18px;
            border-bottom: 1px solid #333;
        }

        .sidebar ul li:hover {
            background: #16a085;
            cursor: pointer;
        }

        .sidebar ul li i {
            margin-right: 10px;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
            border-radius: 5px;
        }

        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
            display: block;
        }

        .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            outline: none;
        }

        .form-checkbox {
            margin-right: 5px;
        }

        .form-button {
            background-color: #1abc9c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #16a085;
        }

        .invoice-table {
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            margin-top: 20px;
            overflow-x: auto;
        }

        .invoice-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th, .invoice-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .invoice-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .invoice-table button {
            background-color: #1abc9c;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }

        .invoice-table button:hover {
            background-color: #16a085;
        }
    </style>
</head>
<body>



<?php
        include 'sidebar.php';
        ?>







<div class="content">
    <div class="form-container">
        <h1>Create Invoice</h1>

        <form action="your_save_to_db_script.php" method="POST">
            <div class="form-group">
                <label for="patient" class="form-label">Select a Patient:</label>
                <select name="patient" id="patient" class="form-select">
                    <?php
                    // Include your database connection code (e.g., db.php)
                    include 'sad/db.php';

                    // Fetch patient data from the database
                    $sql = "SELECT * FROM patients";
                    $result = mysqli_query($conn, $sql);

                    // Check if there are patients
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $patientId = $row['id'];
                            $patientFullName = $row['fullname'];
                            echo "<option value='$patientId'>$patientFullName</option>";
                        }
                    } else {
                        echo "<option value=''>No patients found</option>";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Select Services:</label><br>

                <?php
                // Include your database connection code (e.g., db.php)
                include 'sad/db.php';

                // Fetch service data from the database
                $sqlServices = "SELECT * FROM services";
                $resultServices = mysqli_query($conn, $sqlServices);

                // Check if there are services
                if ($resultServices && mysqli_num_rows($resultServices) > 0) {
                    while ($rowServices = mysqli_fetch_assoc($resultServices)) {
                        $serviceId = $rowServices['id'];
                        $serviceName = $rowServices['name'];
                        $servicePrice = $rowServices['price'];
                        echo "<input type='checkbox' name='services[]' value='$serviceId' class='form-checkbox'>$serviceName ($servicePrice Peso)<br>";
                    }
                } else {
                    echo "No services found";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>

            <button type="submit" class="form-button">Create Invoice</button>
        </form>
    </div>

    <div class="invoice-table">
    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Due Date</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Services</th> <!-- Add Services column header -->
                <th>Action</th>
                <th>Print</th> <!-- Add Print column header -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Include your database connection code (e.g., db.php)
            include 'sad/db.php';

            // Query to retrieve invoice data from your database
            $sql = "SELECT i.id, i.patient_id, i.date, i.due_date, i.total_amount, i.status, i.service, p.fullname FROM invoices i
                    INNER JOIN patients p ON i.patient_id = p.id";
            $result = mysqli_query($conn, $sql);

            // Check if there are invoices
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['due_date'] . "</td>";
                    echo "<td>" . $row['total_amount'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>"; // Start Services column
                    // Split the services IDs stored in the 'service' column
                    $serviceIds = explode(",", $row['service']);
                    foreach ($serviceIds as $serviceId) {
                        // Retrieve and display service names based on the IDs
                        $sqlServiceName = "SELECT name FROM services WHERE id = $serviceId";
                        $resultServiceName = mysqli_query($conn, $sqlServiceName);
                        if ($resultServiceName && mysqli_num_rows($resultServiceName) > 0) {
                            $serviceName = mysqli_fetch_assoc($resultServiceName)['name'];
                            echo $serviceName . "<br>";
                        }
                    }
                    echo "</td>"; // End Services column
                    echo "<td>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='invoice_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' name='payment'>Payment</button>";
                    echo "<button type='submit' name='delete'>Delete</button>"; // Added Delete button
                    echo "</form>";
                    echo "</td>";
                    // Add a Print button that links to the printable invoice page
                    echo "<td><a href='print_invoice.php?invoice_id=" . $row['id'] . "' target='_blank'>Print</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No invoices found</td></tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
