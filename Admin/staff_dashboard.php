<?php
include '../sad/db.php'; // Assuming db.php is in the parent directory

if ($conn) {
    $status = 'Pending';
    // Using prepared statement to prevent SQL injection
    $sql = "SELECT * FROM appointments WHERE status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<h2>Appointment Requests</h2>";
        echo "<table border='1'>
             <tr>
                 <th>ID</th>
                 <th>Full Name</th>
                 <th>Email</th>
                 <th>Contact</th>
                 <th>Service</th>
                 <th>Doctor</th>
                 <th>Date and Time</th>
                 <th>Action</th>
             </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                 <td>" . htmlspecialchars($row['id']) . "</td>
                 <td>" . htmlspecialchars($row['fullname']) . "</td>
                 <td>" . htmlspecialchars($row['email']) . "</td>
                 <td>" . htmlspecialchars($row['contact']) . "</td>
                 <td>" . htmlspecialchars($row['services']) . "</td>
                 <td>" . htmlspecialchars($row['doctor']) . "</td>
                 <td>" . htmlspecialchars($row['datetime']) . "</td>
                 <td>
                     <a href='accept_appointment.php?id=" . htmlspecialchars($row['id']) . "'>Accept</a> |
                     <a href='decline_appointment.php?id=" . htmlspecialchars($row['id']) . "'>Decline</a>
                 </td>
             </tr>";
        }

        echo "</table>";
    } else {
        echo "No pending appointment requests.";
    }

    // Close prepared statement
    $stmt->close();
} else {
    echo "Failed to connect to the database.";
}

// Close database connection
$conn->close();
?>
