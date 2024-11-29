<!--connect file-->
<?php
include('../include/connect.php');
session_start();
$thedata = $_SESSION['supplier_id']; // Assuming 'supplier_id' is the session variable storing the supplier ID
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_brand = $_POST['product_brand'];
    echo "<script>alert('$product_brand')</script>";
    $product_category = $_POST['product_category'];
    $product_key = $_POST['product_key'];
    $product_price = $_POST['product_price'];
    $merch_id=$_POST['merch_id'];
    // Accessing the images.
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    
    // Accessing image tmp names.
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    
    // Checking empty condition.
    if($product_title=='' || $product_description=='' || $product_brand=='' || $product_category=='' || $product_image1=='' || $product_image2=='' || $product_image3==''){
        echo "<script>alert('Please fill all the available fields')</script>";
    } else {
        move_uploaded_file($temp_image1, "product_images_of_dealers/$product_image1");
        move_uploaded_file($temp_image2, "product_images_of_dealers/$product_image2");
        move_uploaded_file($temp_image3, "product_images_of_dealers/$product_image3");
        
        $insert_product = "INSERT INTO `supplier_products` (`SP_id`,`P_name`, `P_desc`, `P_brand`, `P_category`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`,
        `merch_id`) VALUES ('$thedata', '$product_title', '$product_description', '$product_brand', '$product_category', '$product_image1', '$product_image2', 
        '$product_image3', '$product_key', NOW(), '$product_price','$merch_id')";
        
        $result_query = mysqli_query($conn, $insert_product);
        
        if($result_query) {
            echo "<script>alert('Successfully entered the data')</script>";
        } else {
            echo "Error: " . $insert_product . "<br>" . mysqli_error($conn);
            echo "<script>alert('Failed to insert the data')</script>";
        }
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
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
            <!-- Product Brand -->
                             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brand" class="form-label">Select a brand</label>
                <select name="product_brand" id="product_brand" class="form-select">
                    <option value="">Select a brand</option>
                    <?php
                    $select_query = "SELECT `B_id`, `AB_id`, `B_name` FROM `supplier_brands`";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $B_id = $row['B_id'];
                        $B_name = $row['B_name'];
                        echo "<option value='$B_id'>$B_name</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Select Category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_category" class="form-label">Select a Category</label>
                <select name="product_category" id="product_category" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_query = "SELECT `SC_id`, `A_id`, `SC_name` FROM `supplier_catagory` ";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $PC_id = $row['SC_id'];
                        $PC_name = $row['SC_name'];
                        echo "<option value='$PC_id'>$PC_name</option>";
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
            <div class="form-outline mb-4 w-50 m-auto">
                <label form="product_title" class="form-label">Product key</label>
                <input type="text" name="product_key" id="product_key" class="form-control" placeholder="Enter product title here" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label form="product_title" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product title here" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brand" class="form-label">Select a merchant id</label>
                <select name="merch_id" id="merch_id" class="form-select">
                    <option value="">Select a merchant id</option>
                    <?php
                   $select_query = "SELECT * FROM `merchant_ids` WHERE  `S_id`='$thedata'";
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
