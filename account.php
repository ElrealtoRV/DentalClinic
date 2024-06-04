<?php
// Include database connection file
include('sad/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Coastline</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://kit.fontawesome.com/38ce4fbc17.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="header">
    <?php
include('sad/db.php');

if(isset($_POST['save'])){
    if($_POST['password'] == $_POST['vpword']){
        // Hash the password
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashedPassword);

        // Execute the prepared statement
        $result = $stmt->execute();

        if($result){
            echo "User Successfully Registered";
            header("Location: myindex.php");
            exit();
        } else {
            echo "Error";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Password Not Matched";
    }
}
?>
        
        <nav>
            <a href="index.php"><img src="dental/logo2.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                <li><a href="index.php">HOME</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="aboutus.php">ABOUT US</a></li>
                    <li><a href="account.php">ACCOUNT</a></li>
                </ul>

            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="container">
            <div class="form-box">
                <h1 id="title">Sign Up</h1>
        <form method="post">

            <div class="input-group">
                <div class="input-field" id="nameField">
                <i class="fa-solid fa-phone"></i>
                <input type = "text" name="first_name" placeholder="First Name" required><br>
            </div>

            <div class="input-group">
                <div class="input-field" id="nameField">
                <i class="fa-solid fa-user"></i>
                <input type = "text" name="last_name" placeholder="Last Name" required><br>
            </div>

            <div class="input-group">
                <div class="input-field" id="nameField">
                <i class="fa-solid fa-envelope"></i>
                <input type = "text" name="email" placeholder="Email" required><br>
            </div>

            <div class="input-group">
                <div class="input-field" id="nameField">
                <i class="fa-solid fa-lock"></i>
                <input type = "password" name="password" placeholder="Password" required><br>
            </div>

            <div class="input-group">
                <div class="input-field" id="nameField">
                <i class="fa-solid fa-lock"></i>
                <input type = "password" name="vpword" placeholder="Verify Password" required><br>
            </div>

            <div class="btn-field">
        <button type="submit" id="signupBtn" name="save">Sign Up</button>
        <button><a href="signin.php">Sign In</a></button>
    </div>
    </form>


        <script>
            let signupBtn = document.getElementById("user");
            let signinBtn = document.getElementById("signinBtn");
            let nameField= document.getElementById("nameField");
            let title = document.getElementById("title");


            signinBtn.onclick = function(){
                nameField.style.maxHeight = "0";
                title.innerHTML = "Sign In";
                signupBtn.classList.add("disable");
                signinBtn.classList.remove("disable");
            }

            signupBtn.onclick = function(){
                nameField.style.maxHeight = "60px";
                title.innerHTML = "Sign Up";
                signupBtn.classList.remove("disable");
                signinBtn.classList.add("disable");
            }




        </script>
    
<script>

    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }

</script>

</body>
</html>