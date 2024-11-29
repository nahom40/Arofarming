  <!--connect file-->
  <?php
include('./include/connect.php');

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
    <style>


@import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);

html,
body {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
  height: 100%;
  width: 100%; 
  background: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
}
 
.wrapper {
  display: table;
  height: 100%;
  width: 100%;
}

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #876558;
  /*505050*/
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
} 
.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}
body{
  background: lightgoldenrodyellow;
}
.fostrap-logo{
  height: 170px;
  width: 170px;
}

    </style>

</head>
<body>
<section class="wrapper">
    <div class="container-fostrap">
        <div>

            <img src="background_images/logo.png" class="fostrap-logo"/>
            <h1 class="heading">
                Afro Farming Login Page
            </h1>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="./loginpages/consumer.php">
                            <img src="./background_images/customerlogo.png" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="./loginpages/consumer.php">Consumer
                                  </a>
                                </h4>
                                <p class="">
                                    If you are a consumer choose this one. To acess your account.
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="./loginpages/consumer.php" class="btn btn-link btn-block">
                                    click here!
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="./loginpages/farmer.php">
                            <img src="./background_images/farmmerlogo.png" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="./loginpages/farmmer.php"> Farmer
                                  </a>
                                </h4>
                                <p class="">
                                If you are a Farmer choose this one. To access your account.       
                            </p>
                            </div>
                            <div class="card-read-more">
                                <a href="./loginpages/farmer.php" class="btn btn-link btn-block">
                                click here !
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="./loginpages/supplier.php">
                            <img src="./background_images/dealerslogo.png" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="./loginpages/supplier.php">Supplier
                                  </a>
                                </h4>
                                <p class="">
                                If you are a Supplier choose this one. To access your account.
                            </p>
                            </div>
                            <div class="card-read-more">
                                <a href="./loginpages/supplier.php" class="btn btn-link btn-block">
                                    click here !
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                          
                                 

                         
                        
        <!-- footer end -->
        <!-- boot strap javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    <!-- boot strap  javascript  link-->
    
</body>
</html>