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
                <img src="customer/dental/logo2.png" width="250px">
            </div>
            <nav>
                <ul id="MenuItems">
                <li><a href="index.php">HOME</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="aboutus.php">ABOUT US</a></li>
                    <li><a href="account.php">ACCOUNT</a></li>
                </ul>
            </nav>
            <img src="dental/menub.png" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="text-box"> 
            <br>
            <br>
            
            <h1>Dental Services</h1>
        </div>
        
        </div>
    </div>

   <div class="small-container">
    <div class="row row-2">
        <h2>Available Services</h2>
        <select>
            <option>Default Sorting</option>
            <option>Sort by price</option>
            <option>Sort by rating</option>
            <option>Sort by date</option>
        </select>
    </div>
    <div class="row">   
        <div onclick="window.location.href='details.php';" class="prod4-col">
            <img src="clothing/fas.jpeg">
            <h4>BLUE DRESS</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star" ></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$800.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/shirts/prod1.webp">
            <h4>DENIM CLOTHES</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$500.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/fas2.jpeg">
            <h4>RED</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$600.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/fas3.jpeg">
            <h4>COAT</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$300.00</p>
        </div>
        
    </div>
    <div class="row">   
        <div class="prod4-col">
            <img src="clothing/men.jpeg">
            <h4>DENIM</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$400.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/men2.webp">
            <h4>GREEN FAS</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$600.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/shirts/prod2.jpeg">
            <h4>SHIRT</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star" ></i>
            </div>
            <p>$300.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/men3.jpeg">
            <h4>CLASS</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$800.00</p>
        </div>
        
    </div>
    <div class="row">   
        <div class="prod4-col">
            <img src="clothing/kids.jpeg">
            <h4>DRESS</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$100.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/kids2.jpeg">
            <h4>BABY</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$90.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/kids3.webp">
            <h4>SWEATER</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$150.00</p>
        </div>
        <div class="prod4-col">
            <img src="clothing/shirts/prod33.jpeg">
            <h4>SMILE</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o" ></i>
            </div>
            <p>$100.00</p>
        </div>
        
    </div>
    <div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594;</span>
    </div>
   </div>

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

<style>
        #MenuItems li a:hover {
            color: #FF5733; /* Change this to the color you want for the hover effect */
        }
    </style>

</body>
</html>