<?php

include('../include/connect.php');
include('../fucntions/for_info_functions.php');

?>
<!DOCTYPE html>

<html>

    <title>

  search

    </title>

    <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="Fruits Category Page CSS.css">
    <link rel="stylesheet" href="./Home Page CSS.css">
    
    <link rel="shortcut icon" type="image/jpg" href="images/logo.png"/>

    <body>
        <div class="brother">
            <!--search-box------>
            <form action="" class="search-box">
    
                <!--icon------>
                <i class="fas fa-search"></i>
    
                <!--input----->
                <input type="text" class="search-input" placeholder="Search" name="search" size = "80px" required>
    
                <!--btn------->
                <input type="submit" class="search-btn" value="Search">
    
            </form>
    
            <!--right-nav-(cart-like)-->
            <div class="right-nav">
    
    
                <!--cart----->
                <a href="Shopping Cart HTML.html" class="cart">
    
                    <img src="./images/shoping_cart.png" alt="">
    
                    <span>
                        
                        2
                    
                    </span>
    
                </a>
    
                <!--cart----->
                <a href="Login And Registration HTML.html" class="user-profile">
    
                    <img src="./images/profile.png" alt="">
    
                    <span>
    
                        1
    
                    </span>
    
                </a>
    
            </div>
        </div>

        <!--==Navigation================================-->
        <nav class="navigation">

            <!--logo-------->
            <a href="#" class="logo">

                
                <img class="logo" src="images/logo.png" alt="">

            </a>

            <!--menu-btn---->
            <input type="checkbox" class="menu-btn" id="menu-btn">

            <label for="menu-btn" class="menu-icon">

                <span class="nav-icon"></span>

            </label>

            <!--menu-------->
            <ul class="menu">
                
                <li class="home">
                    <a href="homepage.php" class="active">
                        Home
                    </a>
                </li>
                <li class="food"><a href="#">Brand</a>
                    <ul class="food-dropdown">
                       <?php
                    get_supplier_brands();
                       ?>
                    </ul>
                    <img src="./images/down_arrow.png" alt="" class="vvv">
                </li>
                <li class="electronics"><a href="#">Catagories</a>
                    <ul class="electronics-dropdown">
                    <?php
                    get_supplier_categories();
                    ?>
                    </ul>
                    <img src="./images/down_arrow.png" alt="" class="vvv">
                </li>
                
               
			</ul>


        </nav>

        <section id="popular-product">
            <!--heading----------->
           <?php
            get_search_products();
           ?>
        </section>

        <footer>
            <div class="footer-container">
                <!--logo-container------>
                <div class="footer-logo">
                    <img src="./images/allday_logo.webp" alt="shoa logo" class="logo">
                    <!--social----->
                    <div class="footer-social">
                        <a href="https://www.facebook.com/"><img alt="facebook icon" src="./images/facebook.png"></a>
                        <a href="https://twitter.com/"><img alt="twitter icon" src="./images/twitter.png"></a>
                        <a href="https://www.instagram.com/"><img alt="instagram icon" src="./images/instagram.png"></a>
                        <a href="https://www.youtube.com/"><img alt="youtube icon" src="./images/youtube.png"></a>
                    </div>
                </div>
                <!--links------------------------->
            <div class="footer-links">
                <strong>Product</strong>
                <ul>
                    <li><a href="#">Grocery</a></li>
                    <li><a href="#">Packages</a></li>
                    <li><a href="#">Popular</a></li>
                    <li><a href="#">New</a></li>
                </ul>
            </div>
            <!--links------------------------->
            <div class="footer-links">
                <strong>Category</strong>
                <ul>
                    <li><a href="#">Beauty</a></li>
                    <li><a href="#">Vegetables</a></li>
                    <li><a href="#">Baby</a></li>
                    <li><a href="#">Medicine</a></li>
                </ul>
            </div>
            <!--links-------------------------->
            <div class="footer-links">
                <strong>Contact</strong>
                <ul>
                    <li><a href="#">Phone : 0000000000</a></li>
                    <li><a href="#">Email : contact@alldaysupermarket.com</a></li>
                    <li><a href="#">Cities we serve</a></li>
                </ul>
				<br><p style="color: aliceblue;">Copyright ©2023 | All Rights Reserved</p>
            </div>
            </div>
        </footer>

    </body>

</html>
