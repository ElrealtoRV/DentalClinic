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
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #1abc9c;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .add-product-form {
            margin-bottom: 20px;
        }
        .add-product-form label,
        .add-product-form input,
        .add-product-form button {
            display: block;
            margin-bottom: 10px;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        /* CSS for action buttons */
        .action-button {
            display: inline-block;
            padding: 5px 1px;
            text-align: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            border-radius: 5px;
            margin-right: -5px;
        }

        /* Edit button style */
        .edit-button {
            background-color: #3498db;
            color: #fff;
        }

        /* Delete button style */
        .delete-button {
            background-color: #e74c3c;
            color: #fff;
        }

        /* Add Quantity button style */
        .add-quantity-button {
            background-color: #2ecc71;
            color: #fff;
        }

        /* Hover effect for buttons */
        .action-button:hover {
            background-color: #555;
        }

        /* CSS for quantity form */
        .add-quantity-form {
            display: none;
        }
    </style>
</head>
<body>


<div class="sidebar">
  <h2>Dental Clinic</h2>
  
  <ul>
        <li><a href="patients.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Patients</a></li>
        <li><a href="staffappointment.php" style="color:  #16a085; text-decoration: none;"><i class="fa fa-user"></i> Appointment</a></li>
        <li><a href="services.php" style="color: white; text-decoration: none;"><i class="fa fa-briefcase"></i> Services</a></li>
        <li><a href="invoices.php" style="color: white; text-decoration: none;"><i class="fa fa-file-text"></i> Invoices</a></li>
        <li><a href="StaffSupplies.php" style="color: white;; text-decoration: none;"><i class="fa fa-user"></i> Supplies</a></li>
       <li><a href="onlineapp.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
        <li><a href="logout.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Logout</a></li>
      </ul>

</div>



  
</body>
</html>
