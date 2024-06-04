<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<title>Sales Report - 21 Dental Clinic</title>
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
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  th {
    background-color: #1abc9c;
    color: white;
  }
  .receipt {
    padding: 20px;
    border: 2px solid #333;
    background-color: #fff;
  }
  .receipt-header {
    text-align: center;
    margin-bottom: 20px;
  }
  .receipt-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
  }
  .clinic-info {
    font-size: 16px;
    color: #777;
  }
  .receipt-total {
    margin-top: 20px;
    font-size: 18px;
    font-weight: bold;
    text-align: right;
  }
  /* Add a CSS rule to hide the button when printing */
  @media print {
    .non-printable {
      display: none;
    }
  }
</style>
</head>
<body>
<div class="sidebar">
  <h2>Dental Clinic</h2>
  <ul>
    <li><a href="patients.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Patients</a></li>
    <li><a href="staffappointment.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Appointment</a></li>
    <li><a href="services.php" style="color: white; text-decoration: none;"><i class="fa fa-briefcase"></i> Services</a></li>
    <li><a href="invoices.php" style="color: white; text-decoration: none;"><i class="fa fa-file-text"></i> Invoices</a></li>
    <li><a href="sales-reports.php" style="color: white; text-decoration: none;"><i class="fa fa-chart-line"></i> Sales Reports</a></li>
    <li><a href="onlineapp.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
    <li><a href="logout.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Logout</a></li>
  </ul>
</div>
<div class="content">
  <h1>Sales Report - 21 Dental Clinic</h1>
  <form method="POST" class="non-printable">
    Start Date: <input type="date" name="start_date">
    End Date: <input type="date" name="end_date">
    <input type="submit" value="SUBMIT REPORT">
  </form>
  <div class="receipt">
    <div class="receipt-header">
      <div class="receipt-title">Sales Report</div>
      <div class="clinic-info">21 Dental Clinic</div>
    </div>
    <table>
      <tr>
        <th>Service</th>
        <th>Price</th>
      </tr>
      <?php
      // Include your database connection file
      include 'db.php';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $start_date = $_POST["start_date"];
          $end_date = $_POST["end_date"];

          // Modify the SQL query to select services and prices from completed invoices within the specified date range
          $sql = "SELECT services.name as service, services.price as price
                  FROM invoices
                  INNER JOIN services ON FIND_IN_SET(services.id, invoices.service)
                  WHERE invoices.status = 'completed' 
                  AND invoices.date BETWEEN '$start_date' AND '$end_date'";

          $result = mysqli_query($conn, $sql);

          if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["service"] . "</td>"; // Display service
                  echo "<td>" . number_format($row["price"], 2) . "</td>";   // Display price formatted as currency
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='2'>No records found</td></tr>";
          }

          // Close the database connection
          mysqli_close($conn);
      }
      ?>
    </table>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      include 'db.php';

      $start_date = $_POST["start_date"];
      $end_date = $_POST["end_date"];   

      $sql_total = "SELECT SUM(services.price) as total_price
                    FROM invoices
                    INNER JOIN services ON FIND_IN_SET(services.id, invoices.service)
                    WHERE invoices.status = 'completed' 
                    AND invoices.date BETWEEN '$start_date' AND '$end_date'";

      $result_total = mysqli_query($conn, $sql_total);

      if ($result_total) {
        $row_total = mysqli_fetch_assoc($result_total);
        $total_price = $row_total["total_price"];
        echo "<div class='receipt-total'>Total Amount: " . number_format($total_price, 2) . "</div>"; // Display total formatted as currency
      }

      mysqli_close($conn);
    }
    ?>
    <!-- Place the "Print Report" button here at the bottom -->
  </div>
</div>
</body>
</html>
