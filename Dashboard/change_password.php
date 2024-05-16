<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/change_password.css">
   
</head>
<body>
<?php include "header.php"; ?>
<!--------------company ------------------------->



<?php
            if(isset($_SESSION['company_username'])){
    
         ?>
  
        

            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <h2>change Password</h2>
                <input type="text" name="username"   placeholder="Enter Your Userame" required>
                <input type="password" name="current_pass"    placeholder="Enter Your Current_password" required>
               
                <input type="password" name="new_pass"   id="adm-reg_email" placeholder="Enter Your New-Password" required>
                
                <input type="password" name="re_new_pass"   id="adm-reg_number" placeholder="Renter Your New_password" required>
                
                <input type="submit" name="submit" value="submit">
                  </form>

            <?php
        $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
        
        if(isset($_POST['submit'])){

            $username=$_POST['username'];
        $current_password=$_POST['current_pass'];
        $new_pass=$_POST['new_pass'];
        $re_new_pass=$_POST['re_new_pass'];

        $sql="SELECT * FROM company WHERE company_username='{$username}' AND company_password='{$current_password}'";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)){
                $sql1=" UPDATE company SET company_password='{$new_pass}' where company_username='{$username}'";
                if(mysqli_query($con,$sql1)){
                    echo"
                    <script src='jquery/jquery.js'></script>
             
                 <script > 
                 $( document ).ready(function() {
                     
                     
                    let succesfully_add=$('.succesfully_add');
                    let para=$('.succesfully_add p');
                    
                    para.text('Password change succesfully');
                    
                    succesfully_add.addClass('active_reg');
             
             
                    setTimeout(none, 3000);
                    function none(){
                     succesfully_add.removeClass('active_reg');
                    }
             
             
             
             
                 });
                    </script>
                   ";
                }
                else{
                    echo" Can't Update Password ";
                }
            }
            else{
                echo"
                <script src='jquery/jquery.js'></script>
         
             <script > 
             $( document ).ready(function() {
                 
                 
                let succesfully_add=$('.succesfully_add');
                let para=$('.succesfully_add p');
                
                para.text('Username Or Password is not correct');
                
                succesfully_add.addClass('active_reg');
         
         
                setTimeout(none, 3000);
                function none(){
                 succesfully_add.removeClass('active_reg');
                }
         
         
         
         
             });
                </script>
               ";
                
            }

        }

}?>




<!--------------student ------------------------->

            <?php
            if(isset($_SESSION['student_username'])){
    
         ?>
  
        

            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <h2>change Password</h2>
                <input type="text" name="username"   placeholder="Enter Your Userame" required>
                <input type="password" name="current_pass"    placeholder="Enter Your Current_password" required>
               
                <input type="password" name="new_pass"   id="adm-reg_email" placeholder="Enter Your New-Password" required>
                
                <input type="password" name="re_new_pass"   id="adm-reg_number" placeholder="Renter Your New_password" required>
                
                <input type="submit" name="submit" value="submit">
                  </form>

            <?php
        $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
        
        if(isset($_POST['submit'])){

            $username=$_POST['username'];
        $current_password=$_POST['current_pass'];
        $new_pass=$_POST['new_pass'];
        $re_new_pass=$_POST['re_new_pass'];

         $sql="SELECT * FROM user WHERE username='{$username}' AND password='{$current_password}'";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)){
                $sql1=" UPDATE user SET password='{$new_pass}' where username='{$username}'";
                if(mysqli_query($con,$sql1)){
                    echo"
                    <script src='jquery/jquery.js'></script>
             
                 <script > 
                 $( document ).ready(function() {
                     
                     
                    let succesfully_add=$('.succesfully_add');
                    let para=$('.succesfully_add p');
                    
                    para.text('Password change succesfully');
                    
                    succesfully_add.addClass('active_reg');
             
             
                    setTimeout(none, 3000);
                    function none(){
                     succesfully_add.removeClass('active_reg');
                    }
             
             
             
             
                 });
                    </script>
                   ";
                }
                else{
                    echo" Can't Update Password ";
                }
            }
            else{
                echo"
                <script src='jquery/jquery.js'></script>
         
             <script > 
             $( document ).ready(function() {
                 
                 
                let succesfully_add=$('.succesfully_add');
                let para=$('.succesfully_add p');
                
                para.text('Username Or Password is not correct');
                
                succesfully_add.addClass('active_reg');
         
         
                setTimeout(none, 3000);
                function none(){
                 succesfully_add.removeClass('active_reg');
                }
         
         
         
         
             });
                </script>
               ";
            }

        }


      
        
        
        
        
        
        
       }?>
</body>
</html>