 <?php

    include('./include/connect.php');
    
    //to get the products
    
//start

function calculateTotalAmount($consumerId) {
    global $conn;
    $sql = "SELECT `Amount`, `quaintly` FROM `orders` WHERE `payer_C`='$consumerId' AND `status`='not_payed'";
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
  $sql = "SELECT COUNT(*) AS item_count FROM `orders` WHERE `payer_C`='$consumerId' and `status`='not_payed'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $itemCount = $row['item_count'];
  return $itemCount;
}


function cart()
{
    global $conn;

    $id = $_SESSION['consumer_id'];
    $successMessage = '';
    $errorMessage = '';

    if (isset($_GET['cart'])) {
        $cart = $_GET['cart'];
        $select_query = "SELECT `P_id`, `F_id`, `A_id`, `P_name`, `P_desc`, `PC_id`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `PL_id`,`merch_id` FROM `farmer_products` WHERE `P_id`='$cart'";
        $result_query = mysqli_query($conn, $select_query);

        $product_id = '';
        $farmer_id = '';
        $admin_id = '';
        $product_name = '';
        $product_description = '';
        $product_category_id = '';
        $product_image1 = '';
        $product_image2 = '';
        $product_image3 = '';
        $product_key = '';
        $product_date = '';
        $product_price = '';
        $location_id = '';
        $merch_id='';   
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
            $farmer_id = $row['F_id'];
            $admin_id = $row['A_id'];
            $product_name = $row['P_name'];
            $product_description = $row['P_desc'];
            $product_category_id = $row['PC_id'];
            $product_image1 = $row['P_image1'];
            $product_image2 = $row['P_image2'];
            $product_image3 = $row['P_image3'];
            $product_key = $row['P_key'];
            $product_date = $row['P_date'];
            $product_price = $row['P_price'];
            $location_id = $row['PL_id'];
            $merch_id=$row['merch_id'];
            if ($admin_id == '') {
                $pay_to = $farmer_id;
            } else {
                $pay_to = $admin_id;
            }

            // Check if the product is already in the orders table
            $check_query = "SELECT `order_id` FROM `orders` WHERE `payer_C`='$id' AND `product_id`='$product_id' and  `status`='not_payed' ";
            $check_result = mysqli_query($conn, $check_query);

            if (!$check_result) {
                throw new Exception("Failed to execute the query: " . mysqli_error($conn));
            }

            $existing_order = mysqli_fetch_assoc($check_result);
            if ($existing_order) {
                throw new Exception("The product is already in your cart.");
            }

            // Insert the order into the orders table
            $insert_data = "INSERT INTO `orders`(`payer_C`, `Amount`, `product_id`, `product_name`, `quaintly`, `Pay_to`, `status`,`merch_id`)
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

//to get all the products to display all of them
function get_all_products(){
  global $conn;
            $select_query = "SELECT `P_id`, `F_id`, `A_id`, `P_name`, `P_desc`, `PC_id`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `PL_id` FROM `farmer_products` ";

            $result_query = mysqli_query($conn, $select_query);
            $number_of_rows = mysqli_num_rows($result_query);
    
            if ($number_of_rows == 0) {
                echo "<h1 class='text-center text-danger'>No stock available for this category.</h1>";
            } else {
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['P_id'];
                    $farmer_id = $row['F_id'];
                    $admin_id = $row['A_id'];
                    $product_name = $row['P_name'];
                    $product_description = $row['P_desc'];
                    $product_category_id = $row['PC_id'];
                    $product_image1 = $row['P_image1'];
                    $product_image2 = $row['P_image2'];
                    $product_image3 = $row['P_image3'];
                    $product_key = $row['P_key'];
                    $product_date = $row['P_date'];
                    $product_price = $row['P_price'];
                    $location_id = $row['PL_id'];
    
                    echo "
                        <div class='product-box'>
                            <img alt='$product_name' src='./admin_area/product_images/$product_image1'>
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



//end




// start

function get_unique_products_categories()
{
    global $conn;

    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT `P_id`, `F_id`, `A_id`, `P_name`, `P_desc`, `PC_id`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `PL_id` FROM `farmer_products` WHERE PC_id = $category_id";

        $result_query = mysqli_query($conn, $select_query);
        $number_of_rows = mysqli_num_rows($result_query);

        if ($number_of_rows == 0) {
            echo "<h1 class='text-center text-danger'>No stock available for this category.</h1>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['P_id'];
                $farmer_id = $row['F_id'];
                $admin_id = $row['A_id'];
                $product_name = $row['P_name'];
                $product_description = $row['P_desc'];
                $product_category_id = $row['PC_id'];
                $product_image1 = $row['P_image1'];
                $product_image2 = $row['P_image2'];
                $product_image3 = $row['P_image3'];
                $product_key = $row['P_key'];
                $product_date = $row['P_date'];
                $product_price = $row['P_price'];
                $location_id = $row['PL_id'];

                echo "
                    <div class='product-box'>
                        <img alt='$product_name' src='./admin_area/product_images/$product_image1'>
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


function get_unique_location_categories()
{
    global $conn;

    if (isset($_GET['location'])) {
        $category_id = $_GET['location'];
        $select_query = "SELECT `P_id`, `F_id`, `A_id`, `P_name`, `P_desc`, `PC_id`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `PL_id` FROM `farmer_products` WHERE PL_id = $category_id";

        $result_query = mysqli_query($conn, $select_query);
        $number_of_rows = mysqli_num_rows($result_query);

        if ($number_of_rows == 0) {
            echo "<h1 class='text-center text-danger'>No stock available for this category.</h1>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['P_id'];
                $farmer_id = $row['F_id'];
                $admin_id = $row['A_id'];
                $product_name = $row['P_name'];
                $product_description = $row['P_desc'];
                $product_category_id = $row['PC_id'];
                $product_image1 = $row['P_image1'];
                $product_image2 = $row['P_image2'];
                $product_image3 = $row['P_image3'];
                $product_key = $row['P_key'];
                $product_date = $row['P_date'];
                $product_price = $row['P_price'];
                $location_id = $row['PL_id'];

                echo "
                    <div class='product-box'>
                        <img alt='$product_name' src='./admin_area/product_images/$product_image1'>
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
function get_farmer_categories() {
  global $conn;
  $select_categories = "SELECT `FC_id`, `A_id`, `FC_name` FROM `farmer_category`";
$result_categories = mysqli_query($conn, $select_categories);

while ($row = mysqli_fetch_assoc($result_categories)) {
    $category_name = $row['FC_name'];
    $category_id = $row['FC_id'];
    
    echo "<li><a href='homepage.php?category=$category_id' class='nav-link text-light bg-success mb-1'>$category_name</a></li>";
}
}
//start 


 // this funciton is to get all the location for the user to select
 function get_locations() {
  global $conn;
  
  $select_locations = "SELECT `L_Id`, `L_name` FROM `location` ";
  $result_locations = mysqli_query($conn, $select_locations);
  
  while ($row_data = mysqli_fetch_assoc($result_locations)) {
      $location_id = $row_data['L_Id'];
      $location_name = $row_data['L_name'];
      
      echo "<li><a href='homepage.php?location=$location_id' class='nav-link text-light bg-success mb-1'>$location_name</a></li>";
  }
}

 // for the search function
 function get_search_products(){
    global $conn;
      if(isset($_GET['search_data_product'])){
       $search_data_value=$_GET['search_data'];   
       $search_query="select * from `farmer_products` where P_key LIKE '%$search_data_value%'";
            
        $result_query = mysqli_query($conn, $search_query);
        $number_of_rows = mysqli_num_rows($result_query);

        if ($number_of_rows == 0) {
            echo "<h1 class='text-center text-danger'>No stock available for this category.</h1>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['P_id'];
                $farmer_id = $row['F_id'];
                $admin_id = $row['A_id'];
                $product_name = $row['P_name'];
                $product_description = $row['P_desc'];
                $product_category_id = $row['PC_id'];
                $product_image1 = $row['P_image1'];
                $product_image2 = $row['P_image2'];
                $product_image3 = $row['P_image3'];
                $product_key = $row['P_key'];
                $product_date = $row['P_date'];
                $product_price = $row['P_price'];
                $location_id = $row['PL_id'];

                echo "
                    <div class='product-box'>
                        <img alt='$product_name' src='./admin_area/product_images/$product_image1'>
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




function get_cart(){
    global $conn;
    $id = $_SESSION['consumer_id'];
    $sql = "SELECT o.order_id, o.payer_C, o.payer_F, o.Amount, o.product_id, o.product_name, o.quaintly, o.Pay_to, o.status, p.P_image1 
            FROM orders o
            INNER JOIN farmer_products p ON o.product_id = p.P_id
            WHERE o.Payer_C='$id' and o.status='not_payed'";
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
            <img src='admin_area/product_images/$product_image1'>
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
//end

//start

function get_products_detalil(){//we are using this fucntcion to get the detail of the products like immages dicriprtion and things like that.
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
                 <img src='./admin_area/product_images/$product_image1' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>
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
<img src='./admin_area/product_images/$product_image2' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>
 
</div>
<div class='col-md-6'>
<img src='./admin_area/product_images/$product_image3' class='card-img-top ' style='object-fit: cover; hight=50%; width=100% ' alt='...'>
  
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


?>
