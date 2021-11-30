<?php
print_r($_POST);
include('conn.php');
$id=$_POST['id'];
$sql='delete from `admin` where id="'.$id.'"';
$res=mysqli_query($conn,$sql) or  die(mysqli_error($conn));
print_r($res);
if($res)
{
 $data= 'success';
 echo $data;
 
}else{
 $data='unsuccess';
 echo $data;
}