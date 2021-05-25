<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db="e-mandai";
$conn=mysqli_connect($host,$username,$password,$db);
if(!$conn)
{
    die("connection failed". mysqli_connect_error());
}
//include("dbconfig.php");
if (isset($_POST['signup']))
{ 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user=mysqli_real_escape_string($conn,$_POST['username']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $pass=mysqli_real_escape_string($conn,$_POST['password']);
        $type=mysqli_real_escape_string($conn,$_POST['type']);
        $query = "SELECT * FROM `userdata` WHERE email='$email' or username='$user'";
        $result = mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
        if(mysqli_num_rows($result)==0){
            $sql="INSERT INTO `userdata` (`username`, `email`, `password`,`type`) VALUES ('$user','$email','$pass','$type')";
            if(mysqli_query($conn,$sql)){
                header('location:index.html');
            }
        }
        else {
            echo "<script>alert('Try a different username or email');window.location.href='index.html'</script>";
        }
    }
    else{
        echo"<script>alert('this is not the right way')</script>";
    }

}
?>