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
    border-bottom:wpx solid #333;
  }
  .sidebar ul li:hover {
    background: #16a085;
    cursor: pointer;
  }
  .sidebar ul li i {
    margin-right: 10px;
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
  </ul>
</div>

</body>
</html>