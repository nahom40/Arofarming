<?php

include('include/connect.php');
include('fucntions/common_function.php');
session_start();
$n=$_SESSION['consumer_id'];
echo "<script>alert('$n')</script>";

?>
<DOCTYPE html>

<html>

    <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==Title==================================-->
    <title>

       Afro farming

    </title>

    <!--==Stylesheet=============================-->
    <link rel="stylesheet" type="text/css" href="Home Page CSS.css">

    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" href="images/logo.png"/>

    <!--==Using-Font-Awesome=====================-->
    <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>

    <script src = 'Home Page JS.js' defer></script>
	    
   <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

    </head>

    <body>
    <div class="brother">
        <!--search-box------>
        <form action="search.php" class="search-box">

            <!--icon------>
            <i class="fas fa-search"></i>

            <!--input----->
            <input type="text" class="search-input" placeholder="Search" name="search_data" size = "80px" required>

            <!--btn------->
            <input type="submit" class="search-btn" value="Search" name="search_data_product">

        </form>

        <!--right-nav-(cart-like)-->
        <div class="right-nav">


            <!--cart----->
            <a href="cart.php" class="cart">

                <img src="./images/shoping_cart.png" alt="">

                <span>
                    
                <?php
                if(isset($_SESSION['consumer_id'])){
            $itemCount = calculateItemCount($_SESSION['consumer_id']);
            echo $itemCount;
                
            }
            else{
                echo 0;
            }
            ?>
                
                </span>

            </a>

            <!--cart----->
            <a href="profile_pages/index.php" class="user-profile">

                <img src="./images/profile.png" alt="">

                <span>

                    
                </span>

            </a>

        </div>
    </div>

        <!--==Navigation================================-->
        <nav class="navigation">

            <!--logo-------->
            <a href="#" class="logo">

                
                <img class="logo" src="./images/logo.png" alt="">

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
                <li class="food"><a href="#">Location</a>
                    <ul class="food-dropdown">
                       <?php
                       get_locations();
                       ?>
                    </ul>
                    <img src="./images/down_arrow.png" alt="" class="vvv">
                </li>
                <li class="electronics"><a href="#">Catagories</a>
                    <ul class="electronics-dropdown">
                    <?php
                    get_farmer_categories();
                    ?>
                    </ul>
                    <img src="./images/down_arrow.png" alt="" class="vvv">
                </li>
                
               
			</ul>

            

        </nav>

        <?php
         cart();
        ?>

        <!--nav-end--------------------->
        <!--==Search-banner=======================================-->
        <section id="search-banner">


            <!--text------->
            <div class="search-banner-text">

                <h1>
                    
                    Shop Till You Drop: Discover Incredible Deals and Fresh Produce From Afro farming!
                
                </h1>

                

                <br>


            </div>

        </section>

        <!--search-banner-end--------------->

        <!--==category=========================================-->
        <section id="category">

            <!--heading---------------->
            <div class="category-heading">

                <h2>
               By catagories
               </h2>

                <span>
                    
                    All
                
                </span>

            </div>
          
            
            <div class="product-container">
                <!--box---------->
           <?php    
              get_unique_products_categories();
           ?>
                <!--box---------->
            </div>
            




            <div class="category-heading">

                <h2>
                By location
                </h2>

                <span>
                    
                    All
                
                </span>

            </div>
          
            
            <div class="product-container">
                <!--box---------->
           <?php    
             get_unique_location_categories();
           ?>
                <!--box---------->
            </div>
            
        </section>
        <!--category-end----------------------------------->
        <!--==Products====================================-->
        <!--popular-product-end--------------------->
        <!--Popular-bundle-pack===================================-->
        <section id="popular-bundle-pack">
            <!--heading-------------->
            <div class="product-heading">
                <h3>All products</h3>
            </div>
            <!--box-container------>
            <div class="product-container">
                <!--box---------->
               <?php
                get_all_products();
           
               ?>
            </div>
        </section>
        <!--popular-bundle-pack-end-------------------------------->
        <!--==Clients===============================================-->
        
            </div>
        </section>
       
        <footer>
            <div class="footer-container">
                <!--logo-container------>
                <div class="footer-logo">
                    <img src="./images/logo.png" alt="shoa logo" class="logo">
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
                    <li><a href="#">Phone : 0924416055</a></li>
                    <li><a href="#">Email : biniyamyoseph063@gmail.com</a></li>
                    
                </ul>
				<br><p style="color: aliceblue;">Copyright ©2023 | All Rights Reserved</p>
            </div>
            </div>
        </footer>
    </body>
</html>
