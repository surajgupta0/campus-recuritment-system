<?php

$con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
 session_start();
 session_unset();
 session_destroy();

 header("location:http://localhost/campus/index.php");

?>