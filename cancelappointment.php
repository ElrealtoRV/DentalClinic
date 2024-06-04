<?php
include 'sad/db.php'; // Adjust this with your actual database connection file
$id = $_GET['id'];

if (isset($id)) {
    $query = "DELETE FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Appointment cancel successfully.";
    // Redirect back to the patient list or another appropriate page
    header('Location: viewappointment.php'); // Adjust the redirection to your patients list page
} else {
    echo "Error canceling appointment.";
}
$stmt->close();
}
$conn->close();
?>