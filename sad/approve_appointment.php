<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);

    $sql = "UPDATE appointments SET status = 'Approved' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Appointment approved successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the onlineapp.php with a status message
    header("Location: onlineapp.php?message=" . urlencode($message));
    exit;
} else {
    header("Location: onlineapp.php?message=" . urlencode("No appointment ID provided."));
    exit;
}
?>