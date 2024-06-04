<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic Registration and Login</title>
    <style>
        body {
            background-image: url('');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }

        .login-link {
            text-align: center;
            margin-top: 19px;
        }

        /* Custom Logo Styling */
        img {
            max-width: 200px; /* Adjust the size as needed */
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
<!-- Registration Form -->
<form id="registerForm" action="register.php" method="post">
    <img src="hehe.png" alt="Dental Clinic Logo">
    <h2>Register</h2>
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" required>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Register</button>

    <div class="login-link">
        Already have an account? <a href="#" onclick="showLogin()">Login</a>
    </div>
</form>

<!-- Login Form -->
<form id="loginForm" action="login.php" method="post" style="display: none;">
    <img src="hehe.png" alt="Dental Clinic Logo">
    <h2>Login</h2>
    <label for="loginUsername">Username:</label>
    <input type="text" id="loginUsername" name="loginUsername" required>

    <label for="loginPassword">Password:</label>
    <input type="password" id="loginPassword" name="loginPassword" required>

    <button type="submit">Login</button>

    <div class="login-link">
        Don't have an account? <a href="#" onclick="showRegister()">Register</a>
    </div>
</form>

<script>
    function showLogin() {
        document.getElementById("registerForm").style.display = "none";
        document.getElementById("loginForm").style.display = "block";
    }

    function showRegister() {
        document.getElementById("registerForm").style.display = "block";
        document.getElementById("loginForm").style.display = "none";
    }
</script>
</body>
</html>
