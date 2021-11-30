<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["name"]);
unset($_SESSION["file"]);
header("Location:login.php");
?>