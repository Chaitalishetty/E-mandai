<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-mandai";

		   $link = mysqli_connect("localhost", "root", "", "e-mandai");
// Check to make sure the id parameter is specified in the URL

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['add_to_cart']))
{
    if(isset($_SESSION['shopping_cart'])){
        $item_array_id=array_column($_SESSION['shopping_cart'],'item_id');
        if(in_array($_POST['pid'],$item_array_id))
        {  echo "<script>alert('Item Already added');
          window.location.href='homepage.php';</script>"; 
            
        }
                  
        else{
          $count=count($_SESSION['shopping_cart']);
          $item_array=array(
            'item_id' => $_POST['pid'],
            'item_name' => $_POST['pname'],
            'item_price' => $_POST['pprice'],
            'item_quantity' => $_POST['pquan'],
            'item_image' => $_POST['pimg'],

              
          );
          $_SESSION["shopping_cart"][$count]=$item_array;
          echo "<script>alert('Item added');
          window.location.href='homepage.php';</script>";
        } 
    }
    

    else{
        $item_array=array(
            'item_id' => $_POST['pid'],
            'item_name' => $_POST['pname'],
            'item_price' => $_POST['pprice'],
            'item_quantity' => $_POST['pquan'],
            'item_image' => $_POST['pimg'],

            
        );
        $_SESSION['shopping_cart'][0] = $item_array;
        
        echo "<script>alert('Item added');
        window.location.href='homepage.php';</script>"; 
        
    }
    
}
?>
