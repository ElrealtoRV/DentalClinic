<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $declineMessage = "Your appointment has been declined. Please contact us for more information.";

    $sql = "UPDATE appointments SET status = 'Declined', decline_message = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("si", $declineMessage, $id);

    if ($stmt->execute()) {
        $message = "Appointment declined successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: onlineapp.php?message=" . urlencode($message));
    exit;
} else {
    header("Location: onlineapp.php?message=" . urlencode("No appointment ID provided."));
    exit;
}
?>
