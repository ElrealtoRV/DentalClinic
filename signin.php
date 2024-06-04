<?php
include('sad/db.php');
include 'function.php';

if (isset($_SESSION['id'])) {
    header("location: myindex.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>21 Dental Clinic</title>
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
                <h1 id="title">Sign In</h1>
                <form method="post">

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

<div class="btn-field">
    <button><a href="account.php">Sign Up</a></button>
    <button type ="submit" id="signupBtn" name="signin">Sign In</button>
</div>

<div class="">
<center>
    <button><a href="help.php">Forgot Password?</a></button>
</center>
</div>

</form> 


        <script>
            let signupBtn = document.getElementById("users");
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