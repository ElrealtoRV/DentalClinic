<?php
// Include the database connection
include 'db.php';

// Handle deleting a service
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM services WHERE id = $deleteId";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: services.php"); // Redirect to refresh the page
    } else {
        echo "Error deleting service: " . mysqli_error($conn);
    }
}

// Handle editing a service
if (isset($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];
    $editQuery = "SELECT * FROM services WHERE id = $editId";
    $editResult = mysqli_query($conn, $editQuery);
    if ($editResult && mysqli_num_rows($editResult) > 0) {
        $service = mysqli_fetch_assoc($editResult);
    } else {
        echo "Error fetching service for editing: " . mysqli_error($conn);
    }
}

// Handle updating a service
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_service'])) {
    $updateId = $_POST['update_id'];
    $serviceName = $_POST['service_name'];
    $servicePrice = $_POST['service_price'];

    $updateQuery = "UPDATE services SET name = '$serviceName', price = $servicePrice WHERE id = $updateId";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: services.php"); // Redirect to refresh the page
    } else {
        echo "Error updating service: " . mysqli_error($conn);
    }
}

// Handle adding a new service
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_service'])) {
    $serviceName = $_POST['service_name'];
    $servicePrice = $_POST['service_price'];

    $insertQuery = "INSERT INTO services (name, price) VALUES ('$serviceName', $servicePrice)";
    if (mysqli_query($conn, $insertQuery)) {
        header("Location: services.php"); // Redirect to refresh the page
    } else {
        echo "Error adding service: " . mysqli_error($conn);
    }
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
  /* Sidebar CSS */
  .sidebar {
    background-color: #2c3e50;
    color: white;
    width: 210px;
    height: 100vh;
    position: fixed;
    overflow: auto;
    left: -1px;
    top: -1px;
   
  }
  .sidebar h2 {
    padding: 20px;
    margin: 0 ;
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
    margin-right: 20px;
  }

  /* Content Area CSS */
  .content {
    margin-left: 220px;
    padding: 20px;
    font-family: 'Arial', sans-serif;
    background: #f0f0f0;
  }
  /* Table CSS */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
  }
  th {
    background-color: #1abc9c;
    color: white;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  /* Add Service Form CSS */
 .add-service-form {
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    padding: 20px;
    margin-top: 20px;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  }

  .add-service-form h2 {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
  }

  .form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  .btn-primary {
    background-color: #1abc9c;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  .btn-primary:hover {
    background-color: #16a085;
  }
</style>
</head>
<body>

<div class="sidebar">
  <h2>Dental Clinic</h2>
  <ul>
        <li><a href="dashboard.php" style="color: white; text-decoration: none;"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="Createuser.php" style="color: white; text-decoration: none;"><i class="fa fa-user"></i> Create User</a></li>
        <li><a href="adminservices.php" style="color: white; text-decoration: none;"><i class="fa fa-briefcase"></i> Services</a></li>
        <li><a href="adminsalesreports.php" style="color: white; text-decoration: none;"><i class="fa fa-chart-line"></i> Sales-Reports</a></li>
        <li><a href="ad_onlineapp.php" style="color: white; text-decoration: none; white-space: nowrap;"><i class="fa fa-chart-line"></i> Online App</a></li>
        <li><a href="?logout=true" style="color: white; text-decoration: none;"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
      </ul>
</div>

<div class="content">
  <h2>Services and Prices</h2>
  <table>
    <thead>
      <tr>
        <th>Service Name</th>
        <th>Price (Peso)</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Fetch services from the database
      $query = "SELECT * FROM services";
      $result = mysqli_query($conn, $query);

      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . number_format($row['price'], 2) . "</td>";
          echo "<td>";
          echo "<a href='services.php?edit_id=" . $row['id'] . "'>Edit</a> | ";
          echo "<a href='services.php?delete_id=" . $row['id'] . "'>Delete</a>";
          echo "</td>";
          echo "</tr>";
        }
        mysqli_free_result($result);
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
      ?>
    </tbody>
  </table>

  <!-- Add Service Button -->
<!-- Add Service Button -->
<button type="button" onclick="toggleAddServiceForm()" style="background-color: #1abc9c; color: #fff;">Add Service</button>

  <!-- Add Service Form -->
  <div id="add-service-form" class="add-service-form" style="display: none;">
    <h2>Add a New Service</h2>
    <form method="post" action="services.php">
      <div class="form-group">
        <label for="service_name">Service Name:</label>
        <input type="text" name="service_name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="service_price">Price (Peso):</label>
        <input type="number" name="service_price" step="0.01" class="form-control" required>
      </div>
      <div class="form-group">
        <input type="submit" name="add_service" value="Add Service" class="btn btn-primary">
      </div>
    </form>
  </div>

</div>

<script>
function toggleAddServiceForm() {
  var addServiceForm = document.getElementById("add-service-form");
  addServiceForm.style.display = (addServiceForm.style.display === "none") ? "block" : "none";
}
</script>
</body>
</html>
