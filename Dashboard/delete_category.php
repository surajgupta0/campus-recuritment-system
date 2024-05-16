<?php
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $category_id=$_GET['id'];
    $sql="DELETE FROM category where category_id={$category_id}";
    
    if( mysqli_query($con , $sql)){
        
        header("location:http://localhost/campus/dashboard/add_category.php");
    }
    else{
        echo "can't delete category";
    }
?>