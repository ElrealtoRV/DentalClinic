<?php
include("sad/db.php");

if (isset($_GET['id'])) {
    $appointmentId = $_GET['id'];

    // Perform the necessary update in the database (e.g., change status to accepted)
    $sql = "UPDATE appointments SET status = 'Accepted' WHERE id = $appointmentId";
    $conn->query($sql);

    header("Location: staff_dashboard.php");
    exit();
}
?>
