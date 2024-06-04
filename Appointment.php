<?php
// Start session and check if the user is not logged in, redirect to login page


include("sad/db.php"); // Include your database connection file

// Fetch services from the database
$serviceQuery = "SELECT name FROM services";
$serviceResult = mysqli_query($conn, $serviceQuery);
$servicesArray = mysqli_fetch_all($serviceResult, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $services = isset($_POST['services']) ? $_POST['services'] : [];
    $services_str = mysqli_real_escape_string($conn, implode(", ", $services));
    $datetime = mysqli_real_escape_string($conn, $_POST['datetime']);

    // Input validation
    if (empty($fullname) || empty($email) || empty($contact) || empty($services) || empty($datetime)) {
        echo "All fields are required.";
        exit();
    }

    $sql = "INSERT INTO appointments (fullname, email, contact, services, datetime) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $fullname, $email, $contact, $services_str, $datetime);

    if ($stmt->execute()) {
        echo "Appointment submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>21 Dental Clinic</title>
    <link rel="stylesheet" href="products.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://kit.fontawesome.com/38ce4fbc17.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
    <div class="container">
        <div class="navbar">
            
            <div class="logo1">
                <img src="dental/logo1.png" width="250px">
            </div>
            <nav>
                <ul id="MenuItems">
                <li><a href="myindex.php">HOME</a></li>
                    <li><a href="myservices.php">SERVICES</a></li>
                    <li><a href="appointment.php">BOOK APPOINTMENT</a></li>
                    <li><a href="viewappointment.php">VIEW APPOINTMENT</a></li>
                    <li><a href="myaccount.php">ACCOUNT</a></li>
                </ul>
            </nav>

            <img src="clothing/menub.png" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="text-box"> 
            <h1>21 Dental Clinic</h1>
        </div>
        
        </div>
    </div>
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="dental/logo1.png" width="100%" id="Producting">
                <div class="small-img-row">
                </div>
            </div>
            <div class="col-2">
            <h2>Your Appointment Form</h2>
        <form action="submitappointment.php" method="post">
        <div class="grid-container">

        <form method="post">

<div class="inputs-groups">
    <div class="input-fields" id="nameField">
    <i class="fa-solid fa-phone"></i>
    <input type = "text" name="fullname" placeholder="Full Name" required><br>
</div>

<div class="inputs-groups">
    <div class="input-fields" id="nameField">
    <i class="fa-solid fa-user"></i>
    <input type = "text" name="email" placeholder="Email" required><br>
</div>

<div class="inputs-groups">
    <div class="input-fields" id="nameField">
    <i class="fa-solid fa-envelope"></i>
    <input type = "text" name="contact" placeholder="Contact Number" required><br>
</div>

<div class="inputs-groups">
    <div class="input-fields" id="nameField">
    <i class="fa-solid fa-envelope"></i>
    <label for="services">Select Services:</label>
                <div id="services">
                    <?php foreach ($servicesArray as $services): ?>
                        <input type="checkbox" id="<?= htmlspecialchars($services['name']) ?>" name="services[]" value="<?= htmlspecialchars($services['name']) ?>">
                        <label for="<?= htmlspecialchars($services['name']) ?>"><?= htmlspecialchars($services['name']) ?></label><br>
                    <?php endforeach; ?>
                </div>

</div>

<div class="inputs-groups">
    <div class="input-fields" id="nameField">
    <i class="fa-solid fa-lock"></i>
    <input type = "datetime-local" name="datetime" placeholder="Date and Time" required><br>
</div>

            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Assuming user_id is stored in session -->
            <button type="submit">Submit Appointment</button>
        </form></div>
        </div>
        <style>

   
</div>
    

    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");
       
        SmallImg[0].onclick = function()
        {
            ProductImg.scr = SmallImg[0].scr;
        }
        SmallImg[1].onclick = function()
        {
            ProductImg.scr = SmallImg[1].scr;
        }
        SmallImg[2].onclick = function()
        {
            ProductImg.scr = SmallImg[2].scr;
        }
        SmallImg[3].onclick = function()
        {
            ProductImg.scr = SmallImg[3].scr;
        }
  
    

<section class="footer">
 <h4>ABOUT US</h4>
 <p>Our passion for style and commitment to quality has made us your trusted source for on-trend clothing and accessories. <br> Explore our collection and experience the difference at Clothing Coastline.</p>
 <div class="icons"> 
     <i class="fa-brands fa-facebook"></i>
     <i class="fa-brands fa-instagram"></i>
     <i class="fa-brands fa-twitter"></i>
 </div>

</section>

<script>
 var MenuItems = document.getElementById("MenuItems");

 MenuItems.style.maxHeight = "0px"

 function menutoggle(){
     if(MenuItems.style.maxHeight == "0px")
     {
         MenuItems.style.maxHeight = "200px";
     }
     else
     {
         MenuItems.style.maxHeight = "0px";
     }
 }
</script>
</body>
</html>
</script>
    
.groups-group{
    height: 300px;
}
.single-product input{
    width: 185px;
    height: 35px;
    padding: 10px;
    font-size: 20px;
    margin-right: -67px;
    border: 1px solid black;
}
.input-fields i{
    margin-left: 20px;
    color:cornflowerblue;
}
#MenuItems li a:hover {
            color: #FF5733; /* Change this to the color you want for the hover effect */
        }

    
.header{
    min-height: 80vh;
    width: 100%;
    background-image: url(dental/dnidn.jpg);
    background-position: center;
    background-size: cover;
    position: relative;
}
a{
    text-decoration: none;
    color: rgb(250, 250, 250);
}
p{
    color: rgb(247, 240, 240);
}