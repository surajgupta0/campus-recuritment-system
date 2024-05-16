<?php
    
    session_start();

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
        if($company_file_size>10097152){
            $company_error[]="plese upload file less then or eqalto 2mb";
        }
        if(empty($company_error)){
            move_uploaded_file($company_file_temp_name,"upload/".$company_file_name);
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
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");


    if(isset($_POST['submit'])){
       $post_title =mysqli_real_escape_string( $con,$_POST['job_title']);
       $salary =mysqli_real_escape_string( $con, $_POST['salary']);
       $description = mysqli_real_escape_string( $con,$_POST['description']);
       $opening = mysqli_real_escape_string( $con,$_POST['opening']);
       $location =mysqli_real_escape_string( $con, $_POST['location']);
       $category = mysqli_real_escape_string( $con,$_POST['category']);
       $Apply_date = mysqli_real_escape_string( $con,$_POST['Apply_date']);
       $Last_date = mysqli_real_escape_string( $con,$_POST['Last_date']);
       $experience = mysqli_real_escape_string( $con,$_POST['experience']);
       $time = mysqli_real_escape_string( $con,$_POST['time']);
       $company_name = $_SESSION['company_id'];
       
       $post_date=date("d M,y");
    }
    echo $sql1="INSERT INTO vacancy(Post_title,company_name,job_description,monthly_salary, no_of_opening, job_location, post_image, apply_date,last_date,vacancy_category_name,post_date,experience,time) VALUES ('{$post_title}',{$company_name},'{$description}','{$salary}',{$opening},'{$location}','{$company_file_name}','{$Apply_date}','{$Last_date}',{$category},'{$post_date}','{$experience}','{$time}');";
     $sql1.="UPDATE category SET total_category=total_category+1 WHERE category_id='{$category}'";
    if(mysqli_multi_query($con , $sql1)){
      header("location:http://localhost/campus/dashboard/all_vacancy.php");
    }
    else{
        echo"can't add vacancy";
    }
    ?>