<?php
$post_id=$_GET['id'];
$cat_id=$_GET['cat_id'];
$con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
$sql="DELETE FROM vacancy WHERE post_id=$post_id;";
$sql.="UPDATE category SET total_category=total_category-1 WHERE category_id=$cat_id";
if(mysqli_multi_query($con,$sql)){
    header("location:http://localhost/campus/dashboard/all_vacancy.php");
}
else{
    echo"can't delete post";
}
?>