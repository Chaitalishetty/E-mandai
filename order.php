<?php
session_start();
include('dbconfig.php');
if(isset($_POST['order_product']))
{
    if(!empty($_POST['c_address'] and $_POST['c_number'])){
        if(!empty($_SESSION['shopping_cart']))
        {    
            $username=$_SESSION['username'];
            $c_address=mysqli_real_escape_string($db,$_POST['c_address']);
            $c_number=mysqli_real_escape_string($db,$_POST['c_number']);
            foreach($_SESSION['shopping_cart'] as $key => $value)
            {       
                $id=$value['item_id'];
                $name = $value['item_name'];
                $price=$value['item_price'];
                $quantity=$value['item_quantity'];
                $image=$value['item_image'];
                $provider=$value['item_provider'];
                $sql="INSERT INTO `orders` (`productid`,`productname`,`productprice`,`productquantity`,`productimage`,`providername`,`customername`,`customeraddress`,`customerphone`) VALUES ('$id','$name','$price','$quantity','$image','$provider','$username','$c_address','$c_number')";    
                if(mysqli_query($db,$sql)){
                    echo "<script>alert('Your order is successful');window.location.href='homepage.php'</script>";
                    unset($_SESSION['shopping_cart']);
                }
            }
            
         }
         else{
             echo "<script>alert('Your cart is empty');window.location.href='homepage.php'</script>";
         }
    }
    else{
        echo "<script>alert('You need to enter the details');window.location.href='cart.php'</script>";
    }
}
?>