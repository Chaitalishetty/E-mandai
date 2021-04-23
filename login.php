<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db="e-mandai";
$conn=mysqli_connect($host,$username,$password,$db);
if (isset($_POST['username'])){
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
                //escapes special characters in a string
        $username = mysqli_real_escape_string($conn,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        //Checking is user existing in the database or not
        $query = "SELECT * FROM `userdata` WHERE username='$username' and password='$password'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['username'] = $username;
                    // Redirect user to index.php
            header("Location: homepage.php");
        }
}
?>