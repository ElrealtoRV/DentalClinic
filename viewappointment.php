<?php
include 'sad/db.php';

$sql = "SELECT * FROM services ORDER BY id DESC";
$services = $conn ->query($sql);
?>
<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['id'])) {
    header("location: signin.php");
}
echo $_SESSION['id'];


$sql = "SELECT "

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
            
            <div class="logo">
                <img src="dental/logo2.png" width="250px">
            </div>
            <nav>
                <ul id="MenuItems">
                <li><a href="myindex.php">HOME</a></li>
                    <li><a href="myservices.php">SERVICES</a></li>
                    <li><a href="appointment.php">BOOK APPOINTMENT</a></li>
                    <li><a href="viewappointment.php">VIEW APPOINTMENT</a></li>
                    <li><a href="myaccount.php">ACCOUNT</a></li>
                </ul>
                </ul>
                </ul>
            </nav>
            <img src="dental/menub.png" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="text-box"> 
            <br>
            <br>
            
            <h1>21 DENTAL CLINIC</h1>
        </div>
        
        </div>
    </div>

    <section>
    <h2></h2>
    <table>
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Service</th>
        <th>Date and Time</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
    include("sad/db.php"); // Include the database connection

    $sql = "SELECT * FROM appointments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["fullname"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["contact"]) . "</td>
                    <td>" . htmlspecialchars($row["services"]) . "</td>
                    <td>" . htmlspecialchars($row["datetime"]) . "</td>
                    <td>" . htmlspecialchars($row["status"]) .
                        ($row["status"] === 'Declined' ? " <a href='#' onclick='alert(\"" . addslashes($row["decline_message"]) . "\")'> (i) </a>" : "") .
                    "</td>
                    <td><a href='cancelappointment.php?id=" . $row["id"] . "'>Cancel</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No appointments found</td></tr>";
    }
    $conn->close();
    ?>  
</table> 
<style>
    table{
    margin: 100;
    padding: 10;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
    }
table {
            width: 95%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 24px;
            
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        /* Zebra striping for rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
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
        </style>
    </table>
</section>

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