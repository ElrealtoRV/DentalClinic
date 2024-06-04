<?php
include("db.php");

// Fetch all appointments from the database with a specific status (e.g., 'Pending')
$status = 'Pending';
$sql = "SELECT * FROM appointments WHERE status = '$status'";
$result = $conn->query($sql);

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
             <td>{$row['id']}</td>
             <td>{$row['fullname']}</td>
             <td>{$row['email']}</td>
             <td>{$row['contact']}</td>
             <td>{$row['services']}</td>
             <td>{$row['doctor']}</td>
             <td>{$row['datetime']}</td>
             <td>
                 <a href='accept_appointment.php?id={$row['id']}'>Accept</a> |
                 <a href='decline_appointment.php?id={$row['id']}'>Decline</a>
             </td>
         </tr>";
    }

    echo "</table>";
} else {
    echo "No pending appointment requests.";
}

$conn->close();
?>
