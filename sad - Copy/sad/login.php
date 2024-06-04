<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginUsername = $_POST["loginUsername"];
    $loginPassword = $_POST["loginPassword"];

    $sql = "SELECT * FROM user WHERE username='$loginUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($loginPassword, $row["password"])) {
            // Login successful, set session and redirect to home.php
            session_start();
            $_SESSION['id'] = $row['id']; // Assuming you have a user_id column
            header("Location: home.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Username not found";
    }
}

$conn->close();
?>
