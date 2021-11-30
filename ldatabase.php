<?php
session_start();
$username=$_POST["username"];
$password=$_POST["password"];
if(count($_POST)>0) {
  include "conn.php";
  $result=mysqli_query($conn,'select * from `admin` where username="'.$username.'" and password="'.$password.'"');
  $row  = mysqli_fetch_array($result);
  if($row){
  $_SESSION["id"]=$row['id'];
  $_SESSION["file"]=$row['file'];
  $_SESSION["name"]=$row['name'];
  $_SESSION["email"]=$row['email'];
}else{
    echo "invalid password and username";
  }
}
if(isset($_SESSION["id"])){
  header("location:index.php");
}  