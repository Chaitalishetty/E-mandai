<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "e-mandai");
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $sql="SELECT * FROM `products` where id='$id'";
   $query_run = mysqli_query($link,$sql);
   if(mysqli_num_rows($query_run)>0)  
		while($row = mysqli_fetch_array($query_run))
			{
           $image=$row['image'];
           $name=$row['name'];
           $price=$row['price'];
           $quantity=$row['quantity'];
           $address=$row['address'];
           $city=$row['city'];
           $number=$row['number'];
           $email=$row['email'];
           $category=$row['category'];
           $pname=$row['username'];
        
         }
   else{
        echo "No product available";
   }
   if(isset($_POST['add_to_cart'])){
    $quan = mysqli_real_escape_string($link, $_POST['quan']);
    $cart = "INSERT INTO cart (`name`,`price`,`quan`,`pid`) VALUES ('$name', '$price', '$quan', '$id')";
    if(mysqli_query($link, $cart)){
  
      
    }else{
      echo "ERROR: Could not able to execute $cart. " . mysqli_error($link);
    }     
  }
}
?>
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
    <title>View Product</title>
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
            <li><a href="homepage.php">Home</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="aboutus.php">About us</a></li>
        </ul>
        <!-- Navbar content -->
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </form>
        <?php
            $count=0;
            if(isset($_SESSION['shopping_cart'])){
                $count=count($_SESSION['shopping_cart']);
            }
        ?>
        <div id="cart_icon">
        <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:40px;color:black"></i></a>
        <span class="badge bg-primary"><?php echo $count?></span>
        </div>
        <a data-container="body" data-toggle="popover" data-placement="bottom" data-content="<a href='logout.php'>Logout</a>" data-html="true"
            id="user-icon-pop">
            <i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i>
        </a>

    </nav>
    <div class="row">
      <div class="col-md-5">
        <div>
        <img src="<?php echo $image?>" class="p_img">
        </div>
      </div>
      <div class="col-md-7" id="p_details">

        <h1><?php echo strtoupper($name);?></h1>
        <form method="POST" action="addcart.php?action=add&id=<?php echo $id?>">
        <input type="hidden" name="pid" value="<?php echo $id?>" disabled><br>
        <input type="hidden" name="pname" value="<?php echo $name?>" ><br>
        <h4>Quantity:&nbsp;<?php echo $quantity;?></h4><br>

        <h4>M.R.P: &#8377;&nbsp;<?php echo $price;?></h4><br>
        <h4>Category: <?php echo $category;?><h4><br>
        <h4>Provider details: 
            <h5>Name : <?php echo $pname;?></h5>
          <h5>E-mail : <?php echo $email;?></h5>
          <h5>Mobile number : <?php echo $number;?></h5>
          <h5>City : <?php echo $city;?></h5>
        <h4><br>
        </form>
      
       
    
    
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
            <li><a href="aboutus.php"><i class="fa fa-info-circle" aria-hidden="true"></i>About us</a></li>
            <li><a href="logout.php"><button type="button" class="btn btn-success" name="logout" id="log_button">Log Out</button></a></li>
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