<?php
            session_start();
            $count=0;
            if(isset($_SESSION['shopping_cart'])){
                $count=count($_SESSION['shopping_cart']);
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css" type="text/css"/>
    <title>Add Product</title>
    <link rel = "icon" href ="./images/logo.png" type = "image/x-icon">
</head>

<body>
    <nav class="navbar navbar-dark bg-success">
        <div class="nav">
            <div class="sm-navbar">
                <i class="fa fa-bars" onclick="opennav()" style="font-size:25px;"></i>
            </div>

        </div>
        <a href="homepage.php"><img src="./images/E-MANDAI .png" class="logo"></a>
        <ul class="lg-nav">
            <li><a href="farmerhome.php">Home</a></li>
            <li><a href="addproduct.php">Add product</a></li>
            <li><a href="orders.php">Orders</a></li></li>
            <li><a href="about.html">About us</a></li>
        </ul>
        <!-- Navbar content -->
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </form>
        <a data-container="body" data-toggle="popover" data-placement="bottom" data-content="<a href='logout.php'>Logout</a>" data-html="true"
            id="user-icon-pop">
            <i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i>
        </a>

    </nav>
    
    <div id="mynav" class="sidebar">
        <div class="nav_user">
            <i class="fa fa-times" onclick=closenav() id="nav_icon"></i>
            <div class="user_id">
                <i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i>
                <!-- <a href="#"><i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i></a>
                        <h2>USER</h2> -->
            </div>
        </div>
        <ul>
        <li><a href="farmerhome.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    <li><a href="addproduct.php"><i class="fa fa-th-list" aria-hidden="true"></i>Add product</a></li>
                    <li><a href="orders.php"><i class="fa fa-th-list" aria-hidden="true"></i>Orders</a></li>
                    <li><a href="about.html"><i class="fa fa-info-circle" aria-hidden="true"></i>About us</a></li>
            <li><a href="logout.php"><button type="button" class="btn btn-success" name="logout" id="log_button">Log Out</button></a></li>
        </ul>

    </div>
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" id="add_form">
            <form action="add_back.php" method="POST" enctype="multipart/form-data">
              <input type="text" class="form-control" id="inputPname" name="pname"placeholder="Enter the product name">
              <input type="text" class="form-control" id="inputPprice" name="pprice" placeholder="Enter the product price">
              <input type="text" class="form-control" id="inputPquantity" name="pquan" placeholder="Enter the product quantity">
              <input type="text" class="form-control" id="inputAddress" name="add" placeholder="Enter your address">
              <input type="text" class="form-control" id="inputCity" name="city" placeholder="Enter your city">
              <input type="tel" class="form-control" id="inputMobile" name ="number" placeholder="Enter your mobile number">
              <input type="email" class="form-control" id="inputEmail4" name="pemail" placeholder="Enter your e-mail">
              <h6 style="margin-left: 20px;">Upload the product image:</h6>
              <input type="file" class="form-control" id="inputImage" name="pimage" placeholder="Upload the product image">
              <select id="inputState" class="form-control" name="category">
                      <option selected>Select Category</option>
                      <option>Grains and Cereal</option>
                      <option>Pulses</option>
                      <option>Spices</option>
                      <option>Fruits</option>
                      <option>Vegetables</option>
                      <option>Oilseeds</option>
                      <option>Dry fruits</option>
                      <option>Herbs</option>
                      <option>Floriculture</option>
              </select>
              <button type="submit" class="btn btn-success" name="addbutton">Add product</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
<script>
    function opennav() {

        document.getElementById("mynav").style.width = "150px";
        document.getElementById("content").style.marginLeft = "150px";
        document.getElementsByClassName("sidebar").style.boxShadow = "0px 2px 10px 2px black;"
    }
    function closenav() {
        document.getElementById("mynav").style.width = "0";
        document.getElementById("content").style.marginLeft = "0";
    }
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    
</script>

</html>