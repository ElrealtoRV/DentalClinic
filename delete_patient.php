<?php
include 'sad/db.php'; // Adjust this with your actual database connection file
$id = $_GET['id'];

if (isset($id)) {
    // Check if the patient has associated invoices
    $checkInvoicesQuery = "SELECT COUNT(*) AS num_invoices FROM invoices WHERE patient_id = ?";
    $stmtCheckInvoices = $conn->prepare($checkInvoicesQuery);
    $stmtCheckInvoices->bind_param("i", $id);
    $stmtCheckInvoices->execute();
    $resultCheckInvoices = $stmtCheckInvoices->get_result();
    $numInvoices = $resultCheckInvoices->fetch_assoc()['num_invoices'];
    $stmtCheckInvoices->close();

    if ($numInvoices > 0) {
        echo "Cannot delete patient because they have associated invoices. Please handle the invoices first.";
    } else {
        // Proceed with deleting the patient record
        $query = "DELETE FROM patients WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Patient deleted successfully.";
            // Redirect back to the patient list or another appropriate page
            header('Location: adminpatients.php'); // Adjust the redirection to your patients list page
        } else {
            echo "Error deleting patient.";
        }
        $stmt->close();
    }
}
$conn->close();
?>