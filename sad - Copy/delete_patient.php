<?php
include 'db.php'; // Adjust this with your actual database connection file
$id = $_GET['id'];

if (isset($id)) {
    $query = "DELETE FROM patients WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Patient deleted successfully.";
    // Redirect back to the patient list or another appropriate page
    header('Location: patients.php'); // Adjust the redirection to your patients list page
} else {
    echo "Error deleting patient.";
}
$stmt->close();
}
$conn->close();
?>