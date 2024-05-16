<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "head.php";
    ?>
    
    

   
    
</head>
<body>
<?php session_start(); ?>
    <div class=" navbar">
    <i class="fa-solid fa-bars" id="icon"></i>
        <h1 >
            <span>C</span>ampus
        </h1>
        <div id="menu" >
        
            <ul >
           <i class="fa-solid fa-xmark"id="cross"></i>
                <li ><a href="http://localhost/campus/index.php" class="inner-menu " >Home</a></li>
                <li ><a href="http://localhost/campus/about.php" class="inner-menu" >About us</a></li>
                <li ><a href="http://localhost/campus/Campus.php"class="inner-menu" > All Campus</a></li>
                <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ 
                     echo " <li><a href='http://localhost/campus/dashboard' class='inner-menu' >dashboard</a></li>";
                    }?>
                <li ><a href="http://localhost/campus/contact.php" class="inner-menu" >Contact Us</a></li>
                
                
            </ul>
        </div>
     
        <ul class=login>
        <?php if(isset($_SESSION["company_username"]) ){ 
            
          echo " <li ><a href='http://localhost/campus/logout.php' class='logout'>  {$_SESSION['name']} &nbsp;Logout</a></li>";
              }
             else if(isset($_SESSION["student_username"]) ){ 
            
            echo " <li ><a href='http://localhost/campus/logout.php' class='logout'>  {$_SESSION['student_name']} &nbsp;Logout</a></li>";
                }?>

            <?php if(!isset($_SESSION["company_username"]) AND !isset($_SESSION["student_username"])){ 
       echo " <li>
                <a href='#' id='main-log'>Login</a>
                <ul class='submenu'>
                    <li><a href='#' id='stu_log'><i class='fa-solid fa-users'></i> &nbsp;Student Login</a></li>
                    <li><a href='#' id='adm_log'><i class='fa-solid fa-user'></i> &nbsp;Company Login</a></li>
                </ul>
            </li>";
             }?>
        </ul>
        
    </div>
    <!--------successfully added---------->
<div class="succesfully_add">
    <p>succesfully Registered</p>

</div>


    <!----student login ----->




    <?php
if(isset($_POST['stu_login_submit'])){
 $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
 $student_login_role =$_POST['student_login_role'];
 $student_login_username =$_POST['student_login_username'];
 $student_login_password =$_POST['student_login_password'];


 $sql5="SELECT * FROM user WHERE username='{$student_login_username}' AND password ='{$student_login_password}'";
 $result5= mysqli_query($con , $sql5)or die("query failed");

  
  
 if(mysqli_num_rows($result5)>0){
    while($row1=mysqli_fetch_assoc($result5)){
        
         $_SESSION["student_username"]= $row1['username'];
    $_SESSION["student_password"]= $row1['password'];
     $_SESSION["role"]= $row1['role'];
     $_SESSION["student_id"]= $row1['stu_id'];
     $_SESSION["student_name"]= $row1['student_name'];
    }

header("location:http://localhost/campus/dashboard/");

     echo"<script src='jquery/jquery.js'></script>

 <script > 
 $( document ).ready(function() {
     
     
    let succesfully_add=$('.succesfully_add');
    let para=$('.succesfully_add p');
    
    para.text('Login successfully');
    
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
    echo"
    <script src='jquery/jquery.js'></script>

 <script > 
 $( document ).ready(function() {
     
     
    let succesfully_add=$('.succesfully_add');
    let para=$('.succesfully_add p');
    
    para.text('username or password is incorrect');
    
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

?>






    <div class="studentlogin overlay"id="">
    <i class="fa-solid fa-xmark" class="log-cross" id="stu_log_cross"></i>
    
        <div class="box">
        
        <h2>Student Login</h2>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
            <input type= "text" value="admin"  name="student_login_role" hidden>
                <label for="username">Username</label>
                <input type="text" name="student_login_username" class="username" id="stu_log_username" placeholder="Enter Your userame" required>
                <p id="usererror" class="same"></p>
                <label for="password">Password</label>
                <input type="password" name="student_login_password" class="password"id="stu_log_password" placeholder="Enter Your password" required>
                <p id="passerror" class="same"></p>
                <input type="submit" name="stu_login_submit">
            </form>
            <div class="forget">
            <a href="forget_user_password.php">Forget Password</a>
            <a href="#" id="stu_register">Register</a>
</div>
        </div>
    
    </div>
<!----admin login ----->
<?php
if(isset($_POST['company_login_submit'])){

    
 $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
$company_login_role =$_POST['company_login_role'];
 $company_login_username =$_POST['company_login_username'];
 $company_login_password =$_POST['company_login_password'];


 $sql4="SELECT * FROM company WHERE company_username='{$company_login_username}' AND company_password ='{$company_login_password}'";
 $result4= mysqli_query($con , $sql4)or die("query failed");

  
  
 if(mysqli_num_rows($result4)>0){
    while($row=mysqli_fetch_assoc($result4)){
        $_SESSION["company_id"]= $row['id'];
         $_SESSION["company_username"]= $row['company_username'];
    $_SESSION["company_password"]= $row['company_password'];
     $_SESSION["role"]= $row['role'];
     
     
     
     $_SESSION["name"]= $row['name'];
    }

   header("location:http://localhost/campus/dashboard/");

     echo"<script src='jquery/jquery.js'></script>

 <script > 
 $( document ).ready(function() {
     
     
    let succesfully_add=$('.succesfully_add');
    let para=$('.succesfully_add p');
    
    para.text('Login successfully');
    
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
    echo"
    <script src='jquery/jquery.js'></script>

 <script > 
 $( document ).ready(function() {
     
     
    let succesfully_add=$('.succesfully_add');
    let para=$('.succesfully_add p');
    
    para.text('username or password is incorrect');
    
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

?>


    
    <div class="adminlogin overlay"id="">
    <i class="fa-solid fa-xmark" class="log-cross" id="adm_log_cross"></i>
    
        <div class="box">
        
        <h2>Company Login</h2>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <input type="text" value="admin"  name="company_login_role" hidden>
                <label for="username">Username</label>
                <input type="text" name="company_login_username" class="username" id="adm-username" placeholder="Enter Your userame" required>
                <label for="password">Password</label>
                <input type="password" name="company_login_password" class="password"id="adm-password" placeholder="Enter Your password" required>
                <input type="submit" name="company_login_submit">
            </form>
            <div class="forget">
            <a href="forget_company_password.php">Forget Password</a>
            
            <a href="#" id="adm_register">Register</a>
</div>
        </div>
    
    </div>


<!----student registration ----->

<?php
if(isset($_POST['stu_submit'])){

    if(isset($_FILES['student_file'])){
        $stu_error=array();
        $stu_file_name=$_FILES['student_file']['name'];
        $stu_file_size=$_FILES['student_file']['size'];
        $stu_file_temp_name=$_FILES['student_file']['tmp_name'];
        $stu_file_type=$_FILES['student_file']['type'];
        $stu_file_explode=explode('.',$stu_file_name);
        $stu_file_ext=end($stu_file_explode);
        $ext=array("jpg","jpeg","png","JPG","PNG","JPEG");
        if(in_array($stu_file_ext,$ext)===false){
            $stu_error[]="plese upload jpg,jpeg or png file";
        }
        if($stu_file_size>10097152){
            $stu_error[]="plese upload file less then or eqalto 2mb";
        }
        if(empty($stu_error)){
            move_uploaded_file($stu_file_temp_name,"dashboard/upload/".$stu_file_name);
        }
        else{
            echo"
            <script src='jquery/jquery.js'></script>
     
         <script > 
         $( document ).ready(function() {
             
             
            let succesfully_add=$('.succesfully_add');
            let para=$('.succesfully_add p');
            
            para.text('{ $stu_error}');
            
            succesfully_add.addClass('active_reg');
     
     
            setTimeout(none, 3000);
            function none(){
             succesfully_add.removeClass('active_reg');
            }
      });
            </script>
           ";
           die();
        }

    }
}

    

    
if(isset($_POST['stu_submit'])){

    if(isset($_FILES['student_resume_file'])){
        $stu_resume_error=array();
        $stu_file_resume_name=$_FILES['student_resume_file']['name'];
        $stu_file_resume_size=$_FILES['student_resume_file']['size'];
        $stu_file_resume_temp_name=$_FILES['student_resume_file']['tmp_name'];
        $stu_file_resume_type=$_FILES['student_resume_file']['type'];
        $stu_file_resume_explode=explode('.',$stu_file_resume_name);
        $stu_file_resume_ext=end($stu_file_resume_explode);
        $resume_ext=array("jpg","jpeg","png","JPG","PNG","JPEG","pdf","PDF","docx","DOCX");
        if(in_array($stu_file_resume_ext,$resume_ext)===false){
            $stu_resume_error[]="plese upload jpg,jpeg or png file";
        }
        if($stu_file_resume_size>19097152){
            $stu_resume_error[]="plese upload file less then or eqalto 15mb";
        }
        if(empty($stu_resume_error)){
            move_uploaded_file($stu_file_resume_temp_name,"dashboard/upload/".$stu_file_resume_name);
        }
        else{
            echo"
            <script src='jquery/jquery.js'></script>
     
         <script > 
         $( document ).ready(function() {
             
             
            let succesfully_add=$('.succesfully_add');
            let para=$('.succesfully_add p');
            
            para.text('{ $stu_error}');
            
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
   






 $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
 $name =$_POST['name'];
 $email =$_POST['email'];
 $role =$_POST['role'];
 $number =$_POST['number'];
 $username =$_POST['username'];
 $password =$_POST['password'];
 $re_password =$_POST['re-password'];
 $student_address=$_POST['student_address'];
 $gender =$_POST['gender'];
 

if( $password==$re_password){

$sql="select * from user where username='{$username}'";
$result=mysqli_query($con , $sql);

if(mysqli_num_rows($result)>0){
echo "<script>alert('username already exist')</script>";

}
else{
  $sql1="INSERT INTO user(student_name,student_email, phone_number, username, password, gender,  role,file,student_address,resume)
     VALUES ('{$name}','{$email}',{$number},'{$username}','{$password}','{$gender}','{$role}','{$stu_file_name}','{$student_address}','{$stu_file_resume_name}')";
    
    
 
    if(mysqli_query($con , $sql1)){
       echo"
       <script src='jquery/jquery.js'></script>

    <script > 
    $( document ).ready(function() {
        
        
       let succesfully_add=$('.succesfully_add');
       let para=$('.succesfully_add p');
       
       para.text('student successfully registered');
       
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
        echo "<script>alert('can't add ')</script>";
    }

}
}
else{
    echo "<script>alert('password are not match ')</script>";
}
}
?>

<div class="student_reg_login reg-overlay "id="">
    <i class="fa-solid fa-xmark" class="reg-cross" id="stu_reg_cross"></i>
    
        <div class="reg_box">
        
        <h2>Register for Students </h2>
            <form  onsubmit=" return myfun()" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            
            <input type="text" value="student"  name="role" hidden>
            
                <input type="text" name="name"  id="stu-reg_name" placeholder="Enter Your Name" required>
               
                <input type="email" name="email"  id="stu-reg_email" placeholder="Enter Your Email" required>
                
                <input type="number" name="number"  id="stu-reg_number" placeholder="Enter Your Phone no." required>
                
                <input type="text" name="student_address"  i placeholder="Enter Your address" required>

                
                <input type="text" name="username"  id="stu-reg-username" placeholder="Enter Your username" required>
                
                <input type="password" name="password" id="pass_stu" placeholder="Enter Your password" required>
                <p style="color:red;padding:20px 20px 20px 10px" id="error_stu"></p>
               
                <input type="password" name="re-password" id="repass_stu" placeholder="Re-enter Your password" required>
                <div class="gender">
                        

                <label for="gender">gender :&nbsp; </label>
                male<input type="radio" name="gender" value="male">
                Female<input type="radio" name="gender" value="female">
                Other<input type="radio" name="gender" value="other">

                </div>
                <div class="file">
                <label for="stu-reg-file"> Upload Profile Photo :&nbsp;</label>
                <input type="file" name="student_file"  id="stu-reg-file" required >
                </div>
                <div class="file">
                <label for="stu-reg-resume-file"> Upload Resume :&nbsp;</label>
                <input type="file" name="student_resume_file"  id="stu-reg-resume-file" required >
                </div>
                <input type="submit" name="stu_submit">
            </form>
            
            <a href="#" id="stu_login">Login</a>
            
        </div>
    
    </div>
<!----admin registration ----->

<?php
if(isset($_POST['adm_submit'])){



    if(isset($_FILES['company_file'])){
        $company_error=array();
        $company_file_name=$_FILES['company_file']['name'];
        $company_file_size=$_FILES['company_file']['size'];
        $company_file_temp_name=$_FILES['company_file']['tmp_name'];
        $company_file_type=$_FILES['company_file']['type'];
        $company_file_explode=explode('.',$company_file_name);
        $company_file_ext=end($company_file_explode);
        $extension=array("jpg","jpeg","png","JPG","PNG","JPEG");
        if(in_array($company_file_ext,$extension)===false){
            $company_error[]="plese upload jpg,jpeg or png file";
        }
        if($company_file_size>2097152){
            $company_error[]="plese upload file less then or eqalto 2mb";
        }
        if(empty($company_error)){
            move_uploaded_file($company_file_temp_name,"dashboard/upload/".$company_file_name);
        }
        else{
            echo"
            <script src='jquery/jquery.js'></script>
     
         <script > 
         $( document ).ready(function() {
             
             
            let succesfully_add=$('.succesfully_add');
            let para=$('.succesfully_add p');
            
            para.text('{ $company_error}');
            
            succesfully_add.addClass('active_reg');
     
     
            setTimeout(none, 3000);
            function none(){
             succesfully_add.removeClass('active_reg');
            }
      });
            </script>
           ";
           die();
        }

    }












    
 $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
 $company_name =$_POST['company_name'];
 $company_email =$_POST['company_email'];
 $company_role =$_POST['company_role'];
 $company_number =$_POST['company_number'];
 $company_username =$_POST['company_username'];
 $company_password =$_POST['company_password'];
 $company_re_password =$_POST['company_re-password'];
 $company_address =$_POST['company_address'];
 $company_url=$_POST['company_url'];
 

 if(  $company_password==$company_re_password){

$sql2="select * from company where company_username='{$company_username}'";
$result2=mysqli_query($con , $sql2);

if(mysqli_num_rows($result2)>0){
echo "<script>alert('username already exist')</script>";

}
else{
    $sql3="INSERT INTO company( name, email, number, url, address, company_username, company_password, role, logo)
     VALUES ('{$company_name}','{$company_email}',{$company_number},'{ $company_url}','{$company_address}','{$company_username}',
     '{$company_password}','{$company_role}','{$company_file_name}')";
    
    
 
    if(mysqli_query($con , $sql3)){
       echo"
       <script src='jquery/jquery.js'></script>

    <script > 
    $( document ).ready(function() {
        
        
       let succesfully_add=$('.succesfully_add');
       let para=$('.succesfully_add p');
       
       para.text('company successfully registered');
       
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
        echo"
        <script src='jquery/jquery.js'></script>
 
     <script > 
     $( document ).ready(function() {
         
         
        let succesfully_add=$('.succesfully_add');
        let para=$('.succesfully_add p');
        
        para.text('company not  registered');
        
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
 }
 else{
     echo"<script>alert('password are not match')</script>";
 }
}
?>



    <div class="admin_reg_login reg-overlay "id="">
    <i class="fa-solid fa-xmark" class="reg-cross" id="adm_reg_cross"></i>
    
        <div class="reg_box">
        
        <h2>Register for company </h2>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <input type="text" value="company"  name="company_role" hidden>
            
            
                <input type="text" name="company_name"  id="adm-reg_name" placeholder="Enter Company Name" required>
               
                <input type="email" name="company_email"  id="adm-reg_email" placeholder="Enter Company Email" required>
                
                <input type="number" name="company_number"  id="adm-reg_number" placeholder="Enter Company Phone no." required>
                
                <input type="text" name="company_url"  id="adm-reg_name" placeholder="Enter Company URL" required>
                <input type="text" name="company_address"  id="adm-reg-address" placeholder="Enter Company Address" required>
                
                <input type="text" name="company_username"  id="adm-reg-username" placeholder="Enter Your username" required>
                
                <input type="password" name="company_password" id="adm-reg-password" placeholder="Enter Your password" required>
               
                <input type="password" name="company_re-password" id="adm-reg-repassword" placeholder="Re-enter Your password" required>
                
                <div class="file">
                <label for="adm-reg-file"> Upload Company Logo &nbsp;</label>
                <input type="file" name="company_file"  id="adm-reg-file" >
                </div>
                
                <input type="submit" name="adm_submit">
            </form>
            
            <a href="#" id="adm_login">Already have Account</a>
        </div>
    
    </div>

  









    
    

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <script src="jquery/jquery.js"></script>



   
    
    <script>
        
       
         
     $( document ).ready(function() {
        
        

        //student login//
        let stu_log=$("#stu_log");
        let studentlogin=$(".studentlogin");
        let stu_log_cross=$("#stu_log_cross");
        
        stu_log.click(function(){
            studentlogin.addClass("active_log");  
      });
      stu_log_cross.click(function(){
        studentlogin.removeClass("active_log");  
      });
      //admin login//
      let adm_log=$("#adm_log");
      let adminlogin=$(".adminlogin");
      let adm_log_cross=$("#adm_log_cross");
      adm_log.click(function(){
        adminlogin.addClass("active_log");  
      });
      adm_log_cross.click(function(){
        adminlogin.removeClass("active_log");  
      });
      //admin registration//
      let adm_reg_cross =$("#adm_reg_cross");
      let adm_register=$("#adm_register");
      let admin_reg_login=$(".admin_reg_login");
      let adm_login=$("#adm_login");

      adm_login.click(function(){
          
        adminlogin.addClass("active_log");
          admin_reg_login.removeClass("active_log");
      });
      adm_reg_cross.click(function(){
          
          
          admin_reg_login.removeClass("active_log");
      });
      
      adm_register.click(function(){
          admin_reg_login.addClass("active_log");  
       
        adminlogin.removeClass("active_log");  
      
          
      });
     //student registration//
     let stu_reg_cross =$("#stu_reg_cross");
      let stu_register=$("#stu_register");
      let student_reg_login=$(".student_reg_login");
      let stu_login=$("#stu_login");

      stu_login.click(function(){
          
        studentlogin.addClass("active_log");
          student_reg_login.removeClass("active_log");
      });
      stu_reg_cross.click(function(){
          
          student_reg_login.removeClass("active_log");
      });
      
      stu_register.click(function(){
          student_reg_login.addClass("active_log");  
       
        studentlogin.removeClass("active_log");  
      
          
      });





      let menu=$("#menu");
      let cross=$("#cross");
      let icon=$("#icon");
      icon.click(function(){
        menu.toggleClass("active");  
      });
      cross.click(function(){
        menu.removeClass("active");  
      });
        
    $(".login").hover(function(){
        

        $(".login ul ").toggleClass("sub");
        
        
    });







    function myfun(){
    let pass_stu=document.getElementById("pass_stu").value;
    let repass_stu=document.getElementById("repass_stu").value;
    let error_stu=document.getElementById("error_stu");
    if(pass_stu !=repass_stu){
        error=error.innerHTML="password is not same";
        return false;
    }
}
});
    </script>



</body>
</html>