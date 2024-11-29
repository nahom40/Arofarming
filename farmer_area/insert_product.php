<!--connect file-->
<?php
include('../include/connect.php');
session_start();
$thedata = $_SESSION['farmer_id']; 
if(isset($_POST['insert_product'])){
       $product_title=$_POST['product_title'];
       $product_description=$_POST['product_description'];
       $product_keyword=$_POST['product_keyword'];
       $product_catagory=$_POST['product_catagory'];
       $product_brand=$_POST['product_location'];
       $product_price=$_POST['product_price'];
       $product_status='true';
       $merch_id=$_POST['merchant_id'];
       //accessing the images.
       $product_image1=$_FILES['product_image1']['name'];
       $product_image2=$_FILES['product_image2']['name'];
       $product_image3=$_FILES['product_image3']['name'];
       
      //accessing image tmp name

      $temp_image1=$_FILES['product_image1']['tmp_name'];
      $temp_image2=$_FILES['product_image2']['tmp_name'];
      $temp_image3=$_FILES['product_image3']['tmp_name'];
      
      //checking empty condtion
      if($product_title=='' or $product_description=='' or $product_keyword==''
     or $product_catagory=='' or $product_brand=='' or $product_price=='' or 
     $product_image1=='' or $product_image2=='' or $product_image3=='' or $merch_id==''){
    echo"<script>alert('please fill all the avalible  fields')</script>";

      }
      else{
            move_uploaded_file($temp_image1,"../admin_area/product_images/$product_image1");
            move_uploaded_file($temp_image2,"../admin_area/product_images/$product_image2");
            move_uploaded_file($temp_image3,"../admin_area/product_images/$product_image3");
      
            
            $insert_product = "INSERT INTO `farmer_products` ( `F_id`, `P_name`, `P_desc`, `PC_id`, `P_image1`,
             `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `PL_id`,`merch_id`)

VALUES ('$thedata', '$product_title', '$product_description', '$product_catagory', '$product_image1', '$product_image2', '$product_image3', 
'$product_keyword', NOW(), '$product_price', '$product_brand','$merch_id' )";

         $result_query=mysqli_query($conn,$insert_product);
              echo "<script>alert('sucessfully entered the data')</script>";

        }     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IEte=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS link -->
    <link rel="stylesheet" href="../style.css">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #EAE7AF;
        }
    </style>
</head>
<body class="">
    <div class="container">
        <h1 class="text-center">Insert Products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Product Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label form="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title here" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label form="product_description" class="form-label">Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description here" autocomplete="off" required="required">
            </div>
            <!-- Product Keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label form="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keyword here" autocomplete="off" required="required">
            </div>
            <!-- Select Category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_catagory" class="form-label">Select a Category</label>
                <select name="product_catagory" id="product_catagory" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_query = "SELECT FC_id, A_id, FC_name FROM farmer_category";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $FC_id = $row['FC_id'];
                       
                        $FC_name = $row['FC_name'];
                        echo "<option value='$FC_id'>$FC_name</option>";
                    }
                    
                    ?>
                </select>
            </div>
            <!-- Select Brand -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brand" class="form-label">Select a Location</label>
                <select name="product_location" id="product_brand" class="form-select">
                    <option value="">Select a Location</option>
                    <?php
                   $select_query = "SELECT L_Id, L_name FROM location";
                   $result_query = mysqli_query($conn, $select_query);
                   while ($row = mysqli_fetch_assoc($result_query)) {
                       $L_Id = $row['L_Id'];
                       $L_name = $row['L_name'];
                       echo "<option value='$L_Id'>$L_name</option>";
                   }
                   
                    ?>
                </select>
            </div>
            <!-- Product Images -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <!-- Product Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label form="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price here" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brand" class="form-label">Select a merchant id</label>
                <select name="merchant_id" id="product_brand" class="form-select">
                    <option value="">Select a merchant id</option>
                    <?php
                   $select_query = "SELECT * FROM `merchant_ids` WHERE  `F_id`='$thedata'";
                   $result_query = mysqli_query($conn, $select_query);
                   while ($row = mysqli_fetch_assoc($result_query)) {
                       $M_Id = $row['Merchant_Id'];
                       
                       echo "<option value='$M_Id'>$M_Id</option>";
                   }
                   
                    ?>
                </select>
            </div>            
            <!-- Insert Product -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-primary mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
</body>
</html>
