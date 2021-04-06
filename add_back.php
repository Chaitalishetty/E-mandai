<?php      
   session_start();
	$link = mysqli_connect("localhost", "root", "", "e-mandai");
   
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

if(isset($_POST['addbutton'])){
    $name = mysqli_real_escape_string($link, $_POST['pname']);
    $price = mysqli_real_escape_string($link, $_POST['pprice']);
    $quantity = mysqli_real_escape_string($link, $_POST['pquan']);
    $address = mysqli_real_escape_string($link, $_POST['add']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $number = mysqli_real_escape_string($link, $_POST['number']);
    $pmail = mysqli_real_escape_string($link, $_POST['pemail']);
    $category = mysqli_real_escape_string($link, $_POST['category']);
    $file=$_FILES['pimage'];
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    if($fileerror==0){
        $destfile='uploads/'.$filename;
        move_uploaded_file($filepath,$destfile);
        $sql="INSERT INTO `products` (`name`, `price`, `quantity`,`address`,`city`,`number`,`email`,`category`,`image`) VALUES ('$name','$price','$quantity','$address','$city','$number','$pmail','$category','$destfile')";
        if(mysqli_query($link,$sql)){
            echo "<script>alert('Product added successfully')</script>";
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

    }

    

}


?>