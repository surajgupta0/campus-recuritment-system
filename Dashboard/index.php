<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    
    <?php
    include "header.php";  ?>
<!------company profile---------->
    <?php
    if(isset($_SESSION['company_username'])){
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
   $sql="SELECT * FROM company WHERE company_username ='{$_SESSION['company_username']}'";
    $result= mysqli_query($con , $sql)or die("query failed");
    

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
    ?>
    <div class="all_company_container">
    <h1 class="profile_heading"> <?php echo $row['name'] ;?></h1>
   <div class="profile_Container">
        <img src="upload/<?php echo $row['logo'] ; ?>" >

        <p>Company Name : <span>   <?php echo $row['name'] ;?> </span></p>
        <p>Company Email :<span> <?php echo $row['email'] ;?>  </span></p>
        <p>Company Phone no. : <span> <?php echo $row['number'] ;?></span> </p>
        <p>Company URL :<span> <?php echo $row['url'] ;?> </span></p>
        <p>Company Address :<span> <?php echo $row['address'] ;?></span></p>
        <p>Company Username :<span> <?php echo $row['company_username'] ;?></span> </p>
        <a href="edit_profile.php"> Edit</a>
</div>
</div>
    <?php } } }?>
        



<!------student profile---------->

    <?php
    if(isset( $_SESSION["student_username"])){
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
   $sql="SELECT * FROM user WHERE username ='{$_SESSION['student_username']}'";
    $result= mysqli_query($con , $sql)or die("query failed");
    

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
    ?>
    <div class="all_student_container">
    <h1 class="profile_heading"> <?php echo $row['student_name'] ;?></h1>
   <div class="profile_Container">
        <img src="upload/<?php echo $row['file'] ; ?>" >

        <p> Name : <span>   <?php echo $row['student_name'] ;?> </span></p>
        <p>Email :<span> <?php echo $row['student_email'] ;?>  </span></p>
        <p>Phone number : <span> <?php echo $row['phone_number'] ;?></span> </p>
        <p>Gender :<span> <?php echo $row['gender'] ;?> </span></p>
        <p>Address :<span> <?php echo $row['student_address'] ;?></span></p>
        <p>username :<span> <?php echo $row['username'] ;?></span></p>
        <p>Applied Post :<span> <?php echo $row['applied_post'] ;?></span></p>

        <a href="edit_profile.php"> Edit</a>
</div>
</div>

    <?php } } }?>
        </div>
</body>
</html>