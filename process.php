<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        // Login logic
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM register WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                // Redirect to home.php or perform other actions on successful login
                header("Location: home.php");
                exit();
            } else {
                echo "Invalid password";
            }
        } else {
            echo "Invalid username";
        }
    } elseif (isset($_POST["register"])) {
        // Registration logic
        // ... (similar to your existing registration logic)

        // Example registration logic:
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $newUsername = $_POST["newUsername"];
        $newEmail = $_POST["newEmail"];
        $newAge = $_POST["newAge"];
        $newPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO register (first_name, last_name, username, email, age, password)
                VALUES ('$firstName', '$lastName', '$newUsername', '$newEmail', $newAge, '$newPassword')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
