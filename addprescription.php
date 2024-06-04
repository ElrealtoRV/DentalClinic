<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Completed Invoices</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #1abc9c;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
        .add-medicine-button {
        background-color: #1877F2;
        color: white;
        padding:5px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    /* Hover effect for the button */
    .add-medicine-button:hover {
        background-color: #16a085;
    }
        
    </style>
</head>
<body>
<?php 
    include('sad/db.php'); // Include your database connection script 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the patient_id and prescription details from the form
        $patient_id = $_POST['patient_id'];
        $medicine_names = $_POST['medicine_name'];
        $dosage = $_POST['dosage'];
        $instructions = $_POST['instructions'];

        // Construct the prescription string based on the details
        $prescription = "Medicines:\n";
        foreach ($medicine_names as $medicine_name) {
            $prescription .= "- $medicine_name\n";
        }
        $prescription .= "Dosage: $dosage\nInstructions: $instructions";

        // Insert the prescription into the database
        $sql = "UPDATE invoices SET prescription = ? WHERE patient_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $prescription, $patient_id);

        if ($stmt->execute()) {
            // Prescription added successfully
            echo "Prescription added successfully.";
        } else {
            // Error handling if the prescription insertion fails
            echo "Error adding prescription: " . $conn->error;
        }

        $stmt->close();
    }
?>


<div class="sidebar">
    <h2>Dental Clinic Doctor</h2>
  
    <ul>
        <li><a href="docpatient.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i>Your Patient</a></li>
        <li><a href="Supplies.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Supplies</a></li>
        <li><a href="addprescription.php" style="color: 16a085; text-decoration: none;"><i class="fa fa-user"></i> Add Prescription</a></li>
        <li><a href="doconlineapp.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
        <li><a href="logout.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Logout</a></li>
    </ul>
</div>

<div class="content">
    <h2></h2>
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Patient</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Prescription</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // SQL query to retrieve completed invoices with patient names
        $sql = "SELECT i.`date`, p.`fullname`, i.`total_amount`, i.`prescription`, i.`status`, i.`patient_id` 
                FROM `invoices` AS i
                JOIN `patients` AS p ON i.`patient_id` = p.`id`
                WHERE i.`status` = 'pending'";

        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['total_amount'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['prescription'] . "</td>";
                echo "<td>";
                echo "<a href='javascript:void(0);' onclick='showPrescriptionForm(" . $row['patient_id'] . ")' class='add-medicine-button'>Add Medicine</a>";
                echo "</td>";
                echo "</tr>";
        ?>
        <!-- Prescription form for each patient -->
        <div id="prescription-form-<?php echo $row['patient_id']; ?>" class="prescription-form" style="display: none;">
    <form method="POST" action="addprescription.php">
        <label for="medicine_name">Medicine Name:</label>
        <?php
        // SQL query to retrieve medicine names from the supply table
        $medicine_sql = "SELECT Products FROM supply";
        $medicine_result = mysqli_query($conn, $medicine_sql);

        if (mysqli_num_rows($medicine_result) > 0) {
            while ($medicine_row = mysqli_fetch_assoc($medicine_result)) {
                echo "<label><input type='checkbox' name='medicine_name[]' value='" . $medicine_row["Products"] . "'>" . $medicine_row["Products"] . "</label><br>";
            }
        }
        ?>
        <label for="dosage">Dosage:</label>
        <input type="text" id="dosage" name="dosage" required>
        <label for="instructions">Instructions:</label>
        <textarea id="instructions" name="instructions" required></textarea>
        <input type="hidden" name="patient_id" value="<?php echo $row['patient_id']; ?>">
        <button type="submit" class="add-medicine-button">Add Prescription</button>
    </form>
</div>

        <?php
            }
        } else {
            echo "<tr><td colspan='5'>No completed invoices found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<script>
    // JavaScript function to show the prescription form for a specific patient
    function showPrescriptionForm(patientId) {
        var prescriptionForm = document.getElementById("prescription-form-" + patientId);
        if (prescriptionForm) {
            prescriptionForm.style.display = "block";
        }
    }
</script>
</body>
</html>
