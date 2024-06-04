
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
                <li><a href="myindex.php">HOME</a></li>
                    <li><a href="myservices.php">SERVICES</a></li>
                    <li><a href="appointment.php">BOOK APPOINTMENT</a></li>
                    <li><a href="viewappointment.php">VIEW APPOINTMENT</a></li>
                    <li><a href="myaccount.php">ACCOUNT</a></li>
                </ul>

            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        
<div class="text-box">
    <h1>Welcome to 21 Dental Clinic</h1>
    <p>At 21 Dental Clinic, we prioritize your oral health and strive to provide exceptional dental care in a comfortable and welcoming environment. Your smile is our priority, and we are dedicated to delivering personalized, high-quality dental services to meet your unique needs.</p>
    <a href="appointment.php" class="button">Book Appointment Now</a>
</div>

    </section>

    <section class="Categories">
        <h1>DENTAL SERVICES</h1>

        <div class="row">
            <div class="course-col">
                <h3>Dental Cleaning</h3>
                <p>Our dental cleaning involves thorough scaling and polishing to remove plaque and tartar, promoting optimal oral health.</p>
            </div>
            <div class="course-col">
                <h3>Tooth Extraction</h3>
                <p>For damaged or decayed teeth, our experienced team performs surgical extractions with precision.</p>
            </div>
            <div class="course-col">
                <h3>Root Canal Therapy</h3>
                <p>Our skilled dentists perform root canal therapy, eliminating infected pulp and sealing the tooth for lasting results.</p>
            </div>
            <div class="course-col">
                <h3>Dental Fillings</h3>
                <p>Our dental filling procedures involve the removal of decayed material, followed by the meticulous filling of cavities.</p>
            </div>
            <div class="course-col">
                <h3>Teeth Whitening</h3>
                <p>Transform your smile with our professional teeth whitening services, utilizing safe bleaching agents.</p>
            </div>
            
        </div>
        

    </section>
    
    
    <section class="Categories">
        <h1>DENTAL SERVICES</h1>

        <div class="row">
            <div class="course-col">
                <h3>Dental Crowns and Bridges</h3>
                <p>Our skilled team offers dental crown placement to restore damaged teeth and bridges to address gaps.</p>
            </div>
            <div class="course-col">
                <h3>Orthodontic Treatment</h3>
                <p>Achieve a straighter smile with our orthodontic treatments, including braces or aligners for teeth misalignment correction.</p>
            </div>
            <div class="course-col">
                <h3>Periodontal Treatment</h3>
                <p>Our periodontal treatments focus on addressing gum diseases through scaling and root planing.</p>
            </div>
            <div class="course-col">
                <h3>Dental Implants</h3>
                <p>Experience the benefits of dental implants through our expert surgical placement of artificial tooth roots.</p>
            </div>
            <div class="course-col">
                <h3>TMJ Disorder Treatment</h3>
                <p>Address issues with the temporomandibular joint with our specialized TMJ disorder treatments.</p>
            </div>

        </div>
        </div>
    </section>


    <section class="cta">
        <h1>Visit Us For a Unique Services Experience</h1>
        <a href="signin.php" class="button">CONTACT US</a>




    </section>

    <section class="footer">
        <h4>ABOUT US</h4>
        <p>Welcome to 21 Dental Clinic, where your oral health is our passion. Our clinic is founded on the principles of providing comprehensive, patient-centered dental care in a warm and friendly atmosphere.</p>
        <div class="icons"> 
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>

    </section>

<script>

    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }
    <style>
        
    *{
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', sans-serif;
}
.header{
    min-height: 100vh;
    width: 100%;
    background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(dental/dnidn.jpeg);
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
</script>

</body>
</html>