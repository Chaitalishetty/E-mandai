<?php
include('dbconfig.php');
session_start();
if(isset($_POST['signin'])){
        if (isset($_POST['username'])){
                $error="";
                $username = mysqli_real_escape_string($db,$_POST['username']);
                $password = mysqli_real_escape_string($db,$_POST['password']);
                //Checking is user existing in the database or not
                $query = "SELECT * FROM `userdata` WHERE username='$username' and password='$password'";
                $result = mysqli_query($db,$query);
                $row=mysqli_fetch_array($result);
                if(mysqli_num_rows($result)==1){
                    $_SESSION['username'] = $username;
                    if($row['type']=="farmer"){
                        header("Location: farmerhome.php");
                    
                    }
                    else {
                        header("Location: homepage.php");
                    }
                }
                else{
                        echo "<script>alert('Invalid login.Please try again');window.location.href='index.html';</script>";
                }
        }
}
?>