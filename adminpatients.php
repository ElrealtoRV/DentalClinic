<?php
// Start or resume the session
session_start();

// Check if the "logout" parameter is set in the URL
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    // Destroy the session data (log the user out)
    session_destroy();

    // Redirect to doctorlog.php
    header("Location: doctorlog.php");
    exit();
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    padding: 10px;
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
    margin-left: 200px;
    padding: 20px;
  }
  .form-control, .btn-primary {
    border-radius: 0.25rem;
  }
  .btn-primary {
    background-color: #1abc9c;
    border: none;
  }
  .btn-primary:hover {
    background-color: #16a085;
  }
  .form-group label {
    font-weight: bold;
  }
  .patient-table {
    width: 100%;
    border-collapse: collapse;
    margin: auto;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  .patient-table th, .patient-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }
  .patient-table tr:nth-child(even) {background-color: #f2f2f2;}
  .patient-table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #2c3e50;
    color: white;
  }
  .form-card {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px;
    margin-top: 30px;
  }
  .form-card h2 {
    color: #2c3e50;
    text-align: center;
    margin-bottom: 20px;
  }
</style>
</head>
<body>

<?php
        include 'sidebar.php';
        ?>











<div class="content">
  <!-- <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <button id="toggleAddPatientForm" class="btn btn-primary mb-4" style="position: absolute; left: -365px; top: 75px;">Add Appointment</button>
        <div id="addPatientForm" class="form-card" style="display: none;">
          <h2 class="mb-4">Add Patient</h2>
          <form action="add_patient.php" method="post">
            <div class="form-group">
              <label for="fullname">Full Name:</label>
              <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="contact">Contact:</label>
              <input type="contact" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="form-group">
              <label for="services">Service:</label>
              <select class="form-control" id="services" name="services" required>
                <option value="Dental Cleanings">Dental Cleanings</option>
                <option value="Dental Exams">Dental Exams</option>
                <option value="X-rays">X-rays</option>
                <option value="Fillings">Fillings</option>
                <option value="Crowns">Crowns</option>
                <option value="Bridges">Bridges</option>
                <option value="Dentures">Dentures</option>
              </select>
            </div>
            <div class="form-group">
              <label for="doctor">Select Doctor:</label>
              <select class="form-control" id="doctor" name="doctor" required>
                <option value="Dr. Smith">Dr. Smith</option>
                <option value="Dr. Johnson">Dr. Johnson</option>
                <option value="Dr. Brown">Dr. Brown</option>
              </select>
            </div>
            <div class="form-group">
              <label for="datetime">Date and Time:</label>
              <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Patient</button>
          </form>
        </div>
      </div>
    </div>
  </div> -->
  <button id="toggleAddPatientForm" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addPatientModal" style="position: absolute; left:280px; top: 75px;">Add Appointment</button>
  <div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPatientModalLabel">Add Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Your form for adding a patient goes here -->
        <form action="add_patient.php" method="post">
            <div class="form-group">
              <label for="fullname">Full Name:</label>
              <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="contact">Contact:</label>
              <input type="contact" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="form-group">
              <label for="services">Service:</label>
              <select class="form-control" id="services" name="services" required>
                <option value="Dental Cleanings">Dental Cleanings</option>
                <option value="Dental Exams">Dental Exams</option>
                <option value="X-rays">X-rays</option>
                <option value="Fillings">Fillings</option>
                <option value="Crowns">Crowns</option>
                <option value="Bridges">Bridges</option>
                <option value="Dentures">Dentures</option>
              </select>
            </div>
            <div class="form-group">
              <label for="doctor">Select Doctor:</label>
              <select class="form-control" id="doctor" name="doctor" required>
                <option value="Dr. Smith">Dr. Smith</option>
                <option value="Dr. Johnson">Dr. Johnson</option>
                <option value="Dr. Brown">Dr. Brown</option>
              </select>
            </div>
            <div class="form-group">
              <label for="datetime">Date and Time:</label>
              <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Patient</button>
          </form>
      </div>
    </div>
  </div>
</div>


  <div class="container mt-5">
    <h2 class="mb-4 text-center">.</h2>
    <table class="patient-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Service</th>
          <th>Doctor</th>
          <th>Date & Time</th>
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
          include 'sad/db.php'; // Adjust this to your database connection file
          $result = mysqli_query($conn, "SELECT * FROM patients"); // Your table name and fields
          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['fullname'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['contact'] . "</td>";
              echo "<td>" . $row['services'] . "</td>";
              echo "<td>" . $row['doctor'] . "</td>";
              echo "<td>" . $row['datetime'] . "</td>";
echo "<td style='display: flex; justify-content: space-between;'>
        <div>
          <a href='update_patient.php?id=" . $row['id'] . "' class='btn btn-success'><i class='fas fa-edit'></i></a>
        </div>
        <div>
          <a href='delete_patient.php?id=" . $row['id'] . "' class='btn btn-danger'><i class='fas fa-trash'></i></a>
        </div>
      </td>";
      
              echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var addPatientForm = document.getElementById('addPatientForm');
    var toggleAddPatientFormButton = document.getElementById('toggleAddPatientForm');

    toggleAddPatientFormButton.addEventListener('click', function() {
      if (addPatientForm.style.display === 'none' || addPatientForm.style.display === '') {
        addPatientForm.style.display = 'block';
      } else {
        addPatientForm.style.display = 'none';
      }
    });
  });
</script>

</body>
</html>
