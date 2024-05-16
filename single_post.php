<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/single_post.css">
    <?php
    include "head.php";
    ?>
</head>
<body>
   


    <?php
     
     include "header.php";  
    if(isset($_SESSION["role"])){
        
       

    
    
    ?>
 <div class="body_container">
<?php
    $post_id=$_GET['id'];
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql="SELECT * FROM vacancy 

    INNER JOIN category ON vacancy.vacancy_category_name=category.category_id
    INNER JOIN company ON vacancy.company_name = company.id 
    where post_id={$post_id}
";
$result= mysqli_query($con , $sql)or die("query failed");
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
    ?>
<div class="single_post">
<p class="post_date">Post date: <?php echo $row['post_date']?></p>
    <div class="image_container">
    

    <img class="file_image" src="dashboard/upload/<?php echo $row['post_image'];?>">
    <img class="logo"src="dashboard/upload/<?php echo $row['logo'];?>" >
    </div>
    <h2 class="company-name"><?php echo $row['name']?></h2>
    <p class="title"><?php echo $row['Post_title']?></p>
    <h3 class="title" class="descri">Job Description</h3>
    <p class="description"><?php echo $row['job_description']?></p>
    <div class="all-post-description">
    <div class="post-description">
                    <div class="desc">
                        <i class="fa-solid fa-user"></i>
                        <div class="icon">
                            <h2>No. of opening</h2>
                            <p> <?php echo $row['no_of_opening']?></p>
                        </div>
                    </div>
                    <div class="desc">
                        <i class="fa-solid fa-briefcase"></i>
                        <div class="icon">
                            <h2>salary</h2>
                            <p> <?php echo $row['monthly_salary']?></p>
                        </div>
                    </div>
                    <div class="desc">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="icon">
                            <h2>Location</h2>
                            <p> <?php echo $row['address']?></p>
                        </div>
                    </div>
                    
                    
                    

                </div>
                <div class="post-description">
                <div class="desc">
                        <i class="fa-solid fa-calendar"></i>
                        <div class="icon">
                            <h2>Apply date</h2>
                            <p><?php echo $row['apply_date']?>  </p>
                        </div>
                    </div>
                    <div class="desc">
                        <i class="fa-solid fa-calendar"></i>
                        <div class="icon">
                            <h2>Last date</h2>
                            <p><?php echo $row['last_date']?> </p>
                        </div>
                    </div>
                    <div class="desc">
                    </i><i class="fa-solid fa-table"></i>  
                      <div class="icon">
                            <h2>Category</h2>
                            <p><?php echo $row['category_name']?> </p>
                        </div>
                    </div>
                   


                </div>

                <div class="post-description">
                <div class="desc">
                    <i class="fa-solid fa-laptop-file"></i>
                        <div class="icon">
                            <h2>Experience</h2>
                            <p> <?php echo $row['experience']?></p>
                        </div>
                    </div>
                
                    <div class="desc">
                    <i class="fa-solid fa-business-time"></i> 
                      <div class="icon">
                            <h2>Time</h2>
                            <p><?php echo $row['time']?> </p>
                        </div>
                    </div>


                </div>




               

    </div>
    <div class="contact_icons">

<a href="tel:<?php echo $row['number'] ?>"><i class="fa-solid fa-phone"></i></a>
<a href="mailto:<?php echo $row['email'] ?>"><i class="fa-solid fa-envelope"></i></a>
<a href="<?php echo $row['url'] ?>"><i class="fa-solid fa-building"></i></a>
</div>
    

<div class="apply">
    <form action="<?php $_SERVER['PHP_SELF']?>" method =post>
   <input type=submit name="submit"value="Apply now">
    </form>
</div>
    

</div>




<?php }}

}
else{
    header("location:http://localhost/campus/index.php");
    echo"
    <script>
    $( document ).ready(function() {
        let studentlogin=$('.studentlogin');
       
        

            studentlogin.addClass('active_log'); 
        });

    
    </script>
    
    ";
}


?>
<!-----------------------apply----------------------->

<?php 


if(isset($_POST['submit'])){
    if(isset($_SESSION['student_id'])){


        $student_id=$_SESSION['student_id'];
        $sql4="SELECT * FROM applied_student WHERE post_id_all={$post_id} AND student_user ={$student_id}";
        $result4=mysqli_query($con , $sql4);
        if(mysqli_num_rows($result4)>0){
            echo"<script>alert('student Already Applied');</script>";
        }
        else{


            $post_id=$_GET['id'];
    $student_id=$_SESSION['student_id'];
    $apply_post_date=date("d M,y");

    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql="SELECT * FROM vacancy 

    INNER JOIN category ON vacancy.vacancy_category_name=category.category_id
    INNER JOIN company ON vacancy.company_name = company.id 
    where post_id={$post_id}";
    $result= mysqli_query($con , $sql)or die("query failed");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
           
      $company_id=$row['id'];
      $category_id=$row['category_id'];
      echo  $sql1="INSERT INTO applied_student(post_id_all,student_user,company_user,category_id_all,apply_post_date)VALUES('{$post_id}','{$student_id}','{$company_id}','{$category_id}','{$apply_post_date}');";
        $sql1.="UPDATE user SET applied_post=applied_post+1 WHERE stu_id={$student_id};";
       echo $sql1.="UPDATE vacancy SET applied_student=applied_student+1 WHERE post_id={$post_id};";
     echo  $sql1.="UPDATE vacancy SET no_of_opening=no_of_opening-1 WHERE Post_id='{$post_id}'";
        
    
    
    if(mysqli_multi_query($con , $sql1)or die(" failed")){
        echo"<script src='jquery/jquery.js'></script>

        <script > 
        $( document ).ready(function() {
            
            
           let succesfully_add=$('.succesfully_add');
           let para=$('.succesfully_add p');
           
           para.text('Applied successfully');
           
           succesfully_add.addClass('active_reg');
       
       
           setTimeout(none, 3000);
           function none(){
            succesfully_add.removeClass('active_reg');
           }
       
       
       
       
        });
           </script>
          ";

    
    }else{
        echo"You cannot Apply";
    }
    
    
    
    
    
    }}}}

    else{
        echo"<script> alert('Company cannot Apply');</script>";
    }


    

}



    ?>
</div>
</body>
<?php include "footer.php";?>
</html>
