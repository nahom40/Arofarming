<?php

include('../include/connect.php');

session_start();

if(isset($_POST['insert_user'])){//this is the consumer reg code that takes the values of the consumer reg and add them to there proper table using there forign key .
                                 //u will understand it if u read it.
       $f_name=$_POST['f_name'];
       $l_name=$_POST['l_name'];
       $phone=$_POST['Phone_number'];
       $email=$_POST['email'];
       //accessing the images.
       $profile_image1=$_FILES['profile_image1']['name'];
       $password=$_POST['password'];
       
       $house_no=$_POST['house_no'];
       $state=$_POST['state'];
       $city=$_POST['C_city'];
       $subcity=$_POST['C_Subcity'];
       $woreda=$_POST['C_worda'];
       $kebele=$_POST['C_kebele'];

      //accessing image tmp name

      $temp_image1=$_FILES['profile_image1']['tmp_name'];
      
      //checking empty condtion
     
              
        // Initialize an empty string to store the names of the empty variables
$empty_fields = '';

// Check if each required field is empty and add its name to $empty_fields if it is
if(empty($f_name)){
    $empty_fields .= 'First name, ';
}
if(empty($l_name)){
    $empty_fields .= 'Last name, ';
}
if(empty($phone)){
    $empty_fields .= 'Phone number, ';
}
if(empty($email)){
    $empty_fields .= 'Email address, ';
}
if(empty($profile_image1)){
    $empty_fields .= 'Profile image, ';
}
if(empty($password)){
    $empty_fields .= 'Password, ';
}
if(empty($house_no)){
    $empty_fields .= 'House number, ';
}
if(empty($state)){
    $empty_fields .= 'State, ';
}
if(empty($city)){
    $empty_fields .= 'City, ';
}
if(empty($subcity)){
    $empty_fields .= 'Subcity, ';
}
if(empty($woreda)){
    $empty_fields .= 'Woreda, ';
}
if(empty($kebele)){
    $empty_fields .= 'Kebele, ';
}

// Check if any required field is empty and display an alert message if there are empty fields
if(!empty($empty_fields)){
    $message = "The following fields are required: ".rtrim($empty_fields, ', ');
    echo "<script>alert('$message')</script>";
}

if(empty($empty_fields)){
    move_uploaded_file($temp_image1,"../profileimages/$profile_image1");
    mysqli_begin_transaction($conn);
    $md5=md5($password);
// Prepare SQL statement for inserting a new consumer record
$sql1 = "INSERT INTO consumer (C_fname, C_lname, C_phonenumber, C_email, C_profile_image, C_password)
         VALUES ('$f_name', '$l_name', '$phone', '$email', '$profile_image1', '$md5')";

// Execute SQL statement
if (mysqli_query($conn, $sql1)) {

    // Get the ID of the newly inserted consumer record
    $consumer_id = mysqli_insert_id($conn);
    
    // Prepare SQL statement for inserting a new consumer address record
    $sql2 = "INSERT INTO `consumer_address`(`C_house_no`, `C_id`, `C_state`, `C_city`, `C_Subcity`, `C_worda`, `C_kebele`) 
             VALUES ('$house_no', '$consumer_id', '$state', '$city', '$subcity', '$woreda', '$kebele')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql2)) {

        // Commit transaction
        mysqli_commit($conn);

        echo "New consumer record created successfully.";
        header('location:consumer.php');

    } else {

        // Rollback transaction
        mysqli_rollback($conn);

        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        header('location:consumer_reg.php');
    }

} else {

    // Rollback transaction
    mysqli_rollback($conn);

    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}  
     
    

}
    
       
}



if(isset($_POST['login'])) {//this is the consumner login. 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $md5=md5($password);
    $query = "SELECT * FROM `consumer` WHERE `C_email`='$email' AND `C_password`='$md5'";
    $result = mysqli_query($conn, $query);
   

    if (mysqli_num_rows($result) > 0) {
      echo "Login successful";
       $find="SELECT * FROM `consumer` WHERE `C_email`='$email'";
       $results = mysqli_query($conn, $find);
       while($row = mysqli_fetch_assoc($results)){
              $C_Id=$row['C_id'];

       }
       
       $_SESSION['consumer_id']=$C_Id;
       
      header("location:../homepage.php");
    } else {
      echo "Login failed user.";
      echo" <script>alert('login falied try again !');</script> ";
      header('location:consumer.php');  
    }
}


//this is the farmer regpage code we use for the insertion of the the farmer info on the database.
if(isset($_POST['insert_farmer'])){
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $phone=$_POST['Phone_number'];
    $password=$_POST['password'];
    //accessing the images.
    $profile_image=$_FILES['profile_image1']['name'];
    $house_no=$_POST['house_no'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $subcity=$_POST['subcity'];
    $woreda=$_POST['woreda'];
    $kebele=$_POST['kebele'];
   
    
   //accessing image tmp name

   $temp_image1=$_FILES['pofile_image1']['tmp_name'];
   
   //checking empty condtion
   if($f_name=='' or $l_name=='' or $phone==''
  or $password=='' or $profile_image=='' or $house_no=='' or 
  $state=='' or $city==''  or $subcity==''or  $woreda =='' or $kebele =='' ){
 echo"<script>alert('please fill all the avalible  fields')</script>";

   }
   else{
         
         $query = "SELECT * FROM `farmer` WHERE `F_phonenumber`='$phone'";
         $phone_number_result = mysqli_query($conn, $query);
         move_uploaded_file($temp_image1,"../profileimages/$profile_image");
         if (mysqli_num_rows($phone_number_result) < 1) {//this checks for if the inserted phonenumbers is used before if it is will ask the user to enter another number 
             $md5=md5($password);
             // Prepare SQL statement for inserting a new consumer record
             $sql1 = "INSERT INTO `farmer`( `F_fname`, `F_lname`, `F_phonenumber`, `F_profile_image`, `F_password`)
              VALUES (' $f_name','$l_name','$phone','$profile_image','$md5')";
             if (mysqli_query($conn, $sql1)) {

                 // Get the ID of the newly inserted consumer record
                 $farmer_id = mysqli_insert_id($conn);
                 
                 // Prepare SQL statement for inserting a new consumer address record
                 $sql2 = "INSERT INTO `farmer_address`(`F_house_no`, `F_id`, `F_state`, `F_city`, `F_subcity`, `F_woreda`, `F_kebele`)
                  VALUES ('$house_no','$farmer_id','$state','$city','$subcity','$woreda','$kebele')";
                 // Execute SQL statement
                 if (mysqli_query($conn, $sql2)) {
             
                     // Commit transaction
                     mysqli_commit($conn);
             
                     echo "New consumer record created successfully.";
                     header('location:farmer.php');
             
                 } else {
             
                     // Rollback transaction
                     mysqli_rollback($conn);
             
                     echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                     header('location:farmer_reg.php');
                 }
             
             } else {
             
                 // Rollback transaction
                 mysqli_rollback($conn);
             
                 echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
             }  
               
             
             
           } else {
            
             echo" <script>alert('the phone number is used try another one  !');</script> ";
           
           }
        
     
           

     }     
}

//this is the supplier insertion form control

if(isset($_POST['insert_supplier'])){
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $email=$_POST['S_email'];
    $password=$_POST['S_password'];
    $phone_number=$_POST['S_phone_number'];
    $profile_image=$_FILES['profile_image1']['name'];
    $S_house_no=$_POST['S_house_no'];
    $S_state=$_POST['S_state'];
    $S_city=$_POST['S_city'];
    $S_subcity=$_POST['S_subcity'];
    $S_woreda=$_POST['S_woreda'];
    $S_kebele=$_POST['S_kebele'];
    $temp_image1=$_FILES['profile_image1']['tmp_name'];
    $subscription_expiry_date=date("Y/m/d");
    $new_expiry_date=date('Y-m-d',strtotime('+5 years'));
    $md5=md5($password);
    if($f_name=='' or $l_name=='' or $email=='' or $password=='' or $phone_number=='' or $profile_image=='' or $S_house_no=='' or $S_state=='' or $S_city=='' or $S_subcity=='' or $S_woreda=='' or $S_kebele==''){
        echo "<script>alert('Please fill all the available fields.')</script>";
    } else {
        $query="SELECT * FROM `supplier` WHERE `S_email`='$email'";
        $email_result=mysqli_query($conn,$query);
        move_uploaded_file($temp_image1,"../profileimages/$profile_image");

        if(mysqli_num_rows($email_result)<1){
            $md5=md5($password);
            $sql1="INSERT INTO `supplier`(`S_fname`,`S_lname`,`S_phone_number`,`S_email`,`S_profile_image`,`S_password`) VALUES ('$f_name','$l_name','$phone_number','$email','$profile_image','$md5')";

            if(mysqli_query($conn,$sql1)){
                $supplier_id=mysqli_insert_id($conn);
                $sql2="INSERT INTO `supplier_address`(`S_house_no`,`S_id`,`S_state`,`S_city`,`S_subcity`,`S_woreda`,`S_kebele`) VALUES ('$S_house_no','$supplier_id','$S_state','$S_city','$S_subcity','$S_woreda','$S_kebele')";

                if(mysqli_query($conn,$sql2)){
                    mysqli_commit($conn);
                    $new_expire_date=date('Y-m-d',strtotime('+1 years'));
                    $newexpiredate="INSERT INTO `payment`(`PS_id`,`expire_date`) VALUES ('$supplier_id','$new_expire_date')";

                    if(mysqli_query($conn,$newexpiredate)){
                        echo "New consumer record created successfully.";
                        header('location:supplier.php');
                    } else {
                        mysqli_rollback($conn);
                        echo "Error: " . $newexpiredate . "<br>" . mysqli_error($conn);
                        echo "<script>alert('" . mysqli_error($conn) . "')</script>";
                        header('location:supplier_reg.php');
                    }
                } else {
                    mysqli_rollback($conn);
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    header('location:supplier_reg.php');
                }
            } else {
                mysqli_rollback($conn);
                echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
            }
        } else {
            echo" <script>alert('The email is already in use. Please try another one.')</script> ";
        }
    }
} 
//supplier login
if(isset($_POST['supplier_login'])) {
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    $md5=md5($password);
    $query = "SELECT * FROM `supplier` WHERE `S_email`='$email' AND `S_password`='$md5'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      echo "Login successful";
      while($row=mysqli_fetch_assoc($result)){  
        $S_id=$row['S_id'];

      }
      
      
      
      $transfer_email=$email; 
      $_SESSION["favcolor"] = $transfer_email;
      $_SESSION["supplier_id"]=$S_id;
      
      //start 
      
      // Get the user's id and subscription expiration date from the database
      $user_id = $S_id; // Assign the correct value to $user_id

      $sql = "SELECT `expire_date` FROM `payment` WHERE `PS_id`='$user_id'";
      $result = mysqli_query($conn, $sql);
  
      if (!$result) {
          echo "Failed to fetch subscription expiration date. Error: " . mysqli_error($conn);
          exit; // Exit if there is an error in the query
      }
  
      $row = mysqli_fetch_assoc($result);
      $expiration_date = $row['expire_date'];
  
      $now = date('Y-m-d');
  
      // Compare the current date and time with the subscription expiration date
      if ($now >= $expiration_date) {
          echo "Your subscription has expired.";
          header("location:../payment/supplier_suber.php");  
      } else {
          header("location:../supplier_area/index.php");
      }
}
else{
    header("location:supplier.php");
    
}
}

if(isset($_POST['farmer_login'])) {//this is the consumner login. 
    $phone=$_POST['phone_number'];
    $password=$_POST['password'];
    $md5=md5($password);
    $query = "SELECT   `F_phonenumber`, `F_password` FROM `farmer` WHERE `F_phonenumber`='$phone' and `F_password`='$md5';";
    $result = mysqli_query($conn, $query);
   

    if (mysqli_num_rows($result) > 0) {
      echo "Login successful";
       $find="SELECT * FROM `farmer` WHERE `F_phonenumber`='$phone'";
       $results = mysqli_query($conn, $find);
       while($row = mysqli_fetch_assoc($results)){
              $F_Id=$row['F_id'];
             $F_name=$row['F_fname'];
       }
       
       $_SESSION['farmer_id']=$F_Id;
       $_SESSION['farmer_name']=$F_name;
       header("location:../farmer_area");
    
    } else {
      echo "Login failed user.";
      echo" <script>alert('login falied try again !');</script> ";
     header('location:farmer.php');  
    }
}

?>


