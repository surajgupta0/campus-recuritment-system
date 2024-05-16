<?php
    
    session_start();


    if(empty($_FILES['student_file']['name'])){
        $student_file_name=$_POST['old_student_file'];
    }
    else{
    if(isset($_FILES['student_file'])){
        $student_error=array();
         $student_file_name=$_FILES['student_file']['name'];
        $student_file_size=$_FILES['student_file']['size'];
        $student_file_temp_name=$_FILES['student_file']['tmp_name'];
        $student_file_type=$_FILES['student_file']['type'];
        $student_file_explode=explode('.',$student_file_name);
        $student_file_ext=end($student_file_explode);
        $student_extension=array("jpg","jpeg","png","JPG","PNG","JPEG");
        if(in_array($student_file_ext,$student_extension)===false){
            $student_error[]="plese upload jpg,jpeg or png file";
        }
        if($student_file_size>10097152){
            $student_error[]="plese upload file less then or eqalto 5mb";
        }
        if(empty($student_error)){
            move_uploaded_file($student_file_temp_name,"upload/".$student_file_name);
        }
        else{
            echo"
            <script src='jquery/jquery.js'></script>
     
         <script > 
         $( document ).ready(function() {
             
             
            let succesfully_add=$('.succesfully_add');
            let para=$('.succesfully_add p');
            
            para.text('{ error}');
            
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





if(empty($_FILES['student_resume_file']['name'])){
    $student_file_resume_name=$_POST['old_student_resume_file'];
}
else{
if(isset($_FILES['student_resume_file'])){
    $student_resume_error=array();
     $student_file_resume_name=$_FILES['student_resume_file']['name'];
    $student_file_resume_size=$_FILES['student_resume_file']['size'];
    $student_file_resume_temp_name=$_FILES['student_resume_file']['tmp_name'];
    $student_file_resume_type=$_FILES['student_resume_file']['type'];
    $student_file_resume_explode=explode('.',$student_file_resume_name);
    $student_file_resume_ext=end($student_file_resume_explode);
    $student_resume_extension=array("jpg","jpeg","png","JPG","PNG","JPEG","PDF","pdf","docx","DOCX");
    if(in_array($student_file_resume_ext,$student_resume_extension)===false){
        $student_resume_error[]="plese upload jpg,jpeg or png file";
    }
    if($student_file_resume_size>10097152){
        $student_resume_error[]="plese upload file less then or eqalto 5mb";
    }
    if(empty($student_resume_error)){
        move_uploaded_file($student_file_resume_temp_name,"upload/".$student_file_resume_name);
    }
    else{
        echo"
        <script src='jquery/jquery.js'></script>
 
     <script > 
     $( document ).ready(function() {
         
         
        let succesfully_add=$('.succesfully_add');
        let para=$('.succesfully_add p');
        
        para.text('{ error}');
        
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

















if(isset($_POST['submit'])){
    echo $student_file_resume_name;
 

    
    $student_id =$_SESSION["student_id"];
    $name =$_POST['name'];
    $email =$_POST['email'];
    
    $number =$_POST['number'];
    $gender =$_POST['gender'];
    $username =$_POST['username'];
    $address =$_POST['address'];
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
   


   $sql1="UPDATE user SET student_name='{$name}', student_email='{$email}',phone_number={$number},gender='{$gender}',student_address='{$address}',username='{$username}',file='{$student_file_name}',resume='{$student_file_resume_name}' WHERE stu_id={$student_id}";
     
        
    
    if(mysqli_query($con , $sql1)){
        
    header("location:http://localhost/campus/dashboard/index.php");
    }
    else{
        echo"can't update profile";
    }
}




?>