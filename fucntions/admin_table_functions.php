<?php
include_once('../include/connect.php');


function display_all_consumer(){//this displays all consumer data for the admin  

    global $conn;
  
$sql = "SELECT 
c.`C_id`, 
c.`C_fname`, 
c.`C_lname`, 
c.`C_phonenumber`, 
c.`C_email`, 
c.`C_profile_image`, 
c.`C_date`, 
c.`C_password`,
ca.`C_house_no`, 
ca.`C_state`, 
ca.`C_city`, 
ca.`C_Subcity`, 
ca.`C_worda`, 
ca.`C_kebele`
FROM `consumer` c
JOIN `consumer_address` ca ON c.`C_id` = ca.`C_id`
";
        $result = mysqli_query($conn, $sql);
        $num1=0;
        while ($row = mysqli_fetch_assoc($result)) {
          $num1++;
          $C_id=$row['C_id'];
          $C_fname=$row['C_fname'];
          $C_lname=$row['C_lname'];
          $C_phonenumber=$row['C_phonenumber'];
          $C_email=$row['C_email'];
          $C_date=$row['C_date'];
          $C_house_no=$row['C_house_no'];
          $C_state=$row['C_state'];
          $C_city=$row['C_city'];
          $C_Subcity=$row['C_Subcity'];
          $C_worda=$row['C_worda'];
          $C_kebele=$row['C_kebele'];
          
          echo "
          <tr>
                      <th scope='row'>$num1</th>
                      <td>$C_id</td>
                      <td>$C_fname</td>
                      <td>$C_lname</td>
                      <td>$C_phonenumber</td>
                      <td>$C_email</td>
                      <td>$C_date</td>
                      <td>$C_house_no</td>
                      <td>$C_state</td>
                      <td>$C_city</td>
                      <td>$C_Subcity</td>
                      <td>$C_worda</td>
                      <td>$C_kebele</td>
                      <td>
                      <a href='delete.php?delete=" . $C_id . "' class='btn btn-danger'>Delete</a>
                      </td>
                          
                  </tr>
                  
          ";
  
        }
  
  }
  

  function display_all_suppliers() {
    global $conn;
  
    $sql = "SELECT 
        s.`S_id`, 
        s.`S_fname`, 
        s.`S_lname`, 
        s.`S_phone_number`, 
        s.`S_email`, 
        s.`S_profile_image`, 
        s.`S_password`, 
        s.`S_date`,
        sa.`S_house_no`, 
        sa.`S_city`, 
        sa.`S_subcity`, 
        sa.`S_woreda`, 
        sa.`S_kebele`
    FROM `supplier` s
    JOIN `supplier_address` sa ON s.`S_id` = sa.`S_id`";

    $result = mysqli_query($conn, $sql);
    $num1 = 0;
  
    while ($row = mysqli_fetch_assoc($result)) {
        $num1++;
        $S_id = $row['S_id'];
        $S_fname = $row['S_fname'];
        $S_lname = $row['S_lname'];
        $S_phonenumber = $row['S_phone_number'];
        $S_email = $row['S_email'];
        $S_date = $row['S_date'];
        $S_house_no = $row['S_house_no'];
        $S_city = $row['S_city'];
        $S_subcity = $row['S_subcity'];
        $S_woreda = $row['S_woreda'];
        $S_kebele = $row['S_kebele'];
          
        echo "
            <tr>
                <th scope='row'>$num1</th>
                <td>$S_id</td>
                <td>$S_fname</td>
                <td>$S_lname</td>
                <td>$S_phonenumber</td>
                <td>$S_email</td>
                <td>$S_kebele</td>
                <td>$S_house_no</td>
                <td>$S_city</td>
                <td>$S_subcity</td>
                <td>$S_woreda</td>
                <td>$S_date</td>
                <td>
                    <a href='delete.php?delete_supplier=$S_id' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
        ";
    }
}

  function display_all_admins() {
    global $conn;
  
    $sql = "SELECT 
        `A_id`, 
        `A_fname`, 
        `A_lname`, 
        `A_phone_number`, 
        `A_profile_image`, 
        `A_email`, 
        `A_password` 
    FROM `adminstrator`";

    $result = mysqli_query($conn, $sql);
    $num1 = 0;
  
    while ($row = mysqli_fetch_assoc($result)) {
        $num1++;
        $A_id = $row['A_id'];
        $A_fname = $row['A_fname'];
        $A_lname = $row['A_lname'];
        $A_phone_number = $row['A_phone_number'];
        $A_profile_image = $row['A_profile_image'];
        $A_email = $row['A_email'];
        $A_password = $row['A_password'];
          
        echo "
            <tr>
                <th scope='row'>$num1</th>
                <td>$A_id</td>
                <td>$A_fname</td>
                <td>$A_lname</td>
                <td>$A_phone_number</td>
                <td>$A_profile_image</td>
                <td>$A_email</td>
                <td>$A_password</td>
                <td>
                    <a href='delete.php?delete=$A_id' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
        ";
    }
}

function display_all_farmer() {
  global $conn;

  $sql = "SELECT 
      f.`F_id`, 
      f.`F_fname`, 
      f.`F_lname`, 
      f.`F_phonenumber`, 
      f.`F_profile_image`, 
      f.`F_password`,
      fa.`F_house_no`, 
      fa.`F_state`, 
      fa.`F_city`, 
      fa.`F_subcity`, 
      fa.`F_woreda`, 
      fa.`F_kebele`
  FROM `farmer` f
  JOIN `farmer_address` fa ON f.`F_id` = fa.`F_id`";

  $result = mysqli_query($conn, $sql);
  $num1 = 0;

  
  while ($row = mysqli_fetch_assoc($result)) {
      $num1++;
      $F_id = $row['F_id'];
      $F_fname = $row['F_fname'];
      $F_lname = $row['F_lname'];
      $F_phonenumber = $row['F_phonenumber'];
      $F_profile_image = $row['F_profile_image'];
      $F_house_no = $row['F_house_no'];
      $F_state = $row['F_state'];
      $F_city = $row['F_city'];
      $F_subcity = $row['F_subcity'];
      $F_woreda = $row['F_woreda'];
      $F_kebele = $row['F_kebele'];
      
      echo "
          <tr>
              <th scope='row'>$num1</th>
              <td>$F_id</td>
              <td>$F_fname</td>
              <td>$F_lname</td>
              <td>$F_phonenumber</td>
              <td>$F_profile_image</td>
              <td>$F_house_no</td>
              <td>$F_state</td>
              <td>$F_city</td>
              <td>$F_subcity</td>
              <td>$F_woreda</td>
              <td>$F_kebele</td>
              <td>
                  <a href='delete.php?delete_farmer=$F_id' class='btn btn-danger'>Delete</a>
              </td>
          </tr>
      ";
  }
}

function display_all_farmer_categories() {
  global $conn;

  $sql = "SELECT 
      `FC_id`,
      `A_id`,
      `FC_name`
  FROM `farmer_category`";

  $result = mysqli_query($conn, $sql);
  $num1 = 0;



  while ($row = mysqli_fetch_assoc($result)) {
      $num1++;
      $FC_id = $row['FC_id'];
      $A_id = $row['A_id'];
      $FC_name = $row['FC_name'];
      
      echo "
          <tr>
              <th scope='row'>$num1</th>
              <td>$FC_id</td>
              <td>$A_id</td>
              <td>$FC_name</td>
              <td>
                  <a href='delete.php?delete_farmer_category=$FC_id' class='btn btn-danger'>Delete</a>
              </td>
          </tr>
      ";
  }
}

function display_all_supplier_brands() {
  global $conn;

  $sql = "SELECT 
      `B_id`, `AB_id`, `B_name`
  FROM `supplier_brands`";

  $result = mysqli_query($conn, $sql);
  $num1 = 0;

  
  while ($row = mysqli_fetch_assoc($result)) {
      $num1++;
      $B_id = $row['B_id'];
      $AB_id = $row['AB_id'];
      $B_name = $row['B_name'];
      
      echo "
          <tr>
              <th scope='row'>$num1</th>
              <td>$B_id</td>
              <td>$AB_id</td>
              <td>$B_name</td>
              <td>
                  <a href='delete.php?delete_supplier_brand=$B_id' class='btn btn-danger'>Delete</a>
              </td>
          </tr>
      ";
  }
}

function display_all_supplier_categories() {
  global $conn;

  $sql = "SELECT 
      `SC_id`, `A_id`, `SC_name`
  FROM `supplier_catagory`
  WHERE 1";

  $result = mysqli_query($conn, $sql);
  $num1 = 0;


  while ($row = mysqli_fetch_assoc($result)) {
      $num1++;
      $SC_id = $row['SC_id'];
      $A_id = $row['A_id'];
      $SC_name = $row['SC_name'];
      
      echo "
          <tr>
              <th scope='row'>$num1</th>
              <td>$SC_id</td>
              <td>$A_id</td>
              <td>$SC_name</td>
              <td>
                  <a href='delete.php?delete_supplier_category=$SC_id' class='btn btn-danger'>Delete</a>
              </td>
          </tr>
      ";
  }
}

function display_all_locations() {
    global $conn;
  
    $sql = "SELECT 
        `L_Id`, `L_name`
    FROM `location`
";
  
    $result = mysqli_query($conn, $sql);
    $num1 = 0;
  
  
    while ($row = mysqli_fetch_assoc($result)) {
        $num1++;
        $L_Id = $row['L_Id'];
        $L_name = $row['L_name'];
        
        echo "
            <tr>
                <th scope='row'>$num1</th>
                <td>$L_Id</td>
                <td>$L_name</td>
                <td>
                    <a href='delete.php?delete_location=$L_Id' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
        ";
    }
  }

  function display_all_farmer_product() {
    global $conn;
    $F_id=$_SESSION['farmer_id'];
    $sql = "SELECT 
        `P_id`, `F_id`, `A_id`, `P_name`, `P_desc`, `PC_id`, `P_image1`, `P_image2`, `P_image3`, `P_key`, `P_date`, `P_price`, `PL_id`, `merch_id`
    FROM `farmer_products`
    WHERE `F_id`='$F_id'";  
  
    $result = mysqli_query($conn, $sql);
    $num1 = 0;
  
    while ($row = mysqli_fetch_assoc($result)) {
        $num1++;
        $P_id = $row['P_id'];
        $F_id = $row['F_id'];
        $A_id = $row['A_id'];
        $P_name = $row['P_name'];
        $P_desc = $row['P_desc'];
        $PC_id = $row['PC_id'];
        $P_image1 = $row['P_image1'];
        $P_image2 = $row['P_image2'];
        $P_image3 = $row['P_image3'];
        $P_key = $row['P_key'];
        $P_date = $row['P_date'];
        $P_price = $row['P_price'];
        $PL_id = $row['PL_id'];
        $merch_id = $row['merch_id'];
  
        echo "
            <tr>
                <th scope='row'>$num1</th>
                <td>$P_id</td>
                <td>$F_id</td>
                <td>$A_id</td>
                <td>$P_name</td>
                <td>$P_desc</td>
                <td>$PC_id</td>
                <td>$P_image1</td>
                <td>$P_image2</td>
                <td>$P_image3</td>
                <td>$P_key</td>
                <td>$P_date</td>
                <td>$P_price</td>
                <td>$PL_id</td>
                <td>$merch_id</td>
                <td>
                    <a href='delete.php?delete_farmer_product=$P_id' class='btn btn-danger'>Delete</a>
                </td>
            </tr>
        ";
    }
  }
   
?>