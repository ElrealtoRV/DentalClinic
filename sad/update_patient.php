<?php
include 'db.php'; // Ensure this points to your actual database connection script

// Check if the form has been submitted
if (isset($_POST['update'])) {
    $id = $_GET['id']; // Get the ID from the URL
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $services = $_POST['services'];
    $doctor = $_POST['doctor'];
    $datetime = $_POST['datetime'];

    // Prepare the update query
    $updateQuery = "UPDATE patients SET fullname=?, email=?, contact=?, services=?, doctor=?, datetime=? WHERE id=?";
    $stmt = $conn->prepare($updateQuery);

    if (!$stmt) {
        die("Error in query: " . $conn->error); // Check for errors in your SQL syntax
    }

    $stmt->bind_param("ssssssi", $fullname, $email, $contact, $services, $doctor, $datetime, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Patient updated successfully.";
        header('Location: patients.php'); // Adjust this to your patients list page
        exit();
    } else {
        echo "Error updating patient or no changes made.";
    }
    $stmt->close();
} else if (isset($_GET['id'])) {
    $id = $_GET['id']; // Get the ID from the URL

    // Fetch the patient's current data
    $query = "SELECT * FROM patients WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Display the form with the current data
        ?>
        <form action="update_patient.php?id=<?php echo $id; ?>" method="post">
            Full Name: <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"><br>
            Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
            Contact: <input type="text" name="contact" value="<?php echo $row['contact']; ?>"><br>
            Service: <input type="text" name="services" value="<?php echo $row['services']; ?>"><br>
            Doctor: <input type="text" name="doctor" value="<?php echo $row['doctor']; ?>"><br>
            Date and Time: <input type="datetime-local" name="datetime" value="<?php echo date('Y-m-d\TH:i', strtotime($row['datetime'])); ?>"><br>
            <input type="submit" name="update" value="Update Patient">
        </form>
        <?php
    } else {
        echo "No patient found with that ID.";
    }
    $stmt->close();
}
$conn->close();
?>
