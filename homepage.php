
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"crossorigin="anonymous"></script>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>Document</title>
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
            <li><a href="homepage.php">Home</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="addproduct.php">Add product</a></li>
        </ul>
        <!-- Navbar content -->
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </form>
        <?php
            session_start();
            $count=0;
            if(isset($_SESSION['shopping_cart'])){
                $count=count($_SESSION['shopping_cart']);
            }
        ?>
        <div id="cart_icon">
        <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:40px;color:black"></i></a>
        <span class="badge bg-primary"><?php echo $count?></span>
        </div>
        <a data-container="body" data-toggle="popover" data-placement="bottom" data-content="Bottom popover"
            id="user-icon-pop">
            <i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i>
        </a>

    </nav>
    <div class="img-content">
        <h2>Welcome to </h2><br>
        <h1>E-mandai</h1>
    </div>

    <div class="row" id="product-section">
        <?php
            $link = mysqli_connect("localhost", "root", "", "e-mandai");
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }              
            $query = " SELECT * FROM `products`";
            $query_run = mysqli_query($link,$query);
            if(mysqli_num_rows($query_run)>0)
            while($row = mysqli_fetch_array($query_run))
            {
        ?>
        <div class="col-sm-3" style="display:flex;justify-content:center">
           <form method="POST" action="addcart.php">
            <input type="hidden" name="pid" value="<?php echo $row['id'];?>"><br>
            <input type="hidden" name="pname" value="<?php echo  $row['name'];?>" ><br>
            <input type="hidden" name="pprice" value="<?php echo  $row['price'];?>" >
            <input type="hidden" name="pimg" value="<?php echo  $row['image'];?>" >
            <input type="hidden" name="pquan" value="<?php echo  $row['quantity'];?>" >
            <div class="product_card">
                <div class="card text-center" style="width: 18rem;">
                <img src="<?php echo $row['image'];?>" class="card-img-top" width="auto" height="250px" alt="product-image">
                <div class="card-body">
                <h4 class="card-title">
                    <a href="product.php?id=<?php echo $row['id'];?>" class="p_link">
                    <div class="card-title1"><?php echo strtoupper($row['name']);?>
                    </div>
                    </a>
                    <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                
                <input type="submit" name="add_to_cart" value="ADD TO CART" class="btn btn-primary" >
                
                </div>
                </div>
            </div>
           </form>

        </div>
        <?php
                       }
                       else{
                           echo "No product available";
                       }
        ?>
    </div>

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
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
            <li><a href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
            <li><a href="categories.php"><i class="fa fa-th-list" aria-hidden="true"></i>Categories</a></li>
            <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>My Cart</a></li>
            <li><a href="addproduct.php"><i class="fa fa-plus-square"></i>Add product</a></li>
            <li><a href="aboutus.php"><i class="fa fa-info-circle" aria-hidden="true"></i>About us</a></li>
            <li><button type="button" class="btn btn-success" name="logout" id="log_button">Log Out</button></li>
        </ul>

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