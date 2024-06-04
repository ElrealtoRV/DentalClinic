<?php
include("../db.php"); // Assuming db.php is in the parent directory

if (isset($_GET['id'])) {
    $appointmentId = $_GET['id'];

    // Perform the necessary update in the database (e.g., change status to declined)
    $sql = "UPDATE appointments SET status = 'Declined' WHERE id = $appointmentId";
    $conn->query($sql);

    header("Location: staff_dashboard.php");
    exit();
}
?>
