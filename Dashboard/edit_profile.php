<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_profile.css">
</head>
<body>


<?php include "header.php"; ?>
<!--------------student ------------------------->
 <?php

if(isset($_SESSION['company_username'])){
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql="SELECT * FROM company WHERE company_username ='{$_SESSION['company_username']}'";
     $result= mysqli_query($con , $sql)or die("query failed");
     

 
     if(mysqli_num_rows($result)>0){
         
         while($row=mysqli_fetch_assoc($result)){
    ?>
    <form action="edit_profile_action.php" method="post" enctype="multipart/form-data">
        <h2>Update profile</h2>
            <input type="text"  value="admin"  name="role" hidden>
            <input type="text" name="id"   value="<?php echo $row['id'] ;?>" hidden >
            
                <input type="text" name="name"  value="<?php echo $row['name'] ;?>" id="adm-reg_name" placeholder="Enter Company Name" required>
               
                <input type="email" name="email" value="<?php echo $row['email'] ;?>"  id="adm-reg_email" placeholder="Enter Company Email" required>
                
                <input type="number" name="number"  value="<?php echo $row['number'] ;?>" id="adm-reg_number" placeholder="Enter Company Phone no." required>
                
                <input type="text" name="url"  value="<?php echo $row['url'] ;?>" id="adm-reg_name" placeholder="Enter Company URL" required>
                <input type="text" name="address"  value="<?php echo $row['address'] ;?>" id="adm-reg-address" placeholder="Enter Company Address" required>

                <input type="text" name="username"  value="<?php echo $row['company_username'] ;?>" id="adm-reg-username" placeholder="Enter Company username" required>
                

                

                
                <div class="file">
                <label for="adm-reg-file" class="label"> Company Logo&nbsp;</label>
                <input type="file" name="company_file"  id="adm-reg-file" >
                <input type="hidden" name="old_file"value="<?php echo $row['logo'] ;?>">
                </div>
                
                <input type="submit" name="submit" value="update">
            </form>

            <?php } } }?>


<!--------------student ------------------------->

            <?php
            if(isset($_SESSION['student_username'])){
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql="SELECT * FROM user WHERE username ='{$_SESSION['student_username']}'";
     $result= mysqli_query($con , $sql)or die("query failed");
     

 
     if(mysqli_num_rows($result)>0){
         
         while($row=mysqli_fetch_assoc($result)){
    ?>
    <form action="edit_profile_student_action.php" method="post" enctype="multipart/form-data">
        <h2>Update profile</h2>
            <input type="text"  value="admin"  name="role" hidden>
            <input type="text" name="id"   value="<?php echo $row['stu_id'] ;?>" hidden >
            
                <input type="text" name="name"  value="<?php echo $row['student_name'] ;?>" id="adm-reg_name" placeholder="Enter Your Name" required>
               
                <input type="email" name="email" value="<?php echo $row['student_email'] ;?>"  id="adm-reg_email" placeholder="Enter Your Email" required>
                
                <input type="number" name="number"  value="<?php echo $row['phone_number'] ;?>" id="adm-reg_number" placeholder="Enter Your Phone no." required>
                
                <input type="text" name="address"  value="<?php echo $row['student_address'] ;?>" id="adm-reg-address" placeholder="Enter Your Address" required>

                <input type="text" name="username"  value="<?php echo $row['username'] ;?>" id="adm-reg-username" placeholder="Enter Company username" required>
                <div class="gender">
                  

                <?php 
                $male1="male";
                $female1="female";
                $other1="other";
                if( $row['gender'] ==$male1){
                    $male="checked";
                }
                else{
                    $male="";
                    
    
                   }
              if($row['gender'] ==$female1){
                $female="checked";
               }
               else{
                $female="";
                

               }
                if($row['gender'] == $other1){
                $other="checked";
               }
               else{
                $other="";
                

               }
                ?>
                <label for="gender" >gender: </label>
                male<input type="radio" name="gender" value="male" <?php echo $male; ?>>
                Female<input type="radio" name="gender" value="female" <?php echo $female; ?>>
                Other<input type="radio" name="gender" value="other"<?php echo $other; ?>>

                </div>
                

                

                
                <div class="file">
                <label for="stu-reg-file"> Upload Profile Photo :&nbsp;</label>
                <input type="file" name="student_file"  id="stu-reg-file"  >
                <input type="hidden" name="old_student_file" value="<?php echo $row['file'] ;?>">
                </div>
                <div class="file">
                <label for="stu-reg-resume-file"> Upload Resume :&nbsp;</label>
                <input type="file" name="student_resume_file"  id="stu-reg-resume-file" >
                <input type="hidden" name="old_student_resume_file" value="<?php echo $row['resume'] ;?>">
                </div>
                
                <input type="submit" name="submit" value="update">
            </form>

            <?php } } }?>

            
</body>
</html>