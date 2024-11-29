<?php
include('../include/connect.php');
include_once('../fucntions/for_info_functions.php');
include('admin_couters.php');
session_start();
$thedata=$_SESSION["admin_email"];
$find_the_farmmer_id="SELECT * FROM `adminstrator` WHERE `A_email`='$thedata'";
$result_finder=mysqli_query($conn,$find_the_farmmer_id);
while($row=mysqli_fetch_assoc($result_finder)){
    $admin_id=$row['A_id'];
}
$_SESSION["admin_id"] = $admin_id;
     

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i> Admin manager</div>
            <div class="list-group list-group-flush my-3">
              
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                        
                <a href="insert_product.php?id=<?php echo  $admin_id ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>insert_product</a>

                <a href="insert_admin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>insert_admins</a>

                <a href="homepage.php?i_sup_brands" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>insert supplier brands</a>

                  <a href="homepage.php?i_far_cata" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>insert farmer catagories</a>

                  <a href="homepage.php?i_sup_cata" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                 
                  class="fas fa-project-diagram me-2"></i>insert supplier catagoires</a>

                  <a href="homepage.php?v_customer" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view_customers</a>

                  <a href="homepage.php?v_admins" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view_admins</a>

                  <a href="homepage.php?v_supplier" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view_suppliers</a>

                  <a href="homepage.php?v_farmer" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view_farmers</a>
                  <a href="homepage.php?v_farmer_cat" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view_all_ farmer catagoires</a>
                  <a href="homepage.php?v_suppier_bra" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view_all_supplier brands</a>
                  <a href="homepage.php?v_suppier_cat" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view_all_supplier catagories</a>
                  <a href="homepage.php?i_l" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>insert location</a>
                  <a href="homepage.php?v_l" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view_all_Locations</a>
                  <a href="homepage.php?i_mid" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>Insert merchant_id</a>
                  <a href="view_customer_who_payed.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                  class="fas fa-project-diagram me-2"></i>view payed consumer</a>
                  
                  <a href="analytics/index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-chart-line me-2"></i>Analytics</a>  
                  <a href="../chooseaccount.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                            class="fas fa-power-off me-2"></i>Logout</a>
                    
                      </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php
                                echo "$thedata";
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../profiles/dealerprofilemanage/dealerprofile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="../profiles/dealerprofilemanage/profileedit.php">Settings</a></li>
                                <li><a class="dropdown-item" href="../chooseaccount.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                              <?php
                             // product_counterr();
                             
                              ?>
                                   <h3 class="fs-2"><?php echo  $totalProducts = farmer_product();?></h3>
                               <p class="fs-5">Farmer Products</p>
                               
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                
                               
                               <h3 class="fs-2"><?php echo $totalsupProducts= Supplier_product();?></h3>
                               <p class="fs-5">Supplier Products</p>
                               
                                
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo orders();?></h3>
                                <p class="fs-5">Orders</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo  adminstrator();?></h3>
                                <p class="fs-5">Adminstrator</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
                
                <div class="row my-5">
                <?php
                 
                 if(isset($_GET['i_sup_brands'])){//this gets the supplier brands 
                    include('insert_supplier_brand.php');

              }
              if(isset($_GET['i_far_cata'])){// this is the farmer catagories
                include('insert_catagory_for_farmers.php');

                    }

                    if(isset($_GET['i_sup_cata'])){// this is the  supplier catagories
                        include('insert_catagories_for_suppliers.php');

                }

                if(isset($_GET['v_customer'])){// this is the customer table view
                    include('tables/view_consumer.php');

            }

            if(isset($_GET['v_admins'])){// this is the admin view 
                include('tables/view_admins.php');

        }

        if(isset($_GET['v_supplier'])){// the supplier view 
            include('tables/view_supplier.php');

        }
        if(isset($_GET['v_farmer'])){// the farmer view
            include('tables/view_farmer.php');

        }
        if(isset($_GET['v_farmer_cat'])){// the farmer catagoires view
            include('tables/view_cat_farmer.php');

        }

        if(isset($_GET['v_suppier_cat'])){// the supplier catagories view
            include('tables/view_cat_supplier.php');

        }
        if(isset($_GET['v_suppier_bra'])){// the supplier catagories view
            include('tables/view_brand_supplier.php');

        }
        if(isset($_GET['i_l'])){
            include('insert_location.php');
        }
        if(isset($_GET['v_l'])){
            include('tables/view_location.php');
        }
        if(isset($_GET['i_mid'])){
            include('MerchantId.php');
        }
                
        
                ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>


