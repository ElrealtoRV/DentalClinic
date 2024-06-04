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
    <section class="sub-header">
        <nav>
            <a href="index.php"><img src="customer/dental/logo2.png"></a>
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
        <h1> ABOUT US</h1>

    </section>

    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h1>21 Dental Clinic</h1>
                <p>At Clothing Coastline, we take immense pride in being one of the fastest-growing clothing stores globally. With nearly three years of dedicated passion and commitment to crafting and offering premium-quality clothing, we've rapidly grown from a small store into a global sensation with presence in multiple countries.</p>
                <p>Our journey began with a vision to provide our customers with the finest in fashion, and today, we're known for our unwavering dedication to quality and comfort. We source and use only the finest materials, ensuring that every garment we create offers the utmost in comfort, style, and durability.</p>
                <p>As we continue to expand our reach and offerings, our mission remains the same: to provide you with clothing that not only enhances your style but also feels like a second skin. We invite you to explore our collections, experience the essence of Clothing Coastline, and become a part of our ever-growing global family.</p>
                <a href="" class="button blue-btn">EXPLORE NOW</a>

            </div>
            <div class="about-col">
                <img src="clothing/ab.jpeg">

            </div>
        </div>

    </section>



    <section class="Categories">
        <h1>COLLECTION</h1>
        <p>Shop by Category</p>

        <div class="row">
            <div class="course-col">
                <h3>Mens</h3>
                <p>Elevate Your Masculine Elegance with Clothing Coastline's Distinguished Men's Collection.</p>
            </div>
            <div class="course-col">
                <h3>Womens</h3>
                <p>Indulge in Timeless Feminine Grace with Clothing Coastline's Captivating Women's Collection.</p>
            </div>
            <div class="course-col">
                <h3>Kids</h3>
                <p>Nurture Your Little Ones' Style with Clothing Coastline's Adorable Kids' Collection.</p>
            </div>
        </div>
        

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