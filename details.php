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
                <img src="cloathing/fas.jpg" width="100%" id="Producting">
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="cloathing/ fas2.jpeg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="cloathing/ fas3.jpeg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="cloathing/ men.jpeg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="cloathing/ men2.webp" width="100%" class="small-img">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <p>Dress</p>
                <h1>Blue Dress</h1>
                <h4>₱800.00</h4>
                <select>
                    <option>Select Size</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    <option>XL</option>
                    <option>XXL</option>
                </select>
                <input type="number" value="1">
                <a href="" class="btn">Add to Cart</a>
                <h3>Product Details<i class="fa fa-indent"></i></h3>
                <br>
                <p>Elevate your presence with a dress that defines the very essence of timeless elegance. Step into the world of sophistication and charm as you slip into this enchanting gown. Crafted with meticulous attention to detail, this dress blends classic design with contemporary flair. </p>
            </div>
        </div>

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
    </script>

   
    
    

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