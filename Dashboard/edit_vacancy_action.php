<?php
    
    session_start();

    if(empty($_FILES['company_file']['name'])){
        $company_file_name=$_POST['old_company_file'];
    }
    else{
    if(isset($_FILES['company_file'])){
        $company_error=array();
        echo $company_file_name=$_FILES['company_file']['name'];
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
}
$con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");

 $post_id=mysqli_real_escape_string( $con,$_POST['id']);
    $post_name=mysqli_real_escape_string( $con,$_POST['Title']);
    $salary=mysqli_real_escape_string( $con,$_POST['salary']);
    $description=mysqli_real_escape_string( $con,$_POST['description']);
    $opening=mysqli_real_escape_string( $con,$_POST['opening']);
    $job_location=mysqli_real_escape_string( $con,$_POST['job_location']);
    $post_date=mysqli_real_escape_string( $con,$_POST['post_date']);
    $apply_date=mysqli_real_escape_string( $con,$_POST['apply_date']);
    $last_date=mysqli_real_escape_string( $con,$_POST['last_date']);
    $category=mysqli_real_escape_string( $con,$_POST['category']);
    $experience=mysqli_real_escape_string( $con,$_POST['experience']);
    $time=mysqli_real_escape_string( $con,$_POST['time']);

    
    echo $sql="UPDATE vacancy SET Post_title='{$post_name}',job_description='{$description}',monthly_salary='{$salary}',no_of_opening='{$opening}',job_location='{$job_location}',post_image='{$company_file_name}',apply_date='{$apply_date}',last_date='{$last_date}',vacancy_category_name='{$category}',post_date='{$post_date}',experience='{$experience}',time='{$time}' WHERE post_id={$post_id}";
     
    if(mysqli_query($con , $sql)){
        header("location:http://localhost/campus/dashboard/all_vacancy.php");
    }
    else{
        echo"can't update";
    }
?>


