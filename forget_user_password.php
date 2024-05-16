<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/forget_company_password.css">
    <?php
    include "head.php";
    ?>
</head>
<body>
    <?php
    include "header.php";
    ?>
  
<div class="form_container">
<form action="<?php $_SERVER['PHP_SELF']?>" method="post"class="forget_form">
            <h2>Forget Password</h2>
                <input type="text" name="username"   placeholder="Enter Your Username" required>
                <input type="email" name="email"    placeholder="Enter Your email" required>
                <input type="number" name="number"    placeholder="Enter Your number" required>

               
                <input type="password" name="new_pass"   id="adm-reg_email" placeholder="Enter Your New-Password" required>
                
                <input type="password" name="re_new_pass"   id="adm-reg_number" placeholder="Renter Your New_password" required>
                
                <input type="submit" name="submit" value="submit">
                  </form>
</div>


            <?php
        $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
        
        if(isset($_POST['submit'])){

            $username=$_POST['username'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $new_pass=$_POST['new_pass'];
        $re_new_pass=$_POST['re_new_pass'];

       $sql="SELECT * FROM user WHERE username='{$username}' AND student_email='{$email}' AND phone_number={$number}";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
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
                
                para.text('Details not correct');
                
                succesfully_add.addClass('active_reg');
         
         
                setTimeout(none, 3000);
                function none(){
                 succesfully_add.removeClass('active_reg');
                }
         
         
         
         
             });
                </script>
               ";
                
            }

        }?>
        </body>
        </html>