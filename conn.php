<?php
$conn=mysqli_connect("localhost","root","","task1");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}