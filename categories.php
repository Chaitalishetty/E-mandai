<?php
    $link = mysqli_connect("localhost", "root", "", "e-mandai");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
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
        <div id="cart_icon">
        <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:40px;color:black"></i></a>
        <span class="badge bg-primary"><?php echo $count?></span>
        </div>
        <a data-container="body" data-toggle="popover" data-placement="bottom" data-content="Bottom popover"
            id="user-icon-pop">
            <i class="fa fa-user-circle" aria-hidden="true" style="color:white;font-size:50px;"></i>
        </a>

    </nav>

    <div class="row">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-gc-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Grains and Cereal</a>
        <a class="list-group-item list-group-item-action" id="list-pulses-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Pulses</a>
        <a class="list-group-item list-group-item-action" id="list-spices-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Spices</a>
        <a class="list-group-item list-group-item-action" id="list-fruits-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Fruits</a>
        <a class="list-group-item list-group-item-action" id="list-vegetables-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Vegetables</a>
        <a class="list-group-item list-group-item-action" id="list-oilseeds-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Oilseeds</a>
        <a class="list-group-item list-group-item-action" id="list-dryfruits-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Dry fruits</a>
        <a class="list-group-item list-group-item-action" id="list-herbs-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Herbs</a>
        <a class="list-group-item list-group-item-action" id="list-flori-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Floriculture</a>
        </div>
    </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-gc-list">
        <div class="row" id="product-section">
            <?php            
                $query = " SELECT * FROM `products` WHERE category='Grains and Cereal'";
                $query_run = mysqli_query($link,$query);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
        </div>
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-pulses-list">
        <?php            
                $query = " SELECT * FROM `products` WHERE category='Pulses'";
                $query_run = mysqli_query($link,$query);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
        </div>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-spices-list">
        <?php            
                $query = " SELECT * FROM `products` WHERE category='Spices'";
                $query_run = mysqli_query($link,$query);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
        </div>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-fruits-list">
      <?php            
                $query = " SELECT * FROM `products` WHERE category='Fruits'";
                $query_run = mysqli_query($link,$query);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-vegetables-list">
      <?php            
                $query = " SELECT * FROM `products` WHERE category='Vegetables'";
                $query_run = mysqli_query($link,$query);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-oilseeds-list">
      <?php            
                $query = " SELECT * FROM `products` WHERE category='Oilseeds'";
                $query_run = mysqli_query($link,$query);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-dryfruits-list">
      <?php            
                $query = " SELECT * FROM `products` WHERE category='Dry fruits'";
                $query_run = mysqli_query($link,$query);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-herbs-list">
      <?php            
                $query = " SELECT * FROM `products` WHERE category='Herbs'";
                $query_run = mysqli_query($link,$query);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-flori-list">
      <?php            
                $query9 = " SELECT * FROM `products` WHERE category='Floriculture'";
                $query_run = mysqli_query($link,$query9);
                if(mysqli_num_rows($query_run)>0)
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <div class="col-sm-4" style="display:flex;justify-content:center">
                <div class="product_card">
                    <div class="card text-center" style="width: 18rem;">
                   <img src="<?php echo $row['image'];?>" class="card-img-top" width="50px" height="auto" alt="product-image">
                   <div class="card-body">
                   <h4 class="card-title">
                       <div class="card-title1"><?php echo strtoupper($row['name']);?></div>
                       <div class="card-title2">&#8377;<?php echo $row['price'];?></div>
                    </h4>
                   <a href="product.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-lg">VIEW</a>
                   </div>
                </div>
                </div>
            </div>
            <?php
                           }
                           else{
                               echo "No product available";
                           }
            ?>
      </div>
    </div>
  </div>
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