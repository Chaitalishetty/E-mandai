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
    $user=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=mysqli_real_escape_string($conn,$_POST['password']);
    $sql="INSERT INTO `userdata` (`username`, `password`, `email`) VALUES ('$user','$email','$pass')";
    if(mysqli_query($conn,$sql)){
        header('location:homepage.html');
    }

}
?>