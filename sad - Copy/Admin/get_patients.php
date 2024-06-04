<?php
include 'db.php'; // Include your database connection script here

if (isset($_GET['day'])) {
  $day = $_GET['day'];

  // Assuming your patients table is named 'patients', adjust it if necessary
  $query = "SELECT * FROM patients WHERE DAY(datetime) = ? AND MONTH(datetime) = ? AND YEAR(datetime) = ?";
  $stmt = $conn->prepare($query);
  $currentMonth = date("n");
  $currentYear = date("Y");
  $stmt->bind_param("iii", $day, $currentMonth, $currentYear);
  $stmt->execute();
  $result = $stmt->get_result();

  $patients = array();
  while ($row = $result->fetch_assoc()) {
    $patients[] = $row;
  }

  echo json_encode($patients);
} else {
  echo json_encode(array()); // Return an empty array if no day is specified
}
?>
