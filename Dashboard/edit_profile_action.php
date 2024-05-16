
<!----------company------------->


<?php


if(empty($_FILES['company_file']['name'])){
    $company_file_name=$_POST['old_file'] ;
   $company_file_name;
}

else{
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
       
      
    }

}
}

            if(isset($_POST['submit'])){
                session_start();

                
                $company_id =$_SESSION["company_id"];
                $name =$_POST['name'];
                $email =$_POST['email'];
                
                $number =$_POST['number'];
                $url =$_POST['url'];
                $username =$_POST['username'];

                $address =$_POST['address'];
                $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
               


               $sql1="UPDATE company SET name='{$name}', email='{$email}',number={$number},url='{$url}',address='{$address}',company_username='{$username}',logo='{$company_file_name}' WHERE id={$company_id} ";

                 
                    
                
                if(mysqli_query($con , $sql1)){
                    
                 header("location:http://localhost/campus/dashboard/index.php");
                }
                else{
                    echo"can't update profile";
                }

            }
        
            ?>


   











