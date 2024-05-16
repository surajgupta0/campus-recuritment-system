<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_category.css">
</head>
<body>


<?php include "header.php"; ?>
 <?php
 

 $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
 $category_id=$_GET['id'];
 $sql="SELECT * FROM category where category_id={$category_id}";
 $result= mysqli_query($con , $sql)or die("query failed");
 if(mysqli_num_rows($result)>0){
 while($row=mysqli_fetch_assoc($result)){
 ?>
    <div class="form_container">
        <div class="overlay">
    
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        
    <h2>update Category</h2>
            
                <input type="text" name="category_name"  value="<?php echo $row['category_name'];?>" id="adm-reg_name" placeholder="Enter Category Name" required>
               
                
                
                <input type="submit" name="submit" value="update">
            </form>
            </div>
            
            <div>
           <?php }} ?>

           <?php if(isset($_POST['submit']))
           {$category_name=$_POST['category_name'];
               $sql1 ="UPDATE category SET category_name='{$category_name}'  where category_id={$category_id}";
               if(mysqli_query($con , $sql1)){
               
               header("location:http://localhost/campus/dashboard/add_category.php");
               }
               else{
                   echo "can't update category";
               }
           }
           ?>
</body>
</html>