
<?php


$con=mysqli_connect("localhost","root","","afro_farming");



function farmer_product(){
    global $con;
    $sql = "SELECT COUNT(*) AS total FROM `farmer_products`";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        // Handle the query error
        return 0;
    }
 }

 function Supplier_product(){
    global $con;
    $sql = "SELECT COUNT(*) AS total FROM `supplier_products`";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        // Handle the query error
        return 0;
    }
 }

 function orders(){
    global $con;
    $sql = "SELECT COUNT(*) AS total FROM `orders`";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        // Handle the query error
        return 0;
    }
 }
 
 function adminstrator(){
    global $con;
    $sql = "SELECT COUNT(*) AS total FROM `adminstrator`";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        // Handle the query error
        return 0;
    }
 }
// echo "Total number of farmer products: " . $totalProducts;
 


  




// Establish a database connection

// Check connection
function display_all_products_for_supplier(){
  // Connect to the database
  $con = mysqli_connect("localhost", "root", "", "afro_farming");

  // Get the supplier ID from the session
  $got_the_id = $_SESSION['supplier_id'];
  
  if(!empty($got_the_id)){
      // Fetch all products for the supplier
      $sql = "SELECT * FROM supplier_products WHERE SP_id='$got_the_id'";
      $result = mysqli_query($con, $sql);
      $num1 = 0;
      while ($row = mysqli_fetch_assoc($result)) {
          $num1++;
          $product_id = $row['P_id'];
          $supplier_id = $row['SP_id'];
          $admin_id = $row['AD_id'];
          $product_name = $row['P_name'];
          $product_description = $row['P_desc'];
          $product_brand = $row['P_brand'];
          $product_category = $row['P_category'];
          $product_image1 = $row['P_image1'];
          $product_image2 = $row['P_image2'];
          $product_image3 = $row['P_image3'];
          $product_key = $row['P_key'];
          $product_date = $row['P_date'];
          $product_price = $row['P_price'];
          $merch_id = $row['merch_id'];

          // Display the product information
          echo "
          <tr>
              <th scope='row'>$num1</th>
              <td>$product_id</td>
              <td>$supplier_id</td>
              <td>$admin_id</td>
              <td>$product_name</td>
              <td>$product_description</td>
              <td>$product_brand</td>
              <td>$product_category</td>
              <td>$product_image1</td>
              <td>$product_image2</td>
              <td>$product_image3</td>
              <td>$product_key</td>
              <td>$product_date</td>
              <td>$product_price</td>
              <td>$merch_id</td>
              <td>
                  <a href='delete.php?delete=$product_id' class='btn btn-danger'>Delete</a>
              </td>
              <td>
                  <a href='for_info_function.php?edit=$product_id' class='btn btn-primary'>Edit</a>
              </td>
          </tr>
          ";
      }
  }
  else {
      echo "<script>alert('Please log in again.')</script>";
  }
}


//this is for the farmer homepage to display data the dealers have put for the farmmers to see


function get_unique_products_catagoires(){
  global $conn;
        if(isset($_GET['catagory'])){
          
            $catagory_id=$_GET['catagory'];
            $select_query="select * from `products` where catagory_id=$catagory_id";
                      
  
  
                $result_query=mysqli_query($conn,$select_query);
                $number_of_rows=mysqli_num_rows($result_query);
                if($number_of_rows==0){
                      echo "<h1 class='text-center text-danger'>no stock for this.</h1>";

                }        
                     
                      while($row=mysqli_fetch_assoc($result_query)){
                  
                  $product_id=$row['product_id'];
                  $product_title=$row['product_title'];
                  $product_description=$row['product_description'];
                 
                  $product_image1=$row['product_image1'];
                  $product_image2=$row['product_image2'];
                  $product_image3=$row['product_image3'];
                  $product_price=$row['product_price'];
                  $catagory_id=$row['catagory_id'];
                  $brand_id=$row['brand_id'];
                   echo "
                   <div class='col-md-4 mb-2'>
                   <div class='card' >
                     <img src='../admin_area/product_images/$product_image1' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>
                     <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <a href='#' class='btn btn-dark'>add to cart</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-success'>view more</a>
                             
                     </div>
                   </div>
                  </div>
                   
                   ";

}
  
  
}
}


function get_unique_products_brands(){
  global $conn;
        if(isset($_GET['brand'])){
          
            $brand_id=$_GET['brand'];
            $select_query="select * from `products` where catagory_id=$brand_id";
                      
  
  
                $result_query=mysqli_query($conn,$select_query);
                $number_of_rows=mysqli_num_rows($result_query);
                if($number_of_rows==0){
                      echo "<h1 class='text-center text-danger'>there no serviec there.</h1>";

                }        
                     
                      while($row=mysqli_fetch_assoc($result_query)){
                  
                  $product_id=$row['product_id'];
                  $product_title=$row['product_title'];
                  $product_description=$row['product_description'];
                  $product_price=$row['product_price'];
                  $product_image1=$row['product_image1'];
                  $product_image2=$row['product_image2'];
                  $product_image3=$row['product_image3'];
                  
                  $catagory_id=$row['catagory_id'];
                  $brand_id=$row['brand_id'];
                   echo "
                   <div class='col-md-4 mb-2'>
                   <div class='card' >
                     <img src='../admin_area/product_images/$product_image1' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>
                     <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <a href='#' class='btn btn-dark'>add to cart</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-success'>view more</a>
                             
                     </div>
                   </div>
                  </div>
                   
                   ";

}
  
  
}
}


function  get_brand(){
   
  global $conn;
   $select_brands="select * from `brands`";
   $result_brands=mysqli_query($conn,$select_brands);

   
    while($row_data=mysqli_fetch_assoc($result_brands)){
      $brand_title=$row_data['brands_title']; 
      $brand_id=$row_data['brands_id'];
      echo " <li class='nav-item bg-light' >
      <a href='homepage.php?brand=$brand_id' class='nav-link text-light bg-success mb-1'>$brand_title</a> 
      
    </li>";
    }
  
}
// for the search function
function get_search_products() {
  global $conn;
  
  if (isset($_GET['search_data_product'])) {
      $search_data_value = $_GET['search_data'];
      $search_query = "SELECT `P_id`, `SP_id`, `AD_id`, `P_name`, `P_desc`, `P_brand`, `P_category`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `merch_id` FROM `supplier_products` WHERE P_key LIKE '%$search_data_value%'";
      
      $result_query = mysqli_query($conn, $search_query);
      $number_of_rows = mysqli_num_rows($result_query);

      if ($number_of_rows == 0) {
          echo "<h1 class='text-center text-danger'>No stock available for this category.</h1>";
      } else {
          while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['P_id'];
              $supplier_id = $row['SP_id'];
              $admin_id = $row['AD_id'];
              $product_name = $row['P_name'];
              $product_description = $row['P_desc'];
              $product_brand = $row['P_brand'];
              $product_category = $row['P_category'];
              $product_image1 = $row['P_image1'];
              $product_image2 = $row['P_image2'];
              $product_image3 = $row['P_image3'];
              $product_key = $row['P_key'];
              $product_date = $row['P_date'];
              $product_price = $row['P_price'];
              $merch_id = $row['merch_id'];

              echo "
                  <div class='product-box'>
                      <img alt='$product_name' src='../admin_area/product_images/$product_image1'>
                      <strong>$product_name</strong>
                      <span class='quantity'>$product_description</span>
                      <span class='price'>$product_price Birr</span>
                      <a href='homepage.php?cart=$product_id' class='cart-btn' style='text-decoration: none;'>
                          <i class='fas fa-shopping-bag'></i> Add to Cart
                      </a>
                      <a class='like-btn' style='text-decoration: none;'>
                          <i class='far fa-heart'></i>
                      </a>
                  </div>
              ";
          }
      }
  }
}

//end

//start

function get_products_detalil_for_farmmers(){//we are using this fucntcion to get the detail of the products like immages dicriprtion and things like that.for farmmers when they click detail.
 global $conn;
 if(isset($_GET['product_id'])){
   if(!isset($_GET['catagory'])){
     if (!isset($_GET['brand'])){
       $product_id=$_GET['product_id'];
$select_query="select * from `products` where product_id=$product_id";
                 $result_query=mysqli_query($conn,$select_query);
                 while($row=mysqli_fetch_assoc($result_query)){  
             $product_id=$row['product_id'];
             $product_title=$row['product_title'];
             $product_description=$row['product_description'];
             $product_price=$row['product_price'];
             $product_image1=$row['product_image1'];
             $product_image2=$row['product_image2'];
             $product_image3=$row['product_image3'];
             $product_price=$row['product_price'];
             $catagory_id=$row['catagory_id'];
             $brand_id=$row['brand_id'];
              echo "
              <div class='col-md-4 mb-2'>
              <div class='card' >
                <img src='../admin_area/product_images/$product_image1' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-success'>view more</a>
                     
                </div>
              </div>
             </div>
              
          <div class='col-md-8'>
          <div class='row'>
             <div class='col-md-12'>
 <h2 class='text-center text-success mb-5'>related images to the product.</h2>

</div>
<div class='col-md-6'>
<img src='../admin_area/product_images/$product_image2' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>

</div>
<div class='col-md-6'>
<img src='../admin_area/product_images/$product_image3' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>
 
</div>
          </div>    
          </div>   
             ";

}


}
}
 }
     
}
//end


function get_all_products_for_farmmers(){
//this fuction is used for getting all the the products the farmers got to be displaied in the display all page .

global $conn;
if(!isset($_GET['catagory'])){
  if (!isset($_GET['brand'])){
$select_query="SELECT * FROM `dealer_products` ";
              $result_query=mysqli_query($conn,$select_query);
              while($row=mysqli_fetch_assoc($result_query)){
          
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
         
          $product_image1=$row['product_image1'];
          $product_image2=$row['product_image2'];
          $product_image3=$row['product_image3'];
          $product_price=$row['product_price'];
          $catagory_id=$row['catagory_id'];
          $brand_id=$row['brand_id'];
           
          echo "
           <div class='col-md-4 mb-2'>
           <div class='card' >
             <img src='../dealer_area/product_images_of_dealers/$product_image1' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>
             <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
               <p class='card-text'>$product_description</p>
               <a href='./requests/customer_request.php?product_id=$product_id' class='btn btn-success'>request to buy</a>
              
               <a href='product_details.php?product_id=$product_id' class='btn btn-success'>view more</a>
                  
             </div>
           </div>
          </div>
           
           ";

}


}
}

}

//this is the search function for the farmmers when they are searching for a product that they want


function get_supplier_brands() {
  global $conn;

  $select_brands = "SELECT `B_id`, `AB_id`, `B_name` FROM `supplier_brands`";
  $result_brands = mysqli_query($conn, $select_brands);

  while ($row_data = mysqli_fetch_assoc($result_brands)) {
      $brand_id = $row_data['B_id'];
      $brand_name = $row_data['B_name'];
      
      echo "<li><a href='homepage.php?brand=$brand_id' class='nav-link text-light bg-success mb-1'>$brand_name</a></li>";
  }
}

function get_supplier_categories() {
  global $conn;

  $select_categories = "SELECT `SC_id`, `A_id`, `SC_name` FROM supplier_catagory";
  $result_categories = mysqli_query($conn, $select_categories);

  if ($result_categories) {
      while ($row = mysqli_fetch_assoc($result_categories)) {
          $category_name = $row['SC_name'];
          $category_id = $row['SC_id'];
      
          echo "<li><a href='homepage.php?category=$category_id' class='nav-link text-light bg-success mb-1'>$category_name</a></li>";
      }
  } else {
      echo "Error: " . mysqli_error($conn);
  }
}


function cart()
{
    global $conn;

    $id = $_SESSION['farmer_id'];
    $successMessage = '';
    $errorMessage = '';

    if (isset($_GET['cart'])) {
        $cart = $_GET['cart'];
        $select_query = "SELECT `P_id`, `SP_id`, `AD_id`, `P_name`, `P_desc`, `P_brand`, `P_category`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `merch_id` FROM `supplier_products` WHERE `P_id`='$cart'";
        $result_query = mysqli_query($conn, $select_query);

        $product_id = '';
        $supplier_id = '';
        $admin_id = '';
        $product_name = '';
        $product_description = '';
        $product_category = '';
        $product_image1 = '';
        $product_image2 = '';
        $product_image3 = '';
        $product_key = '';
        $product_date = '';
        $product_price = '';
        $merch_id = '';
        
        try {
            if (!$result_query) {
                throw new Exception("Failed to execute the query: " . mysqli_error($conn));
            }

            $row = mysqli_fetch_assoc($result_query);
            if (!$row) {
                throw new Exception("No product found with the specified ID.");
            }

            // Assign the retrieved values to the variables
            $product_id = $row['P_id'];
            $supplier_id = $row['SP_id'];
            $admin_id = $row['AD_id'];
            $product_name = $row['P_name'];
            $product_description = $row['P_desc'];
            $product_category = $row['P_category'];
            $product_image1 = $row['P_image1'];
            $product_image2 = $row['P_image2'];
            $product_image3 = $row['P_image3'];
            $product_key = $row['P_key'];
            $product_date = $row['P_date'];
            $product_price = $row['P_price'];
            $merch_id = $row['merch_id'];

            if ($admin_id == '') {
                $pay_to = $supplier_id;
            } else {
                $pay_to = $admin_id;
            }

            // Check if the product is already in the orders table
            $check_query = "SELECT `order_id` FROM `orders` WHERE `payer_F`='$id' AND `product_id`='$product_id' AND `status`='not_payed'";
            $check_result = mysqli_query($conn, $check_query);

            if (!$check_result) {
                throw new Exception("Failed to execute the query: " . mysqli_error($conn));
            }

            $existing_order = mysqli_fetch_assoc($check_result);
            if ($existing_order) {
                throw new Exception("The product is already in your cart.");
            }

            // Insert the order into the orders table
            $insert_data = "INSERT INTO `orders`(`payer_F`, `Amount`, `product_id`, `product_name`, `quaintly`, `Pay_to`, `status`, `merch_id`)
                            VALUES ('$id','$product_price','$product_id','$product_name','1','$pay_to','not_payed','$merch_id')";
            $results = mysqli_query($conn, $insert_data);

            if (!$results) {
                throw new Exception("Failed to insert the order: " . mysqli_error($conn));
            }

            $successMessage = "Order placed successfully!"; // Success message for the alert div
            // Further code logic based on the inserted order
            // ...

        } catch (Exception $e) {
            $errorMessage = "An error occurred: " . $e->getMessage(); // Error message for the alert div
            // Handle the error gracefully (e.g., display an error message, redirect, etc.)
        }
    }

    // Display the alert div based on the success or error message
    if (!empty($successMessage)) {
        echo "<div class='alert alert-success'>$successMessage</div>";
    } elseif (!empty($errorMessage)) {
        echo "<div class='alert alert-danger'>$errorMessage</div>";
    }
}

function get_unique_products_categories()
{
    global $conn;

    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT `P_id`, `SP_id`, `AD_id`, `P_name`, `P_desc`, `P_brand`, `P_category`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `merch_id` FROM `supplier_products` WHERE P_category = $category_id";

        $result_query = mysqli_query($conn, $select_query);
        $number_of_rows = mysqli_num_rows($result_query);

        if ($number_of_rows == 0) {
            echo "<h1 class='text-center text-danger'>No stock available for this category.</h1>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['P_id'];
                $supplier_id = $row['SP_id'];
                $admin_id = $row['AD_id'];
                $product_name = $row['P_name'];
                $product_description = $row['P_desc'];
                $product_category = $row['P_category'];
                $product_image1 = $row['P_image1'];
                $product_image2 = $row['P_image2'];
                $product_image3 = $row['P_image3'];
                $product_key = $row['P_key'];
                $product_date = $row['P_date'];
                $product_price = $row['P_price'];
                $merch_id = $row['merch_id'];

                echo "
                    <div class='product-box'>
                        <img alt='$product_name' src='../supplier_area/product_images_of_dealers/$product_image1'>
                        <strong>$product_name</strong>
                        <span class='quantity'>$product_description</span>
                        <span class='price'>$product_price Birr</span>
                        <a href='homepage.php?cart=$product_id' class='cart-btn' style='text-decoration: none;'>
                            <i class='fas fa-shopping-bag'></i> Add to Cart
                        </a>
                        <a class='like-btn' style='text-decoration: none;'>
                            <i class='far fa-heart'></i>
                        </a>
                    </div>
                ";
            }
        }
    }
}

function get_unique_brand_categories()
{
    global $conn;

    if (isset($_GET['brand'])) {
        $category_id = $_GET['brand'];
        $select_query = "SELECT `P_id`, `SP_id`, `AD_id`, `P_name`, `P_desc`, `P_brand`, `P_category`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `merch_id` FROM `supplier_products` WHERE P_brand = $category_id";

        $result_query = mysqli_query($conn, $select_query);
        $number_of_rows = mysqli_num_rows($result_query);

        if ($number_of_rows == 0) {
            echo "<h1 class='text-center text-danger'>No stock available for this category.</h1>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['P_id'];
                $supplier_id = $row['SP_id'];
                $admin_id = $row['AD_id'];
                $product_name = $row['P_name'];
                $product_description = $row['P_desc'];
                $product_brand = $row['P_brand'];
                $product_category = $row['P_category'];
                $product_image1 = $row['P_image1'];
                $product_image2 = $row['P_image2'];
                $product_image3 = $row['P_image3'];
                $product_key = $row['P_key'];
                $product_date = $row['P_date'];
                $product_price = $row['P_price'];
                $merch_id = $row['merch_id'];

                echo "
                    <div class='product-box'>
                        <img alt='$product_name' src='../supplier_area/product_images_of_dealers/$product_image1'>
                        <strong>$product_name</strong>
                        <span class='quantity'>$product_description</span>
                        <span class='price'>$product_price Birr</span>
                        <a href='homepage.php?cart=$product_id' class='cart-btn' style='text-decoration: none;'>
                            <i class='fas fa-shopping-bag'></i> Add to Cart
                        </a>
                        <a class='like-btn' style='text-decoration: none;'>
                            <i class='far fa-heart'></i>
                        </a>
                    </div>
                ";
            }
        }
    }
}

function get_all_products() {
  global $conn;
  $select_query = "SELECT `P_id`, `SP_id`, `AD_id`, `P_name`, `P_desc`, `P_brand`, `P_category`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `merch_id` FROM `supplier_products`";
  
  $result_query = mysqli_query($conn, $select_query);
  $number_of_rows = mysqli_num_rows($result_query);

  if ($number_of_rows == 0) {
      echo "<h1 class='text-center text-danger'>No stock available for this category.</h1>";
  } else {
      while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['P_id'];
          $supplier_id = $row['SP_id'];
          $admin_id = $row['AD_id'];
          $product_name = $row['P_name'];
          $product_description = $row['P_desc'];
          $product_brand = $row['P_brand'];
          $product_category = $row['P_category'];
          $product_image1 = $row['P_image1'];
          $product_image2 = $row['P_image2'];
          $product_image3 = $row['P_image3'];
          $product_key = $row['P_key'];
          $product_date = $row['P_date'];
          $product_price = $row['P_price'];
          $merch_id = $row['merch_id'];

          echo "
              <div class='product-box'>
                  <img alt='$product_name' src='../supplier_area/product_images_of_dealers/$product_image1'>
                  <strong>$product_name</strong>
                  <span class='quantity'>$product_description</span>
                  <span class='price'>$product_price Birr</span>
                  <a href='homepage.php?cart=$product_id' class='cart-btn' style='text-decoration: none;'>
                      <i class='fas fa-shopping-bag'></i> Add to Cart
                  </a>
                  <a class='like-btn' style='text-decoration: none;'>
                      <i class='far fa-heart'></i>
                  </a>
              </div>
          ";
      }
  }
}

function get_cart(){
  global $conn;
  $id = $_SESSION['farmer_id'];
  $sql = "SELECT o.order_id, o.payer_C, o.payer_F, o.Amount, o.product_id, o.product_name, o.quaintly, o.Pay_to, o.status, p.P_image1 
          FROM orders o
          INNER JOIN supplier_products p ON o.product_id = p.P_id
          WHERE o.Payer_F='$id' and o.status='not_payed'";
  $result = mysqli_query($conn, $sql);
  
  while($row = mysqli_fetch_assoc($result)){
      $order_id = $row['order_id'];
      $payer_C = $row['payer_C'];
      $payer_F = $row['payer_F'];
      $amount = $row['Amount'];
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $quaintly = $row['quaintly'];
      $pay_to = $row['Pay_to'];
      $status = $row['status'];
      $product_image1 = $row['P_image1'];

      echo "
      <div class='product'>
          <img src='../supplier_area/product_images_of_dealers/$product_image1'>
          <div class='product-info'>
              <h3 class='product-name'>$product_name</h3>
              <h4 class='product-price'>birr. $amount</h4>
              <h4 class='product-offer'>50%</h4>
              <form method='post'>
              <p class='product-quantity'>
                  Qnt: 
                  <input value='$quaintly' name='qt'>
              </p>
              <p class='product-remove'>
                  <i class='fas fa-trash-alt'></i>
                  <a href='cart.php?remove=$order_id'><span class='remove'>Remove</span></a>
              </p>
              <p class='product-update'>
                <i class='fas fa-edit'></i>
                <button type='submit' name='update' value='$order_id' class='update'>Update</button>
              </p>
              </form>
          </div>
      </div>
      ";
  }
}


function calculateTotalAmount($consumerId) {
  global $conn;
  $sql = "SELECT `Amount`, `quaintly` FROM `orders` WHERE `payer_F`='$consumerId' AND `status`='not_payed'";
  $result = mysqli_query($conn, $sql);
  $total_amount = 0;

  while ($row = mysqli_fetch_assoc($result)) {
    $amount = $row['Amount'];
    $quaintly = $row['quaintly'];
    $total_amount += $amount * $quaintly;
  }

  return $total_amount;
}



function calculateItemCount($consumerId) {
  global $conn;
  $sql = "SELECT COUNT(*) AS item_count FROM `orders` WHERE `payer_F`='$consumerId' and `status`='not_payed'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $itemCount = $row['item_count'];
  return $itemCount;
}


function get_payed_consumer(){
  $conn=mysqli_connect("localhost","root","","afro_farming");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
  $id = $_SESSION['farmer_id'];
  $sql = "SELECT o.order_id, o.payer_C, o.payer_F, o.Amount, o.product_id, o.product_name, o.quaintly, o.Pay_to, o.status, o.merch_id,
          c.C_id, c.C_fname, c.C_lname, c.C_phonenumber, c.C_email, c.C_profile_image, c.C_date, c.C_password
          FROM orders o
          INNER JOIN consumer c ON o.payer_C = c.C_id
          WHERE o.Pay_to='$id' AND o.status='payed'";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
      die("Query Error: " . mysqli_error($conn));
  }

  while($row = mysqli_fetch_assoc($result)){
      $order_id = $row['order_id'];
      $payer_C = $row['payer_C'];
      $payer_F = $row['payer_F'];
      $amount = $row['Amount'];
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $quaintly = $row['quaintly'];
      $pay_to = $row['Pay_to'];
      $status = $row['status'];
      $merch_id = $row['merch_id'];
      $c_id = $row['C_id'];
      $c_fname = $row['C_fname'];
      $c_lname = $row['C_lname'];
      $c_phonenumber = $row['C_phonenumber'];
      $c_email = $row['C_email'];
      $c_profile_image = $row['C_profile_image'];
      $c_date = $row['C_date'];
      $c_password = $row['C_password'];

      echo "
      <tr>
        <td><img src='../profileimages/$c_profile_image' alt='User Image' class='user-image'></td>
        <td>$c_fname $c_lname</td>
        <td>$c_email</td>
        <td>$c_phonenumber</td>
        <td>$product_name</td>
        <td>$amount</td>
      </tr>
      ";
  }
}


function get_payed_consumer_admin(){
  $conn=mysqli_connect("localhost","root","","afro_farming");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
  $id = $_SESSION["admin_id"];
  $sql = "SELECT o.order_id, o.payer_C, o.payer_F, o.Amount, o.product_id, o.product_name, o.quaintly, o.Pay_to, o.status, o.merch_id,
          c.C_id, c.C_fname, c.C_lname, c.C_phonenumber, c.C_email, c.C_profile_image, c.C_date, c.C_password
          FROM orders o
          INNER JOIN consumer c ON o.payer_C = c.C_id
          WHERE o.Pay_to='$id' AND o.status='payed'";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
      die("Query Error: " . mysqli_error($conn));
  }

  while($row = mysqli_fetch_assoc($result)){
      $order_id = $row['order_id'];
      $payer_C = $row['payer_C'];
      $payer_F = $row['payer_F'];
      $amount = $row['Amount'];
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $quaintly = $row['quaintly'];
      $pay_to = $row['Pay_to'];
      $status = $row['status'];
      $merch_id = $row['merch_id'];
      $c_id = $row['C_id'];
      $c_fname = $row['C_fname'];
      $c_lname = $row['C_lname'];
      $c_phonenumber = $row['C_phonenumber'];
      $c_email = $row['C_email'];
      $c_profile_image = $row['C_profile_image'];
      $c_date = $row['C_date'];
      $c_password = $row['C_password'];

      echo "
      <tr>
        <td><img src='../profileimages/$c_profile_image' alt='User Image' class='user-image'></td>
        <td>$c_fname $c_lname</td>
        <td>$c_email</td>
        <td>$c_phonenumber</td>
        <td>$product_name</td>
        <td>$amount</td>
      </tr>
      ";
  }
}

function get_payed_farmer(){
  $conn = mysqli_connect("localhost", "root", "", "afro_farming");
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $id =$_SESSION["supplier_id"];
  $sql = "SELECT o.order_id, o.payer_C, o.payer_F, o.Amount, o.product_id, o.product_name, o.quaintly, o.Pay_to, o.status, o.merch_id,
          f.F_id, f.F_fname, f.F_lname, f.F_phonenumber, f.F_profile_image, f.F_password
          FROM orders o
          INNER JOIN farmer f ON o.payer_F = f.F_id
          WHERE o.Pay_to='$id' AND o.status='payed'";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
      die("Query Error: " . mysqli_error($conn));
  }

  while($row = mysqli_fetch_assoc($result)){
      $order_id = $row['order_id'];
      $payer_C = $row['payer_C'];
      $payer_F = $row['payer_F'];
      $amount = $row['Amount'];
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $quaintly = $row['quaintly'];
      $pay_to = $row['Pay_to'];
      $status = $row['status'];
      $merch_id = $row['merch_id'];
      $f_id = $row['F_id'];
      $f_fname = $row['F_fname'];
      $f_lname = $row['F_lname'];
      $f_phonenumber = $row['F_phonenumber'];
      $f_profile_image = $row['F_profile_image'];
      $f_password = $row['F_password'];
      echo "<script>alert('$f_profile_image')</script>";
      echo "
      <tr>
        <td><img src='../profileimages/$f_profile_image' alt='User Image' class='user-image'></td>
        <td>$f_fname $f_lname</td>
        <td>$f_phonenumber</td>
        <td>$product_name</td>
        <td>$amount</td>
      </tr>
      ";
  }
}


?>
