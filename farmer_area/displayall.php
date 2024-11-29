  <!--connect file-->
  <?php
include_once('../fucntions/for_info_functions.php');
include_once('../include/connect.php');

session_start();
$thedata=$_SESSION['phone_number'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> farmming assistance</title>
    <!-- boot strap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">
    <!-- boot strap link  -->
    <!--  font alwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
     crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <!--font alwsome end -->
    <!-- css file link-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="container-fluid  "></div>
          <!-- nav bar -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
            <ul class="navbar-nav  ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user "></i><?php
                                echo "$thedata";
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./profiles/customerprofilemanage/customerprofile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="./profiles/customerprofilemanage/profileedit.php">Settings</a></li>
                                <li><a class="dropdown-item" href="../chooseaccount.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                  </li>
                   <li  class="nav-item">
                    <a class="nav-link" href="#"  >contact</a>
                   </li>  
                   <li   class="nav-item">
                    <a class="nav-link"  href="#"><i class="fa-sharp fa-solid fa-cart-shopping"><sup>1</sup></i></a>
                   </li> 
                   <li class="nav-item">
                    <a  class="nav-link" href="#">totalprice:100/-</a>
                   </li>
                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                  <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
                  <input type="submit" value="search" class="btn btn-outline-light" type="submit" name="search_data_product">
                </form>
              </div>
            </div>
          </nav>
          <!-- nav bar end -->


          <!-- secound child -->
                  <div class="nav navbar navbar-expand-lg navbar-dark bg-light ">
                      <ul class="navbar-nav me-auto">
                        <li  class="nav-item">
                          <a class="nav-link" href="#"  >welcome enkuan dena metu</a>
                         </li> 
                         <li  class="nav-item">
                          <a class="nav-link" href="#"  >login</a> 
                         </li>   
                      </ul>
                  </div>


          <!-- secound child end -->

         <!-- thrid child-->
         <div class="dev bg-green">
          <h3 class="text-center">unknown name store</h3>
          <p class="text-center"> this is for the people by untiy students</p>
         </div>
         <!-- third child end -->
           
         <!-- forth row -->
                     <div class="row px-1">
                        <div class="div col-md-10">
                          <!--product-->
                          <div class="row">
                             
                          <!--feching product-->
                          <?php
                           get_all_products_for_farmmers();//we called this fucntion form the fucntion folder to display the code.
                           get_unique_products_catagoires();//we called this to display unique value.
                           get_unique_products_brands();// we look for services here from the area we have given them.
                          ?>
                            <!-- <div class="col-md-4 mb-2">
                                <div class="card" >
                                  <img src="./for final project images/coffie image1.jpg" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h5 class="card-title">coffie</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-dark">add to cart</a>
                                      <a href="#" class="btn btn-success">view more</a>
                                  </div>
                                </div>
                               </div>-->

                               <!--row end-->
                               
                                 

                          </div>
                            <!-- col end -->
                        </div>
                        <div class="div col-md-2 bg-secondary p-0">
                          <!--sidenav-->

                          <!-- brands to be displayed-->
                           <ul class="navbar-nav me-auto text-center" >
                            <li class="nav-item bg-info" >
                              <a href="#" class="nav-link text-light bg-dark"><h4>deleverd form<br>(mimetabete bota)</h4></a>
                             
                            </li>
                            <?php
                              get_brand();
                              
                            ?>
                           
                           </ul>
                          <!-- brands to be displayed end-->

                          <!-- catagory to be displayed -->
                          <ul class="navbar-nav me-auto text-center" >
                            <li class="nav-item bg-dark" >
                              <a href="#" class="nav-link text-light"><h4>menakerbewe eka (catagory)</h4></a>
                             
                            </li>
                            <?php
                               $select_catagory="select * from `catagory`";
                               $result_catagory=mysqli_query($conn,$select_catagory);

                               
                                while($row_data=mysqli_fetch_assoc($result_catagory)){
                                  $catagory_title=$row_data['catagory_title']; 
                                  $catagory_id=$row_data['catagory_id'];
                                  echo " <li class='nav-item bg-light' >
                                  <a href='displayall.php?catagory=$catagory_id' class='nav-link text-light bg-success mb-1'>$catagory_title</a> 
                                  
                                </li>";
                                }
                              
                            ?>
                           </ul>
                          <!-- end of catagory to be displayed-->
                  
                        </div>
                     </div>    
         <!-- forth row end  -->
   
         <!-- last child the footer -->
        <div class=" bg-dark p-3 text-center text-white fixed-bottom">
          <p> all rights reserved for the final project assigment wefe name </p>
        </div>
        <!-- footer end -->
        <!-- boot strap javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    <!-- boot strap  javascript  link-->
    
</body>
</html>